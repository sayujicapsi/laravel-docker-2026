<div class="field">
    <label for="country_id">Country</label>
    <select id="country_id" name="country_id" required>
        <option value="">— Select a country —</option>
        @foreach ($countries as $option)
            <option value="{{ $option->id }}" @selected(old('country_id', $city?->country_id) == $option->id)>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
    @error('country_id') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="name">Name</label>
    <input id="name" name="name" type="text" value="{{ old('name', $city?->name) }}" required>
    @error('name') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="state">State / Region</label>
    <input id="state" name="state" type="text" value="{{ old('state', $city?->state) }}">
    @error('state') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="latitude">Latitude</label>
    <input id="latitude" name="latitude" type="number" step="any" value="{{ old('latitude', $city?->latitude) }}">
    <div class="hint">Between -90 and 90.</div>
    @error('latitude') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="longitude">Longitude</label>
    <input id="longitude" name="longitude" type="number" step="any" value="{{ old('longitude', $city?->longitude) }}">
    <div class="hint">Between -180 and 180.</div>
    @error('longitude') <div class="error">{{ $message }}</div> @enderror
</div>
