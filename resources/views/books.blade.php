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
                <h2 class=" text-white text-4xl font-semibold font-[cardo] ">Notre Magasin de livres</h2>
                <hr class="border-2 border-amber-300 w-1/5">
                <p class="text-slate-300 text-lg w-3/6 text-center">There are many variations of passages of Lorem Ipsum
                    available, have suffered alteration in some form.</p>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="p-10">

            <div class="flex border border-amber-300 p-4 rounded gap-4 w-3/5 justify-evenly items-center m-auto">
                <div class="border-2 border-amber-300 bg-yellow-900 text-white p-4 w-fit rounded-full">All</div>
                <div class="border-2 border-amber-300 bg-yellow-900 text-white p-4 w-fit rounded-full">Aventure</div>
                <div class="border-2 border-amber-300 bg-yellow-900 text-white p-4 w-fit rounded-full">Psychologie</div>
                <div class="border-2 border-amber-300 bg-yellow-900 text-white p-4 w-fit rounded-full">Comedie</div>
                <div class="border-2 border-amber-300 bg-yellow-900 text-white p-4 w-fit rounded-full">Philosophie</div>
                <div class="border-2 border-amber-300 bg-yellow-900 text-white p-4 w-fit rounded-full">Fantaisie</div>
            </div>
            <div class="grid grid-cols-3 w-4/5 m-auto pt-8 gap-8">
                {{-- @dd($bookData) --}}
                @foreach ($bookData as $book)
                    
                <div class="card shadow-lg flex flex-col w-4/5 justify-center items-center pb-4 gap-4">
                    <div class="bg-slate-100 w-full flex justify-center">
                        <img src={{$book->image_url}} alt="">
                    </div>
                    <div class="w-11/12 gap-3 flex flex-col">
                        <div class="flex justify-between px-2">
                            <h3 class="text-3xl font-semibold font-[cardo] text-yellow-900">{{$book->title}}</h3>
                            <span class="text-2xl font-semibold font-[cardp] text-amber-300 text-center"></span>
                        </div>
                        <p class="text-slate-400 text-lg p-2">
                           {{substr($book->description, 0, 100) }}
                        </p>
                        <div class="flex gap-2 ">
                            <div class="w-4 h-4 bg-amber-400 rounded-full mt-1"></div>
                            <div class="font-semibold font-[cardo] text-yellow-900 text-center text-xl">{{ isset($book->page_count) && $book->page_count > 0 ? $book->page_count . ' pages' : '' }} 
                            </div>
                        </div>
                        <div class="flex justify-between">

                        <button class="border-2 border-amber-300 px-8 p-2 w-fit">Add to cart  </button>
                        <a href="{{ route('books.show', ['id' => $book['id']]) }}" class="flex ">
                            <svg width='28px' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z" stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            <span class="mt-2 ml-1 text-amber-400 underline">
                                View more
                            </span>
                          
                        </a>
                    </div>

                                            </div>
                </div>
                @endforeach
                
                
                
                
            </div>

            <div class="flex justify-center pt-8 gap-4">
                @if ($bookData->previousPageUrl())
                    <a href="{{ $bookData->previousPageUrl() }}" class="flex justify-end">
                        <svg width="30px" fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42" transform="rotate(180)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M8.489 31.975c-0.271 0-0.549-0.107-0.757-0.316-0.417-0.417-0.417-1.098 0-1.515l14.258-14.264-14.050-14.050c-0.417-0.417-0.417-1.098 0-1.515s1.098-0.417 1.515 0l14.807 14.807c0.417 0.417 0.417 1.098 0 1.515l-15.015 15.022c-0.208 0.208-0.486 0.316-0.757 0.316z">
                                </path>
                            </g>
                        </svg> </a>
                @endif
                @for ($i = max(1, $bookData->currentPage() - 1); $i <= min($bookData->lastPage(), $bookData->currentPage() + 1); $i++)
                    <div
                        class="relative rounded-full w-16 h-16 {{ $i === $bookData->currentPage() ? 'bg-yellow-900' : 'border border-amber-300' }}">
                        <a href="{{ $bookData->url($i) }}">
                            <span
                                class="absolute left-6 top-2 font-bold text-4xl {{ $i === $bookData->currentPage() ? 'text-white' : 'text-black' }} font-[cardo]">{{ $i }}</span>
                        </a>
                    </div>
                @endfor
                @if ($bookData->nextPageUrl())
                    <a href="{{ $bookData->nextPageUrl() }}" class="flex justify-end">
                        <svg width="30px" fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M8.489 31.975c-0.271 0-0.549-0.107-0.757-0.316-0.417-0.417-0.417-1.098 0-1.515l14.258-14.264-14.050-14.050c-0.417-0.417-0.417-1.098 0-1.515s1.098-0.417 1.515 0l14.807 14.807c0.417 0.417 0.417 1.098 0 1.515l-15.015 15.022c-0.208 0.208-0.486 0.316-0.757 0.316z">
                                </path>
                            </g>
                        </svg> </a>
                @endif
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
