<?php

namespace App\Http\Controllers\Reception;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the list of specializations
        $specializations = Specialization::all();

        // Pass the specializations data to the view
        return view('specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializationOptions = ['Cardiology', 'Pediatrics', 'Dermatology'];sort($specializationOptions);

        return view('specializations.create', compact('specializationOptions'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'specialization' => 'required|string|unique:specializations,specialization',
        ];

        // Validate the request
        $request->validate($rules);

        // Create a new specialization
        Specialization::create([
            'specialization' => $request->input('specialization'),
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('specializations.index')->with('success', 'Specialization created successfully.');
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
        //
    }
}
