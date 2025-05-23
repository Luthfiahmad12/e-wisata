<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        {{ $title ?? 'admin' }}
    </title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.min.css">

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-X6069m1NoT+wlVHgkxeWv/W7YzlrJeUhobSzk4J09CWxlplhUzJbiJVvS9mX1GGVYf5LA3N9yQW5Tgnu9P4C7Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
=======
    {{-- Tagify CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">

>>>>>>> 1c1117dc1932bd01c86c1bd638a7746d97e1d1b9
    @vite('resources/js/app.js')
</head>

<body class="app sidebar-mini">
    @include('partials.admin_navbar')

    @include('partials.admin_sidebar')

    <main class="app-content">
        @yield('content-title')
        @yield('content')
    </main>

    <script src="{{ asset('admin/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/main.js') }}"></script>

    {{-- datatable --}}
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.min.js"></script>

    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<<<<<<< HEAD
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js" integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
=======

    {{-- Tagify JS --}}
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

>>>>>>> 1c1117dc1932bd01c86c1bd638a7746d97e1d1b9
    @stack('scripts')
</body>

</html>
