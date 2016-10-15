<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="description" content="A simple way to keep track of your monthly expenses">
        <meta name="keywords" content="income,expenses,money,overview,amount,net,moneymath">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MoneyMath</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

        <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slicknav.min.css') }}" rel="stylesheet">

        @yield('styles')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        @include('partials.navigation')

        <div class="app-entry">
            @yield('content')
        </div>

        @yield('scripts')

        <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.navBar').slicknav({label: ''});
            });
        </script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-85366072-1', 'auto');
            ga('send', 'pageview');
        </script>
        <footer class="home-footer">
            <p>Created by Gareth Nicholson</p>
            <p>{{ date('Y') }}</p>
        </footer>
    </body>
</html>