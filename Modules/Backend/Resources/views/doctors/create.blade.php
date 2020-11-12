<div class="modal fade" id="modal-create-class">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Doctor</h4>
            </div>
            {!! Form::open(array('route' => 'doctors.store','method'=>'POST','class'=>'form-horizontal bootstrap-modal-form')) !!}
            @include('backend::doctors.form')
            {!! Form::close() !!}

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
