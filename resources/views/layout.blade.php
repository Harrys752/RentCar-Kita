<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'RentCar Kita')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @livewireStyles
</head>
<body class="bg-light" style="font-family: 'Inter', sans-serif;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('cars.index') }}">
      <i class="bi bi-car-front-fill fs-4 me-2"></i>
      <span class="fw-bold">RentCar Kita</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cars.index') }}">Daftar Mobil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('cars.create') }}">Tambah Mobil</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-4">
  @yield('content')
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1080;">
  <div id="liveToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="polite" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="liveToastBody"></div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@livewireScripts

<script src="{{ asset('js/app.js') }}"></script>

@stack('scripts')
</body>
</html>
