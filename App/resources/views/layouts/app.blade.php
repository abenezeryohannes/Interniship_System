<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="c-token" content="{!! csrf_token() !!}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
           
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    @auth
                      
                      
                    @if(Auth::user()->roles->pluck('name')->contains('Student') )
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Home') }} </span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student_request') }}">{{ __('Requests') }} </span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('show_organization') }}">{{ __('Organizations') }} </span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Chat') }}</a>
                        </li>
                    @endif

                    @if(Auth::user()->roles->pluck('name')->contains('University') )


                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Home') }} </span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('unversity_departments') }}">{{ __('Department') }} </span></a>
                        </li>

                    @endif

                    @if(Auth::user()->roles->pluck('name')->contains('Organization') )

                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('org_home') }}">{{ __('Home') }} </span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('org_requests') }}">{{ __('Requests') }} </span></a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('org_advisors') }}">{{ __('Advisors') }} </span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('org_students') }}">{{ __('Students') }} </span></a>
                        </li>

                    @endif

                    @if(Auth::user()->roles->pluck('name')->contains('Advisor') )

                    @endif
            

                    @endif


                    </ul>
                    {{--  --}}
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
