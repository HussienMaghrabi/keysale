@extends('.site.layout.container')
@section('content')

    <main>

        <div class="container text-center card2">
            <div class="row">
                <div class="col-md-12 col-sm-12 d-inline-block">
                    <div class="row">
                        @foreach($items as $product)
                            <div class="col-md-3 col-sm-12" style="height: 250px">
                                <div class="card card1" style="">
                                    <img src="{{$product->serv_one_image}}" class="card-img-top" alt="..." style="height: 120px">
                                    <div class="card-body">
                                        <a href="{{url("/ProductDetails/$product->id")}}">
                                            <p class="card-text">{{$product->dash_name}}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>


    </main>
@endsection
