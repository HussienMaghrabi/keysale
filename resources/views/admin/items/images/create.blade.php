<div class="modal fade in addModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <form class="form-horizontal form-material " action="{{url("admin/items/$item_id/images")}}"
                  enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        @includeIf('admin.components.form.add.file', ['icon' => 'fa fa-check','label' => trans('admin.image'),'name'=>'image', 'max'=>'2'])
                        <input type="hidden" class="form-control" name="item_id" value="{{$item_id}}">
                    </div>
                </div>

        <div class="modal-footer">
            @includeIf("admin.components.buttons.submitButton")
            @includeIf("admin.components.buttons.cancelButton")
        </div>
        </form>


    </div>
</div>
</div>
