<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\StoreLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('items');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('delivery_type')) {
            $query->where('delivery_type', $request->delivery_type);
        }
        if ($request->filled('payment_method')) {
            $query->where('payment_method', $request->payment_method);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', '%' . $search . '%')
                  ->orWhere('customer_name', 'like', '%' . $search . '%')
                  ->orWhere('customer_phone', 'like', '%' . $search . '%');
            });
        }

        $orders = $query->latest()->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $stores = StoreLocation::where('is_active', true)->get();
        $products = Product::where('is_visible', true)->get();

        return view('admin.orders.create', compact('stores', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            // Generate order number: THC-YYYYMMDD-XXXX
            $todayCount = Order::whereDate('created_at', today())->count() + 1;
            $orderNumber = 'THC-' . date('Ymd') . '-' . str_pad($todayCount, 4, '0', STR_PAD_LEFT);

            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'delivery_type' => $request->delivery_type ?? 'delivery',
                'delivery_address' => $request->delivery_address,
                'pickup_store_id' => $request->pickup_store_id,
                'delivery_date' => $request->delivery_date,
                'delivery_time' => $request->delivery_time,
                'note' => $request->note,
                'gift_recipient_name' => $request->gift_recipient_name,
                'gift_recipient_phone' => $request->gift_recipient_phone,
                'shipping_fee' => $request->shipping_fee ?? 0,
                'discount' => $request->discount ?? 0,
                'payment_method' => $request->payment_method ?? 'cod',
                'status' => 'pending',
                'admin_note' => $request->admin_note,
                'subtotal' => 0,
                'total' => 0,
            ]);

            $subtotal = 0;
            foreach ($request->items as $item) {
                $product = Product::findOrFail($item['product_id']);
                $unitPrice = $item['unit_price'] ?? ($product->sale_price ?? $product->price);
                $qty = $item['quantity'];
                $itemTotal = $unitPrice * $qty;
                $subtotal += $itemTotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $qty,
                    'unit_price' => $unitPrice,
                    'total_price' => $itemTotal,
                    'variation_label' => $item['variation_label'] ?? null,
                ]);
            }

            $order->update([
                'subtotal' => $subtotal,
                'total' => $subtotal + $order->shipping_fee - $order->discount,
            ]);

            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Da tao don hang ' . $orderNumber . ' thanh cong!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Loi: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $order = Order::with('items', 'items.product', 'pickupStore')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::with('items')->findOrFail($id);
        $stores = StoreLocation::where('is_active', true)->get();
        $products = Product::where('is_visible', true)->get();

        return view('admin.orders.edit', compact('order', 'stores', 'products'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        DB::beginTransaction();
        try {
            $order->update([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'customer_email' => $request->customer_email,
                'delivery_type' => $request->delivery_type,
                'delivery_address' => $request->delivery_address,
                'pickup_store_id' => $request->pickup_store_id,
                'delivery_date' => $request->delivery_date,
                'delivery_time' => $request->delivery_time,
                'note' => $request->note,
                'gift_recipient_name' => $request->gift_recipient_name,
                'gift_recipient_phone' => $request->gift_recipient_phone,
                'shipping_fee' => $request->shipping_fee ?? $order->shipping_fee,
                'discount' => $request->discount ?? $order->discount,
                'payment_method' => $request->payment_method,
                'status' => $request->status ?? $order->status,
                'admin_note' => $request->admin_note,
                'cancel_reason' => $request->cancel_reason,
            ]);

            // Recalculate totals if items changed
            if ($request->has('items')) {
                // Delete old items and recreate
                $order->items()->delete();
                $subtotal = 0;

                foreach ($request->items as $item) {
                    $product = Product::findOrFail($item['product_id']);
                    $unitPrice = $item['unit_price'] ?? ($product->sale_price ?? $product->price);
                    $qty = $item['quantity'];
                    $itemTotal = $unitPrice * $qty;
                    $subtotal += $itemTotal;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'quantity' => $qty,
                        'unit_price' => $unitPrice,
                        'total_price' => $itemTotal,
                        'variation_label' => $item['variation_label'] ?? null,
                    ]);
                }

                $order->update([
                    'subtotal' => $subtotal,
                    'total' => $subtotal + $order->shipping_fee - $order->discount,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Da cap nhat don hang!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Loi: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Da xoa don hang!');
    }
}
