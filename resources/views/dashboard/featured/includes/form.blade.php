<div class="form-wrapper">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $featured->name }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('name') }}</div>
</div>
<div class="form-wrapper">
    <label for="url">Website URL</label>
    <input type="text" name="url" value="{{ old('url') ?? $featured->url }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('url') }}</div>
</div>
<div class="form-wrapper">
    <label for="image">Logo</label>
    <input type="file" name="image" value="" class="form-image">
    <div class="form-error">{{ $errors->first('image') }}</div>
</div>
@if ($featured->image)
<div class="form-wrapper">
    <div class="post-image">	
        <img src="{{ Storage::url('featured/'.$featured->image) }}"  alt="{{ $featured->name }}">
    </div>
</div>
@endif