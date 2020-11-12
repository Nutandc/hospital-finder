<?php

namespace Modules\Auth\Http\Responses\Role;

use Illuminate\Contracts\Support\Responsable;
use Spatie\Permission\Models\Role;

class StoreResponse implements Responsable
{

    protected $role, $routePrefix;

    public function __construct( Role $role)
    {
        $this->role = $role;
    }

    public function toResponse($request)
    {
        return redirect()->route('roles.index')
            ->with('success', 'Role added successfully.');
    }
}
