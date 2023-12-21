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
        $specializations = Specialization::paginate(10);

        // Pass the specializations data to the view
        return view('specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $specializationOptions = ['Cardiology', 'Pediatrics', 'Dermatology'];sort($specializationOptions);

        return view('specializations.create');

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
    public function show($id)
    {
        // Find the appointment by ID
        $specialization = Specialization::findOrFail($id);

        // Return the show view with the appointment details
        return view('specializations.show', compact('specialization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the appointment by ID
        $specialization = Specialization::findOrFail($id);

        // Return the edit form view with the appointment
        return view('specializations.edit', compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'specialization' => 'required|string',
        ]);

        // Find the patient by ID
        $specialization = Specialization::findOrFail($id);

        // Update the patient information
        $specialization->update($request->all());

        // Redirect to the index page
        return redirect()->route('specializations.index')->with('success', 'Specialization updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the patient by ID
        $specialization = Specialization::findOrFail($id);

        // Delete the patient
        $specialization->delete();

        // Redirect to the index page
        return redirect()->route('specializations.index')->with('success', 'Specialization deleted successfully');
    }
}
