@extends('admin.layout.forms.add.index')
@section('action' , "advertisements")
@section('title' , trans('language.add'))
@section('page-title',trans('language.advertisements'))
@section('form-groups')
    @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.add.text', ['icon' => 'fa fa-user','label' => trans('language.link'),'name'=>'link', 'placeholder'=>trans('language.link')])
@endsection
@section('submit-button-title' , trans('language.add'))
