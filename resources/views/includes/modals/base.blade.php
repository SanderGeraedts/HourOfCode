<div class="modal fade" tabindex="-1" role="dialog" id="{{ $id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $title }}</h4>
            </div>
            <div class="modal-body">
                <?php $include = "includes.modals." . $id; ?>
                @include($include, ['variables' => $variables])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ ($dismiss) ? $dismiss : 'Close' }}</button>
                <button type="button" class="btn btn-primary" id="modal-save">{{ ($save) ? $save : 'Save Changes' }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->