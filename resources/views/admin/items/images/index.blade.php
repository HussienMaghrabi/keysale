@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')
    @includeIf("admin.components.buttons.add" ,["name"=> "Add New Image"])
@stop
@section('thead')
    <th>#</th>
    <th>{{trans('admin.image')}}</th>
    <th>{{trans('admin.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td> @includeIf("admin.components.image.index" , ["url" => $item->dash_image])</td>
            <td>
                @includeIf("admin.components.buttons.delete",["message" => trans('admin.delete') ,  "action" => url("admin/items/$item_id/images/$item->id"),'id'=>$item->id])
            </td>
        </tr>
    @endforeach
@endsection

@section('modals')
    @includeIf("admin.items.images.create")
@stop




