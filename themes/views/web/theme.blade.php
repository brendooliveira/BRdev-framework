<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $head ?>
    <link rel="stylesheet" href="{{assets("/assets/css/styles.css")}}">
</head>
<body class="bg-dark">
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script src="{{assets("/assets/js/scripts.css")}}"></script>
</body>
</html>