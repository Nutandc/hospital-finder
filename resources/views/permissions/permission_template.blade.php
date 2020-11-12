@php($access = [
    'view','create','edit','delete'
])
<tr>
    <th>{{ucwords(str_replace('-',' ',$permission_name))}}</th>
    <td class="text-center">
        <div class="checkbox icheck">
            <label>
                {{ Form::checkbox('full-access[]',$permission_name.'-full', false , ['class' => 'full-access iCheck']) }}
            </label>
        </div>
    </td>
    @foreach($access as $key)
        <td class="text-center">
            <div class="checkbox icheck">
                <label>
                    {{ Form::checkbox('permission[]',
                    $permission_name.'-'.$key,
                    isset($permissions) &&
                     $permissions->contains($permission_name.'-'.$key),
                     ['class' => $key.'-access access-permission iCheck']) }}
                </label>
            </div>
        </td>
    @endforeach

{{--    @if(isset($other_permissions))--}}
{{--        @if(is_array($other_permissions) && count($other_permissions))--}}
{{--            <td class="text-center">--}}
{{--                <div class="checkbox icheck">--}}
{{--                    <label>--}}
{{--                        {{ Form::checkbox('permission[]',$other_permissions[0],--}}
{{--                         isset($permissions) && $permissions->contains($other_permissions[0]) ,--}}
{{--                         ['class' => 'approve-access access-permission']) }}--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </td>--}}
{{--            @if(count($other_permissions) >1)--}}
{{--                @include('common::backend.partials.permissions.permission-template-dropdown')--}}
{{--            @endif--}}
{{--        @else--}}
{{--            <td></td>--}}
{{--        @endif--}}
{{--    @endif--}}
</tr>
