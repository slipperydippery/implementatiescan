<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">

</head>
<body id="app-layout">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name">
                <h1><a href="/">Quests</a></h1>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
        </ul>

        <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
                @if(!Auth::guest())
                    <li class="active">
                        <a href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                @endif
                <li class="has-dropdown">
                    <a href="#">Questionnaires</a>
                    <ul class="dropdown">
                    </ul>
                </li>
                @if(Auth::guest())  
                    <li class="has-dropdown">
                        <a href="#">Authentication</a>
                        <ul class="dropdown">
                                <li><a href="{{ url('/register') }}">Register</a></li>
                                <li><a href="{{ url('/login') }}">Login</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                @endif
                    </ul>
                </li>
            </ul>
        </section>
    </nav>


    @yield('content')

    @yield('additional-scripts')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script> 
</body>
</html>
