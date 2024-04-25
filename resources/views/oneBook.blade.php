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
                @if ($comments->isEmpty())
                <p>Aucun commentaire pour cet article.</p>
            @else
            @if (count($comments) == 1)
                <div class="grid grid-cols-1 justify-items-center gap-4">
            @elseif(count($comments) == 2)
                <div class="grid grid-cols-2  gap-4">
            @else
                <div class="grid grid-cols-4 mb-4 w-full gap-4 justify-center ">
            @endif
            
                @foreach ($comments as $comment)
                    <div class="flex flex-col card comment border-yellow-900 border-2 p-3">

                        <div class="mt-4 flex items-center space-x-4 py-2">
                            <div class="">
                                <div class="w-12 h-12 rounded-full"><svg viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M4 21C4 17.4735 6.60771 14.5561 10 14.0709M16.4976 16.2119C15.7978 15.4328 14.6309 15.2232 13.7541 15.9367C12.8774 16.6501 12.7539 17.843 13.4425 18.6868C13.8312 19.1632 14.7548 19.9983 15.4854 20.6353C15.8319 20.9374 16.0051 21.0885 16.2147 21.1503C16.3934 21.203 16.6018 21.203 16.7805 21.1503C16.9901 21.0885 17.1633 20.9374 17.5098 20.6353C18.2404 19.9983 19.164 19.1632 19.5527 18.6868C20.2413 17.843 20.1329 16.6426 19.2411 15.9367C18.3492 15.2307 17.1974 15.4328 16.4976 16.2119ZM15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z"
                                                stroke="#fbbf24" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg></div>
                            </div>
                            <div class="text-lg font-semibold"> • {{ $comment->user->name }}<span class="font-normal">
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
                    @if (auth()->user()->role == 'admin')
                    
                <form action="{{ route('comments.archive', $comment->id) }}" method="POST" class="flex  justify-end w-full" >
                    @csrf
                    @method('DELETE')
                    <svg width="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M6.24223 4.5H17.7578L19.5 8.85556V18L18.75 18.75H5.25L4.5 18V8.85556L6.24223 4.5ZM7.25777 6L6.35777 8.25H17.6422L16.7422 6H7.25777ZM18 9.75H6V17.25H18V9.75ZM9.59473 13.6553L10.6554 12.5946L11.25 13.1892V11.25H12.75V13.1894L13.3447 12.5946L14.4054 13.6553L12.0001 16.0606L9.59473 13.6553Z" fill="#713f12"></path> </g></svg>
                    <button type="submit" class="font-semibold text-md flex text-center mt-1" onclick='Swal.fire({
                        icon: "success",
                        title: "Archived successfully",
                        showConfirmButton: false,
                        timer: 1500
                      });'>Archive</button>
                </form>
                @endif
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
