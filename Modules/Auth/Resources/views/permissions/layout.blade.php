<div class="row">
    <div class="col-md-12">
        @yield('permissions')
        {{--        @include('auth::permissions.prefrences')--}}
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.full-access').on('ifChanged', function (event) {
                $(this).closest('tr').find('input.view-access').prop('checked', this.checked).iCheck('update');
                $(this).closest('tr').find('input.create-access').prop('checked', this.checked).iCheck('update');
                $(this).closest('tr').find('input.edit-access').prop('checked', this.checked).iCheck('update');
                $(this).closest('tr').find('input.delete-access').prop('checked', this.checked).iCheck('update');
                $(this).closest('tr').find('input.approve-access').prop('checked', this.checked).iCheck('update');
            });
            $('.view-access').on('ifChanged', function (event) {
                if (!this.checked) {
                    $(this).closest('tr').find('input.create-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.edit-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.delete-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.approve-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.full-access').prop('checked', this.checked).iCheck('update');
                }
            });
            $('.create-access').on('ifChanged', function (event) {
                if (this.checked) {
                    $(this).closest('tr').find('input.view-access').prop('checked', this.checked).iCheck('update');
                } else {
                    $(this).closest('tr').find('input.edit-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.delete-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.full-access').prop('checked', this.checked).iCheck('update');
                }
            });
            $('.edit-access').on('ifChanged', function (event) {
                if (this.checked) {
                    $(this).closest('tr').find('input.view-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.create-access').prop('checked', this.checked).iCheck('update');
                } else {
                    $(this).closest('tr').find('input.delete-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.full-access').prop('checked', this.checked).iCheck('update');
                }
            });
            $('.delete-access').on('ifChanged', function (event) {
                if (this.checked) {
                    $(this).closest('tr').find('input.view-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.create-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.edit-access').prop('checked', this.checked).iCheck('update');
                    $(this).closest('tr').find('input.full-access').prop('checked', this.checked).iCheck('update');
                } else {
                    $(this).closest('tr').find('input.full-access').prop('checked', this.checked).iCheck('update');
                }
            });

            $('.approve-access').on('ifChanged', function (event) {
                if (this.checked) {
                    $(this).closest('tr').find('input.view-access').prop('checked', this.checked).iCheck('update');
                    fullAccess()
                } else {
                    $(this).closest('tr').find('input.full-access').prop('checked', this.checked).iCheck('update');
                }
            });

            $('.full-access').each(function () {
                if ($(this).closest('tr').find('input.access-permission:checked').length == $(this).closest('tr').find('input.access-permission').length) {
                    $(this).prop('checked', true).iCheck('update');
                }
            });

            $('.disabled').each(function () {
                $(this).iCheck('disable');
            });

            $('.disabled').on('ifChecked', function () {
                $(this).iCheck('uncheck');
            });
        });

        function fullAccess() {
            $('.full-access').each(function () {
                if ($(this).closest('tr').find('input.access-permission:checked').length == $(this).closest('tr').find('input.access-permission').length) {
                    $(this).prop('checked', true).iCheck('update');
                }
            });
        }
    </script>
@endpush
