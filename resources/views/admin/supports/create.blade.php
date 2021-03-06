@extends('admin.layout.forms.add.index')
@section('action' , "supports")
@section('title' , trans('language.add'))
@section('page-title',trans('language.supports'))
@section('form-groups')
    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.name'),'name'=>'name', 'placeholder'=>trans('language.name')])
    @includeIf('admin.components.form.add.email', ['icon' => 'fa fa-envelope','label' => trans('language.email'),'name'=>'email', 'placeholder'=>trans('language.email')])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-mobile','label' => trans('language.mobile'),'name'=>'mobile', 'placeholder'=>trans('language.mobile')])
    @includeIf('admin.components.form.add.password', ['icon' => 'fa fa-key','label' => trans('language.password'),'name'=>'password', 'placeholder'=>trans('language.password')])
    @includeIf('admin.components.form.add.password', ['icon' => 'fa fa-lock','label' => trans('language.confirm-password'),'name'=>'password_confirmation', 'placeholder'=>trans('language.confirm-password')])
@endsection
@section('submit-button-title' , trans('web.add-user'))
