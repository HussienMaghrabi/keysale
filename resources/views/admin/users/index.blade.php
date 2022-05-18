@extends('admin.layout.table.index')
@section('page-title',"Data")
@section('buttons')

@stop
@section('thead')
    <th>#</th>
    <th>{{trans('language.image')}}</th>
    <th>{{trans('web.userName')}}</th>
    <th>{{trans('language.mobile')}}</th>
    <th>{{trans('language.email')}}</th>
    <th>{{trans('language.register_at')}}</th>
    <th>{{trans('language.settings')}}</th>
@endsection
@section('tbody')
    @foreach($items as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td> @includeIf("admin.components.image.index" , ["url" => $item->dash_image])</td>
            <td>{{$item->name}}</td>
            <td>{{$item->mobile}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->created}}</td>
            <td>
                @includeIf("admin.components.buttons.custom" , ["href" => "userNotifiy/$item->id", 'class' => 'default' , 'title'=> trans('Notification'), 'icon' => 'fa fa-bell'])
                <br>
                @includeIf("admin.components.buttons.edit" , ["href" => "users/$item->id/edit"])
                @includeIf("admin.components.buttons.delete",["message" => "($item->dash_name)" ,  "action" => url("admin/users/$item->id")])
            </td>
        </tr>
    @endforeach
@endsection




