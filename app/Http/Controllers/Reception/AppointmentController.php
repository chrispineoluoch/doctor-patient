<?php

namespace App\Http\Controllers\Reception;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all scheduled appointments with related doctor and patient details
        $appointments = Appointment::paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all specializations for dropdown
        $specializations = Specialization::all();

        // Fetch all patients for dropdown
        $patients = Patient::all();

        // Fetch all doctors for dropdown
        $doctors = Doctor::all();

        return view('appointments.create', compact('specializations', 'patients', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for the appointment form
        $request->validate([
            'specialization_id' => 'required|exists:specializations,id',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_datetime' => [
                'required',
                'date_format:Y-m-d\TH:i',
                'after:now',
                Rule::unique('appointments', 'appointment_datetime'),
            ],
            'description' => 'nullable|string',
            // Add other appointment-specific fields
        ], [
            'appointment_datetime.after' => 'Please select a date and time in the future.',
            'appointment_datetime.unique' => 'The selected date and time is already taken.',
        ]);

        // Save the appointment to the database
        Appointment::create([
            'specialization_id' => $request->specialization_id,
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_datetime' => $request->appointment_datetime,
            'description'=> $request->description,
            // Add other appointment-specific fields
        ]);

        // Redirect or respond accordingly
        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        // Fetch all specializations for dropdown
        $specializations = Specialization::all();

        // Fetch all patients for dropdown
        $patients = Patient::all();

        // Fetch all doctors for dropdown
        $doctors = Doctor::all();

        return view('appointments.edit', compact('specializations', 'patients', 'doctors', 'appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Validation rules for the appointment form
        $request->validate([
            'specialization_id' => 'required|exists:specializations,id',
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_datetime' => [
                'required',
                'date_format:Y-m-d\TH:i',
                'after:now',
                Rule::unique('appointments', 'appointment_datetime')->ignore($appointment),
            ],
            'description' => 'nullable|string',
            // Add other appointment-specific fields
        ], [
            'appointment_datetime.after' => 'Please select a date and time in the future.',
            'appointment_datetime.unique' => 'The selected date and time is already taken.',
        ]);

        // Update the appointment in the database
        $appointment->update([
            'specialization_id' => $request->specialization_id,
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_datetime' => $request->appointment_datetime,
            'description'=> $request->description,
            // Add other appointment-specific fields
        ]);

        // Redirect or respond accordingly
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        // Delete the appointment
        $appointment->delete();

        // Redirect or respond accordingly
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully');
    }

    public function fetchDoctorsBySpecialization($specializationId)
    {
        // Fetch doctors based on the provided specializationId
        $doctors = Doctor::where('specialization_id', $specializationId)->get();

        // Prepare the data in a format suitable for AJAX response
        $doctorOptions = [];
        foreach ($doctors as $doctor) {
            $doctorOptions[$doctor->id] = $doctor->user->first_name . ' ' . $doctor->user->last_name;
        }

        // Return the data as JSON
        return response()->json($doctorOptions);
    }
}
