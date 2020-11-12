<div class="modal fade" id="modal-create-section">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Section</h4>
            </div>
            {!! Form::open(array('route' => 'sections.store','method'=>'POST','class'=>'form-horizontal bootstrap-modal-form')) !!}
            @include('backend::sections.form')
            {!! Form::close() !!}

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
