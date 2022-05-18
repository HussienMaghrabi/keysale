@extends('admin.layout.index')
@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1> {{ trans('language.terms') }}</h1>
            </div>
        </div>
        <div class="row" style="background: #FFF;">
            <div class="col-sm-10 col-xs-10">
                <section class="m-t-40">
                    <div class="sttabs tabs-style-iconbox">

                        {!! Form::model( $item ,  ['route'=>['terms_update' , $item->id],'method'=>'POST','class'=>'form-horizontal ','role'=>'form','files'=> true , 'id'=>'article_update']) !!}

                        {!! method_field('put') !!}
                        @includeIf('admin.components.form.edit.textarea', ['icon' => 'fa fa-user','label' => trans('language.text_en'),'name'=>'name_en', 'placeholder'=>trans('language.text_en')])
                        @includeIf('admin.components.form.edit.textarea', ['icon' => 'fa fa-user','label' => trans('language.text_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.text_ar')])
                    </div>

                    <div class="form-group col-md-12">
                        <div class="col-md-12">

                            <button type="submit" id="submit" class="btn btn-info btn-circle btn-lg"
                                    data-toggle="tooltip"
                                    data-original-title="{{trans('admin.edit')}}"><i class="fa fa-check"></i></button>
                        </div>
                    </div>


                    {!! Form::close() !!}
                </section>
            </div>

        </div>
    </div>


@endsection
