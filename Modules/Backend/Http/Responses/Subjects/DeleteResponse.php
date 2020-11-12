<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:11 PM
 */

namespace Modules\Backend\Http\Responses\Subjects;


use Illuminate\Contracts\Support\Responsable;
use Modules\Backend\Repositories\SubjectRepository;

class DeleteResponse implements Responsable
{
    protected $subjectRepository, $id;

    public function __construct(SubjectRepository $subjectRepository, $id)
    {
        $this->subjectRepository = $subjectRepository;
        $this->id = $id;
    }

    public function toResponse($request)
    {
        try {
            $redirectRoute = redirect()->route('subjects.index');
            $department = $this->subjectRepository->delete($this->id);
            if ($department) {
                return $redirectRoute->with('success', 'Subjects deleted successfully');
            } else {
                return $redirectRoute->with('failed', 'Subjects failed to be deleted');
            }
        } catch (\PDOException $pdoEx) {
            return $redirectRoute->with('failed', 'Subjects failed to be deleted, It is already used in transactions.');
        } catch (\Exception $ex) {
            return $redirectRoute->with('failed', 'Subjects failed to be deleted');
        }
    }
}
