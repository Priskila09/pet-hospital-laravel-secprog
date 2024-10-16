<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets2/images/logo.png" type="image/x-icon">
    <title>{{ $title }}</title>

    {{-- <link rel="stylesheet" href="{{ url('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets2/css/style.css') }}"> --}}


    @include('components.style')
</head>

<body>
    @include('components.home.navbar')

    @yield('content')

    @include('components.script')
</body>

</html>
