<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallbackRequest;
use Illuminate\Http\Request;

class CallbackRequestController extends Controller
{
    public function index()
    {
        $requests = CallbackRequest::latest()->paginate(15);

        return view('admin.callback-requests.index', compact('requests'));
    }

    public function show($id)
    {
        $callbackRequest = CallbackRequest::findOrFail($id);

        return view('admin.callback-requests.show', compact('callbackRequest'));
    }

    public function edit($id)
    {
        $callbackRequest = CallbackRequest::findOrFail($id);

        return view('admin.callback-requests.edit', compact('callbackRequest'));
    }

    public function update(Request $request, $id)
    {
        $callbackRequest = CallbackRequest::findOrFail($id);

        $callbackRequest->update([
            'is_handled' => true,
            'handled_at' => now(),
        ]);

        return redirect()->route('admin.callback-requests.index')
            ->with('success', 'Yeu cau goi lai da duoc cap nhat thanh cong.');
    }
}
