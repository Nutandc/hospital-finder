<?php


namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Entities\Classr;
use Modules\Backend\Http\Requests\CreateClassRequest;
use Modules\Backend\Http\Requests\UpdateClassRequest;
use Modules\Backend\Http\Responses\Classes\DeleteResponse;
use Modules\Backend\Http\Responses\Classes\IndexResponse;
use Modules\Backend\Http\Responses\Classes\ShowResponse;
use Modules\Backend\Http\Responses\Classes\StoreResponse;
use Modules\Backend\Http\Responses\Classes\UpdateResponse;
use Modules\Backend\Repositories\ClassRepository;
use Nwidart\Modules\Routing\Controller;

class ClassController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';

    public function __construct(Classr $classes)
    {
        $this->middleware('auth');
        $this->middleware(['permission:class-view|class-create|class-edit|class-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:class-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:class-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:class-delete'], ['only' => ['destroy']]);
        // set the model
        $this->model = new ClassRepository($classes);
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
