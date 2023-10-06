<input type="hidden" value="{{ $mag->id }}" name="mag_id">
<div class="form-wrapper">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $profile->name }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('name') }}</div>
</div>
<div class="form-wrapper">
    <label for="body">Body</label>
    <textarea name="body" id="mytextarea" required>{{ old('body') ?? $profile->body }}</textarea>
    <div class="form-error">{{ $errors->first('body') }}</div>
</div>
<div class="form-wrapper">
    <label for="url">URL</label>
    <input type="text" name="url" value="{{ old('url') ?? $profile->url }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('url') }}</div>
</div>
<div class="form-wrapper">
    <label for="author">Author</label>
    <input type="text" name="author" value="{{ old('author') ?? $profile->author }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('author') }}</div>
</div>
<div class="form-wrapper">
    <label for="title">Meta Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $profile->url }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('title') }}</div>
</div>
<div class="form-wrapper">
    <label for="description">Meta Description</label>
    <textarea name="description" required>{{ old('description') ?? $profile->description }}</textarea>
    <div class="form-error">{{ $errors->first('description') }}</div>
</div>
<div class="form-wrapper">
    <label for="keywords">Meta Keywords</label>
    <textarea name="keywords">{{ old('keywords') ?? $profile->keywords }}</textarea>
    <div class="form-error">{{ $errors->first('keywords') }}</div>
</div>
<div class="form-wrapper">
    <label for="date">Date</label>
    <input type="date" name="date" value="{{ old('date') ?? $profile->date }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('date') }}</div>
</div>
<div class="form-wrapper">
    <label for="image">Image</label>
    <input type="file" name="image" value="" class="form-image">
    <div class="form-error">{{ $errors->first('image') }}</div>
</div>
@if ($profile->image)
<div class="form-wrapper">
    <div class="post-image">	
        <img src="{{ Storage::url('magazines/' . $mag->year . '/' . $mag->issue . '/' . $mag->type . '/profiles/' . $profile->image) }}">
    </div>
</div>
@endif
<div class="form-wrapper">
    <label for="type">Profile Type</label>
    <select name="type" value="{{ old('type') }}" class="form-select">
        <option value="cover">Cover Story</option>
        <option value="listing">Listing</option>
        <option value="profile">Profile</option>
    </select>
    <div class="form-error">{{ $errors->first('type') }}</div>
</div>
<div class="form-wrapper">
    <label>Select Status</label>
    <label class="radio-container">Unpublished
        <input type="radio" name="published" class="form-radio" value="0"@if(old('published',$profile->published)=="0") checked @endif>
        <span class="radio-checkmark"></span>
    </label>
    <label class="radio-container">Published
        <input type="radio" name="published" class="form-radio" value="1"@if(old('published',$profile->published)=="1") checked @endif>
        <span class="radio-checkmark"></span>
    </label>
    <div class="form-error">{{ $errors->first('published') }}</div>
</div>