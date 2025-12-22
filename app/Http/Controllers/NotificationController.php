<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class NotificationController extends Controller
{
    public function notification(): Factory|View|Application
    {
        $notifications = Notification::with('user')
            ->where('user_id', auth()->user()->id)
            ->latest();
        $read_count = Notification::with('user')
            ->where([
                ['user_id', auth()->user()->id],
                ['is_read', false]
            ])->count();

        if (!$notifications->get()[0]->is_read) {
            $this->markRead($notifications->get()[0]->id);
        }

        return view('users.notifications.manage', [
            'notifications' => $notifications->get(),
            'active_notification' => $notifications->first(),
            'read_count' => $read_count
        ]);
    }

    public function notificationDetail($unique_id): Factory|View|Application
    {
        $notifications = Notification::with('user')
            ->where('user_id', auth()->user()->id)
            ->latest()->get();
        $active_notification = Notification::with('user')
            ->where([
                ['user_id', auth()->user()->id],
                ['unique_id', $unique_id]
            ])->first();
        $read_count = Notification::with('user')
            ->where([
                ['user_id', auth()->user()->id],
                ['is_read', false]
            ])->count();

        if (!$active_notification->is_read) {
            $this->markRead($active_notification->id);
        }

        return view('users.notifications.detail', [
            'notifications' => $notifications,
            'active_notification' => $active_notification,
            'read_count' => $read_count
        ]);
    }

    public function markRead($id): void
    {
        Notification::where([
            ['id', $id],
            ['is_read', false],
            ['user_id', auth()->user()->id]
        ])->update([
            'is_read' => true
        ]);
    }
}
