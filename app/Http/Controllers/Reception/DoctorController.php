<?php

namespace App\Http\Controllers\Reception;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the list of doctors
        $doctors = Doctor::paginate(10);

        // Pass the doctors data to the view
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch the list of specializations to populate a dropdown in the create form
        $specializations = Specialization::all();

        return view('doctors.create', compact('specializations'));
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
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        // Create a new user
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'doctor',
        ]);

        // Create a new doctor associated with the user
        $doctor = new Doctor([
            'specialization_id' => $request->input('specialization_id'),
            // Add other doctor-specific fields
        ]);

        $user->doctor()->save($doctor);

        // Redirect or respond accordingly
        return redirect()->route('doctors.index')->with('success', 'Doctor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);

        // Load the related user and specialization
        $doctor->load('user', 'specialization');

        // Fetch the list of specializations for the dropdown
        $specializations = Specialization::all();

        // Return the show view with the doctor, specializations, and related data
        return view('doctors.show', compact('doctor', 'specializations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);

        // Fetch the list of specializations for the dropdown
        $specializations = Specialization::all();

        // Return the edit form view with the doctor and specializations
        return view('doctors.edit', compact('doctor', 'specializations'));
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
            'email' => 'required|email|unique:users,email,' . $id,
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);

        // Update the associated user information
        $doctor->user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);

        // Update the doctor-specific information
        $doctor->update([
            'specialization_id' => $request->input('specialization_id'),
            // Add other doctor-specific fields
        ]);

        // Redirect to the index page
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);

        // Delete the associated user and doctor records
        $doctor->user->delete();
        $doctor->delete();

        // Redirect to the index page with a success message
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }


    /**
     * Display the scheduled appointments for a specific doctor.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function viewAppointments($id)
    {
        $doctor = Doctor::with('appointments')->findOrFail($id);
        $appointments = $doctor->appointments;

        return view('doctors.appointments', compact('doctor', 'appointments'));
    }

    /**
     * Show the form for editing the specified appointment for a specific doctor.
     */
    public function editAppointment($doctorId, $appointmentId)
    {
        // Find the doctor by ID
        $doctor = Doctor::findOrFail($doctorId);

        // Find the appointment by ID, associated with the given doctor
        $appointment = $doctor->appointments()->findOrFail($appointmentId);

        // Return the edit form view with the doctor, appointment, and additional data
        return view('doctors.edit-appointment', compact('doctor', 'appointment'));
    }

    /**
     * Update the specified appointment for a specific doctor.
     */
    public function updateAppointment(Request $request, $doctorId, $appointmentId)
    {
        // Validate the request
        $request->validate([
            'appointment_datetime' => 'required|date_format:Y-m-d\TH:i|after:now',
        ]);

        // Find the doctor by ID
        $doctor = Doctor::findOrFail($doctorId);

        // Find the appointment by ID, associated with the given doctor
        $appointment = $doctor->appointments()->findOrFail($appointmentId);

        // Update the appointment information
        $appointment->update($request->all());

        // Redirect to the doctor's appointments page
        return redirect()->route('doctors.appointments', $doctorId)->with('success', 'Appointment updated successfully');
    }
}
