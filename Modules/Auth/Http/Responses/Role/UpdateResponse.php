<?php

namespace Modules\Auth\Http\Responses\Role;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Support\Responsable;

class UpdateResponse implements Responsable
{

    protected $role, $routePrefix;

    public function __construct( Role $role)
    {
        $this->role = $role;
    }

    public function toResponse($request){
        //Log::info($this->role);
        return redirect()->route('roles.index')
            ->with('success','Role updated successfully.');
    }
}
