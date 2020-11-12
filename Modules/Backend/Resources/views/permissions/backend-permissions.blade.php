@extends('auth::permissions.layout')
@section('permissions')
    @include('auth::permissions.auth')


@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            let disablePermissions = ['log'];
            let disableAccess = ['create', 'edit', 'delete'];
            disablePermissions.forEach(function (element) {
                disableAccess.forEach(function (access) {
                    let name = element + '-' + access
                    $('input[name="permission[]"]').each(function () {
                        if ($(this).val() === name) {
                            $(this).iCheck('disable')
                        }
                    })
                })

            })
        })
    </script>
@endpush
