<div class="input-group">
  <div class="form-floating">
    <input type="password" class="form-control @if ($hasError) is-invalid @endif" name="password" id="passwordField" placeholder="{{ $label }}">
    <label for="passwordField">
        <i class="bi bi-key-fill me-1"></i>
        <span>{{ $label }}</span>
    </label>
    
  </div>
  <i class="input-group-text bi bi-eye-fill p-3 rounded-end" id="passwordToggler" style="cursor: pointer;" onclick="togglePasswordVisibility()"></i>
  @if ($hasError)
    <span class="invalid-feedback d-inline">{{ $error }}</span>
  @endif
</div>

@pushOnce('scripts')
    <script src="{{ asset('assets/password-toggler.js') }}"></script>
@endPushOnce
