<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Students;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Parents;
use Modules\Backend\Entities\Section;
use Modules\Backend\Entities\Student;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\ParentRepository;
use Modules\Backend\Repositories\SectionRepository;

class CreateResponse implements Responsable
{


    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toResponse($request)
    {
        $selectGuardian = (new ParentRepository(new Parents()))->getAll()->pluck('name', 'id')->toArray();
        $selectGender = [
            'male' => 'Male',
            'female' => 'Female',
            'other' => 'Other',
        ];
        $selectBloodGroup = ['A+' => 'A+', 'A-' => 'A-', 'O+' => 'O+', 'B+' => 'B+', 'AB+' => 'AB+'];
        $selectClass = (new ClassRepository(new Classr()))->getAll()->pluck('name', 'id')->toArray();
        $selectSection = (new SectionRepository(new Section()))->getAll()->pluck('name', 'id')->toArray();
        $selectCountries = countryList();
        return view('backend::students.create',
            with([
                'selectGuardian' => $selectGuardian,
                'selectGender' => $selectGender,
                'selectBloodGroup' => $selectBloodGroup,
                'selectCountries' => $selectCountries,
                'selectClass' => $selectClass,
                'selectSection' => $selectSection,
                'student' => new Student()
            ]));
        /*return response()->json($this->accountTypeCategories);*/
    }
}
