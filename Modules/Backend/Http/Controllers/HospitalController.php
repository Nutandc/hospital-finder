<?php


namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Hospital;
use Modules\Backend\Entities\HospitalDisease;
use Modules\Backend\Http\Requests\CreateClassRequest;
use Modules\Backend\Http\Requests\CreateDoctorRequest;
use Modules\Backend\Http\Requests\CreateHospitalRequest;
use Modules\Backend\Http\Responses\Hospitals\DeleteResponse;
use Modules\Backend\Http\Responses\Hospitals\IndexResponse;
use Modules\Backend\Http\Responses\Hospitals\ShowResponse;
use Modules\Backend\Http\Responses\Hospitals\StoreResponse;
use Modules\Backend\Http\Responses\Hospitals\UpdateResponse;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\HospitalRepository;
use Nwidart\Modules\Routing\Controller;

class HospitalController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';
    /**
     * @var Hospital
     */
    private $hospital;

    public function __construct(Hospital $hospital)
    {
        $this->middleware('auth');
        $this->middleware(['permission:hospital-view|hospital-create|hospital-edit|hospital-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:hospital-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:hospital-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:hospital-delete'], ['only' => ['destroy']]);
        // set the model
        $this->model = new HospitalRepository($hospital);
        $this->hospital = $hospital;
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
     * @param CreateHospitalRequest $request
     * @return StoreResponse
     */
    public function store(CreateHospitalRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/galeryImages/');
            $image->move($destinationPath, $name);
            $request['image'] = $name;
        }
        $hospital = $this->model->create($request->all());
        foreach ($request->diseases ?? [] as $disease) {
            HospitalDisease::create([
                'hospital_id' => $hospital->id,
                'disease' => $disease
            ]);
        }
        return new StoreResponse($hospital);
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
