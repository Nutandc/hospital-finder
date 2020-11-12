<?php

namespace Modules\Auth\Http\Responses\User;

use Modules\Auth\Entities\User;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
    protected $user;

    /**
     * IndexResponse constructor.
     * @param Collection $users
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toResponse($request){
        $roles = $this->user->getRoleNames()->first();
        $users = $this->transformUsers();
        $users['roles'] = $roles;
        return response()->json($users);
    }

    public function transformUsers(){
        return [
            'id' => $this->user->id,
            'name' =>$this->user->name,
            'email' => $this->user->email,
            'status' => $this->user->status,
            'super' => $this->user->super
        ];
    }

}