<header>
    <nav class="flex justify-between md:justify-evenly items-center bg-yellow-900 h-16 px-4 lg:px-10">
        <div class="flex items-center gap-4">
            <img class="w-10 h-10" src="../img/booksyellow.png" />
            <div class="text-white text-xl font-normal handlee-regular">Lire et Éclairer</div>
        </div>
        {{-- <div class=""> --}}

        <!-- Burger menu -->
        <div class="block lg:hidden">
            <button id="burger-menu" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>
        <!-- End of Burger menu -->
        <div id="nav-links"
            class="hidden text-lg md:text-xl absolute end-4 top-12 md:relative flex md:flex-row md:top-0 flex-col lg:flex md:bg-yellow-900 bg-amber-400 p-3 md:mt-0 md:text-white md:gap-6 justfiy-center rounded-lg border-2 border-yellow-900 font-[inter] list-none">
            @guest
                <a href="{{ route('welcome') }}">Home</a>
                <hr class="mt-2 border-yellow-900">

                <a href="{{ route('accessoires') }}">Accessoires</a>
                <hr class="mt-2 border-yellow-900">
                <a href="{{ route('books') }}">Livres</a>
            @endguest
            @auth
                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <hr class="mt-2 border-yellow-900">

                    <a href="{{ route('admin.users') }}">Utilisateurs</a>
                    <hr class="mt-2 border-yellow-900">

                    <a href="{{ route('admin.categories') }}">Categories</a>
                    <hr class="mt-2 border-yellow-900">

                    <a href="{{ route('accessoires') }}">Accessoires</a>
                    <hr class="mt-2 border-yellow-900">

                    <a href="{{ route('books') }}">Livres</a>
                    {{-- <a href="{{route('dashboard')}}">Communauté</a>  --}}
                @else
                    <a href="{{ route('welcome') }}">Home</a>
                    <hr class="mt-2 border-yellow-900">

                    <a href="{{ route('accessoires') }}">Accessoires</a>
                    <hr class="mt-2 border-yellow-900">

                    <a href="{{ route('books') }}">Livres</a>
                    <hr class="mt-2 border-yellow-900">

                    <a href="{{ route('contact') }}">Contactez-nous</a>
                    {{-- <li>A propos</li> --}}
                    <li>
                        <button id="basket" class="relative hidden md:block">
                            <svg width='28px' fill="#ffffff" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M31.739 8.875c-0.186-0.264-0.489-0.422-0.812-0.422h-21.223l-1.607-5.54c-0.63-2.182-2.127-2.417-2.741-2.417h-4.284c-0.549 0-0.993 0.445-0.993 0.993s0.445 0.993 0.993 0.993h4.283c0.136 0 0.549 0 0.831 0.974l5.527 20.311c0.12 0.428 0.511 0.724 0.956 0.724h13.499c0.419 0 0.793-0.262 0.934-0.657l4.758-14.053c0.11-0.304 0.064-0.643-0.122-0.907zM25.47 22.506h-12.046l-3.161-12.066h19.253zM23.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5zM14.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5z">
                                    </path>
                                </g>
                            </svg>
                            <div class="hidden md:flex absolute top-0 left-6 h-5 w-5 bg-amber-400 rounded-full"></div>
                            <div
                                class="articlesCount hidden md:flex absolute top-0.5 left-7 text-xs text-yellow-900 font-bold">
                                {{ $numProductsInBasket }}</div>
                        </button>
                    </li>
                @endif
            @endauth
        </div>

        <div class="hidden lg:flex gap-4">
            @guest
                <a class="px-6 py-1.5 bg-yellow-900 rounded-full border-2 border-amber-300 text-white text-center text-lg font-bold font-['Cardo'] leading-normal tracking-tight"
                    href="{{ route('login') }}">
                    Login
                </a>
                <a href="{{ route('register') }}"
                    class="px-6 py-1.5 bg-amber-400 rounded-full text-yellow-900 text-center text-lg font-bold font-['Cardo'] leading-normal tracking-tight">
                    Register
                </a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="px-6 py-1.5 bg-yellow-900 rounded-full border-2 border-amber-300 text-white text-center text-lg font-bold font-['Cardo'] leading-normal tracking-tight">
                        Logout
                    </button>
                </form>
            @endauth
        </div>
    </nav>
</header>
<script>
    // Get the burger menu button and navigation links container
    const burgerMenuButton = document.getElementById('burger-menu');
    const navLinks = document.getElementById('nav-links');

    // Function to toggle the visibility of the navigation links
    function toggleNavLinks() {
        // Toggle the 'hidden' class on the navigation links container
        navLinks.classList.toggle('hidden');
    }

    // Add an event listener to the burger menu button
    burgerMenuButton.addEventListener('click', function() {
        toggleNavLinks();
    });
</script>
