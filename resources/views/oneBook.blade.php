@extends('layouts.master')
@section('oneBook')

    <section class="newsletter  w-full h-[250px] flex justify-center items-center">
        <div class=" w-9/12 flex flex-col h-3/5 ">
            <div class="flex justify-center items-center flex-col gap-6">
                <h2 class=" text-white text-4xl font-semibold font-[cardo] ">Notre Magasin </h2>
                <hr class="border-2 border-amber-300 w-1/5">
                <p class="text-slate-300 text-lg md:w-3/6 text-center">There are many variations of passages of Lorem Ipsum
                    available.</p>
            </div>
        </div>
    </section>
    <section class="bg-white flex justify-center h-full p-6 md:p-10 flex-col items-center">
        <div class="md:w-8/12 grid grid-cols-1 md:grid-cols-2 justify-center items-center">
            <div class="card shadow-lg flex flex-col w-4/5 justify-start items-center pb-4 gap-4 h-full">
                @if ($book->photo && filter_var($book->photo, FILTER_VALIDATE_URL))
                    <!-- If photo is a URL, directly use it as the image source -->
                    <img src="{{ $book->photo }}" alt="Book Image"
                        class="w-4/5 h-4/5 object-cover flex justify-center m-auto">
                @elseif($book->photo && !filter_var($book->photo, FILTER_VALIDATE_URL))
                    <!-- If photo is stored as a file path, load it from the storage directory -->
                    <img src="{{ asset('storage/' . $book->photo) }}" alt="Book Image"
                        class="w-4/5 h-4/5 object-cover flex justify-center m-auto">
                @else
                    <p>No Image Available</p>
                @endif
                {{-- <img src="{{$book->photo}}" alt="" class="w-4/5 h-4/5 object-cover flex justify-center m-auto"> --}}
            </div>


            <div class="flex gap-8">
                <div class="flex flex-col gap-4">
                    <h3 class="text-3xl font-semibold font-[cardo] text-yellow-900">{{ $book->titre }}</h3>
                    {{-- <span class="text-2xl font-semibold font-[cardp] text-amber-300">$30.00 USD</span> --}}

                    <ul>
                        <li class="text-slate-400 text-lg p-2">Category : @if ($book->category)
                                {{ $book->category }}
                            @else
                                @if ($book->categorie)
                                    {{ $book->categorie->name }}
                                @else
                                    No Category Available
                                @endif
                            @endif
                        </li>
                        <li class="text-slate-400 text-lg p-2">Author : {{ $book->auteur }}
                        </li>
                        <li class="text-slate-400 text-lg p-2">Language : {{ $book->langues }}
                        </li>

                        <li class="text-slate-400 text-lg p-2">Paperback :
                            {{ isset($book->page_count) && $book->page_count > 0 ? $book->page_count . ' pages' : '' }}
                        </li>

                        <li class="text-slate-400 text-lg p-2">
                            Dimensions : 20 x 14 x 4 cm
                        </li>
                    </ul>
                    <p class="text-slate-400 text-lg p-2 w-full">
                        {{-- {{$book->description}} --}}
                        {{ substr($book->description, 0, 900) }}
                    </p>
                    <div class="flex gap-2">
                        @auth
                            @if ($book->pdf_url)
                                <a href="{{ $book->pdf_url }}"
                                    class="bg-amber-300 px-20 py-4 text-yellow-900 font-[cardo] text-xl font-semibold flex gap-4"
                                    download>Download PDF</a>
                            @else
                                <form method="post" action="{{ route('basket.add') }}" class="flex gap-2">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{ $book->id }}">
                                    <input type="number" name="quantity" value="1" min="1"
                                        class="border border-amber-300 w-[80px] text-center text-xl text-slate-400">
                                    <button id="addToCart" type="submit"
                                        class="bg-amber-300  p-2 md:px-20 md:py-4 text-yellow-900 font-[cardo] text-xl font-semibold flex gap-4"
                                        onclick="Swal.fire({
                                icon: 'success',
                                title: 'Added to card successfully',
                                showConfirmButton: false,
                                timer: 1500
                              });"><svg
                                            width='28px' fill="#7D4222" viewBox="0 0 32 32" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" stroke="#7D4222">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M31.739 8.875c-0.186-0.264-0.489-0.422-0.812-0.422h-21.223l-1.607-5.54c-0.63-2.182-2.127-2.417-2.741-2.417h-4.284c-0.549 0-0.993 0.445-0.993 0.993s0.445 0.993 0.993 0.993h4.283c0.136 0 0.549 0 0.831 0.974l5.527 20.311c0.12 0.428 0.511 0.724 0.956 0.724h13.499c0.419 0 0.793-0.262 0.934-0.657l4.758-14.053c0.11-0.304 0.064-0.643-0.122-0.907zM25.47 22.506h-12.046l-3.161-12.066h19.253zM23.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5zM14.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5z">
                                                </path>
                                            </g>
                                        </svg>Add
                                        to
                                        cart </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                                class="bg-amber-300 p-2 md:px-20 md:py-4 text-yellow-900 font-[cardo] text-xl font-semibold flex gap-4">
                                <svg width='28px' fill="#7D4222" viewBox="0 0 32 32" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" stroke="#7D4222">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M31.739 8.875c-0.186-0.264-0.489-0.422-0.812-0.422h-21.223l-1.607-5.54c-0.63-2.182-2.127-2.417-2.741-2.417h-4.284c-0.549 0-0.993 0.445-0.993 0.993s0.445 0.993 0.993 0.993h4.283c0.136 0 0.549 0 0.831 0.974l5.527 20.311c0.12 0.428 0.511 0.724 0.956 0.724h13.499c0.419 0 0.793-0.262 0.934-0.657l4.758-14.053c0.11-0.304 0.064-0.643-0.122-0.907zM25.47 22.506h-12.046l-3.161-12.066h19.253zM23.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5zM14.5 26.504c-1.381 0-2.5 1.119-2.5 2.5s1.119 2.5 2.5 2.5 2.5-1.119 2.5-2.5c0-1.381-1.119-2.5-2.5-2.5z">
                                        </path>
                                    </g>
                                </svg> Add to Cart
                            </a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
        <div
            class=" mt-4 flex flex-col items-center justify-center bg-white gap-2 rounded-2xl px-10 shadow-lg hover:shadow-2xl transition duration-500 w-">

            <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer mb-4">Product
                Reviews</h1>
            <div class="grid grid-cols-4 mb-4 w-full gap-4 ">
                @if ($comments->isEmpty())
                    <p>Aucun commentaire pour cet article.</p>
                @else
                    @foreach ($comments as $comment)
                        <div class="flex flex-col card comment border-yellow-900 border-2 p-3">

                            <div class="mt-4 flex items-center space-x-4 py-2">
                                <div class="">
                                    <img class="w-12 h-12 rounded-full"
                                        src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1036&q=80"
                                        alt="" />
                                </div>
                                <div class="text-sm font-semibold">{{ $comment->user->name }} • <span class="font-normal">
                                    </span></div>
                            </div>
                            <div class="flex ml-16">

                                @for ($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 @if ($i <= $comment->rating) text-yellow-400 @else text-gray-400 @endif"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="mt-4 text-md text-gray-600 ml-16 w-4/5">{{ $comment->description }}</p>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

    {{-- <section class="h-[30vh] bg-amber-300  justify-center flex flex-wrap ">
        <div class="flex flex-wrap gap-10 w justify-center items-center w-2/5">
            <div class="flex flex-col justify-center items-center">
                <div class="flex justify-center pb-4">
                    <div class="w-16 h-16 bg-yellow-900"></div>
                </div>
                <h3 class="text-3xl font-semibold font-[cardo] text-yellow-900">Secure Payments</h3>
                <p class="text-yellow-900 text-lg p-2 text-center w-4/5">
                    There are many variations of passages of alteration in some form.
                </p>

            </div>
            <div class="flex flex-col justify-center items-center">

                <div class="flex  justify-center pb-4">
                    <div class="w-16 h-16 bg-yellow-900"></div>
                </div>
                <h3 class="text-3xl font-semibold font-[cardo] text-yellow-900">100% Satisfactions</h3>

                <p class="text-yellow-900 text-lg p-2 text-center w-4/5">
                    There are many variations of passages of alteration in some form.
                </p>
            </div>
        </div>
    </section> --}}
@endsection
