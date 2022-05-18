<!DOCTYPE html>
<html lang="en" dir="">
@include('site.layout.head')
<body  >
<div id="main_wrapper">
@include('site.layout.nav')
<div class="content">
    @yield('content')
</div>
@include('site.layout.footer')
@include('site.layout.scripts')
</div>
</body>
</html>
