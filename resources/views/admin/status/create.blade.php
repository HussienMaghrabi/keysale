@extends('admin.layout.forms.add.index')
@section('action' , "status")
@section('title' , trans('language.add'))
@section('page-title',trans('language.status'))
@section('form-groups')
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_ar'),'name'=>'name_ar', 'placeholder'=>trans('language.name_ar')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name_en'),'name'=>'name_en', 'placeholder'=>trans('language.name_en')])

@endsection
@section('submit-button-title' , trans('language.add'))
