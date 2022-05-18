<?php

    namespace App\Http\Controllers\Admin\Country;

    use App\City;
    use App\Country;
    use App\Traits\storeImage;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class IndexController extends Controller
    {

        use storeImage;
        public function index()
        {
            $items = Country::orderBy('id', 'desc')->paginate(10);
            return view('admin.countries.index', compact('items'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.countries.create');
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
                'image' => 'required',
                'name_ar' => 'required',
                'name_en' => 'required',
            ]);
            if ($request['image']) {
                $data['image'] = $this->storeImage($request['image']);
            }
            Country::create($data);
            session()->flash('success', trans('admin.done'));
            return redirect(url('/admin/countries'));
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
            $item = Country::findOrFail($id);
            return view('admin.countries.edit', compact('item'));
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

            $item = Country::findOrFail($id);
            $data = $request->validate([
                'image' => '',
                'name_ar' => '',
                'name_en' => ''
            ]);
            if ($request['image']) {
                $data['image'] = $this->storeImage($request['image']);
            }
            $item->update($data);
            session()->flash('success', trans('admin.done'));
            return redirect(url('/admin/countries'));
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Country::findOrFail($id)->delete();
            session()->flash('success', trans('admin.done'));
            return redirect(url('/admin/countries'));
        }
    }
