<div class="form-wrapper">
    <label for="parent">Select Parent Category</label>
    <select name="parent" value="{{ old('parent') }}" class="form-select">
        <option selected disabled="">Select Category</option>
        <option value="industry">Industry</option>
        <option value="platform">Platform</option>
        <option value="technology">Technology</option>
        <option value="slush">Slush</option>
        <option value="others">Others</option>
    </select>
    <div class="form-error">{{ $errors->first('parent') }}</div>
    <label for="title">URL</label>
    <input type="text" name="url" value="{{ old('url') ?? $category->url }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('url') }}</div>
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $category->title }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('title') }}</div>
    <label for="title">Meta Description</label>
    <input type="text" name="meta_description" value="{{ old('meta_description') ?? $category->meta_description }}"
        class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('meta_description') }}</div>
    <label for="title">Meta Keywords</label>
    <input type="text" name="meta_keywords" value="{{ old('meta_keywords') ?? $category->meta_keywords }}"
        class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('meta_keywords') }}</div>
</div>
