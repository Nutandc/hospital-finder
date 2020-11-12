<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create New User</h4>
            </div>
            {!! Form::open(array('route' => 'users.store','method'=>'POST','class'=>'form-horizontal bootstrap-modal-form')) !!}

            @include('auth::users.form')
            {!! Form::close() !!}

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
