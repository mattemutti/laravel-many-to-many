<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Technology::all());
        return view('admin.technologies.index', ['technologies' => Technology::orderByDesc('id')->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $validated = $request->validated();
        $slug = Str::slug($request->name, '-');
        $validated['slug'] = $slug;
        //dd($validated);

        Technology::create($validated);


        return to_route('admin.technologies.index')->with('message', 'Thechnology Create Sucessufully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {

        $validated = $request->validated();
        $slug = Str::slug($request->name, '-');
        $validated['slug'] = $slug;
        //dd($validated, $request, $technology);
        $technology->update($validated);


        return to_route('admin.technologies.index', $technology)->with('message', 'Thechnology Update Sucessufully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        //dd($technology);
        $technology->delete();
        return to_route('admin.technologies.index')->with('message', "Technology $technology->name deleted successfully");
    }
}
