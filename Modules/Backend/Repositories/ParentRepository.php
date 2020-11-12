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
use Illuminate\Support\Facades\Hash;
use JD\Cloudder\Facades\Cloudder;
use Modules\Backend\Entities\Parents;

class ParentRepository extends Repository
{
    protected $model;

    public function __construct(Parents $model)
    {
        $this->model = $model;
    }

    public function selectDepartments()
    {
        return $this->getSelectAll();
    }

    public function create(array $attributes)
    {
        $attributes['password'] = $this->encryptPassword($attributes['password_generated']);
        return $this->model->create($attributes);
    }
    public function encryptPassword($password_generated)
    {
        return Hash::make($password_generated);
    }
    public function store($request)
    {
        $filePath = null;
        if ($request->hasFile('photo')) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = 'parent' . '/image/' . Carbon::now()->format('Y_m_d') . '_logo' . '_' . time();
                $filePath = $file->getPathName();
                $extension = $file->getClientOriginalExtension();
                Cloudder::upload($filePath, $fileName, array("format" => $extension));
            }
        }
        return $fileName ?? 'images/default_image.jpg';
    }
}
