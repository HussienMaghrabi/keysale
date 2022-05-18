<?php

namespace App\Http\Controllers\Admin\Item;

use App\Items;
use App\MainCategory;
use App\Traits\storeImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    use storeImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Items::orderBy('id', 'desc')->paginate(10);
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.items.create');
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
            'user_id' => 'required',
            'category_id' => 'required',
            'main_category_id' => '',
            'sub_category_id' => '',
            'sub_sub_category_id' => '',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'is_special' => 'required',
        ]);
        Items::create($data);
        return redirect(url('/admin/items'));
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

        $item = Items::findOrFail($id);
        return view('admin.items.edit', compact('item'));
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
        $item = Items::findOrFail($id);
        $data = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'main_category_id' => '',
            'sub_category_id' => '',
            'sub_sub_category_id' => '',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'is_special' => 'required',
        ]);
        $item->update($data);
        return redirect(url('/admin/items'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Items::findOrFail($id)->delete();
        return redirect(url('/admin/items'));
    }
}
