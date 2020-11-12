<?php


namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Entities\Subject;
use Modules\Backend\Http\Requests\CreateClassRequest;
use Modules\Backend\Http\Requests\UpdateClassRequest;
use Modules\Backend\Http\Responses\Subjects\IndexResponse;
use Modules\Backend\Http\Responses\Subjects\ShowResponse;
use Modules\Backend\Http\Responses\Subjects\StoreResponse;
use Modules\Backend\Http\Responses\Subjects\UpdateResponse;
use Modules\Backend\Http\Responses\Subjects\DeleteResponse;
use Modules\Backend\Repositories\SubjectRepository;
use Nwidart\Modules\Routing\Controller;

class SubjectController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';

    public function __construct(Subject $subject)
    {
        $this->middleware('auth');
        $this->middleware(['permission:subject-view|subject-create|subject-edit|subject-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:subject-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:subject-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:subject-delete'], ['only' => ['destroy']]);
//        // set the model
        $this->model = new SubjectRepository($subject);
    }

    /**
     * Display a listing of the resource.
     * @return IndexResponse
     */
    public function index()
    {
        return new IndexResponse($this->model->getAll());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateClassRequest $request
     * @return StoreResponse
     */
    public function store(CreateClassRequest $request)
    {
        return new StoreResponse($this->model->create($request->all()));
    }


    /**
     * @param $id
     * @return ShowResponse
     */
    public function show($id)
    {
        return new ShowResponse($this->model->getById($id));
    }


    /**
     * Update the specified resource in storage.
     * @param $id
     * @param UpdateClassRequest $request
     * @return UpdateResponse
     */
    public function update($id, UpdateClassRequest $request)
    {
        return new UpdateResponse($this->model->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return DeleteResponse
     */
    public function destroy($id)
    {
        return new DeleteResponse($this->model, $id);
    }
}
