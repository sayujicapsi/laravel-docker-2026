<div class="field">
    <label for="name">Name</label>
    <input id="name" name="name" type="text" value="{{ old('name', $country?->name) }}" required>
    @error('name') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="code">Code</label>
    <input id="code" name="code" type="text" maxlength="2" value="{{ old('code', $country?->code) }}" required>
    <div class="hint">Two-letter ISO code, e.g. US, GB.</div>
    @error('code') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="capital">Capital</label>
    <input id="capital" name="capital" type="text" value="{{ old('capital', $country?->capital) }}">
    @error('capital') <div class="error">{{ $message }}</div> @enderror
</div>

<div class="field">
    <label for="currency">Currency</label>
    <input id="currency" name="currency" type="text" value="{{ old('currency', $country?->currency) }}">
    @error('currency') <div class="error">{{ $message }}</div> @enderror
</div>
