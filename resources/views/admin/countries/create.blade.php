@extends('admin.layout.forms.add.index')
@section('action' , "countries")
@section('title' , trans('admin.add'))
@section('page-title',trans('admin.countries'))
@section('form-groups')

    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('admin.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('admin.name_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('admin.name_en'),'name'=>'name_en', 'placeholder'=>trans('admin.name_en')])

@endsection
@section('submit-button-title' , trans('admin.add'))
