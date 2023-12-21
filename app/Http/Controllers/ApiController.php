<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Get all appointment bookings.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllBookings()
    {
        // Retrieve all appointments from the Appointment model.
        $bookings = Appointment::all();

        // Return a JSON response containing all the bookings.
        return response()->json($bookings);
    }

    /**
     * Get appointment bookings by doctor name.
     *
     * @param string $doctorName The name of the doctor.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookingsByDoctor($doctorName)
    {
        // Find a doctor by name along with their associated user.
        $doctor = Doctor::whereHas('user', function ($query) use ($doctorName) {
            $query->where('first_name', $doctorName);
        })->first();

        // If the doctor is not found, return a JSON response with a 404 status and an error message.
        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found'], 404);
        }

        // Retrieve the appointments associated with the found doctor.
        $bookings = $doctor->appointments;

        // Return a JSON response containing the bookings for the specific doctor.
        return response()->json($bookings);
    }

    /**
     * Get appointment bookings by patient name.
     *
     * @param string $patientName The name of the patient.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookingsByPatient($patientName)
    {
        // Find a patient by name using Eloquent.
        $patient = Patient::where('first_name', $patientName)->first();

        // If the patient is not found, return a JSON response with a 404 status and an error message.
        if (!$patient) {
            return response()->json(['error' => 'Patient not found'], 404);
        }

        // Retrieve the appointments associated with the found patient.
        $bookings = $patient->appointments;

        // Return a JSON response containing the bookings for the specific patient.
        return response()->json($bookings);
    }
}
