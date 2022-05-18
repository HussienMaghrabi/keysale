@extends('.site.layout.container')
@section('content')



    <main>


        <div class="container slider1">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($sliders as $slider)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$slider->id}}" class=""></li>
                    @endforeach

                </ol>
                <div class="carousel-inner">
                    @foreach($sliders as $slider)
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


        <div class="container text-center">
            <div class="row">
                <div class="col-md-12  col-sm-12 d-inline-block">
                    <div class="row american">
                        @foreach($items as $item )
                            <div class="col-md-2 col-sm-2"><img style="width: 120px; height: 120px"  src="{{$item->image}}">
                                <a href="{{url("/items/$item->id")}}">
                                    <p>{{$item->dash_name}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </main>

@endsection
