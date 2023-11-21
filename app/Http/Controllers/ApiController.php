<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllBookings()
    {
        $bookings = Appointment::all();
        return response()->json($bookings);
    }

    public function getBookingsByDoctor($doctorName)
    {
        $doctor = Doctor::whereHas('user', function ($query) use ($doctorName) {
            $query->where('first_name', $doctorName);
        })->first();

        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }

        $bookings = $doctor->appointments;
        return response()->json($bookings);
    }

    public function getBookingsByPatient($patientName)
    {
        $patient = Patient::where('first_name', $patientName)->first();

        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }

        $bookings = $patient->appointments;
        return response()->json($bookings);
    }
}
