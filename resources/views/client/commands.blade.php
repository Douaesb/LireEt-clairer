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
            <p>Vous n'avez pas de commandes finalisées.</p>
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
                                        <img src="{{ $command->article->photo }}" alt="Product image"
                                            class="h-16 w-16 mr-4">
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

                                        <div
                                            class="p-6 bg-yellow-400 rounded-full h-4 w-4 flex items-center justify-center text-2xl text-white mt-2 shadow-lg cursor-pointer">
                                            +</div>
                                    </div>
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
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    ratingInput.value = rating;
                    stars.forEach(star => {
                        const starRating = star.getAttribute('data-rating');
                        if (starRating <= rating) {
                            star.querySelector('svg').classList.remove('text-gray-400');
                            star.querySelector('svg').classList.add('text-yellow-400');
                        } else {
                            star.querySelector('svg').classList.remove('text-yellow-400');
                            star.querySelector('svg').classList.add('text-gray-400');
                        }
                    });
                });
            });
        });
    </script>
@endsection
