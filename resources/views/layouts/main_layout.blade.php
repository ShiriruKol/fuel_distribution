<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <script src="https://kit.fontawesome.com/397fb4371f.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ URL::asset('favicon.png') }}" type="image/x-icon"/>
    <script src="https://flowbite.com/docs/flowbite.min.js"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
<header role="banner" class="bg-white shadow">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <h1 class="text-3xl font-bold tracking-tight text-white-900">
                <a href="{{route('home.index')}}">
                    <i class="fa-solid fa-house" style="color: #ffffff"></i>
                    <span style="color: #ffffff">Главная</span>
                </a>
            </h1>
            <button data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @can('viewAny', auth()->user())
                        <li>
                            <a href="{{ route('type_fuel.user') }}"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Список заявок на топливо
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('type_fuel.create_employee') }}"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Запрос
                                на топливо</a>
                        </li>
                    @endcan
                    @can('view', auth()->user())
                        <li>
                            <a href="{{route('fuels.index')}}"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Распределение
                                топлива</a>
                        </li>
                        <li>
                            <a href="{{route('type_fuel.index')}}"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"><i class="fa-regular fa-bell" style="color: #ffffff;">
                                    {{auth()->user()->unreadNotifications->count()}}
                                </i></a>
                        </li>
                    @endcan
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li>
                                <a class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                                   href="{{route('logout')}}"
                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                            </li>
                        </form>
                    @else
                        <li>
                            <a href="{{ route('login') }}"
                               class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Войти</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

<main role="main">
    <div class="container mx-auto mt-5">
        @yield('content')
    </div>
</main>


<footer role="contentinfo" class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
          <a href="{{route('home.index')}}" class="hover:underline">Fuel Calculation</a>
    </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a target="_blank" href="https://github.com/ShiriruKol/" class="mr-4 hover:underline md:mr-6 ">
                    My GitHub account
                    <i class="fa-brands fa-github fa-beat" style="color: #ffffff;"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

</body>
</html>
