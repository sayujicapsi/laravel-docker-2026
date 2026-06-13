@extends('layouts.app')

@section('title', 'Edit City')

@section('content')
    <div class="page-head">
        <h1>Edit City</h1>
        <a href="{{ route('cities.index') }}" class="btn btn-light">Back</a>
    </div>

    <form action="{{ route('cities.update', $city) }}" method="POST" class="stack">
        @csrf
        @method('PUT')
        @include('cities._form', ['city' => $city, 'countries' => $countries])

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('cities.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection
