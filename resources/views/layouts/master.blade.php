<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A simple way to keep track of your monthly expenses">
        <meta name="keywords" content="income,expenses,money,overview,amount,net,moneymath">

        <title>MoneyMath</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/app.css" rel="stylesheet">
        <link href="css/slicknav.min.css" rel="stylesheet">

        @yield('styles')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        @include('partials.navigation')

        <div class="container">
            @yield('content')
        </div>

        @yield('scripts')

        <script src="js/jquery.slicknav.min.js"></script>
    </body>
</html>