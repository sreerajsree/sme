<div class="form-wrapper">
    <label for="title">Slug</label>
    <input type="text" name="url" value="{{ old('url') ?? $tag->url }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('url') }}</div>
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $tag->title }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('title') }}</div>
</div>
