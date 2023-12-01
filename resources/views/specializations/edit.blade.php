@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('specializations.update', $specialization->id) }}">
        @csrf
        @method('PUT')

        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Edit Specialization Information</h4>
        <div class="mb-4">
            <label for="specialization" class="mb-2 block text-sm font-medium text-slate-900">Modify the doctor specialization category</label>
            <input name="specialization" type="text" class="input" value="{{ old('specialization', $specialization->specialization) }}" required />
        </div>
        <div class="mt-12 flex gap-2 justify-center">
            <button type="submit" class="btn">Update Specialization</button>
            <a href="{{ route('specializations.index') }}" class="btn">Cancel</a>
        </div>
    </form>
@endsection
