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

    <style>
        /* Background video area */
        .global-bg-video {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            overflow: hidden;
            z-index: -2;
        }

        .global-bg-video video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .bg-overlay {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.3);
            z-index: -1;
            backdrop-filter: blur(2px);
        }

        /* Navbar custom */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #fff !important;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: #ffd700 !important;
        }

        footer {
            background: rgba(0,0,0,0.5);
            color: #fff;
            text-align: center;
            padding: 12px 0;
            backdrop-filter: blur(5px);
        }

        main {
            padding-top: 80px;
        }

        body {
            opacity: 0;
            transition: opacity .45s ease-in-out;
        }

        body.fade-in {
            opacity: 1;
        }

        .nav-link {
    color: #ffffffd9 !important;
    padding: 10px 18px;
    position: relative;
    font-size: 16px;
    font-weight: 500;
    transition: all .0s ease-in-out;   /* dari .35s → .15s */
}

.nav-link::after {
    transition: all .0s ease-in-out;   /* dari .35s → .15s */
}


        .nav-link:hover {
            color: #fff !important;
            transform: translateY(-1px);
        }

        .nav-link:hover::after {
            width: 40%;
        }

        .active-nav {
            color: #fff !important;
            font-weight: 600;
            transform: translateY(-2px);
        }

        .active-nav::after {
            width: 55%;
            background: #ffffff;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

   
    <div class="global-bg-video">
        <video autoplay muted loop playsinline>
            <source src="https://v1.pinimg.com/videos/mc/720p/d8/2c/e7/d82ce7fbb0b2c37d642162fed355dab5.mp4" type="video/mp4">
        </video>
        <div class="bg-overlay"></div>
    </div>

   
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm"
         style="backdrop-filter: blur(8px); background: rgba(0,0,0,0.35);">

        <div class="container">

            <a class="navbar-brand fw-bold text-white" href="{{ route('home') }}">
                App Pegawai
            </a>

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active-nav' : '' }}" 
                       href="{{ route('home') }}">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('departments*') ? 'active-nav' : '' }}" 
                       href="{{ route('departments.index') }}">Departemen</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('positions*') ? 'active-nav' : '' }}" 
                       href="{{ route('positions.index') }}">Jabatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('employees*') ? 'active-nav' : '' }}" 
                       href="{{ route('employees.index') }}">Pegawai</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('attendance*') ? 'active-nav' : '' }}" 
                       href="{{ route('attendance.index') }}">Absensi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('salaries*') ? 'active-nav' : '' }}" 
                       href="{{ route('salaries.index') }}">Gaji</a>
                </li>
                <li class="nav-item">
    <a class="nav-link {{ request()->is('leave*') ? 'active-nav' : '' }}" 
       href="{{ route('leave.index') }}">
        Cuti
    </a>
</li>


            </ul>

        </div>
    </nav>

 
    <main class="flex-grow-1">
        @yield('content')
    </main>

    
    <footer>
        © 2025 App Pegawai — by Tara
    </footer>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
    <script>
        // Saat halaman selesai dimuat → fade-in
        document.addEventListener("DOMContentLoaded", () => {
            document.body.classList.add("fade-in");
        });

        // Saat klik link → fade-out dulu baru pindah halaman
        document.querySelectorAll("a.nav-link").forEach(link => {
            link.addEventListener("click", function(e) {
                e.preventDefault();
                const href = this.getAttribute("href");

                document.body.style.opacity = "0";

                setTimeout(() => {
                    window.location.href = href;
                }, 300); // durasi fade-out
            });
        });
    </script>

</body>
</html>
