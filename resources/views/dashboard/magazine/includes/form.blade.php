<div class="form-wrapper">
    <label for="name">Magazine Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $mag->name }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('name') }}</div>
</div>
<div class="form-wrapper">
    <label for="issue">Issue</label>
    <select name="issue" value="{{ old('issue') }}" class="form-select">
        <option value="usa">USA</option>
    </select>
    <div class="form-error">{{ $errors->first('issue') }}</div>
</div>
<div class="form-wrapper">
    <label for="type">Type</label>
    <select name="type" value="{{ old('type') }}" class="form-select">
        <option value="monthly">Monthly</option>
        <option value="yearly">Yearly</option>
    </select>
    <div class="form-error">{{ $errors->first('type') }}</div>
</div>
<div class="form-wrapper">
    <label for="year">Year</label>
    <input type="text" name="year" value="{{ old('year') ?? $mag->year }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('year') }}</div>
</div>
<div class="form-wrapper">
    <label for="url">URL</label>
    <input type="text" name="url" value="{{ old('url') ?? $mag->url }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('url') }}</div>
</div>
<div class="form-wrapper">
    <label for="title">Meta Title</label>
    <input type="text" name="title" value="{{ old('title') ?? $mag->url }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('title') }}</div>
</div>
<div class="form-wrapper">
    <label for="description">Meta Description</label>
    <textarea name="description" required>{{ old('description') ?? $mag->description }}</textarea>
    <div class="form-error">{{ $errors->first('description') }}</div>
</div>
<div class="form-wrapper">
    <label for="keywords">Meta Keywords</label>
    <textarea name="keywords">{{ old('keywords') ?? $mag->keywords }}</textarea>
    <div class="form-error">{{ $errors->first('keywords') }}</div>
</div>
<div class="form-wrapper">
    <label for="date">Date</label>
    <input type="date" name="date" value="{{ old('date') ?? $mag->date }}" class="form-input" autofocus>
    <div class="form-error">{{ $errors->first('date') }}</div>
</div>
<div class="form-wrapper">
    <label for="image">Cover Image</label>
    <input type="file" name="image" value="" class="form-image">
    <div class="form-error">{{ $errors->first('image') }}</div>
</div>
@if ($mag->image)
<div class="form-wrapper">
    <div class="post-image">	
        <img src="{{ Storage::url('magazines/'.$mag->year.'/'.$mag->issue.'/'.$mag->type.'/'.$mag->image) }}"  alt="{{ $mag->title }}">
    </div>
</div>
@endif
<div class="form-wrapper">
    <label>Select Status</label>
    <label class="radio-container">Unpublished
        <input type="radio" name="published" class="form-radio" value="0"@if(old('published',$mag->published)=="0") checked @endif>
        <span class="radio-checkmark"></span>
    </label>
    <label class="radio-container">Published
        <input type="radio" name="published" class="form-radio" value="1"@if(old('published',$mag->published)=="1") checked @endif>
        <span class="radio-checkmark"></span>
    </label>
    <div class="form-error">{{ $errors->first('published') }}</div>
</div>