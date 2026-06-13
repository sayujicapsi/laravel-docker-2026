@extends('layouts.app')

@section('title', 'Countries')

@section('content')
    <div class="page-head">
        <h1>Countries</h1>
        <a href="{{ route('countries.create') }}" class="btn btn-primary">+ Create Country</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th style="width:60px">ID</th>
                    <th>Name</th>
                    <th style="width:80px">Code</th>
                    <th>Capital</th>
                    <th style="width:90px">Currency</th>
                    <th style="width:170px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($countries as $country)
                    <tr>
                        <td class="muted">{{ $country->id }}</td>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->code }}</td>
                        <td class="muted">{{ $country->capital ?: '—' }}</td>
                        <td class="muted">{{ $country->currency ?: '—' }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('countries.edit', $country) }}" class="btn btn-light btn-sm">Edit</a>
                                <form action="{{ route('countries.destroy', $country) }}" method="POST"
                                      onsubmit="return confirm('Delete {{ $country->name }}? This also deletes its cities.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">No countries yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
