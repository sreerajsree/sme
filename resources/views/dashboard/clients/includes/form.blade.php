<div class="form-wrapper">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $clients->name }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('name') }}</div>
</div>
<div class="form-wrapper">
    <label for="company">Company</label>
    <input type="text" name="company" value="{{ old('company') ?? $clients->company }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('company') }}</div>
</div>
<div class="form-wrapper">
    <label for="position">Position</label>
    <input type="text" name="position" value="{{ old('position') ?? $clients->position }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('title') }}</div>
</div>
<div class="form-wrapper">
    <label for="message">Message</label>
    <textarea name="message" required>{{ old('message') ?? $clients->message }}</textarea>
    <div class="form-error">{{ $errors->first('message') }}</div>
</div>
<div class="form-wrapper">
    <label for="image">Image</label>
    <input type="file" name="image" value="" class="form-image">
    <div class="form-error">{{ $errors->first('image') }}</div>
</div>
@if ($clients->image)
<div class="form-wrapper">
    <div class="post-image">	
        <img src="{{ Storage::url('clients/'.$clients->image) }}"  alt="{{ $clients->name }}">
    </div>
</div>
@endif