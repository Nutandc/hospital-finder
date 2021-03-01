<?php

namespace Modules\Auth\Http\Responses\Role;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class EditResponse implements Responsable
{
    protected $role, $permissions, $view;

    public function __construct(Role $role, View $view)
    {
        $this->role = $role;
        $this->view = $view;
        $this->permissions = $this->role->permissions()->pluck('name');
    }

    public function toResponse($request)
    {
        return $this->view->with('role', $this->role)
            ->with('permissions', $this->permissions);
    }
}
