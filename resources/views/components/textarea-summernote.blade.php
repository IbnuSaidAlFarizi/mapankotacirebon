
@props(['value','name'] )
<textarea required name="{{ $name }}" rows="4" class="summernote">{{ !empty($value) ? $value : '' }}</textarea>
