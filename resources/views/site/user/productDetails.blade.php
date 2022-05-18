@extends('.site.layout.container')
@section('content')

    <main>

        <div class="container">
            <div class="row">
                <div class="col-md-12 d-inline-block user2">
                    <img src="{{$user->serv_image}}" class="user"><span class="user2">{{$user->name}}</span>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="icon">
                        <i class="fas fa-phone icon1"></i>
                        <i class="fab fa-whatsapp icon2"></i>
                        <i class="far fa-heart icon1"></i>
                    </div>

                    @if($item->main_category_id == 2 )
                        <div class="carr4">
                            <span class="carr1">{{$item->serv_price}}</span>
                            <span class="carr2">من قبل المالك</span>
                            <span class="carr3">فتح الباب</span>
                        </div>
                    @endif
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row carr5">
                <div class="col-md-3"></div>
                <div class="col-md-12">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($images as $image)
                                <div class="carousel-item  @if ($loop->first) active @endif ">
                                    <img src="{{$image->image}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                    <div class="car-top">
                        <div class="carr4 text-center">

                            <span class="carr1">00000</span>
                            <i class="fas fa-plus carr11"></i>
                            <i class="fas fa-minus carr111"></i>

                        </div>
                        <div class="carr4 text-center">

                            <span class="carr1">00 :00 : 00</span>
                            <span class=" carr11"> بو حمد</span>
                            <span class=" carr111"> اخر مزايد</span>

                        </div>
                        <div class="car-div">


                        </div>


                    </div>
                    <div class="col-md-3"></div>

                </div>
            </div>
        </div>


    </main>
@endsection
