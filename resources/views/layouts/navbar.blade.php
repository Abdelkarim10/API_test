<!-- resources/views/navbar.blade.php -->
<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <nav class="navbar navbar-expand fixed-top" >
        <a class="navbar-brand " href="/dashboard"><img src="{{ asset('images/BOBthebuilder.jpg') }}" class="logo" alt="Your Logo"> </a>
       

        {{-- @if (Auth::check()) --}}

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
               <ul class="navbar-nav">
                    <li class="nav-item border-right border-left pr-3">
                        <a class="nav-link" href="/home/tables">Tables</a> 
                    </li>
                    <li class="nav-item border-right pr-3">
                        <a class="nav-link margin"  href="/home/form">Form</a>
                    </li> 
                    <li class="nav-item border-right pr-3">
                        <a class="nav-link margin"  href="">Another page</a>
                    </li>
                </ul>          
        </div>
        
        {{-- @endif --}}

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    
                    {{-- @if (Auth::check()) --}}
                        <!-- User is authenticated (logged in) -->
                        {{-- <form method="POST" action="{{ route('logout') }}"> --}}
                            @csrf
                            <button class="nav-link custom-logout"  type="submit"> Logout</button>
                            
                        </form>
                    {{-- @else --}}
                        <!-- User is not authenticated (guest) -->
                        {{-- <a class="nav-link" href="{{ route('login') }}">Login</a> --}}
                   
                    
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="{{ route('register') }}">Register</a> --}}
                </li>
                {{-- @endif --}}
            </ul>
        </div>
    </nav> 

