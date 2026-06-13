@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="page-head">
        <h1>Edit User</h1>
        <a href="{{ route('users.index') }}" class="btn btn-light">Back</a>
    </div>

    <form action="{{ route('users.update', $user) }}" method="POST" class="stack">
        @csrf
        @method('PUT')

        <div class="field">
            <label for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
            @error('name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input id="password" name="password" type="password">
            <div class="hint">Leave blank to keep the current password.</div>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </form>
@endsection
