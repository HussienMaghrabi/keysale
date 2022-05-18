<?php

namespace App\Http\Controllers\Admin\Item;

use App\Item_images;
use App\Traits\storeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemImagesController extends Controller
{
    use storeImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $items = Item_images::where('item_id', $id)->orderBy('id', 'desc')->paginate(10);
        $item_id = $id;
        return view('admin.items.images.index', compact('items','item_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
            'item_id' => 'required',
        ]);
        if ($data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        Item_images::create($data);
        session()->flash('success', trans('admin.done'));
        return redirect(url("/admin/items/$request->item_id/images"));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id , $item_id)
    {
        $item = Item_images::findOrFail($item_id);
        $item->delete();
        session()->flash('success', trans('admin.done'));
        return back();
    }
}
