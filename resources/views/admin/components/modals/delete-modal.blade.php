<div class="modal fade bs-example-modal-md deleteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4>{{trans('language.delete')}}</h4>
{{--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    {{trans('language.delete_aleart')}} <h4 style="display: inline;color: red;" class="deleteMessage"></h4>
                </div>
            </div>
            <div class="modal-footer">
                <form class=" deleteForm" method="post">
                    <input class="deleteId" type="hidden" name="id">
                    @csrf
                    @method("delete")
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">{{trans('language.close')}}</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">{{trans('language.delete')}} </button>
                </form>
            </div>
        </div>
    </div>
</div>
