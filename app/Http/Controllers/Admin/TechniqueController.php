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
        $techniques = Technique::all();

        return view('admin.techniques.index', compact('techniques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.techniques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTechniqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechniqueRequest $request)
    {
        $data = $request->validated();

        $new_technique = new Technique();
        $new_technique->fill($data);
        $new_technique->slug = Str::slug($new_technique->name);
        $new_technique->save();

        return redirect()->route('admin.techniques.index')->with('message', "$new_technique->name aggiunta con successo.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function show(Technique $technique)
    {
        return view('admin.techniques.show', compact('technique'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function edit(Technique $technique)
    {
        return view('admin.technique.edit', compact('tecnhique'));
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
        $old_name = $technique->name;

        $data = $request->validated();

        $technique->slug = Str::slug($data['name']);
        $technique->update($data);

        return redirect()->route('admin.technique.index')->with('message', "La Tecnica $old_name è stata aggiornata.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technique  $technique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technique $technique)
    {
        $old_name = $technique->name;

        $technique->delete();

        return redirect()->route('admin.techniques.index')->with('message', "La tecnica $old_name è stata cancellata." );
    }
}
