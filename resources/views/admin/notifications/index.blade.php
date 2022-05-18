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
            <ul class="nav nav-tabs customtab2" role="tablist">
                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#clients" role="tab"
                                        aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span>
                        <span class="hidden-xs-down">Clients</span></a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane p-20 active show" id="clients" role="tabpanel">
                    <h3> All Clients </h3>
                    <div class="col-md-12">

                        <form method="post" action="{{url("admin/notifications")}}"
                              enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-md-5">
                                    <div class="mt-checkbox-list">
                                        @foreach($clients as $client)
                                            @includeIf('admin.components.form.add.checklist', ['id'=>$client->id.'clients','name'=>'clients[]','value'=>$client->id,'class'=>'default','label'=>$client->name.'( '.$client->email.' )'])

                                        @endforeach

                                            <div class="text-center page-full-width">
                                                {{$clients->links()}}
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
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
                                                           placeholder="Title">
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                        class="mdi mdi-message-text-outline"></i></span>
                                                    </div>
                                                    <textarea placeholder="Message Body" name="body"
                                                              class="form-control"
                                                              rows="8"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <div style="text-align: center" class="col-md-12">
                                            <button type="submit" class="btn btn-success">Send <i
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
