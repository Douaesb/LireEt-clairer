@extends('layouts.master')

@section('commandes')
    <div class="container mx-auto p-4">
        <section class="newsletter  w-full h-[150px] flex justify-center items-center">
            <div class=" w-9/12 flex flex-col h-3/5 ">
                <div class="flex justify-center items-center flex-col gap-6">
                    <h2 class=" text-white text-4xl font-semibold font-[cardo] text-center">Mes Commandes</h2>
                    <hr class="border-2 border-amber-300 w-1/5">
                </div>
            </div>
        </section>
        @if ($commands->isEmpty())
        <div class="bg-white rounded-lg shadow-md p-6 mb-4">

            <p>Vous n'avez pas de commandes finalisées.</p>
        </div>

        @else
            @foreach ($commands as $command)
                {{-- @dd($command) --}}
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <h2 class="text-xl font-bold mb-2">Commande #{{ $command->id }}</h2>

                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Produit</th>
                                <th class="text-left font-semibold">Prix</th>
                                <th class="text-left font-semibold">Quantité</th>
                                <th class="text-left font-semibold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        @if ($command->article->photo && filter_var($command->article->photo, FILTER_VALIDATE_URL))
                                        <img src="{{ $command->article->photo }}" alt="Book Image" class=" pic h-16 w-16 mr-4">
                                    @elseif($command->article->photo && !filter_var($command->article->photo, FILTER_VALIDATE_URL))
                                        <img src="{{ asset('storage/' . $command->article->photo) }}" alt="Book Image" class="pic h-16 w-16 mr-4">
                                    @else
                                        <p>No Image Available</p>
                                    @endif
                                        
                                        <span class="font-semibold w-4/5">{{ $command->article->titre }}</span>
                                    </div>
                                </td>
                                <td class="py-4">${{ number_format($command->article->price, 2) }}</td>
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <span class="text-center w-8">{{ $command->quantity }}</span>
                                    </div>
                                </td>
                                <td class="py-4">${{ number_format($command->quantity * $command->article->price, 2) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- component -->
                    <div
                        class="flex items-center justify-center bg-white gap-10 rounded-2xl px-10 shadow-lg hover:shadow-2xl transition duration-500 w-">

                        <div class="mt-4 mb-4 w-full">
                            <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer mb-4">Product
                                Review</h1>
                            @if ($command->article->comments->isEmpty())
                                <form class="mb-6" method="POST"
                                    action="{{ route('article.addComment', $command->article->id) }}">
                                    @csrf
                                    <div class="star-rating flex mb-3">
                                        <!-- Display five stars -->
                                        @for ($i = 1; $i <= 5; $i++)
                                            <div class="star cursor-pointer" data-rating="{{ $i }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                                        <label for="description" class="sr-only">Your comment</label>
                                        <textarea id="comment" rows="2" name="description"
                                            class="px-0 w-full text-lg text-semibold text-gray-900 border-0 focus:ring-0" placeholder="Write a comment..."
                                            required></textarea>
                                    </div>

                                    <input type="hidden" name="rating" id="rating">
                                    <button type="submit"
                                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-yellow-900 rounded-lg">
                                        Post comment
                                    </button>
                                </form>
                            @endif

                            {{-- <div class="mt-4">
                                            <h3 class="font-semibold text-lg">Commentaires</h3>
                                            
                                        </div> --}}
                            @if ($command->article->comments->isEmpty())
                                <p>Aucun commentaire pour cet article.</p>
                            @else
                                @foreach ($command->article->comments as $comment)
                                    <div class="mt-4 flex items-center space-x-4 py-2">
                                        <div class="">
                                            <img class="w-12 h-12 rounded-full"
                                                src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1036&q=80"
                                                alt="" />
                                        </div>
                                        <div class="text-sm font-semibold">{{ $comment->user->name }} • <span
                                                class="font-normal"> </span></div>
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
                                    <div class="flex flex-end items-end justify-end">
                                        <button
                                            class="edit-comment-button ml-16 mt-2  text-white px-3 py-2 rounded-lg"
                                            data-comment-id="{{ $comment->id }}">
                                            <svg width="25px" viewBox="0 0 24 24"
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
                                        </svg>                                        </button>
                                        <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="edit-comment-button mt-4  text-white px-3 py-2 rounded-lg">
                                                <svg width="32px" viewBox="0 0 24 24" fill="none"
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
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                    <form id="edit-form-{{ $comment->id }}"
                                        action="{{ route('comment.update', $comment->id) }}" method="POST"
                                        class="mt-4 hidden">
                                        @csrf
                                        @method('PUT')
                                        <div class="star-rating flex mb-3">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <div class="star cursor-pointer" data-rating="{{ $i }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6 @if ($i <= $comment->rating) text-yellow-400 @else text-gray-400 @endif"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>

                                        <input type="hidden" name="rating" id="rating-{{ $comment->id }}"
                                            value="{{ $comment->rating }}">
                                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                                            <label for="description" class="sr-only">Your comment</label>
                                            <textarea rows=2 name="description" class="px-0 w-full text-lg text-semibold text-gray-900 border-0 focus:ring-0">{{ $comment->description }}</textarea>

                                        </div>
                                        <button type="submit"
                                            class="bg-green-500 text-white px-3 py-2 rounded-lg">Save</button>
                                    </form>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function initializeStarRating(form, ratingInput) {
                const stars = form.querySelectorAll('.star');

                stars.forEach(star => {
                    star.addEventListener('click', function() {
                        const rating = this.getAttribute('data-rating');
                        ratingInput.value = rating;

                        stars.forEach(star => {
                            const starRating = star.getAttribute('data-rating');
                            if (starRating <= rating) {
                                star.querySelector('svg').classList.add('text-yellow-400');
                                star.querySelector('svg').classList.remove('text-gray-400');
                            } else {
                                star.querySelector('svg').classList.add('text-gray-400');
                                star.querySelector('svg').classList.remove(
                                    'text-yellow-400');
                            }
                        });
                    });
                });

                const initialRating = parseInt(ratingInput.value);
                stars.forEach(star => {
                    const starRating = star.getAttribute('data-rating');
                    if (starRating <= initialRating) {
                        star.querySelector('svg').classList.add('text-yellow-400');
                        star.querySelector('svg').classList.remove('text-gray-400');
                    } else {
                        star.querySelector('svg').classList.add('text-gray-400');
                        star.querySelector('svg').classList.remove('text-yellow-400');
                    }
                });
            }

            document.querySelectorAll('.star-rating').forEach(starRating => {
                const form = starRating.closest('form');
                const ratingInput = form.querySelector('[name="rating"]');
                initializeStarRating(form, ratingInput);
            });

            // Toggle edit form visibility when clicking the edit comment button
            document.querySelectorAll('.edit-comment-button').forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = this.getAttribute('data-comment-id');
                    const form = document.getElementById('edit-form-' + commentId);
                    form.classList.toggle('hidden');
                });
            });
        });
    </script>
@endsection
