<?php

namespace App\Http\Controllers\Admin\User;

use App\Client;
use App\ModulesConst\UserOnlineStatus;
use App\ModulesConst\UserTyps;
use App\Traits\storeImage;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    use storeImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = User::where('user_type_id', UserTyps::user);
        $items = $this->filter($request, $items);
        return view('admin.users.index', compact('items'));
    }

    public function filter($request, $items)
    {
        if ($request->online) {
            $items = $items->where('online', $request->online);
        }
        if ($request->offline) {
            $items = $items->where('online', $request->offline);
        }
        if ($request->is_paid) {
            $items = $items->where('paid_version', $request->is_paid);
        }
        if ($request->free) {
            $items = $items->where('paid_version',$request->free);
        }
        $items = $items->orderBy("id", "desc")->paginate(10);
        return $items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['user_type_id'] = UserTyps::user;
        $data['api_token'] = rand(99999999, 999999999) . time();
        if ($data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $user = User::create($data);
        return redirect(url('/admin/users'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('admin.users.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $item = User::findOrFail($id);
        $data = $request->validate([
            'email' => 'email',
            'name' => 'string',
            'mobile' => 'mobile',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($request->password){
            $data['password'] = Hash::make($data['password']);
        }
        if($request->image) { $data['image'] = $this->storeImage($data['image']); }
        $item->update($data);
        return redirect(url('/admin/users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id){
        $item = User::findOrFail($id)->delete();
        return redirect(url('/admin/users'));
    }
}
