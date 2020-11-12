<?php


namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Doctor;
use Modules\Backend\Http\Requests\CreateClassRequest;
use Modules\Backend\Http\Requests\CreateDoctorRequest;
use Modules\Backend\Http\Requests\UpdateClassRequest;
use Modules\Backend\Http\Responses\Doctors\DeleteResponse;
use Modules\Backend\Http\Responses\Doctors\IndexResponse;
use Modules\Backend\Http\Responses\Doctors\ShowResponse;
use Modules\Backend\Http\Responses\Doctors\StoreResponse;
use Modules\Backend\Http\Responses\Doctors\UpdateResponse;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\DoctorRepository;
use Nwidart\Modules\Routing\Controller;

class DoctorController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';

    public function __construct(Doctor $doctor)
    {
        $this->middleware('auth');
        $this->middleware(['permission:doctor-view|doctor-create|doctor-edit|doctor-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:doctor-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:doctor-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:doctor-delete'], ['only' => ['destroy']]);
        // set the model
        $this->model = new DoctorRepository($doctor);
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
