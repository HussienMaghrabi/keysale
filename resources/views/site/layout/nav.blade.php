<header>
    <!--- <div class="bround1">
         <nav class="navbar navbar-expand-lg navbar-light bg-light bround1">
             <i class="fas fa-search car-search"></i>
         <i class="far fa-bell car-bell "></i>
             <img class="flag" src="img/220px-Flag_of_Egypt.svg.png"><span class="flag1">العربية</span>
<a class="navbar-brand" href="#"><img class="car-logo" src="img/771.png"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
 <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
 <div class="navbar-nav">
   <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
   <a class="nav-item nav-link" href="#">Features</a>
   <a class="nav-item nav-link" href="#">Pricing</a>
   <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
 </div>

</div>
             <i class="far fa-user"></i>
         </nav></div>--->


    <div class="bround1 ">
        <nav class="navbar navbar-expand-lg navbar-light bg-light bround1">


            <a class="navbar-brand" href="{{url("/")}}"><img class="car-logo"
                                                             src="{{asset("storage/assets/site/")}}/img/771.png"></a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{url("/")}}">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="{{url("/engines")}}">Engines</a>
                    <a class="nav-item nav-link" href="{{url("/mazadItems")}}">Mazed</a>
                    <div class="dropdown">
                        <a class="nav-item nav-link dropdown" href="#"><i style="display: inline"
                                                                          class="far fa-user "></i>Add</a>
                        <div class="dropdown-content">
                            <a href="#">Add Product</a>
                            <a href="#">Add Mazad</a>
                        </div>
                    </div>

                    <a class="nav-item nav-link" href="#"> <i style="display: inline" class="fas fa-search "></i>search</a>

                    <div class="dropdown">
                        <a class="nav-item nav-link dropdown" href="{{url("/profile")}}"><i style="display: inline"
                                                                                            class="far fa-bell "></i>nofication</a>
                        <div class="dropdown-content" style="width: 500px;top: 50px">
                            <br>
                            <div class="col-md-12">
                                <img style="height: 50px;width: 50px" src="{{asset("storage/assets/site/")}}/img/user.png"
                                     class="cards55">
                                <span class=""> abi helal</span>
                                <p class="text5">uiugfiugi4 byvcuyfei hurgrubtn hgc</p>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <img style="height: 50px;width: 50px" src="{{asset("storage/assets/site/")}}/img/user.png"
                                     class="cards55">
                                <span class=""> abi helal</span>
                                <p class="text5">uiugfiugi4 byvcuyfei hurgrubtn hgc</p>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <img style="height: 50px;width: 50px" src="{{asset("storage/assets/site/")}}/img/user.png"
                                     class="cards55">
                                <span class=""> abi helal</span>
                                <p class="text5">uiugfiugi4 byvcuyfei hurgrubtn hgc</p>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <img style="height: 50px;width: 50px" src="{{asset("storage/assets/site/")}}/img/user.png"
                                     class="cards55">
                                <span class=""> abi helal</span>
                                <p class="text5">uiugfiugi4 byvcuyfei hurgrubtn hgc</p>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <img style="height: 50px;width: 50px" src="{{asset("storage/assets/site/")}}/img/user.png"
                                     class="cards55">
                                <span class=""> abi helal</span>
                                <p class="text5">uiugfiugi4 byvcuyfei hurgrubtn hgc</p>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <img style="height: 50px;width: 50px" src="{{asset("storage/assets/site/")}}/img/user.png"
                                     class="cards55">
                                <span class=""> abi helal</span>
                                <p class="text5">uiugfiugi4 byvcuyfei hurgrubtn hgc</p>
                                <hr>
                            </div>
                            <div class="col-md-12">

                                <h6 class="" style="text-align: center"><a href="#allNotifications">All
                                        Notifications</a></h6>
                            </div>


                        </div>
                    </div>
                    @auth
                        <div class="dropdown">
                            <a class="nav-item nav-link dropdown" href="{{url("/profile")}}"><i style="display: inline" class="far fa-user "></i>profile</a>
                            <div class="dropdown-content">
                                <a href="#">profile</a>
                                <a href="{{url("/user_products")}}">My Adds</a>
                                <a href="#">My Setting</a>
                                <a onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                                <form id="logout-form" action="{{ url('/adminlogout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <div class="dropdown">
                            <a class="nav-item nav-link dropdown" href="#"><i style="display: inline"
                                                                                                class="far fa-user "></i>SingUp</a>
                            <div class="dropdown-content">
                                <a href="{{url("/login")}}">Login</a>
                                <a href="{{url("/registerAction")}}">Sing Up</a>

                            </div>
                        </div>
                    @endguest


                </div>

            </div>

        </nav>

    </div>


    <style>

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>

</header>
