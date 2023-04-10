<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DML Melhor Viver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
      :root[data-bs-theme=dark] {
        --bs-body-color: var(--bs-white);
      }
    </style>
    @stack('styles')
  </head>
  <body>
   <header class="position-sticky bg-primary bg-gradient text-white d-flex align-items-center justify-content-between mb-2 px-2 py-1">
      @if ($showBackButton)
        <x-icon-link
          class="fs-4 text-white"
          href="{{ $backTo }}"
          icon="arrow-left"
          tooltip="Voltar" />
      @else
        {{ $leftHeaderSection }}
      @endif
     
      <h4 class="mx-auto m-0 text-truncate px-2">{{ $title }}</h4>

      {{ $rightHeaderSection }}
   </header>
    <div class="container">
      {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    @stack('scripts')
  </body>
</html>

