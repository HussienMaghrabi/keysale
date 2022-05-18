@extends('admin.layout.table.index')
@section('page-title',"Items")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.name')}}</th>
    <th>{{trans('language.price')}}</th>
    <th>{{trans('language.description')}}</th>
    <th>{{trans('language.is_special')}}</th>
    <th>{{trans('language.created_at')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->dash_is_special}}</td>
            <td>{{$item->dash_created}}</td>
            <td>
                @includeIf("admin.components.buttons.custom" , ["href" => "items/$item->id/images", 'class' => 'default' , 'title'=> trans('language.images'), 'icon' => 'fa fa-image'])
                @includeIf("admin.components.buttons.delete",["message" => "($item->dash_name)"  ,  "action" => url("admin/items/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection


