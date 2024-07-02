<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::with('branch')->get();
        $branches = Branch::all();

        return view('pages.services', compact('services', 'branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_services' => 'required|string|max:255',
            'branch_id' => 'required|exists:branch,id',
        ]);

        $services = $request->all();
        Services::create($services);

        return redirect()->route('services');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Services::destroy($id);
        return redirect()->route('services')->with('success', 'Service deleted successfully');
    }
}