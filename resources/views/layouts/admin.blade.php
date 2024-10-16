<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets2/images/logo.png" type="image/x-icon">
    <title>Admin</title>

    @include('components.style')
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid">
        <div class="row">
            @include('components.admin.sidebar')
            <div class="col-lg-10">
                <main class="py-5 px-3">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    @include('components.script')
</body>

</html>
