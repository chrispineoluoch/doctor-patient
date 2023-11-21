<?php

namespace App\Http\Controllers\Reception;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the list of patients
        $patients = Patient::all();

        // Pass the patients data to the view
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        // Create a new patient
        Patient::create($request->all());

        // Redirect or respond accordingly
        return redirect()->route('patients.index')->with('success', 'Patient created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the patient by ID
        $patient = Patient::findOrFail($id);

        // Return the show view with the patient details
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the patient by ID
        $patient = Patient::findOrFail($id);

        // Return the edit form view with the patient
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // Validate the request
         $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:patients,email,' . $id,
            'phone' => 'nullable|string',
            'dob' => 'nullable|date',
            'address' => 'nullable|string',
        ]);

        // Find the patient by ID
        $patient = Patient::findOrFail($id);

        // Update the patient information
        $patient->update($request->all());

        // Redirect to the index page
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the patient by ID
        $patient = Patient::findOrFail($id);

        // Delete the patient
        $patient->delete();

        // Redirect to the index page
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully');
    }
}
