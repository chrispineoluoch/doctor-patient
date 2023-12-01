<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the search parameters from the request
        $date = $request->input('date');
        $doctorId = $request->input('doctor');

        // Check if both date and doctor are empty, return an empty result
        if (empty($date) && empty($doctorId)) {
            $appointments = collect(); // Create an empty collection
        } else {
            // Query to retrieve filtered appointments
            $appointments = Appointment::when($date, function ($query, $date) {
                return $query->whereDate('appointment_datetime', $date);
            })->when($doctorId, function ($query, $doctorId) {
                return $query->where('doctor_id', $doctorId);
            })->paginate(10);
        }

        // Retrieve the list of doctors for the dropdown
        $doctors = Doctor::all();

        // Pass the filtered appointments and doctors to the view
        return view('dashboard.index', compact('appointments', 'doctors'));
    }

    public function getAppointmentsBySpecialization()
    {
        $appointmentsBySpecialization = Appointment::select('specialization_id', DB::raw('count(*) as count'))
            ->groupBy('specialization_id')
            ->get();

        return response()->json($appointmentsBySpecialization);
    }
}
