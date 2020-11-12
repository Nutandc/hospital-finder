<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/22/2018
 * Time: 4:00 PM
 */

namespace Modules\Backend\Repositories;

use App\Repositories\Repository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Image;
use JD\Cloudder\Facades\Cloudder;
use Modules\Auth\Entities\User;

class CustomRepository extends Repository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function createUser($attributes)
    {
        $attributes['password'] = $this->encryptPassword($attributes['password_generated']);
        try {
            $imageName = $this->createAvatar($attributes);
            $attributes['photo'] = $imageName ?? 'images/default_image.jpg';
            DB::beginTransaction();
            $user = User::create([
                'name' => $attributes->name,
                'email' => $attributes->email,
                'password' => $attributes->password,
                'avatar' => $attributes->photo,
                'designation' => 'student',
                'super' => 0,
                'status' => 1,
            ]);
            $user->assignRole('Student', 'backend');
            $model = $this->model->create($attributes->all());
            DB::commit();
            return $model;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            return $this->model;
        }
    }


    public function encryptPassword($password_generated)
    {
        return Hash::make($password_generated);
    }

    public function createAvatar($request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = 'students' . '/image/' . Carbon::now()->format('Y_m_d') . '_logo' . '_' . time();
            $filePath = $file->getPathName();
            $extension = $file->getClientOriginalExtension();
            $upload = Cloudder::upload($filePath, $fileName, array("format" => $extension));
            if ($upload)
                return $filePath;
            return null;
        }
    }
}
