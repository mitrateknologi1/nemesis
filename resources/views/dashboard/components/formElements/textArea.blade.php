<label for="TextInput" class="form-label">{{ $label }} {!! $wajib ?? '' !!}</label>
<textarea id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" class="form-control {{ $class ?? '' }}"
    value="{{ $value ?? '' }}" {{ $attribute ?? '' }} placeholder="{{ $placeholder ?? '' }}" autocomplete="off"
    data-label="{{ $label }}"></textarea>
<span class="text-danger error-text {{ $name }}-error"></span>
