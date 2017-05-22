<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationController extends Controller
{
    public function listShow(Request $request)
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(2);

        $data = ['notifications' => $notifications];
        return view('notification.list', $data);
    }
}
