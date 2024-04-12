<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
    <title>Books</title>
</head>

<body class="bg-yellow-900">
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
        <div id="nav-links" class="hidden lg:flex md:bg-yellow-900 bg-black p-3 md:mt-0 mt-36 ">
            <ul class="lg:flex gap-6 text-white list-none ">
                <a href="{{route('admin.dashboard')}}">Dashboard</a>
                <a href="{{route('admin.users')}}">Utilisateurs</a>
                <a href="{{route('admin.categories')}}">Categories</a>
                {{-- <a href="{{route('dashboard')}}">Livres</a>
                <a href="{{route('dashboard')}}">Accessoires</a>
                <a href="{{route('dashboard')}}">Communauté</a> --}}

            </ul>
            {{-- </div> --}}
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

    <section class=" px-4 lg:px-20 py-9 m-auto h-[80vh] w-3/5">
        <div class="border-2 border-amber-400 h-full flex rounded-3xl flex-col">
            <div class="flex justify-center w-full pt-4 pb-4 ">
                <h2 class="font-semibold font-[inter] text-4xl text-amber-400">
                    Statistiques
                </h2>
            </div>
            <hr class="mx-auto border-2 border-amber-400 w-4/5">
            <div class="grid grid-cols-2 p-10 gap-4 overflow-auto">


                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        
                        <div class="text-white text-xl ">
                            stats 1
                        </div>
                    </div>
                   
                </div>

                {{-- ------------------------------------ TO DELETE LATER----------------------------------------- --}}

                
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        
                        <div class="text-white text-xl ">
                            stats 1
                        </div>
                    </div>
                   
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        
                        <div class="text-white text-xl ">
                            stats 1
                        </div>
                    </div>
                   
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        
                        <div class="text-white text-xl ">
                            stats 1
                        </div>
                    </div>
                   
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        
                        <div class="text-white text-xl ">
                            stats 1
                        </div>
                    </div>
                   
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        
                        <div class="text-white text-xl ">
                            stats 1
                        </div>
                    </div>
                   
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        
                        <div class="text-white text-xl ">
                            stats 1
                        </div>
                    </div>
                   
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        
                        <div class="text-white text-xl ">
                            stats 1
                        </div>
                    </div>
                   
                </div>

                {{-- ------------------------------------ TO DELETE LATER----------------------------------------- --}}

            </div>
        </div>
    </section>


    <script>
        document.getElementById('burger-menu').addEventListener('click', function() {
            document.getElementById('nav-links').classList.toggle('hidden');
        });
    </script>
</body>

</html>
