<aside class="left-sidebar">
    <div class="scroll-sidebar" style="border-bottom: 1px solid #404854;">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @includeIf("admin.layout.aside.dash-board-item")

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "countries" , "title" => trans('language.countries') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "countries" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "countries/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>



                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "users " , "title" => trans('web.users') , "description" => trans('web.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "users" , "title" => trans('web.list') , "tooltip" => trans('web.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "users/create" , "title" => trans('web.add') , "tooltip" => trans('web.add-user'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>


                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "supports " , "title" => trans('language.supports') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "supports" , "title" => trans('language.list') , "tooltip" => trans('web.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "supports/create" , "title" => trans('language.add') , "tooltip" => trans('web.add-user'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

{{--                <li>--}}
{{--                    @includeIf("admin.layout.aside.main-item" ,["href" => "mainCategories " , "title" => trans('language.mainCategories') , "description" => trans('language.list')])--}}
{{--                    <ul aria-expanded="true" class="collapse">--}}
{{--                        <li>--}}
{{--                            @includeIf("admin.layout.aside.sub-item" ,["href" => "mainCategories" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            @includeIf("admin.layout.aside.sub-item" ,["href" => "mainCategories/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "categories " , "title" => trans('language.categories') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "categories" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "categories/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "subCategories " , "title" => trans('language.subCategories') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "subCategories" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "subCategories/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "subCategories2" , "title" => trans('language.sub2Categories') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "sub2Categories" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "sub2Categories/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "status" , "title" => trans('language.status') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "status" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "status/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "items" , "title" => trans('language.items') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "items" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        {{--                    <li>--}}
                        {{--                        @includeIf("admin.layout.aside.sub-item" ,["href" => "items/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])--}}
                        {{--                    </li>--}}
                    </ul>
                </li>
                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "contacts" , "title" => trans('language.contact_us') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "contacts" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        {{--                    <li>--}}
                        {{--                        @includeIf("admin.layout.aside.sub-item" ,["href" => "items/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])--}}
                        {{--                    </li>--}}
                    </ul>
                </li>


                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "techs" , "title" => trans('techs') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "techs" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        {{--                    <li>--}}
                        {{--                        @includeIf("admin.layout.aside.sub-item" ,["href" => "items/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])--}}
                        {{--                    </li>--}}
                    </ul>
                </li>


                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "advertisements" , "title" => trans('language.advertisements') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "advertisements" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "advertisements/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "socialmedia" , "title" => trans('language.socialmedia') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "socialmedia" , "title" => trans('language.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "socialmedia/create" , "title" => trans('language.add') , "tooltip" => trans('language.add'), "class" => "mdi mdi-plus"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "notifications" , "title" => trans('language.notifications') , "description" => trans('language.list')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "notifications" , "title" => trans('web.list') , "tooltip" => trans('language.list') , "class" => "mdi mdi-view-list"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "terms" , "title" => trans('language.terms') , "description" => trans('language.terms')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "terms" , "title" => trans('language.show') , "tooltip" => trans('language.show') , "class" => "mdi mdi-view-list"])
                        </li>
                    </ul>
                </li>

                <li>
                    @includeIf("admin.layout.aside.main-item" ,["href" => "about" , "title" => trans('language.about') , "description" => trans('language.about')])
                    <ul aria-expanded="true" class="collapse">
                        <li>
                            @includeIf("admin.layout.aside.sub-item" ,["href" => "about" , "title" => trans('language.show') , "tooltip" => trans('language.show') , "class" => "mdi mdi-view-list"])
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
    {{--    @includeIf("admin.layout.aside.sidebar-toggler")--}}
</aside>
