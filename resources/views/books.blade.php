@extends('layouts.master')
@section('books')
    <section class="newsletter  w-full h-[250px] flex justify-center items-center">
        <div class=" w-9/12 flex flex-col h-3/5 ">
            <div class="flex justify-center items-center flex-col gap-6">
                <h2 class=" text-white text-4xl font-semibold font-[cardo] text-center">Notre Magasin de livres</h2>
                <hr class="border-2 border-amber-300 w-1/5">
                <p class="text-slate-300 text-lg md:w-3/6 text-center">There are many variations of passages of Lorem Ipsum
                    available.</p>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="p-10">

            <div class="flex flex-shrink border border-amber-300 p-4 rounded gap-4 w-3/5 justify-evenly items-center m-auto overflow-x-auto">
                <div id="all-category" class="cursor-pointer border-2 border-amber-300 bg-yellow-900 text-white p-4 w-fit rounded-full">All</div>
                @foreach ($categories as $categorie)
                    <div id="category-{{ $categorie->id }}" class="cursor-pointer border-2 border-amber-300 bg-yellow-900 text-white p-4 w-fit rounded-full category-button">
                        {{ $categorie->name }}
                    </div>
                @endforeach
            </div>

            @auth
                @if (auth()->user()->role == 'admin')
                    <button class="border-amber-400 p-4 rounded-lg mb-4 border-2  ml-52 mt-20 hover:bg-amber-200 bg-amber-100"
                        data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                        Ajouter un livre
                    </button>
                @endif
            @endauth

            <div class=" books grid  grid-cols-1 sm:grid-cols-1  md:grid-cols-2 2xl:grid-cols-3 w-full md:w-4/5 m-auto gap-8 pt-20">
                {{-- @dd($bookData) --}}

                <div id="crud-modal" tabIndex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Ajouter un livre
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                                            strokeWidth="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <form class="p-4 md:p-5" encType="multipart/form-data" method="POST"
                                action="{{ route('books.store') }}">
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="flex flex-col w-full col-span-2">
                                        <label
                                            class="flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 16">
                                                    <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round"
                                                        strokeWidth="2"
                                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                    <span class="font-semibold">Click to upload</span>
                                                    or drag and drop
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    SVG, PNG, JPG or GIF (MAX. 800x400px)
                                                </p>

                                            </div>
                                            <input id="dropzone-file" type="file" accept="image/*" class="hidden"
                                                name="photo" />
                                        </label>
                                    </div>

                                    <div class="col-span-2 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Categorie
                                        </label>
                                        <select id="categorie" name="categorie_id" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="">Select categorie</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-2 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Titre
                                        </label>
                                        <input type="text" name="titre" id="titre" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="entrer le titre de l'itinéraire" required="" />
                                    </div>
                                    <div class="col-span-2">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="write description here"></textarea>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Price
                                        </label>
                                        <input type="text" name="price" id="price" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="price" required="" />
                                    </div>
                                    <div class="col-span-2 sm:col-span-1 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Page Count
                                        </label>
                                        <input type="text" name="page_count" id="page_count" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="pages" required="" />
                                    </div>
                                    <div class="col-span-2 sm:col-span-1 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Auteur
                                        </label>
                                        <input type="text" name="auteur" id="auteur" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="auteur" required="" />
                                    </div>
                                    <div class="col-span-2 sm:col-span-1 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Langue
                                        </label>
                                        <input type="text" name="langues" id="langues" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="langue" required="" />
                                    </div>

                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Pdf url
                                        </label>
                                        <input type="text" name="pdf_url" id="pdf_url" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="lien du pdf" />
                                    </div>
                                </div>
                                <button type="submit"
                                    class="mt-2 text-white inline-flex items-center bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Ajouter </button>

                            </form>
                        </div>
                    </div>
                </div>




                <div id="popup-modal" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Modifier un livre
                                </h3>
                                <button type="button"
                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <form class="p-4 md:p-5" encType="multipart/form-data" method="POST"
                                action="{{ route('books.update') }}" id="editBookForm">
                                @csrf
                                @method('put')
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="flex flex-col w-full col-span-2">
                                        <label
                                            class="flex flex-col items-center justify-center border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <img id="bookImage" src="" alt="Book Photo"
                                                    class="w-32 h-32 mb-4">
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                    <span class="font-semibold">Click to upload</span>
                                                    or drag and drop
                                                </p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    SVG, PNG, JPG or GIF (MAX. 800x400px)
                                                </p>
                                            </div>
                                            <input id="dropzone-file" type="file" accept="image/*" class="hidden"
                                                name="photo">
                                        </label>
                                    </div>


                                    <div class="col-span-2 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Categorie
                                        </label>
                                        <select id="categorie_id" name="categorie_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option value="" id="">Select category</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <input type="hidden" id="bookId" name="id">
                                    <div class="col-span-2 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Titre
                                        </label>
                                        <input type="text" name="titre" id="bookTitre" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="entrer le titre de l'itinéraire" required="" />
                                    </div>
                                    <div class="col-span-2">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea name="description" id="bookDescription" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="write description here"></textarea>
                                    </div>
                                    <div class="col-span-2 sm:col-span-1 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Price
                                        </label>
                                        <input type="text" name="price" id="bookPrice" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="price" required="" />
                                    </div>
                                    <div class="col-span-2 sm:col-span-1 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Page Count
                                        </label>
                                        <input type="text" name="page_count" id="bookPageCount" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="pages" required="" />
                                    </div>
                                    <div class="col-span-2 sm:col-span-1 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Auteur
                                        </label>
                                        <input type="text" name="auteur" id="bookAuteur" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="auteur" required="" />
                                    </div>
                                    <div class="col-span-2 sm:col-span-1 ">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Langue
                                        </label>
                                        <input type="text" name="langues" id="bookLangues" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="langue" required="" />
                                    </div>

                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Pdf url
                                        </label>
                                        <input type="text" name="pdf_url" id="bookPdfUrl" value=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="lien du pdf" />
                                    </div>
                                </div>
                                <button type="submit"
                                    class="mt-2 text-white inline-flex items-center bg-yellow-900  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Modifier </button>

                            </form>
                        </div>
                    </div>
                </div>

                @foreach ($bookData as $book)
                    <div class="card shadow-lg flex flex-col w-4/5 justify-center items-center pb-4 gap-4">
                        <div class="bg-slate-100 w-full flex justify-center">
                            @if ($book->photo && filter_var($book->photo, FILTER_VALIDATE_URL))
                                <img src="{{ $book->photo }}" alt="Book Image">
                            @elseif($book->photo && !filter_var($book->photo, FILTER_VALIDATE_URL))
                                <img src="{{ asset('storage/' . $book->photo) }}" alt="Book Image">
                            @else
                                <p>No Image Available</p>
                            @endif
                        </div>
                        <div class="w-11/12 gap-3 flex flex-col">
                            <div class="flex justify-between px-2">
                                <h3 class="text-3xl font-semibold font-[cardo] text-yellow-900">
                                    {{ substr($book->titre, 0, 60) }}</h3>
                                <span
                                    class="text-2xl font-semibold font-[cardp] text-amber-300 text-center"><span>{{ $book->price }}</span>$</span>
                            </div>
                            <p class="text-slate-400 text-lg p-2">
                                {{ substr($book->description, 0, 150) . '...' }}

                            </p>
                            <div class="flex gap-2 ">
                                <div class="w-4 h-4 bg-amber-400 rounded-full mt-1"></div>
                                <div class="font-semibold font-[cardo] text-yellow-900 text-center text-xl">
                                    <span>
                                        {{ isset($book->page_count) && $book->page_count > 0 ? $book->page_count . ' pages' : '' }}</span>
                                </div>
                            </div>

                            <div class="flex justify-between gap-3">
                                @auth
                                    @if ($book->pdf_url)
                                        <a href="{{ $book->pdf_url }}" class="border-2 border-amber-300 px-8 p-2 w-fit"
                                            download>Download PDF</a>
                                    @else
                                        <form method="post" action="{{ route('basket.add') }}" class="flex gap-2">
                                            @csrf
                                            <input type="hidden" name="article_id" value="{{ $book->id }}">
                                            <input type="number" name="quantity" value="1" min="1" class="w-[50px]"
                                                class="w-[70px] border-yellow-900">
                                            <button id="addToCart" type="submit"
                                                class="border-2 border-amber-300 px-8 p-2 w-fit"
                                                onclick="Swal.fire({
                                        icon: 'success',
                                        title: 'Added to card successfully',
                                        showConfirmButton: false,
                                        timer: 1500
                                      });">Add
                                                to
                                                cart </button>
                                        </form>
                                    @endif
                                @else
                                    @if ($book->pdf_url)
                                        <a href="{{ $book->pdf_url }}" class="border-2 border-amber-300 px-8 p-2 w-fit"
                                            download>Download PDF</a>
                                    @else
                                        <input type="number" name="quantity" value="1" min="1"
                                            class="w-[70px] border-yellow-900">
                                        <a class="border-2 border-amber-300 px-8 p-2 w-fit" href="{{ route('login') }}">Add
                                            to
                                            cart
                                        </a>
                                    @endif

                                    @endauth
                                    <a href="{{ route('books.show', ['id' => $book['id']]) }}" class="flex ">
                                        <svg width='28px' viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                                                    stroke="#fbbf24" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                                                    stroke="#fbbf24" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                        <span class="mt-2 ml-1 text-amber-400 underline">
                                            View more
                                        </span>

                                    </a>
                            </div>
                            @auth
                                @if (auth()->user()->role == 'admin')
                                    <hr class="flex justify-self-center border-yellow-900 mt-2">

                                    <div class="flex justify-center gap-4">

                                        <button class = "popupBtn" data-modal-target="popup-modal"
                                            data-modal-toggle="popup-modal" type="button"
                                            data-book-id="{{ $book->id }}" data-book-photo="{{ $book->photo }}"
                                            data-categorie-id="{{ $book->categorie_id }}"
                                            data-book-titre="{{ $book->titre }}"
                                            data-book-description="{{ $book->description }}"
                                            data-book-price="{{ $book->price }}" data-book-auteur="{{ $book->auteur }}"
                                            data-book-page-count="{{ $book->page_count }}"
                                            data-book-langues="{{ $book->langues }}"
                                            data-book-pdf-url="{{ $book->pdf_url }}"><svg width="25px" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                        stroke="#fbbf24" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                        stroke="#fbbf24" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg></button>
                                        <form action="{{ route('books.delete', $book->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="mt-1"><svg width="32px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path d="M10 12V17" stroke="#713f12" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14 12V17" stroke="#713f12" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M4 7H20" stroke="#713f12" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                            stroke="#713f12" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                            stroke="#713f12" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg></button>
                                        </form>
                                    </div>
                                @endif
                            @endauth

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination flex justify-center pt-8 gap-4">
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


    <script>
        document.querySelectorAll('.popupBtn').forEach(button => {
            button.addEventListener('click', function() {
                showEditBookForm(button);
            });
        });

        function showEditBookForm(button) {
            var editBookForm = document.getElementById('editBookForm');
            var bookId = button.dataset.bookId;
            var bookPhoto = button.dataset.bookPhoto;
            var categorieId = button.dataset.categorieId;
            var bookTitre = button.dataset.bookTitre;
            var bookDescription = button.dataset.bookDescription;
            var bookPrice = button.dataset.bookPrice;
            var bookPageCount = button.dataset.bookPageCount;
            var bookAuteur = button.dataset.bookAuteur;
            var bookLangues = button.dataset.bookLangues;
            var bookPdfUrl = button.dataset.bookPdfUrl;
            editBookForm.querySelector('#bookId').value = bookId;
            var selectElement = editBookForm.querySelector('#categorie_id');
            selectElement.value = categorieId;
            editBookForm.querySelector('#bookTitre').value = bookTitre;
            editBookForm.querySelector('#bookImage').src = bookPhoto;
            console.log(" bookPhoto:", bookPhoto);
            editBookForm.querySelector('#bookDescription').value = bookDescription;
            editBookForm.querySelector('#bookPrice').value = bookPrice;
            editBookForm.querySelector('#bookPageCount').value = bookPageCount;
            editBookForm.querySelector('#bookAuteur').value = bookAuteur;
            editBookForm.querySelector('#bookLangues').value = bookLangues;
            editBookForm.querySelector('#bookPdfUrl').value = bookPdfUrl;
        }

        function showProductPopup(book) {
            let modal = document.getElementById('popup-modal2');
            if (modal) {
                modal.remove();
            }
            modal = document.createElement('div');
            modal.id = 'popup-modal2';
            modal.tabIndex = -1;
            modal.classList.add('overflow-y-auto', 'overflow-x-hidden', 'fixed', 'top-0', 'right-0', 'left-0', 'z-50',
                'flex',
                'justify-center', 'items-center', 'w-full', 'md:inset-0', 'h-[calc(100%-1rem)]', 'max-h-full');
            const modalWrapper = document.createElement('div');
            modalWrapper.classList.add('relative', 'p-4', 'w-full', 'max-w-md', 'max-h-full');
            const modalContent = document.createElement('div');
            modalContent.classList.add('relative', 'bg-white', 'rounded-lg', 'shadow', 'dark:bg-gray-700');
            const modalHeader = document.createElement('div');
            modalHeader.classList.add('flex', 'items-center', 'justify-between', 'p-4', 'md:p-5', 'border-b', 'rounded-t',
                'dark:border-gray-600');
            const modalTitle = document.createElement('h3');
            modalTitle.classList.add('text-lg', 'font-semibold', 'text-gray-900', 'dark:text-white');
            modalTitle.textContent = 'Modifier un livre';
            modalHeader.appendChild(modalTitle);
            const closeButton = document.createElement('button');
            closeButton.type = 'button';
            closeButton.classList.add('absolute', 'top-3', 'end-2.5', 'text-gray-400', 'bg-transparent',
                'hover:bg-gray-200', 'hover:text-gray-900', 'rounded-lg', 'text-sm', 'w-8', 'h-8', 'ms-auto',
                'inline-flex', 'justify-center', 'items-center', 'dark:hover:bg-gray-600', 'dark:hover:text-white');
            closeButton.dataset.modalHide = 'popup-modal';
            closeButton.innerHTML = `
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
    `;
            closeButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
            modalHeader.appendChild(closeButton);
            const form = document.createElement('form');
            form.classList.add('p-4', 'md:p-5');
            form.enctype = 'multipart/form-data';
            form.method = 'POST';
            form.action = '{{ route('books.update') }}';
            form.id = 'editBookForm';
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'put';
            form.appendChild(methodInput);
            const gridContainer = document.createElement('div');
            gridContainer.classList.add('grid', 'gap-4', 'mb-4', 'grid-cols-2');
            const fileInputSection = document.createElement('div');
            fileInputSection.classList.add('flex', 'flex-col', 'w-full', 'col-span-2');
            const fileLabel = document.createElement('label');
            fileLabel.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'border-2', 'border-gray-300',
                'border-dashed', 'rounded-lg', 'cursor-pointer', 'bg-gray-50', 'dark:hover:bg-bray-800',
                'dark:bg-gray-700', 'hover:bg-gray-100', 'dark:border-gray-600', 'dark:hover:border-gray-500',
                'dark:hover:bg-gray-600');
            const fileLabelContent = document.createElement('div');
            fileLabelContent.classList.add('flex', 'flex-col', 'items-center', 'justify-center', 'pt-5', 'pb-6');
            const bookImage = document.createElement('img');
            bookImage.id = 'bookImage';
            bookImage.src = book.photo ? book.photo : '';
            bookImage.alt = 'book Photo';
            bookImage.classList.add('w-32', 'h-32', 'mb-4');
            fileLabelContent.appendChild(bookImage);
            const uploadText = document.createElement('p');
            uploadText.classList.add('mb-2', 'text-sm', 'text-gray-500', 'dark:text-gray-400');
            uploadText.innerHTML = `<span class="font-semibold">Click to upload</span> or drag and drop`;
            fileLabelContent.appendChild(uploadText);
            const supportedFormats = document.createElement('p');
            supportedFormats.classList.add('text-xs', 'text-gray-500', 'dark:text-gray-400');
            supportedFormats.textContent = 'SVG, PNG, JPG, or GIF (MAX. 800x400px)';
            fileLabelContent.appendChild(supportedFormats);
            fileLabel.appendChild(fileLabelContent);
            const fileInput = document.createElement('input');
            fileInput.id = 'dropzone-file';
            fileInput.type = 'file';
            fileInput.accept = 'image/*';
            fileInput.classList.add('hidden');
            fileInput.name = 'photo';
            fileLabel.appendChild(fileInput);
            fileInputSection.appendChild(fileLabel);
            gridContainer.appendChild(fileInputSection);

            const categorySection = document.createElement('div');
            categorySection.classList.add('col-span-2');
            const categoryLabel = document.createElement('label');
            categoryLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-white');
            categoryLabel.textContent = 'Categorie';
            categorySection.appendChild(categoryLabel);
            const categorySelect = document.createElement('select');
            categorySelect.id = 'categorie_id';
            categorySelect.name = 'categorie_id';
            categorySelect.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm',
                'rounded-lg', 'focus:ring-primary-500', 'focus:border-primary-500', 'block', 'w-full', 'p-2.5',
                'dark:bg-gray-600', 'dark:border-gray-500', 'dark:placeholder-gray-400', 'dark:text-white',
                'dark:focus:ring-primary-500', 'dark:focus:border-primary-500');
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Select category';
            categorySelect.appendChild(defaultOption);
            const categories = @json($categories);
            categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.textContent = category.name;
                categorySelect.appendChild(option);
            });
            categorySelect.value = book.categorie_id;
            categorySection.appendChild(categorySelect);
            gridContainer.appendChild(categorySection);


            const bookIdInput = document.createElement('input');
            bookIdInput.type = 'hidden';
            bookIdInput.id = 'bookId';
            bookIdInput.name = 'id';
            bookIdInput.value = book.id;
            gridContainer.appendChild(bookIdInput);
            const titleSection = document.createElement('div');
            titleSection.classList.add('col-span-2');
            const titleLabel = document.createElement('label');
            titleLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-white');
            titleLabel.textContent = 'Titre';
            titleSection.appendChild(titleLabel);
            const titleInput = document.createElement('input');
            titleInput.type = 'text';
            titleInput.name = 'titre';
            titleInput.id = 'bookTitre';
            titleInput.value = book.titre;
            titleInput.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg',
                'focus:ring-primary-600', 'focus:border-primary-600', 'block', 'w-full', 'p-2.5', 'dark:bg-gray-600',
                'dark:border-gray-500', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-primary-500',
                'dark:focus:border-primary-500');
            titleInput.placeholder = 'Enter the title of the book';
            titleInput.required = true;
            titleSection.appendChild(titleInput);
            gridContainer.appendChild(titleSection);
            const descriptionSection = document.createElement('div');
            descriptionSection.classList.add('col-span-2');
            const descriptionLabel = document.createElement('label');
            descriptionLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-white');
            descriptionLabel.textContent = 'Description';
            descriptionSection.appendChild(descriptionLabel);
            const descriptionInput = document.createElement('textarea');
            descriptionInput.name = 'description';
            descriptionInput.id = 'bookDescription';
            descriptionInput.rows = 4;
            descriptionInput.classList.add('block', 'p-2.5', 'w-full', 'text-sm', 'text-gray-900', 'bg-gray-50',
                'rounded-lg', 'border', 'border-gray-300', 'focus:ring-blue-500', 'focus:border-blue-500',
                'dark:bg-gray-600', 'dark:border-gray-500', 'dark:placeholder-gray-400', 'dark:text-white',
                'dark:focus:ring-blue-500', 'dark:focus:border-blue-500');
            descriptionInput.placeholder = 'write description here';
            descriptionInput.value = book.description;
            descriptionSection.appendChild(descriptionInput);
            gridContainer.appendChild(descriptionSection);
            const priceSection = document.createElement('div');
            priceSection.classList.add('col-span-2');
            const priceLabel = document.createElement('label');
            priceLabel.classList.add('block', 'mb-2', 'text-sm', 'font-medium', 'text-gray-900', 'dark:text-white');
            priceLabel.textContent = 'Price';
            priceSection.appendChild(priceLabel);
            const priceInput = document.createElement('input');
            priceInput.type = 'text';
            priceInput.name = 'price';
            priceInput.id = 'bookPrice';
            priceInput.value = book.price;
            priceInput.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg',
                'focus:ring-primary-600', 'focus:border-primary-600', 'block', 'w-full', 'p-2.5', 'dark:bg-gray-600',
                'dark:border-gray-500', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-primary-500',
                'dark:focus:border-primary-500');
            priceInput.placeholder = 'price';
            priceInput.required = true;
            priceSection.appendChild(priceInput);
            gridContainer.appendChild(priceSection);
            form.appendChild(gridContainer);
            const submitButton = document.createElement('button');
            submitButton.type = 'submit';
            submitButton.classList.add('mt-2', 'text-white', 'inline-flex', 'items-center', 'bg-yellow-900', 'focus:ring-4',
                'focus:outline-none', 'focus:ring-blue-300', 'font-medium', 'rounded-lg', 'text-sm', 'px-5', 'py-2.5',
                'text-center', 'dark:bg-blue-600', 'dark:hover:bg-blue-700', 'dark:focus:ring-blue-800');
            submitButton.textContent = 'Modifier';
            form.appendChild(submitButton);
            modalContent.appendChild(modalHeader);
            modalContent.appendChild(form);
            modalWrapper.appendChild(modalContent);
            modal.appendChild(modalWrapper);
            document.body.appendChild(modal);
        }


// Define the initial page number
let currentPage = 1;

// Function to fetch books for a given category and page
function fetchBooks(categoryId, page = 1) {
    // Make an API request with the category ID and page number
    fetch(`/filter-books/${categoryId}?page=${page}`)
        .then(response => response.json())
        .then(data => {
            // Update the book list
            const booksContainer = document.querySelector('.books');
            booksContainer.innerHTML = '';
            var userRole = null;

@if (auth()->check())
    userRole = "{{ auth()->user()->role }}";
@endif
            // Iterate through the books and create book cards
            data.books.data.forEach(book => {
                // Create a book card element
                const bookCard = document.createElement('div');
                bookCard.classList.add('card', 'shadow-lg', 'flex', 'flex-col', 'w-4/5', 'justify-center', 'items-center', 'pb-4', 'gap-4');
                bookCard.innerHTML = `
                    <div class="bg-slate-100 w-full flex justify-center">
                        ${book.photo ? `<img src="${book.photo}" alt="Book Image">` : '<p>No Image Available</p>'}
                    </div>
                    <div class="w-11/12 gap-3 flex flex-col">
                        <div class="flex justify-between px-2">
                            <h3 class="text-3xl font-semibold font-[cardo] text-yellow-900">${book.titre}</h3>
                            <span class="text-2xl font-semibold font-[cardp] text-amber-300 text-center"><span>${book.price}</span>$</span>
                        </div>
                        <p class="text-slate-400 text-lg p-2">${book.description.slice(0, 150)}...</p>
                        <div class="flex gap-2">
                            <div class="w-4 h-4 bg-amber-400 rounded-full mt-1"></div>
                            <div class="font-semibold font-[cardo] text-yellow-900 text-center text-xl">
                                ${book.page_count ? `${book.page_count} pages` : ''}
                            </div>
                        </div>
                        <div class="flex justify-between">
                            ${book.pdf_url ? `
                                <a href="${book.pdf_url}" class="border-2 border-amber-300 px-8 p-2 w-fit" download>
                                    Download PDF
                                </a>
                            ` : `
                                <form method="post" action="{{ route('basket.add') }}">
                                    @csrf
                                    <input type="hidden" name="article_id" value="${book.id}">
                                    <input type="number" name="quantity" value="1" min="1" class="w-[70px] border-yellow-900">
                                    <button type="submit" class="border-2 border-amber-300 px-8 p-2 w-fit" onclick="Swal.fire({
                                        icon: 'success',
                                        title: 'Added to cart successfully',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });">Add to cart</button>
                                </form>
                            `}
                        </div>
                        <a href="{{ url('books') }}/${book.id}" class="flex">
                            <svg width="28px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z"
                                    stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12.0012 5C7.52354 5 3.73326 7.94288 2.45898 12C3.73324 16.0571 7.52354 19 12.0012 19C16.4788 19 20.2691 16.0571 21.5434 12C20.2691 7.94291 16.4788 5 12.0012 5Z"
                                    stroke="#fbbf24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span class="mt-2 ml-1 text-amber-400 underline">View more</span>
                        </a>
                    </div>
                `;
                const hr = document.createElement('hr');
            hr.classList.add('flex', 'justify-self-center', 'border-yellow-900', 'mt-2', 'w-[200px]');
            if (userRole == 'admin') {

                bookCard.appendChild(hr);
            }
            const buttonContainer = document.createElement('div');
            buttonContainer.classList.add('flex', 'justify-between', 'gap-3', 'w-1/5');


            const popupButton = document.createElement('button');
            popupButton.classList.add('popupBtn');
            popupButton.dataset.modalTarget = 'popup-modal';
            popupButton.dataset.modalToggle = 'popup-modal';
            popupButton.type = 'button';
            popupButton.dataset.bookId = book.id;
            popupButton.dataset.bookPhoto = book.photo;
            popupButton.dataset.categorieId = book.categorie_id;
            popupButton.dataset.bookTitre = book.titre;
            popupButton.dataset.bookDescription = book.description;
            popupButton.dataset.bookPrice = book.price;
            popupButton.innerHTML = `<svg width="25px"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                stroke="#fbbf24" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                stroke="#fbbf24" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg>`;


            const deleteForm = document.createElement('form');
            deleteForm.action = `{{ route('accessoires.delete', ':bookId') }}`.replace(':bookId', book.id);
            deleteForm.method = 'POST';

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';

            const deleteMethod = document.createElement('input');
            deleteMethod.type = 'hidden';
            deleteMethod.name = '_method';
            deleteMethod.value = 'delete';

            const deleteButton = document.createElement('button');
            deleteButton.type = 'submit';
            deleteButton.innerHTML = `<svg width="32px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M10 12V17" stroke="#713f12" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M14 12V17" stroke="#713f12" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M4 7H20" stroke="#713f12" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                    stroke="#713f12" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke="#713f12" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg>`;


            deleteForm.appendChild(csrfToken);
            deleteForm.appendChild(deleteMethod);
            deleteForm.appendChild(deleteButton);

            buttonContainer.appendChild(popupButton);
            buttonContainer.appendChild(deleteForm);
            if (userRole == 'admin') {

                bookCard.appendChild(buttonContainer);
            }     
            const popupBtn = bookCard.querySelector('.popupBtn');
            if (popupBtn) {
                popupBtn.addEventListener('click', () => {
                    showProductPopup(book);
                });
            }                  
                booksContainer.appendChild(bookCard);
            });

            const paginationContainer = document.querySelector('.pagination');
            paginationContainer.innerHTML = '';
            if (data.books.prev_page_url) {
                const prevButton = document.createElement('button');
                prevButton.textContent = 'Previous';
                prevButton.innerHTML=`
                <div class="flex text-center text-yellow-900 text-xl font-bold font-[inter]">
                <svg width="30px" fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42" transform="rotate(180)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M8.489 31.975c-0.271 0-0.549-0.107-0.757-0.316-0.417-0.417-0.417-1.098 0-1.515l14.258-14.264-14.050-14.050c-0.417-0.417-0.417-1.098 0-1.515s1.098-0.417 1.515 0l14.807 14.807c0.417 0.417 0.417 1.098 0 1.515l-15.015 15.022c-0.208 0.208-0.486 0.316-0.757 0.316z">
                                </path>
                            </g>
                        </svg>
                    Previous

    </div>
                        `;
                prevButton.addEventListener('click', () => {
                    currentPage--;
                    fetchBooks(categoryId, currentPage);
                });
                paginationContainer.appendChild(prevButton);
            }

            if (data.books.next_page_url) {
                const nextButton = document.createElement('button');
                nextButton.textContent = 'Next';
                nextButton.innerHTML=`
                <div class="flex text-center text-yellow-900 text-xl font-bold font-[inter]">
                    Next

                <svg width="30px" fill="#FFCA42" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" stroke="#FFCA42">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M8.489 31.975c-0.271 0-0.549-0.107-0.757-0.316-0.417-0.417-0.417-1.098 0-1.515l14.258-14.264-14.050-14.050c-0.417-0.417-0.417-1.098 0-1.515s1.098-0.417 1.515 0l14.807 14.807c0.417 0.417 0.417 1.098 0 1.515l-15.015 15.022c-0.208 0.208-0.486 0.316-0.757 0.316z">
                                </path>
                            </g>
                        </svg>
                        </div>`
                nextButton.addEventListener('click', () => {
                    currentPage++;
                    fetchBooks(categoryId, currentPage);
                });
                paginationContainer.appendChild(nextButton);
            }
        })
        .catch(error => console.error('Error fetching books:', error));
}

document.querySelectorAll('.category-button, #all-category').forEach(button => {
    button.addEventListener('click', function() {
        let categoryId = this.id === 'all-category' ? 'all' : this.id.split('-')[1];
        currentPage = 1;
        fetchBooks(categoryId, currentPage);
    });
});




        </script>

    
@endsection
