<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{assets("img/icon.png")}}" type="image/png">
    
    <?= $head ?>

    <link rel="stylesheet" href="{{assets("assets/css/styles.css")}}">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>

    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title">Aguarde, carregando...</p>
        </div>
    </div>
    
    <div class="ajax_response"></div>

    @yield('content')

    <script src="{{assets("assets/js/jquery.min.js")}}"></script>
    <script src="{{assets("assets/js/jquery.form.js")}}"></script>
    <script src="{{assets("assets/js/jquery-ui.js")}}"></script>

    <script src="{{assets("assets/js/scripts.js")}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script src="{{assets("/assets/js/scripts.css")}}"></script>
</body>
</html>