<script src="{{asset("assets/admin/")}}/js/jquery.min.js"></script>
<script src="{{asset("assets/admin/")}}/js/popper.min.js"></script>
<script src="{{asset("assets/admin/")}}/js/bootstrap.min.js"></script>
<script src="{{asset("assets/admin/")}}/js/jquery.slimscroll.js"></script>
<script src="{{asset("assets/admin/")}}/js/waves.js"></script>
<script src="{{asset("assets/admin/")}}/js/sidebarmenu.js"></script>
<script src="{{asset("assets/admin/")}}/js/sticky-kit.min.js"></script>
<script src="{{asset("assets/admin/")}}/js/jquery.sparkline.min.js"></script>
<script src="{{asset("assets/admin/")}}/js/footable.all.min.js"></script>
<script src="{{asset("assets/admin/")}}/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="{{asset("assets/admin/")}}/js/footable-init.js"></script>
<script src="{{asset("assets/admin/")}}/js/dropify.min.js"></script>
<script src="{{asset("assets/admin/")}}/js/wow.min.js"></script>
<script src="{{asset("assets/admin/")}}/js/custom.min.js"></script>
<script src="{{asset('assets/admin/')}}/js/open-delete-modal.js"></script>
<script src="{{asset('assets/admin/')}}/js/setMap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCICVFZg9PawAeVO5oH_BRdE7IEu93eG8E&libraries&callback=myMap"></script>
<script>
    $(document).ready(function () {
        $('.dropify').dropify();
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
