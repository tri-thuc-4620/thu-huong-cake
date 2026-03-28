<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(15);

        return view('admin.contact-messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);

        if (!$message->is_read) {
            $message->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }

        return view('admin.contact-messages.show', compact('message'));
    }

    public function edit($id)
    {
        $message = ContactMessage::findOrFail($id);

        return view('admin.contact-messages.edit', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);

        $validated = $request->validate([
            'admin_reply' => 'nullable|string',
        ]);

        $message->update([
            'admin_reply' => $validated['admin_reply'],
            'is_read'     => true,
            'read_at'     => $message->read_at ?? now(),
        ]);

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Tin nhan lien he da duoc cap nhat thanh cong.');
    }
}
