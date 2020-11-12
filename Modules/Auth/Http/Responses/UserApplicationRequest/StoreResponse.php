<?php

namespace Modules\Auth\Http\Responses\UserApplicationRequest;

use Modules\Auth\Entities\User;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Notifications\UserInvited;
use Illuminate\Contracts\Support\Responsable;

class StoreResponse implements Responsable
{
    
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toResponse($request){
        Log::info($this->user);
        //$this->user->notify(new UserInvited($this->user, $this->password_generated));
        $request->session()->flash('success', 'User added successfully.');
        return response()->json(['status'=>'201']);
    }
}