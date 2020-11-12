<div class="box-header">
    <h3 class="box-title">Prefrences</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <table class="table table-condensed">
        <tbody>
        <tr style="border-style: hidden;">
            <td>
                <div class="checkbox icheck">
                    <label>
                        {{ Form::checkbox('permission[]','organization-setting-create',
                            isset($permissions) && $permissions->contains('organization-setting-create') ,
                            ['class' => 'view-access access-permission']) }}
                        <span style="padding-left: 5px;"><b>Organization Setting</b></span>
                    </label>
                </div>
            </td>
        </tr>
        <tr style="border-style: hidden;">
            <td>
                <div class="checkbox icheck">
                    <label>
                        {{ Form::checkbox('permission[]','application-setting-create',
                             isset($permissions) && $permissions->contains('application-setting-create') ,
                             ['class' => 'view-access access-permission']) }}
                        <span style="padding-left: 5px;"><b>Application Setting</b></span>
                    </label>
                </div>
            </td>
        </tr>

        </tbody>
    </table>
</div>
<div class="box-header">
    <h3 class="box-title">Log Activity</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
    <table class="table table-condensed">
        <tbody>
        <tr style="border-style: hidden;">
            <td>
                <div class="checkbox icheck">
                    <label>
                        {{ Form::checkbox('permission[]','activity-log-view',
                                isset($permissions) && $permissions->contains('activity-log-view') ,
                                 ['class' => 'view-access access-permission']) }}
                        <span style="padding-left: 5px;"><b>Log Activity</b></span>
                    </label>
                </div>
            </td>
        </tr>
        <tr style="border-style: hidden;">
            <td>
                <div class="checkbox icheck">
                    <label>
                        {{ Form::checkbox('permission[]','activity-log-own',
                                        isset($permissions) && $permissions->contains('activity-log-own') ,
                                         ['class' => 'view-access access-permission']) }}
                        <span style="padding-left: 5px;">Allow user to view activities done by self.</span>
                    </label>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
