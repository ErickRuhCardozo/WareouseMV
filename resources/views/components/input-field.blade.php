<div {{ $attributes->merge(['class' => 'form-floating']) }}>
  <input type="{{ $type }}" class="form-control @if ($hasError) is-invalid @endif" name="{{ $name }}" placeholder="{{ $label }}" value="{{ $value }}" @if ($hasSuggestions) list="{{ $id }}Datalist" @endif @if ($readonly) readonly @endif @if ($autofocus) autofocus @endif>
  <label for="{{ $id }}">
    <i class="bi bi-{{ $icon }} me-1"></i>
    <span>{{ $label }}</span>
  </label>
  @if ($hasError)
    <span class="invalid-feedback">{{ $error }}</span>
  @endif
</div>
@if ($hasSuggestions)
  <datalist id="{{ $id }}Datalist">
    @foreach ($suggestions as $suggestion)
      <option value="{{ $suggestion }}" />
    @endforeach
  </datalist>
@endif
