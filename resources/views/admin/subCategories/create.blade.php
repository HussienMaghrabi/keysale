@extends('admin.layout.forms.add.index')
@section('action' , "subCategories")
@section('title' , trans('language.add'))
@section('page-title',trans('language.subCategories'))
@section('form-groups')
    @includeIf('admin.components.form.add.select', ['label' => trans("admin.category"),'name'=>'category_id', 'items'=> \App\Category::all() , 'icon' => 'fa fa-list',])
    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en')])
@endsection
@section('submit-button-title' , trans('language.add'))
