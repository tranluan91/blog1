<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ URL::asset('blog/img/fav.png') }}">
    <meta name="author" content="codepixer">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} - {{ config('app.subtitle') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500|Rubik:500" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('blog/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('blog/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('blog/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('blog/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('blog/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('blog/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('blog/css/main.css') }}">
</head>

<body>
    @include('layout.search')
    @include('layout.header')
    @include('layout.banner')
    @yield('content')
    @include('layout.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src=" {{ URL::asset('blog/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
     crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="{{ URL::asset('blog/js/easing.min.js') }}"></script>
    <script src="{{ URL::asset('blog/js/hoverIntent.js') }}"></script>
    <script src="{{ URL::asset('blog/js/superfish.min.js') }}"></script>
    <script src="{{ URL::asset('blog/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ URL::asset('blog/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('blog/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('blog/js/jquery.tabs.min.js') }}"></script>
    <script src="{{ URL::asset('blog/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('blog/js/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('blog/js/mail-script.js') }}"></script>
    <script src="{{ URL::asset('blog/js/main.js') }}"></script>
    @yield('javascript')
    <script>
        function reply(id){
            document.getElementById("valueReply").value = id;
            document.getElementById("contentCommit").focus();
        }
    </script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
</body>

</html>


