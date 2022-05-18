@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.text')}}</th>
    <th>{{trans('language.created_at')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->message}}</td>
            <td>{{$item->dash_created}}</td>
            <td>
                @includeIf("admin.components.buttons.delete",["message" =>  "($item->message)" ,  "action" => url("admin/contacts/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


