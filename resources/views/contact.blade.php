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
                <li>Accueil</li>
                <li>Catalogues</li>
                <li>A propos</li>
                <li>Contact</li>
                <li>
                    <div class="relative hidden md:block">
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
                        <div class="hidden md:flex absolute top-0.5 left-7 text-xs text-yellow-900 font-bold">01</div>
                    </div>
                </li>
            </ul>
            {{-- </div> --}}
        </div>

        <div class="hidden lg:flex gap-4">
            <div
                class="px-6 py-1.5 bg-yellow-900 rounded-full border-2 border-amber-300 text-white text-center text-lg font-bold font-['Cardo'] leading-normal tracking-tight">
                Login
            </div>
            <div
                class="px-6 py-1.5 bg-amber-400 rounded-full text-yellow-900 text-center text-lg font-bold font-['Cardo'] leading-normal tracking-tight">
                Register
            </div>
        </div>
    </nav>
    <section class="newsletter  w-full h-[250px] flex justify-center items-center">
        <div class=" w-9/12 flex flex-col h-3/5 ">
            <div class="flex justify-center items-center flex-col gap-6">
                <h2 class=" text-white text-4xl font-semibold font-[cardo] ">Contactez-nous</h2>
                <hr class="border-2 border-amber-300 w-1/5">
                <p class="text-slate-300 text-lg w-3/6 text-center">There are many variations of passages of Lorem Ipsum
                    available, have suffered alteration in some form.</p>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="grid grid-cols-2 w-3/5 p-8 justify-center items-center m-auto gap-8 bg-white  h-[600px]">
            <div class="flex flex-col">
                <div class="flex flex-col gap-4">
                    <h2 class=" text-yellow-900 text-4xl font-semibold font-[cardo] ">Restez en contact</h2>
                    <hr class="border-2 border-amber-300 w-1/5">
                    <p class="text-slate-500 text-lg w-10/12 ">There are many variations of passages of Lorem
                        Ipsum
                        available, but the majority have suffered alteration in some form, by injected humour, or
                        randomised
                        words which don't look even slightly believable.</p>

                </div>
                <div class="gap-6 mb-4 flex flex-col pt-8">
                    <div class="flex">
                        <div class="bg-yellow-900 p-4">
                            <svg width='28px' fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M31.739 8.875c-0.186-0.264-0.489-0.422-0.812-0.422h-21.223l-1.607-5.54c-0.63-2.182-2.127-2.417-2.741-2.417h-4.284c-0.549 0-0.993 0.445-0.993 0.993s0.445 0.993 0.993 0.993h4.283c0.136 0 0.549 0 0.831 0.974l5.527 20.311c0.12 0.428 0.511 0.724 0.956 0.724h13.499c0.419 0 0.793-0.262 0.934-0.657l4.758-14.053c0.11-0.304 0.064-0.643-0.122-0.907zM25.47 22.506h-12.046l-3.161-12.066h19.253zM23.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5zM14.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class=" text-yellow-900 text-xl font-normal font-['Inter'] ml-4"> Visitez notre page
                                instagram: </span>
                            <span href="" class=" text-slate-500 text-xl font-normal font-['Inter'] ml-4">No:
                                09a, Downtown,
                                San Dieago, USA..</span>
                        </div>
                    </div>
                    <div class="flex">

                        <div class="bg-yellow-900 p-4">
                            <svg width='28px' fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M31.739 8.875c-0.186-0.264-0.489-0.422-0.812-0.422h-21.223l-1.607-5.54c-0.63-2.182-2.127-2.417-2.741-2.417h-4.284c-0.549 0-0.993 0.445-0.993 0.993s0.445 0.993 0.993 0.993h4.283c0.136 0 0.549 0 0.831 0.974l5.527 20.311c0.12 0.428 0.511 0.724 0.956 0.724h13.499c0.419 0 0.793-0.262 0.934-0.657l4.758-14.053c0.11-0.304 0.064-0.643-0.122-0.907zM25.47 22.506h-12.046l-3.161-12.066h19.253zM23.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5zM14.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class=" text-yellow-900 text-xl font-normal font-['Inter'] ml-4"> Envoyez-nous un
                                email
                                :</span>
                            <span href=""
                                class=" text-slate-500 text-xl font-normal font-['Inter'] ml-4 w-60">support@pages.com</span>
                        </div>
                    </div>
                    <div class="flex">

                        <div class="bg-yellow-900 p-4">
                            <svg width='28px' fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M31.739 8.875c-0.186-0.264-0.489-0.422-0.812-0.422h-21.223l-1.607-5.54c-0.63-2.182-2.127-2.417-2.741-2.417h-4.284c-0.549 0-0.993 0.445-0.993 0.993s0.445 0.993 0.993 0.993h4.283c0.136 0 0.549 0 0.831 0.974l5.527 20.311c0.12 0.428 0.511 0.724 0.956 0.724h13.499c0.419 0 0.793-0.262 0.934-0.657l4.758-14.053c0.11-0.304 0.064-0.643-0.122-0.907zM25.47 22.506h-12.046l-3.161-12.066h19.253zM23.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5zM14.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class=" text-yellow-900 text-xl font-normal font-['Inter'] ml-4">Appellez-nous :
                            </span>
                            <span href=""
                                class=" text-slate-500 text-xl font-normal font-['Inter'] ml-4 w-60">Call:
                                1-800-123-9999</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-start h-full gap-4 pt-8">
                <div class="flex gap-2">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg width='25px' viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                        stroke="#FFCA42" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <input type="name" name="" id=""
                            class="ml-2 border-2 border-gray-200 p-4 px-9 text-base font-normal " placeholder="Name">
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg width='25px' viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z"
                                        fill="#FFCA42"></path>
                                </g>
                            </svg>
                        </div>
                        <input type="email" name="" id=""
                            class="ml-2 border-2 border-gray-200 p-4 px-9 text-base font-normal" placeholder="Email">
                    </div>

                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none ">
                        <svg width='25px' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.75 5.25L3 6V18L3.75 18.75H20.25L21 18V6L20.25 5.25H3.75ZM4.5 7.6955V17.25H19.5V7.69525L11.9999 14.5136L4.5 7.6955ZM18.3099 6.75H5.68986L11.9999 12.4864L18.3099 6.75Z"
                                    fill="#FFCA42"></path>
                            </g>
                        </svg>
                    </div>
                    <input type="Phone" class="ml-2 border-2 border-gray-200 p-4 w-full px-10" placeholder="Phone">

                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none h-fit mt-3 ">
                        <svg width='20px' viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#FFCA42" fill-rule="evenodd" d="M15.747 2.97a.864.864 0 011.177 1.265l-7.904 7.37-1.516.194.653-1.785 7.59-7.044zm2.639-1.366a2.864 2.864 0 00-4-.1L6.62 8.71a1 1 0 00-.26.39l-1.3 3.556a1 1 0 001.067 1.335l3.467-.445a1 1 0 00.555-.26l8.139-7.59a2.864 2.864 0 00.098-4.093zM3.1 3.007c0-.001 0-.003.002-.005A.013.013 0 013.106 3H8a1 1 0 100-2H3.108a2.009 2.009 0 00-2 2.19C1.256 4.814 1.5 7.848 1.5 10c0 2.153-.245 5.187-.391 6.81A2.009 2.009 0 003.108 19H17c1.103 0 2-.892 2-1.999V12a1 1 0 10-2 0v5H3.106l-.003-.002a.012.012 0 01-.002-.005v-.004c.146-1.62.399-4.735.399-6.989 0-2.254-.253-5.37-.4-6.99v-.003zM17 17c-.001 0 0 0 0 0zm0 0z"></path> </g></svg>
                    </div>
                    <textarea rows="7" name="message" id="message" placeholder="Message"
                        class="ml-2 w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-10 text-base font-normal focus:border-[#6A64F1] focus:shadow-md"></textarea>

                </div>
                <div>
                    <input type="checkbox" id="demoCheckbox" name="checkbox" value="1"
                        class="border-2 border-gray-200 p-8">
                    <span class="font-normal text-gray-400">S’abonnez à notre newsletter, restez à jour !</span>
                </div>
                <button class="bg-amber-300 text-yellow-900 p-4 font-semibold font-[cardo]">Envoyer message</button>
            </div>
        </div>
    </section>
    <footer>
        <div class="flex justify-evenly justify-center items-start h-[350px] pt-8">
            <div class="flex flex-col">

                <div class="flex items-center gap-4">
                    <img class="w-10 h-10" src="../img/booksyellow.png" />
                    <div class="text-white text-2xl font-normal handlee-regular">Lire et Éclairer</div>
                </div>
                <div class="flex gap-4 pt-10">
                    <div class="border-2 border-amber-300 p-4">
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
                    </div>
                    <div class="border-2 border-amber-300 p-4">
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
                    </div>
                    <div class="border-2 border-amber-300 p-4">
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
                    </div>
                    <div class="border-2 border-amber-300 p-4">
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
                    </div>

                </div>
            </div>
            <div>
                <div class="text-2xl text-white font-['Inter']">Explorer</div>
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-1 pt-6">
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <a href="" class=" text-slate-300 text-xl font-normal font-['Inter'] ml-4">Accueil</a>
                    </div>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <a href="" class=" text-slate-300 text-xl font-normal font-['Inter'] ml-4">A propos</a>
                    </div>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <a href="" class=" text-slate-300 text-xl font-normal font-['Inter'] ml-4">Services</a>
                    </div>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <a href=""
                            class=" text-slate-300 text-xl font-normal font-['Inter'] ml-4">Catalogues</a>
                    </div>
                    <div class="flex items-center gap-1">
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <div class="w-2 h-2 border-2 border-amber-400 rounded-full "></div>
                        <a href=""
                            class=" text-slate-300 text-xl font-normal font-['Inter'] ml-4">Contactez-nous</a>
                    </div>
                </div>
            </div>
            <div>

                <div class="text-2xl text-white font-['Inter']">Restez en contact !</div>
                <div class="flex flex-col gap-3">
                    <div class="flex items-start gap-1 pt-6">
                        <span class=" text-white text-xl font-normal font-['Inter'] ml-4"> Adresse : </span>
                        <span href="" class=" text-slate-300 text-xl font-normal font-['Inter'] ml-4 w-60">24A
                            Kingston St, Los Vegas NC 28202, USA.</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class=" text-white text-xl font-normal font-['Inter'] ml-4"> Email : </span>

                        <span href=""
                            class=" text-slate-300 text-xl font-normal font-['Inter'] ml-4">support@books.com</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class=" text-white text-xl font-normal font-['Inter'] ml-4"> Tel : </span>

                        <span href="" class=" text-slate-300 text-xl font-normal font-['Inter'] ml-4">(+22) 123
                            - 4567 - 900</span>
                    </div>

                </div>
            </div>

        </div>
        <div class="flex flex-col justify-center items-center mx-auto">
            <hr class="w-full border-slate-400">
            <span class="text-slate-300 text-lg font-normal font-['Inter'] p-4">© All rigths reserved</span>
        </div>

    </footer>

    <script>
        document.getElementById('burger-menu').addEventListener('click', function() {
            document.getElementById('nav-links').classList.toggle('hidden');
        });
    </script>
</body>

</html>
