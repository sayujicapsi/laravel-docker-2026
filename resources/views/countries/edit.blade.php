@extends('layouts.app')

@section('title', 'Edit Country')

@section('content')
    <div class="page-head">
        <h1>Edit Country</h1>
        <a href="{{ route('countries.index') }}" class="btn btn-light">Back</a>
    </div>

    <form action="{{ route('countries.update', $country) }}" method="POST" class="stack">
        @csrf
        @method('PUT')
        @include('countries._form', ['country' => $country])

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('countries.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection
