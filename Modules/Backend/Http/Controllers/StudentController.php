<?php


namespace Modules\Backend\Http\Controllers;

use Illuminate\Support\Str;
use Modules\Backend\Entities\Student;
use Modules\Backend\Http\Requests\CreateStudentRequest;
use Modules\Backend\Http\Responses\Students\CreateResponse;
use Modules\Backend\Http\Responses\Students\DeleteResponse;
use Modules\Backend\Http\Responses\Students\EditResponse;
use Modules\Backend\Http\Responses\Students\IndexResponse;
use Modules\Backend\Http\Responses\Students\ShowResponse;
use Modules\Backend\Http\Responses\Students\StoreResponse;
use Modules\Backend\Http\Responses\Students\UpdateResponse;
use Modules\Backend\Repositories\CustomRepository;
use Modules\Backend\Repositories\StudentRepository;
use Nwidart\Modules\Routing\Controller;

class StudentController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';
    /**
     * @var StudentRepository
     */
    private $repo;
    /**
     * @var CustomRepository
     */
    private $customRepo;

    public function __construct(Student $model)
    {
        $this->middleware('auth');
        $this->middleware(['permission:student-view|student-create|student-edit|student-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:student-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:student-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:student-delete'], ['only' => ['destroy']]);
        // set the model
        $this->repo = new StudentRepository($model);
        $this->customRepo = new CustomRepository($model);
    }

    /**
     * Display a listing of the resource.
     * @return IndexResponse
     */
    public function index()
    {
        return new IndexResponse($this->repo->getAll());
    }

    /**
     * Display a listing of the resource.
     * @return CreateResponse
     */
    public function create()
    {
        return new CreateResponse($this->repo->getAll());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateStudentRequest $request
     * @return StoreResponse
     */
    public function store(CreateStudentRequest $request)
    {
        $password_generated = Str::random(10);
        $request->request->add(['password_generated' => $password_generated]);
        $student = $this->customRepo->createUser($request);
        return new StoreResponse($student, $password_generated);
    }


    /**
     * @param $id
     * @return ShowResponse
     */
    public function show($id)
    {
        return new ShowResponse($this->repo->getById($id));
    }

    public function edit($id)
    {
        return new EditResponse($this->repo->getById($id));
    }


    /**
     * Update the specified resource in storage.
     * @param $id
     * @param CreateStudentRequest $request
     * @return UpdateResponse
     */
    public function update($id, CreateStudentRequest $request)
    {
        return new UpdateResponse($this->repo->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return DeleteResponse
     */
    public function destroy($id)
    {
        return new DeleteResponse($this->repo, $id);
    }
}
