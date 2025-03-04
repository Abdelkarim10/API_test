<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>IIS test</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">


        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

       
    </head>
    <body>
      
        @include('layouts.navbar')

 
    
    

        <div class="container mt-5" >
           
            @yield('content')
        </div>
        



     <!-- Bootstrap JS (Assuming you have Bootstrap included) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        
    </body>
</html>
