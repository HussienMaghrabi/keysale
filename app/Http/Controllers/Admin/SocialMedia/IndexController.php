<?php

namespace App\Http\Controllers\Admin\SocialMedia;

use App\Advertisement;
use App\SocialMedia;
use App\Traits\storeImage;
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
    public function index()
    {
        $items = SocialMedia::orderBy('id', 'desc')->paginate(10);
        return view('admin.socialmedia.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.socialmedia.create');
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
            'link' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
        ]);
        if ($data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        SocialMedia::create($data);
        return redirect(url('/admin/socialmedia'));
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

        $item = SocialMedia::findOrFail($id);
        return view('admin.socialmedia.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = SocialMedia::findOrFail($id);
        $data = $request->validate([
            'link' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        if ($request->image) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $item->update($data);
        return redirect(url('/admin/socialmedia'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SocialMedia::findOrFail($id)->delete();
        return redirect(url('/admin/socialmedia'));
    }
}
