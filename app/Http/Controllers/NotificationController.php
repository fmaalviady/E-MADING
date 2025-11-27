<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $user = session('user');
        $notifications = Notification::where('id_user', $user->id)
            ->with('article')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);
        
        return redirect()->back();
    }

    public function markAllAsRead()
    {
        $user = session('user');
        Notification::where('id_user', $user->id)->update(['is_read' => true]);
        
        return redirect()->back();
    }
}
