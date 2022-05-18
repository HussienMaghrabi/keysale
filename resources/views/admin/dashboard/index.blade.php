@extends('admin.layout.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1>{{trans('web.statistics')}}</h1>
            </div>
        </div>
    </div>



    <style>
        a {
            color: #E96F6E;
        }

        @php
            $all_clients = \App\User::where('user_type_id', \App\ModulesConst\UserTyps::user)->get();
            $all_supports = \App\User::where('user_type_id', \App\ModulesConst\UserTyps::representative)->get();
            $all_categories= \App\Category::get();
            $all_subcategories= \App\Sub_category::get();
            $all_subsubcategories= \App\Sub_sub_category::get();
            $all_products= \App\Items::get();
            $all_contacts = \App\Contact_us::get();
            $all_socials = \App\SocialMedia::get();
        @endphp


    </style>
    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/users')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.clients')}} </h4>
                                <h1>{{count($all_clients)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-user success fa-lg float-right  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/supports')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.supports')}} </h4>
                                <h1>{{count($all_supports)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-users success fa-lg float-right  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/categories')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.categories')}} </h4>
                                <h1>{{count($all_categories)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-list-alt success fa-lg float-right  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/subCategories')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.sub_category')}} </h4>
                                <h1>{{count($all_subcategories)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-list-ol success fa-lg float-right  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/sub2Categories')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.sub2Categories')}} </h4>
                                <h1>{{count($all_subsubcategories)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-list-ul success fa-lg float-right  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/items')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.items')}} </h4>
                                <h1>{{count($all_products)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-product-hunt success fa-lg float-right  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/contacts')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.contact_us')}} </h4>
                                <h1>{{count($all_contacts)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-sort-alpha-desc success fa-lg float-right  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12 animated swing delay-2s">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body ">
                    <a href="{{url('/admin/socialmedia')}}">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h4 class="text-muted">{{trans('language.socialmedia')}} </h4>
                                <h1>{{count($all_socials)}}</h1>
                            </div>
                            <div class="align-self-center">
                                <i style="font-size: 50px" class="fa fa-soccer-ball-o success fa-lg float-right  ">
                                    <div class="">
                                        <span class="heartbit"></span> <span class="point"></span></div>
                                </i>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>


@endsection
