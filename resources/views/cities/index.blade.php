@extends('layouts.app')

@section('title', 'Cities')

@section('content')
    <div class="page-head">
        <h1>Cities</h1>
        <a href="{{ route('cities.create') }}" class="btn btn-primary">+ Create City</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th style="width:60px">ID</th>
                    <th>Name</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Lat</th>
                    <th>Lng</th>
                    <th style="width:170px"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cities as $city)
                    <tr>
                        <td class="muted">{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td class="muted">{{ $city->state ?: '—' }}</td>
                        <td>{{ $city->country?->name ?? '—' }}</td>
                        <td class="muted">{{ $city->latitude ?? '—' }}</td>
                        <td class="muted">{{ $city->longitude ?? '—' }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('cities.edit', $city) }}" class="btn btn-light btn-sm">Edit</a>
                                <form action="{{ route('cities.destroy', $city) }}" method="POST"
                                      onsubmit="return confirm('Delete {{ $city->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="empty">No cities yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
