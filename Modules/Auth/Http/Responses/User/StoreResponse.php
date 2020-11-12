<?php

namespace Modules\Auth\Http\Responses\User;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Entities\User;
use Modules\Auth\Notifications\UserInvited;

class StoreResponse implements Responsable
{

    protected $user, $password_generated;

    public function __construct(User $user, $password_generated)
    {
        $this->user = $user;
        $this->password_generated = $password_generated;
    }

    public function toResponse($request)
    {
        Log::info($this->user);
        $attribute = [
            'is_reloadable' => true
        ];
        $this->user->notify(new UserInvited($this->user, $this->password_generated));
        $request->session()->flash('success', 'New user added successfully.');
        return redirect()->route('users.index')->with('success', 'New user added successfully.');
//        return response()->json(['status' => '201', 'data' => $attribute]);

    }
}
