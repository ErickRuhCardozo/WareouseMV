<a {{ $attributes->merge(['class' => 'text-decoration-none']) }} href="{{ $href }}" title="{{ $tooltip }}">
  <i class="bi bi-{{ $icon }} @if ($hasText) me-2 @endif"></i>
  <span>{{ $text }}</span>
</a>

