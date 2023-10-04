<div class="form-wrapper">
    <label for="title">URL</label>
    <input type="text" name="url" value="{{ old('url') ?? $category->url }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('url') }}</div>
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $category->title }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('title') }}</div>
    <label for="title">Meta Description</label>
    <input type="text" name="meta_description" value="{{ old('meta_description') ?? $category->meta_description }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('meta_description') }}</div>
    <label for="title">Meta Keywords</label>
    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') ?? $category->meta_keywords }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('meta_keywords') }}</div>
</div>
