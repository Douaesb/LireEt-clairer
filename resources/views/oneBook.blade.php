@extends('layouts.master')
@section('oneBook')
    
    <section class="newsletter  w-full h-[250px] flex justify-center items-center">
        <div class=" w-9/12 flex flex-col h-3/5 ">
            <div class="flex justify-center items-center flex-col gap-6">
                <h2 class=" text-white text-4xl font-semibold font-[cardo] ">Notre Magasin </h2>
                <hr class="border-2 border-amber-300 w-1/5">
                <p class="text-slate-300 text-lg w-3/6 text-center">There are many variations of passages of Lorem Ipsum
                    available, have suffered alteration in some form.</p>
            </div>
        </div>
    </section>
    <section class="bg-white flex justify-center h-full p-10 flex-col items-center">
        <div class="w-8/12 grid grid-cols-2 justify-center items-center">
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

                        @if ($book->pdf_url)
                            <a href="{{ $book->pdf_url }}"
                                class="bg-amber-300 px-20 py-4 text-yellow-900 font-[cardo] text-xl font-semibold flex gap-4"
                                download>Download PDF</a>
                        @else
                            <div
                                class="bg-amber-300 px-20 py-4 text-yellow-900 font-[cardo] text-xl font-semibold flex gap-4">
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
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center  w-4/5">
            <div class="flex flex-col gap-10 justify-center pt-10">
                <div class="text-slate-200 font-xl font-[cardo] bg-yellow-900 w-fit p-4 self-end mr-4  px-16">PRODUCT
                    DESCRIPTION</div>
                <div>
                    <h3 class="text-3xl font-semibold font-[cardo] text-yellow-900">Do you offer discounts for
                        education?
                    </h3>
                    <p class="text-slate-400 text-lg p-2 w-4/5">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some form, bypassed injected humour, or randomised words which don't look even
                        slightly believable.
                    </p>
                </div>
            </div>
            <div class="flex flex-col gap-10 justify-center">
                <div class="bg-slate-200 font-xl font-[cardo] text-yellow-900 w-fit p-4 self-start px-16 mt-10">
                    ADDITIONAL INFO</div>

                <div>
                    <h3 class="text-3xl font-semibold font-[cardo] text-yellow-900">Is this book for me?
                    </h3>
                    <p class="text-slate-400 text-lg p-2 w-4/5">
                        If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything
                        embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend
                        to repeat predefined chunks as necessary.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="h-[30vh] bg-amber-300  justify-center flex ">
        <div class="flex gap-10 w justify-center items-center w-2/5">
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
    </section>
    @endsection

   