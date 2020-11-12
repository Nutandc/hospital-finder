<?php


namespace Modules\Backend\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;
use Modules\Backend\Entities\Teacher;
use Modules\Backend\Http\Requests\CreateClassRequest;
use Modules\Backend\Http\Requests\CreateTeacherRequest;
use Modules\Backend\Http\Requests\UpdateClassRequest;
use Modules\Backend\Http\Responses\Teachers\CreateResponse;
use Modules\Backend\Http\Responses\Teachers\DeleteResponse;
use Modules\Backend\Http\Responses\Teachers\EditResponse;
use Modules\Backend\Http\Responses\Teachers\IndexResponse;
use Modules\Backend\Http\Responses\Teachers\ShowResponse;
use Modules\Backend\Http\Responses\Teachers\StoreResponse;
use Modules\Backend\Http\Responses\Teachers\UpdateResponse;
use Modules\Backend\Repositories\TeacherRepository;
use Nwidart\Modules\Routing\Controller;

class TeacherController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';

    public function __construct(Teacher $model)
    {
        $this->middleware('auth:');
        $this->middleware(['permission:teacher-view|teacher-create|teacher-edit|teacher-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:teacher-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:teacher-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:teacher-delete'], ['only' => ['destroy']]);
        // set the model
        $this->model = new TeacherRepository($model);
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
     * Display a listing of the resource.
     * @return IndexResponse
     */
    public function create()
    {
        return new CreateResponse($this->model->getAll());
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateClassRequest $request
     * @return StoreResponse
     */
    public function store(CreateTeacherRequest $request)
    {
        $filePath = null;
        if ($request->hasFile('photo')) {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = 'teacher' . '/image/' . Carbon::now()->format('Y_m_d') . '_logo' . '_' . time();
                $filePath = $file->getPathName();
                $extension = $file->getClientOriginalExtension();
                Cloudder::upload($filePath, $fileName, array("format" => $extension));
            }
        }
        $input['photo'] = $filePath ?? 'images/default_image.jpg';
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

    public function edit($id)
    {
        return new EditResponse($this->model->getById($id));
    }


    /**
     * Update the specified resource in storage.
     * @param $id
     * @param UpdateClassRequest $request
     * @return UpdateResponse
     */
    public function update($id, CreateTeacherRequest $request)
    {
        $request['password'] = Str::random(10);
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
