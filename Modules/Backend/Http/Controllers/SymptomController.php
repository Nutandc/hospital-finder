<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Modules\Backend\Entities\Symptom;
use Nwidart\Modules\Routing\Controller;


class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {

        return view('backend::hospitals.index')
            ->with('symptoms', Symptom::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|Response
     */
    public function store(Request $request)
    {
        Symptom::create($request->all());
        return redirect()->route('symptoms.index')->with('success', 'Symptoms added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Symptom $symptom
     * @return Response
     */
    public function show(Symptom $symptom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Symptom $symptom
     * @return Response
     */
    public function edit(Symptom $symptom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Symptom $symptom
     * @return Response
     */
    public function update(Request $request, Symptom $symptom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Symptom $symptom
     * @return Response
     */
    public function destroy(Symptom $symptom)
    {
        //
    }
}
