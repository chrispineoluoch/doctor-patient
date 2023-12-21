@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h4 class="mb-4 block text-2xl font-semibold text-slate-900">Create Appointment</h4>
    </div>

    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf

        <div class="mb-4">
            <label for="patient_id" class="mb-2 block text-sm font-medium text-slate-900">Select Patient</label>
            <select name="patient_id" class="input" required>
                <option value="" disabled selected>Select Patient</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="specialization_id" class="mb-2 block text-sm font-medium text-slate-900">Select
                Specialization</label>
            <select name="specialization_id" id="specialization_id" class="input" required>
                <option value="" disabled selected>Select Specialization</option>
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->id }}">{{ $specialization->specialization }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="doctor_id" class="mb-2 block text-sm font-medium text-slate-900">Select Doctor</label>
            <select name="doctor_id" id="doctor_id" class="input" required>
                <option value="" disabled selected>Select Doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->user->first_name }} {{ $doctor->user->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="appointment_datetime" class="mb-2 block text-sm font-medium text-slate-900">Appointment Date and Time</label>
            <input id="appointment_datetime" name="appointment_datetime" type="datetime-local" class="input" required />
        </div>

        <div class="mb-4">
            <label for="description" class="mb-2 block text-sm font-medium text-slate-900">Appointment description</label>
            <textarea name="description" class="input" rows="5" style="height: 100px"></textarea>
        </div>

        <div class="mt-12 flex gap-2 justify-center">
            <button type="submit" class="btn">Create Appointment</button>
            <a href="{{ route('appointments.index') }}" class="btn">Cancel</a>
        </div>
    </form>

    {{-- Script to dynamically populate a dropdown list of doctors based on the selected specialization --}}
    <script>
        $(document).ready(function() {
            // Fetch doctors based on selected specialization
            $('#specialization_id').change(function() {
                var specializationId = $(this).val();
                console.log('Specialization ID:', specializationId);

                // Fetch doctors using AJAX and populate the doctor dropdown
                $.ajax({
                    url: '{{ route('appointments.fetch-doctors', ['specializationId' => ':specializationId']) }}'
                        .replace(':specializationId', specializationId),
                    type: 'GET',
                    success: function(data) {
                        $('#doctor_id').empty().append(
                            '<option value="" disabled selected>Select Doctor</option>');
                        $.each(data, function(key, value) {
                            $('#doctor_id').append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    {{-- Script to have the minimum appointment date to now --}}
    <script>
        $(document).ready(function () {
            // Get the current date and time in the required format
            var now = new Date().toISOString().slice(0, 16);
    
            // Set the 'min' attribute of the datetime-local input
            $('#appointment_datetime').attr('min', now);
        });
    </script>
@endsection
