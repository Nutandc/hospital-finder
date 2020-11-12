<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/9/2018
 * Time: 12:05 PM
 */

namespace Modules\Backend\Http\Responses\Students;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Section;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\SectionRepository;

class EditResponse implements Responsable
{
    private $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function toResponse($request)
    {
        $selectGuardian = [];
        $selectGender = [
            'male' => 'Male',
            'female' => 'Female',
            'other' => 'Other',
        ];
        $selectBloodGroup = [
            'A+' => 'A+',
            'A-' => 'A-',
            'B+' => 'B+',
            'O+' => 'O+',
            'AB+' => 'AB+',

        ];
        $selectClass = (new ClassRepository(new Classr()))->getAll()->pluck('name', 'id')->toArray();
        $selectSection = (new SectionRepository(new Section()))->getAll()->pluck('name', 'id')->toArray();
        $selectCountries = countryList();
        $student = $this->student;
        return view('backend::students.edit',
            with([
                'selectGuardian' => $selectGuardian,
                'selectGender' => $selectGender,
                'selectBloodGroup' => $selectBloodGroup,
                'selectCountries' => $selectCountries,
                'selectClass' => $selectClass,
                'selectSection' => $selectSection,
                'student' => $student
            ]));
    }

}
