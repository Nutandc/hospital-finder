<?php


namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Disease;
use Modules\Backend\Http\Requests\CreateClassRequest;
use Modules\Backend\Http\Requests\CreateDoctorRequest;
use Modules\Backend\Http\Responses\Disease\DeleteResponse;
use Modules\Backend\Http\Responses\Disease\IndexResponse;
use Modules\Backend\Http\Responses\Disease\ShowResponse;
use Modules\Backend\Http\Responses\Disease\StoreResponse;
use Modules\Backend\Http\Responses\Disease\UpdateResponse;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\DiseaseRepository;
use Nwidart\Modules\Routing\Controller;

class DiseaseController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';

    public function __construct(Disease $disease)
    {
        $this->middleware('auth');
        $this->middleware(['permission:disease-view|disease-create|disease-edit|disease-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:disease-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:disease-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:disease-delete'], ['only' => ['destroy']]);
        // set the model
        $this->model = new DiseaseRepository($disease);
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
     * @param CreateDoctorRequest $request
     * @return StoreResponse
     */
    public function store(Request $request)
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
     * @param CreateDoctorRequest $request
     * @return UpdateResponse
     */
    public function update($id, CreateDoctorRequest $request)
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
