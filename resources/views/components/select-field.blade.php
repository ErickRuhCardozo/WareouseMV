<div class="form-floating">
  <select class="form-select @if ($hasError) is-invalid @endif" id="{{ $id }}" name="{{ $name }}">
    <option class="d-none">{{ $placeholder }}</option>
    @foreach ($options as $option)
      <option value="{{ $option['value'] }}" @if ($option['label'] == $selectedLabel) selected @endif>{{ $option['label'] }}</option>
    @endforeach
  </select>
  <label for="{{ $id }}">
    <i class="bi bi-{{ $icon }} me-2"></i>
    <span>{{ $label }}</span>
  </label>
  @if ($hasError)
    <span class="invalid-feedback">{{ $error }}</span>
  @endif
</div>