<!-- useguide: @yield('template.view/main') -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    <div class="header">
        <h2>Ini adalah Header blade</h2>
    </div>
    <section>
        @yield('content')
    </section>
    <div class="footer">
        <h2>Ini adalah Footer Blade</h2>
    </div>
</body>

</html>