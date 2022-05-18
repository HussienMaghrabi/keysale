@extends('.site.layout.container')
@section('content')

    <main>


        <div class="container slider1">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach(\App\Advertisement::get() as $slider)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$slider->id}}" class=""></li>
                    @endforeach

                </ol>
                <div class="carousel-inner">
                    @foreach(\App\Advertisement::get() as $slider)
                        <div class="carousel-item  @if ($loop->first) active @endif">
                            <img style="height: 400px;width: 800px" src="{{$slider->image}}" class="d-block w-100"
                                 alt="Bad Url ">
                        </div>
                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>


        <div class="container text-center card2">
            <div class="row">
                <div class="col-md-12 col-sm-12 d-inline-block">
                    <div class="row">
                        @foreach(\App\Items::where("is_special",2)->take(8)->get() as $product)
                        <div class="col-md-3 col-sm-12">
                            <div class="card card1" style="">
                                <img src="{{$product->serv_one_image}}" class="card-img-top" alt="...">
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
