<?php


namespace Modules\Backend\Http\Controllers;

use Modules\Backend\Entities\Classr;
use Modules\Backend\Entities\Section;
use Modules\Backend\Http\Requests\CreateClassRequest;
use Modules\Backend\Http\Requests\CreateSectionRequest;
use Modules\Backend\Http\Requests\UpdateClassRequest;
use Modules\Backend\Http\Responses\Section\DeleteResponse;
use Modules\Backend\Http\Responses\Section\IndexResponse;
use Modules\Backend\Http\Responses\Section\ShowResponse;
use Modules\Backend\Http\Responses\Section\StoreResponse;
use Modules\Backend\Http\Responses\Section\UpdateResponse;
use Modules\Backend\Repositories\ClassRepository;
use Modules\Backend\Repositories\SectionRepository;
use Nwidart\Modules\Routing\Controller;

class SectionController extends Controller
{
    protected $model;
    protected $routePrefix = 'backend';

    public function __construct(Section $section)
    {
        $this->middleware('auth');
        $this->middleware(['permission:section-view|section-create|section-edit|section-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:section-create'], ['only' => ['create', 'store', 'show']]);
        $this->middleware(['permission:section-edit'], ['only' => ['edit', 'update', 'show']]);
        $this->middleware(['permission:section-delete'], ['only' => ['destroy']]);
        // set the model
        $this->model = new SectionRepository($section);
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
     * @param CreateSectionRequest $request
     * @return StoreResponse
     */
    public function store(CreateSectionRequest $request)
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
     * @param CreateClassRequest $request
     * @return UpdateResponse
     */
    public function update($id, CreateClassRequest $request)
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
