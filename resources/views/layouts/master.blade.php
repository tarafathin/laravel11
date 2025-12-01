<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'App Pegawai')</title>

  {{-- Bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- Bootstrap Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="d-flex flex-column min-vh-100">

  {{-- Background Video Global --}}
  <div class="global-bg-video">
    <video autoplay muted loop playsinline>
      <source src="https://v1.pinimg.com/videos/mc/720p/d8/2c/e7/d82ce7fbb0b2c37d642162fed355dab5.mp4" type="video/mp4">
      Browser Anda tidak mendukung video.
    </video>
    <div class="bg-overlay"></div>
  </div>

  {{-- Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">App Pegawai</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Beranda</a></li>
          <li class="nav-item"><a href="{{ route('departments.index') }}" class="nav-link">Departemen</a></li>
          <li class="nav-item"><a href="{{ route('positions.index') }}" class="nav-link">Jabatan</a></li>
          <li class="nav-item"><a href="{{ route('employees.index') }}" class="nav-link">Pegawai</a></li>
          <li class="nav-item"><a href="{{ route('attendance.index') }}" class="nav-link">Absensi</a></li>
          <li class="nav-item"><a href="{{ route('salaries.index') }}" class="nav-link">Gaji</a></li>
        </ul>
      </div>
    </div>
  </nav>

  {{-- Main Content --}}
  <main class="flex-grow-1 position-relative">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="mt-auto">
    <p>© 22025 App Pegawai | by taraa

</p>
  </footer>

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>