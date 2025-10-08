    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Aplikasi Pegawai')ent</title>
    </head>
    <body>
        <header>
            <h1>@yield('page-title', 'App Pegawai')</h1>
            <nav>
                <ul>
                    <li><a href="{{ url('/employee') }}">Employee</a></li>
                    <li><a href="{{ url('/employee') }}">Department</a></li>
                    <li><a href="{{ url('/employee') }}">Attendance</a></li>
                    <li><a href="{{ url('/employee') }}">Report</a></li>
                    <li><a href="{{ url('/employee') }}">Settings</a></li>
                </ul>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>&copy; {{ date('y') }} App Pegawai</p>
        </footer>
    </body>
    </html>