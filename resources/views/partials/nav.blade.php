<nav class="bg-gray-900 py-3 w-full shadow">
    <div class="container flex justify-between mx-auto">
        <a class="text-lg text-gray-100" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>


        <div class="flex">
            <ul class="flex ml-auto">
                @guest
                    <li class="ml-4">
                        <a class="text-gray-100" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="ml-4">
                            <a class="text-gray-100" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="ml-4">
                        <a class="text-gray-100" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @if (auth()->user()->isAdmin())
                        <li class="mr-2 text-gray-600 font-bold ml-4 pl-4 border-l-2 border-gray-300">
                            👮‍ ADMIN
                        </li>
                        <li class="ml-2">
                            <a class="text-gray-100" href="{{ route('quizzes.index') }}">{{ __('Quizzes') }}</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>