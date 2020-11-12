<?php

namespace Modules\Auth\Http\Responses\UserApplicationRequest;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class IndexResponse implements Responsable
{
    protected $userApplicationRequests, $roles;

    /**
     * IndexResponse constructor.
     * @param Collection $userApplicationRequests
     */
    public function __construct(Collection $userApplicationRequests, Collection $roles)
    {
        if (Auth::user()->isSuper())
            $this->userApplicationRequests = $userApplicationRequests;
        else
            $this->userApplicationRequests = $userApplicationRequests->filter(function($userApplicationRequest){
                return $userApplicationRequest->user->super = 1;
            });
        $this->roles = $roles;
    }

    public function toResponse($request){
        return view('auth::user-application-request.index')->with('users', $this->transformUsers())
                                            ->with('roles', $this->transformRoles());
    }

    public function transformUsers(){
        return $this->userApplicationRequests->map(function($userApplicationRequest){
            return [
                'request_id' => $userApplicationRequest->id,
                /*'user_id' => $userApplicationRequest->user->id,*/
                'name' =>$userApplicationRequest->user->name,
                'email' => $userApplicationRequest->user->email,
                'department' => $userApplicationRequest->user->department?$userApplicationRequest->user->department->name:'',
                'status' => $userApplicationRequest->user ->status
            ];
        });
    }

    public function transformRoles(){
        return $this->roles->map(function($role){
            return [
                $role->id,
                $role->name
            ];
        })->toAssoc();
    }
}