<td>
    <div class="btn-group">
        <a class="pointer dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            More
            Permissions
        </a>
        <ul class="dropdown-menu action-more">
            @foreach($other_permissions as $key => $other_permission_name)
                @if($other_permission_name && $key > 0)
                    <li>
                        <a>
                            <div class="checkbox icheck">
                                <label>
                                    {{ Form::checkbox('permission[]',$other_permission_name,
                                   isset($permissions) && $permissions->contains($other_permission_name) ,
                                    ['class' => 'approve-access access-permission']) }}
                                    <span style="padding-left: 5px;">
                                       @php
                                               $title =    \Illuminate\Support\Str::contains($other_permission_name,'request-to') ? 'Can Request to' : 'Can Checked';
                                       @endphp
                                        {{ucwords($title)}}
                                    </span>
                                </label>
                            </div>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</td>