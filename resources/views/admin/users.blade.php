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
                <a href="">Dashboard</a>
                <a href="">Utilisateurs</a>
                <a href="">Categories</a>
                <a href="">Livres</a>
                <a href="">Accessoires</a>
                <a href="">Communauté</a>

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

    <section class=" px-4 lg:px-20 py-9 m-auto h-[90vh] w-3/5">
        <div class="border-2 border-amber-400 h-full flex rounded-3xl flex-col">
            <div class="flex justify-center w-full pt-4 pb-4 ">
                <h2 class="font-semibold font-[inter] text-4xl text-amber-400">
                    Users
                </h2>
            </div>
            <hr class="mx-auto border-2 border-amber-400 w-4/5">
            <div class="grid grid-cols-4 p-10 gap-4">


                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>

                {{-- ------------------------------------ TO DELETE LATER----------------------------------------- --}}

                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
                    </div>
                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">

                        <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                    fill="#fbbf24"></path>
                                <path
                                    d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                    fill="#fbbf24"></path>
                            </g>
                        </svg>
                        <div class="text-white text-xl ">
                            User 1
                        </div>
                    </div>
                    <div class="flex w-full justify-end pr-4 pt-2 ">
                        <a href="" class="hover:">
                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                        fill="#cbd5e1"></path>
                                </g>
                            </svg> </a>
                        <a href="">
                        </a>
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
