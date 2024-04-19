<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <title>Books</title>
</head>
<body class="bg-yellow-900">

<div class="container">
    <h2>Basket</h2>
    
    @if($articles->isEmpty())
        <p>Your basket is empty.</p>
    @else
        <ul>
            @foreach($articles as $article)
                <li>
                    {{ $article->name }} - {{ $article->pivot->quantity }} x {{ $article->price }} = {{ $article->pivot->quantity * $article->price }}
                    <form method="post" action="{{ route('basket.update') }}">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <input type="number" name="quantity" value="{{ $article->pivot->quantity }}">
                        <button type="submit">Update</button>
                    </form>
                    <form method="post" action="{{ route('basket.remove') }}">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <button type="submit">Remove</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</div>
</body>

</html>