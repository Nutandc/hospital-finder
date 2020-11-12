<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Nwidart\Modules\Routing\Controller;
use Modules\Auth\Http\Responses\Role\EditResponse;
use Spatie\Permission\Models\Role;

class RoleController extends \Modules\Auth\Http\Controllers\RoleController
{
    protected $routePrefix ='backend';
    public function __construct(Role $role)
    {
        parent::__construct($role);
//        $this->middleware('permission:account-permission');
    }

    public function create()
    {
        return view('backend::roles.create');
    }

    public function edit($id)
    {
        $role = $this->model->getById($id);
        $view = view('backend::roles.edit');
        return new EditResponse($role,$view);

    }

}
