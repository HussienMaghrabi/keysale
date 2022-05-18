<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Advertisement;
use App\MainCategory;
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
        $items = Advertisement::orderBy('id', 'desc')->paginate(10);
        return view('admin.advertisements.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisements.create');
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
        Advertisement::create($data);
        return redirect(url('/admin/advertisements'));
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

        $item = Advertisement::findOrFail($id);
        return view('admin.advertisements.edit', compact('item'));
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
        $item = Advertisement::findOrFail($id);
        $data = $request->validate([
            'link' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        if ($request->image) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $item->update($data);
        return redirect(url('/admin/advertisements'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Advertisement::findOrFail($id)->delete();
        return redirect(url('/admin/advertisements'));
    }
}
