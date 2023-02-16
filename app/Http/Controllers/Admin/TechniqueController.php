<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technique;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTechniqueRequest;
use App\Http\Requests\UpdateTechniqueRequest;

class TechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechniqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechniqueRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function show(Technique $technique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function edit(Technique $technique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTechniqueRequest  $request
     * @param  \App\Models\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechniqueRequest $request, Technique $technique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technique $technique)
    {
        //
    }
}
