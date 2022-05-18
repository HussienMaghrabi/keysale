<!DOCTYPE html>
<html lang="en">
@includeIf("admin.layout.head")
<body class="fix-header card-no-border">
@includeIf("admin.layout.loader")
<div id="main-wrapper">
    @includeIf("admin.layout.header")
    @includeIf("admin.layout.aside.index")
    <div style="overflow: auto; height: 100vh;" class="page-wrapper">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">@yield("page-title")</h3>
            </div>
        </div>
        <div class="container-fluid">

            @if (\Session::has('danger'))
                <div class="alert alert-danger top-alert alert-icon-left mb-0" role="alert">
                    <span style="display: inline" class="alert-icon"><i class="fa fa-ban"></i></span>
                    <p style="display: inline" class="mb-0">{{ \Session::get('danger') }}</p>
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="alert alert-success top-alert alert-icon-left mb-0" role="alert">
                    <span style="display: inline" class="alert-icon"><i class="fa fa-check"></i></span>
                    <p style="display: inline" class="mb-0">{{ \Session::get('success') }}</p>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <div class="row">
                @yield("content")
            </div>
        </div>
    </div>
</div>
@includeIf("admin.components.modals.delete-modal")
@includeIf("admin.layout.scripts")
</body>
</html>
