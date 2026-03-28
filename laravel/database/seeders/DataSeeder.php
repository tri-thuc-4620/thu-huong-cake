<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\VariationSet;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\StoreLocation;
use App\Models\HeroSlide;
use App\Models\Banner;
use App\Models\Page;
use App\Models\ContactMessage;
use App\Models\CallbackRequest;
use App\Models\Setting;
use App\Models\User;

class DataSeeder extends Seeder
{
    public function run(): void
    {
        // === Categories ===
        $categories = [
            ['name' => 'Banh Sinh Nhat', 'slug' => 'banh-sinh-nhat', 'sort_order' => 0],
            ['name' => 'Banh Sinh Nhat Mini', 'slug' => 'banh-sinh-nhat-mini', 'sort_order' => 1, 'parent' => 'banh-sinh-nhat'],
            ['name' => 'Banh Sinh Nhat Hoa Qua', 'slug' => 'banh-sinh-nhat-hoa-qua', 'sort_order' => 2, 'parent' => 'banh-sinh-nhat'],
            ['name' => 'Banh Sinh Nhat Trai Tim', 'slug' => 'banh-sinh-nhat-trai-tim', 'sort_order' => 3, 'parent' => 'banh-sinh-nhat'],
            ['name' => 'Banh Dac Biet', 'slug' => 'banh-dac-biet', 'sort_order' => 4],
            ['name' => 'Set Qua Tang', 'slug' => 'set-qua-tang', 'sort_order' => 5],
            ['name' => 'Banh Bong Lan Trung Muoi', 'slug' => 'banh-bong-lan-trung-muoi', 'sort_order' => 6],
            ['name' => 'Banh Kem Su Kien', 'slug' => 'banh-kem-su-kien', 'sort_order' => 7],
            ['name' => 'Banh Sinh Nhat Tang', 'slug' => 'banh-sinh-nhat-tang', 'sort_order' => 8],
            ['name' => 'Banh Hoa Kem', 'slug' => 'banh-hoa-kem', 'sort_order' => 9],
        ];

        $catMap = [];
        foreach ($categories as $cat) {
            $parentId = isset($cat['parent']) ? ($catMap[$cat['parent']] ?? null) : null;
            $created = Category::create([
                'name' => $cat['name'],
                'slug' => $cat['slug'],
                'parent_id' => $parentId,
                'sort_order' => $cat['sort_order'],
                'is_visible' => true,
                'show_in_menu' => true,
            ]);
            $catMap[$cat['slug']] = $created->id;
        }

        // === Attributes ===
        $sizeAttr = Attribute::create(['name' => 'Kich thuoc', 'slug' => 'kich-thuoc', 'display_type' => 'button', 'sort_order' => 0]);
        $baseAttr = Attribute::create(['name' => 'Cot banh', 'slug' => 'cot-banh', 'display_type' => 'button', 'sort_order' => 1]);
        $colorAttr = Attribute::create(['name' => 'Mau sac', 'slug' => 'mau-sac', 'display_type' => 'color', 'sort_order' => 2]);

        $sizes = ['12cm', '14cm', '16cm', '18cm', '20cm', '22cm'];
        foreach ($sizes as $i => $s) {
            AttributeValue::create(['attribute_id' => $sizeAttr->id, 'name' => $s, 'slug' => Str::slug($s), 'sort_order' => $i]);
        }

        $bases = ['Gato Vani', 'Red Velvet', 'Socola', 'Matcha', 'Gato Tra Xanh', 'Gato Vani Viet Quat', 'Hong Cam', 'Tiramisu'];
        foreach ($bases as $i => $b) {
            AttributeValue::create(['attribute_id' => $baseAttr->id, 'name' => $b, 'slug' => Str::slug($b), 'sort_order' => $i]);
        }

        $colors = ['Hong', 'Trang', 'Xanh', 'Vang', 'Do', 'Tim'];
        foreach ($colors as $i => $c) {
            AttributeValue::create(['attribute_id' => $colorAttr->id, 'name' => $c, 'slug' => Str::slug($c), 'sort_order' => $i]);
        }

        // === Variation Sets ===
        $miniSet = VariationSet::create(['name' => 'Banh Sinh Nhat Mini', 'slug' => 'banh-sinh-nhat-mini']);
        $specialSet = VariationSet::create(['name' => 'Banh Dac Biet', 'slug' => 'banh-dac-biet']);
        $heartSet = VariationSet::create(['name' => 'Banh Trai Tim', 'slug' => 'banh-trai-tim']);

        // Attach values to sets
        $miniSizeIds = AttributeValue::where('attribute_id', $sizeAttr->id)->whereIn('slug', ['12cm', '14cm', '16cm'])->pluck('id');
        $miniBaseIds = AttributeValue::where('attribute_id', $baseAttr->id)->whereIn('slug', ['gato-vani', 'red-velvet', 'socola'])->pluck('id');
        $miniSet->values()->sync($miniSizeIds->merge($miniBaseIds));

        $specialSizeIds = AttributeValue::where('attribute_id', $sizeAttr->id)->whereIn('slug', ['16cm', '18cm', '20cm', '22cm'])->pluck('id');
        $specialBaseIds = AttributeValue::where('attribute_id', $baseAttr->id)->whereIn('slug', ['gato-vani', 'red-velvet', 'socola', 'matcha'])->pluck('id');
        $specialSet->values()->sync($specialSizeIds->merge($specialBaseIds));

        // === Products (10 sample) ===
        $productData = [
            ['name' => 'Banh kem dau tay Premium', 'price' => 350000, 'sale_price' => 300000, 'cat' => 'banh-sinh-nhat-mini', 'is_hot' => true, 'type' => 'variable', 'vs' => $miniSet->id],
            ['name' => 'Banh mousse socola', 'price' => 280000, 'cat' => 'banh-dac-biet', 'type' => 'variable', 'vs' => $specialSet->id],
            ['name' => 'Set qua tang banh mix vi', 'price' => 90000, 'cat' => 'set-qua-tang', 'type' => 'simple'],
            ['name' => 'Banh bong lan trung muoi truyen thong', 'price' => 180000, 'sale_price' => 150000, 'cat' => 'banh-bong-lan-trung-muoi', 'is_hot' => true, 'type' => 'simple'],
            ['name' => 'Banh kem viet quat tuoi mat', 'price' => 250000, 'cat' => 'banh-sinh-nhat-hoa-qua', 'is_new' => true, 'type' => 'variable', 'vs' => $miniSet->id],
            ['name' => 'Banh sinh nhat trai tim hong', 'price' => 320000, 'cat' => 'banh-sinh-nhat-trai-tim', 'type' => 'variable', 'vs' => $heartSet->id],
            ['name' => 'Banh kem mini mau hong', 'price' => 120000, 'cat' => 'banh-sinh-nhat-mini', 'is_featured' => true, 'type' => 'simple'],
            ['name' => 'Banh sinh nhat kem chay tone hong', 'price' => 450000, 'cat' => 'banh-dac-biet', 'type' => 'variable', 'vs' => $specialSet->id],
            ['name' => 'Sweet box mix vi trai tim', 'price' => 135000, 'cat' => 'set-qua-tang', 'type' => 'simple'],
            ['name' => 'Banh kem su kien cong ty', 'price' => 800000, 'cat' => 'banh-kem-su-kien', 'is_featured' => true, 'type' => 'variable', 'vs' => $specialSet->id],
        ];

        foreach ($productData as $pd) {
            $product = Product::create([
                'name' => $pd['name'],
                'slug' => Str::slug($pd['name']),
                'sku' => 'THC-' . strtoupper(Str::random(4)),
                'category_id' => $catMap[$pd['cat']] ?? null,
                'variation_set_id' => $pd['vs'] ?? null,
                'type' => $pd['type'],
                'price' => $pd['price'],
                'sale_price' => $pd['sale_price'] ?? null,
                'stock_status' => 'in_stock',
                'is_visible' => true,
                'is_hot' => $pd['is_hot'] ?? false,
                'is_new' => $pd['is_new'] ?? false,
                'is_featured' => $pd['is_featured'] ?? false,
                'short_description' => 'Mo ta ngan cho ' . $pd['name'],
                'description' => 'Mo ta chi tiet cho ' . $pd['name'] . '. Banh lam tu nguyen lieu tuoi sach, giao hang nhanh trong 1 gio.',
            ]);

            // Create variations for variable products
            if ($pd['type'] === 'variable') {
                $sizeVals = AttributeValue::where('attribute_id', $sizeAttr->id)->whereIn('slug', ['14cm', '16cm', '18cm'])->get();
                $baseVals = AttributeValue::where('attribute_id', $baseAttr->id)->whereIn('slug', ['gato-vani', 'red-velvet'])->get();

                $priceStep = 0;
                foreach ($sizeVals as $sv) {
                    foreach ($baseVals as $bv) {
                        $varPrice = $pd['price'] + ($priceStep * 50000);
                        $variation = $product->variations()->create([
                            'sku' => $product->sku . '-' . strtoupper(substr($sv->slug, 0, 3)) . '-' . strtoupper(substr($bv->slug, 0, 2)),
                            'price' => $varPrice,
                            'stock_quantity' => rand(5, 30),
                            'stock_status' => 'in_stock',
                            'is_active' => true,
                        ]);
                        $variation->attributeValues()->sync([$sv->id, $bv->id]);
                    }
                    $priceStep++;
                }
            }
        }

        // === Orders (5 sample) ===
        $statuses = ['pending', 'confirmed', 'processing', 'completed', 'cancelled'];
        $admin = User::where('email', 'admin@thuhuongcake.vn')->first();

        foreach ($statuses as $i => $status) {
            $order = Order::create([
                'order_number' => 'THC-' . date('Ymd') . '-' . str_pad($i + 1, 4, '0', STR_PAD_LEFT),
                'user_id' => $admin?->id,
                'customer_name' => 'Khach hang ' . ($i + 1),
                'customer_phone' => '09' . rand(10000000, 99999999),
                'customer_email' => 'khach' . ($i + 1) . '@gmail.com',
                'delivery_type' => $i % 2 === 0 ? 'delivery' : 'pickup',
                'delivery_address' => $i % 2 === 0 ? 'So ' . rand(1, 200) . ' Pho Yen Hoa, Cau Giay, Ha Noi' : null,
                'delivery_date' => now()->addDays(rand(1, 5)),
                'subtotal' => 0,
                'shipping_fee' => $i % 2 === 0 ? 30000 : 0,
                'total' => 0,
                'payment_method' => $i % 2 === 0 ? 'cod' : 'bank_transfer',
                'status' => $status,
                'cancel_reason' => $status === 'cancelled' ? 'Khach doi y' : null,
            ]);

            $subtotal = 0;
            $products = Product::inRandomOrder()->take(rand(1, 3))->get();
            foreach ($products as $p) {
                $qty = rand(1, 3);
                $price = $p->sale_price ?? $p->price;
                $itemTotal = $price * $qty;
                $subtotal += $itemTotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $p->id,
                    'product_name' => $p->name,
                    'quantity' => $qty,
                    'unit_price' => $price,
                    'total_price' => $itemTotal,
                ]);
            }

            $order->update([
                'subtotal' => $subtotal,
                'total' => $subtotal + $order->shipping_fee - $order->discount,
            ]);
        }

        // === Blog ===
        $blogCats = [
            BlogCategory::create(['name' => 'Meo lam banh', 'slug' => 'meo-lam-banh']),
            BlogCategory::create(['name' => 'Tin tuc', 'slug' => 'tin-tuc']),
            BlogCategory::create(['name' => 'Khuyen mai', 'slug' => 'khuyen-mai']),
        ];

        for ($i = 1; $i <= 5; $i++) {
            BlogPost::create([
                'title' => 'Bai viet mau so ' . $i,
                'slug' => 'bai-viet-mau-so-' . $i,
                'blog_category_id' => $blogCats[array_rand($blogCats)]->id,
                'author_id' => $admin?->id,
                'excerpt' => 'Tom tat bai viet mau so ' . $i,
                'content' => 'Noi dung chi tiet bai viet mau so ' . $i . '. Day la noi dung demo.',
                'is_published' => true,
                'published_at' => now()->subDays(rand(1, 30)),
                'views' => rand(100, 5000),
            ]);
        }

        // === Store Locations ===
        $stores = [
            ['name' => 'Thu Huong Cake - Yen Hoa', 'short_name' => 'Yen Hoa', 'address' => 'So 72 Ngo 235 Pho Yen Hoa, P. Yen Hoa, Q. Cau Giay, Ha Noi', 'city' => 'Ha Noi', 'phone' => '0962849989'],
            ['name' => 'Thu Huong Cake - Hau Giang', 'short_name' => 'Hau Giang', 'address' => '801 Duong Hau Giang, Phuong 11, Quan 6, TP HCM', 'city' => 'TP HCM', 'phone' => '0862089099'],
            ['name' => 'Thu Huong Cake - Thanh Xuan', 'short_name' => 'Thanh Xuan', 'address' => 'So 15 Ngo 43 Pho Trung Van, Q. Thanh Xuan, Ha Noi', 'city' => 'Ha Noi', 'phone' => '0961234567'],
        ];
        foreach ($stores as $i => $s) {
            StoreLocation::create(array_merge($s, ['sort_order' => $i, 'is_active' => true]));
        }

        // === Hero Slides ===
        HeroSlide::create(['badge_text' => 'Thu Huong Cake', 'title_line_1' => 'Banh Sinh Nhat', 'title_line_2' => 'Tuoi Ngon Moi Ngay', 'description' => 'Giao hang nhanh trong 1 gio', 'button_1_text' => 'Dat Banh Ngay', 'button_1_url' => '/products', 'is_active' => true, 'sort_order' => 0]);
        HeroSlide::create(['badge_text' => 'Dac Biet', 'title_line_1' => 'Set Banh Lam Qua', 'title_line_2' => 'Ngot Ngao Yeu Thuong', 'button_1_text' => 'Xem Ngay', 'button_1_url' => '/products', 'is_active' => true, 'sort_order' => 1]);

        // === Banners ===
        Banner::create(['title' => 'Ship hoa toc 1H', 'position' => 'homepage', 'is_active' => true, 'sort_order' => 0]);
        Banner::create(['title' => 'Mo cua 7:00 - 23:00', 'position' => 'homepage', 'is_active' => true, 'sort_order' => 1]);

        // === Pages ===
        Page::create(['title' => 'Gioi thieu', 'slug' => 'gioi-thieu', 'content' => 'Noi dung gioi thieu Thu Huong Cake...', 'is_published' => true]);
        Page::create(['title' => 'Chinh sach giao hang', 'slug' => 'chinh-sach-giao-hang', 'content' => 'Noi dung chinh sach giao hang...', 'is_published' => true]);

        // === Contact Messages ===
        for ($i = 1; $i <= 5; $i++) {
            ContactMessage::create([
                'name' => 'Nguoi gui ' . $i,
                'phone' => '09' . rand(10000000, 99999999),
                'email' => 'lienhe' . $i . '@gmail.com',
                'content' => 'Noi dung tin nhan mau so ' . $i,
                'is_read' => $i <= 2,
                'read_at' => $i <= 2 ? now() : null,
            ]);
        }

        // === Callback Requests ===
        for ($i = 1; $i <= 3; $i++) {
            CallbackRequest::create([
                'name' => 'Khach ' . $i,
                'phone' => '09' . rand(10000000, 99999999),
                'note' => 'Muon dat banh sinh nhat ' . $i,
                'is_handled' => $i === 1,
                'handled_at' => $i === 1 ? now() : null,
            ]);
        }

        // === Settings ===
        $settings = [
            ['key' => 'site_name', 'value' => 'Thu Huong Cake', 'group' => 'general'],
            ['key' => 'hotline', 'value' => '0962.849.989', 'group' => 'general'],
            ['key' => 'email', 'value' => 'donhang@thuhuongcake.vn', 'group' => 'general'],
            ['key' => 'opening_hours', 'value' => '07:00 - 23:00', 'group' => 'general'],
            ['key' => 'default_shipping_fee', 'value' => '30000', 'group' => 'shipping'],
            ['key' => 'freeship_distance', 'value' => '3', 'group' => 'shipping'],
            ['key' => 'freeship_min_order', 'value' => '300000', 'group' => 'shipping'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/thuhuongcake', 'group' => 'social'],
            ['key' => 'zalo_url', 'value' => '', 'group' => 'social'],
            ['key' => 'address_hanoi', 'value' => 'So 72 Ngo 235 Pho Yen Hoa, P. Yen Hoa, Q. Cau Giay, Ha Noi', 'group' => 'company'],
            ['key' => 'address_hcm', 'value' => '801 Duong Hau Giang, Phuong 11, Quan 6, TP HCM', 'group' => 'company'],
            ['key' => 'business_license', 'value' => '0111010237', 'group' => 'company'],
        ];
        foreach ($settings as $s) {
            Setting::create($s);
        }
    }
}
