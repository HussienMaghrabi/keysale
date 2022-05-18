@extends('admin.layout.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1> {{ trans('language.notifications') }}</h1>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">
        <div class="card-body p-b-0">
            <div class="tab-content">
                <div class=" p-20  show " id="onlineClients" role="">
                    <h3>( {{$client->name}} )  </h3>
                    <br>
                    <div class="col-md-12">

                        <form method="post" action="{{url("admin/userNotifiyStore")}}"
                              enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <input type="hidden" class="form-control" name="client_id"
                                       id="" value="{{$client->id}}"
                                       placeholder="Title">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <div class="col-md-12 row">
                                            <div style="margin: auto;" class="col-md-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class=" mdi mdi-format-title"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title"
                                                           id="exampleInputEmail1"
                                                           placeholder="{{ trans('language.title') }}">
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="mdi mdi-message-text-outline"></i></span>
                                                    </div>
                                                    <textarea placeholder="{{ trans('language.body') }}" name="body"
                                                              class="form-control"
                                                              rows="8"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div style="text-align: center" class="col-md-12">
                                            <button type="submit" class="btn btn-success">{{ trans('language.send') }} <i
                                                    class="mdi  mdi-send"></i>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
