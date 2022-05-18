@extends('admin.layout.forms.edit.index')
@section('action' , "advertisements/$item->id")
@section('title' , trans('language.edit'))
@section('page-title',trans('language.edit'))
@section('form-groups')
    @includeIf('admin.components.form.edit.file', ['icon' => 'fa fa-check','label' => trans('language.image'),'name'=>'image', 'max'=>'2'])
    @includeIf('admin.components.form.edit.text', ['icon' => 'fa fa-user','label' => trans('language.link'),'name'=>'link', 'placeholder'=>trans('language.link')])


@endsection
@section('submit-button-title' , "Edit ")
