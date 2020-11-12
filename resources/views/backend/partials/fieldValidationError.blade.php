@if ($errors->any())
    <div class="box-body" style="padding-left: 0px; padding-right: 0px;">
        <div class="alert alert-danger alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            @foreach (array_unique($errors->all()) as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
@endif