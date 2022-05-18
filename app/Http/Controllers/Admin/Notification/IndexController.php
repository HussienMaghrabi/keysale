<?php

namespace App\Http\Controllers\Admin\Notification;


use App\ModulesConst\UserOnlineStatus;
use App\ModulesConst\UserPaidTyps;
use App\Notification;
use App\User;
use App\User_notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $clients = User::where('user_type_id', '2')->orderBy('id', 'desc')->paginate();
//        $onlineClients = User::where('user_type_id','2')->where('online',UserOnlineStatus::online)->orderBy('id','desc')->get();
//        $paidClients = User::where('user_type_id','2')->where('paid_version',UserPaidTyps::paid)->where('online',UserOnlineStatus::online)->orderBy('id','desc')->get();
//        $unpaidClients = User::where('user_type_id','2')->where('paid_version',UserPaidTyps::free)->orderBy('id','desc')->get();
        return view('admin.notifications.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);


        $this->clientsTypeHandler($request);
        session()->flash('success', trans('language.SendNotifMessage'));
        return back();
    }

    public function clientsTypeHandler($request)
    {
        $onlineClients = User::WhereIn('id',$request->clients)->where('user_type_id', '2')->orderBy('id', 'desc')->pluck('id');
        $this->clientsHandler($onlineClients, $request);
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
