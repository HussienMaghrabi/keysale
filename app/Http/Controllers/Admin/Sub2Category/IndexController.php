<?php

namespace App\Http\Controllers\Admin\Sub2Category;

use App\Sub_sub_category;
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
        $items = Sub_sub_category::orderBy('id', 'desc')->paginate(10);
        return view('admin.sub2Categories.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sub2Categories.create');
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'category_id' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:2048',
        ]);
        if ($data['image']) {
            $data['image'] = $this->storeImage($data['image']);
        }
        Sub_sub_category::create($data);
        return redirect(url('/admin/sub2Categories'));
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

        $item = Sub_sub_category::findOrFail($id);
        return view('admin.sub2Categories.edit', compact('item'));
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
        $item = Sub_sub_category::findOrFail($id);
        $data = $request->validate([
            'name_ar' => '',
            'name_en' => '',
            'category_id' => '',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        if ($request->image) {
            $data['image'] = $this->storeImage($data['image']);
        }
        $item->update($data);
        return redirect(url('/admin/sub2Categories'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Sub_sub_category::findOrFail($id)->delete();
        return redirect(url('/admin/sub2Categories'));
    }
}
