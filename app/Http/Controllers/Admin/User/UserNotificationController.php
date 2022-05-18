<?php

namespace App\Http\Controllers\Admin\User;

use App\Notification;
use App\User;
use App\User_notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserNotificationController extends Controller
{
    public function index($id, Request $request)
    {
        $client = User::find($id);
        return view('admin.users.notification.index', compact('client'));
    }

    public function userNotifiyStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        $users = User::where('id', $request->client_id)->pluck('id');
        $this->clientsHandler($users, $request);
        session()->flash('success', trans('language.SendNotifMessage'));
        return back();
    }

    public function clientsHandler($users, $request)
    {

        $users_ids = $users;
        $tokens = User::whereIn("id", $users_ids)
            ->where('fire_base_token', "!=", null)
            ->pluck('fire_base_token')->toArray();
        if (count($tokens) > 0) {
            $this->fireBaseNotificationsHandler($tokens, $request->all());
            $this->mySqlHandler($request, $users_ids);
        }
    }


    public function mySqlHandler($request, $users_ids)
    {
        $notification = Notification::create($request->all());
        foreach ($users_ids as $user_id) {
            $data["user_id"] = $user_id;
            $data["notification_id"] = $notification->id;
            User_notification::create($data);
        }
    }
}
