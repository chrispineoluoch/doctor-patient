@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h4 class="mb-8 block text-2xl font-semibold text-slate-900 text-center">Specialization Information</h4>
        <div class="mb-4">
            <label for="specialization" class="mb-2 block text-sm font-medium text-slate-900">Specialization name</label>
            <p class="input">{{ $specialization->specialization }}</p>
        </div>
        <div class="mt-12 flex gap-2 justify-center">
            <a href="{{ route('specializations.index') }}" class="btn">Cancel</a>
        </div>
    </div>
@endsection
