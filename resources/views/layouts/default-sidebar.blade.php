<!doctype html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body style="background-color: #f1f4f7;">
    <header>
        @include('includes.navbar')
    </header>
    <div>
        @include('includes.sidebar')
        @yield('content')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.0.1/jquery.payment.min.js'></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js'></script>
    </div>
    <footer>
        @include('includes.footer')
    </footer>

</body>

</html>
