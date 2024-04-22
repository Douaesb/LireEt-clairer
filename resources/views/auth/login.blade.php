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

<body>
    <div class="flex m-auto bg-yellow-900 justify-center items-center h-[100vh]">
        <div class="grid md:grid-cols-2 grid-cols-1 p-16 bg-amber-400 w-3/5 h-3/5">
            <div class="flex justify-center bg-white">
                <img src="img/booksyellow.png" alt="book image">
            </div>
            <div class="w-full flex flex-col justify-center items-center gap-4 ">

                <div class="flex flex-col gap-4 h-full justify-center">
                    <div class="flex justfiy-center flex-col">
                        <h1 class="font-[Inter] text-4xl font-semibold flex w-full justify-center "> Login to your account
                        </h1>
                    </div>
                    <form action="{{route('loginP')}}" method="POST">
                        @csrf
                        @if (session('banned_message'))
                       
                        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ms-3 text-sm font-medium">
                                {{ session('banned_message') }}
                            </div>
                        </div>
                    @endif  
                    
                        <div>
                            <label class="font-semibold text-xl p-2" for="">Email : </label>
                            <input class="mt-2 mb-2 w-full px-6 py-2 rounded-xl" type="email" name="email"
                                placeholder="Enter your email">
                        </div>
                        <div>
                            <label class="font-semibold text-xl p-2" for="">Password : </label>
                            <input class="mt-2 w-full px-6 py-2 rounded-xl" type="password" name="password"
                                placeholder="Enter your password">
                        </div>
                        <div class="flex mt-4 justify-center w-full ">

                            <button class="mb-2 bg-yellow-900 text-white w-full py-2 rounded-xl font-[Inter] text-xl">
                                Login
                            </button>
                        </div>
                        <span class="font-semibold">Forgot your password ?</span>
                        <hr class="border-yellow-900 mt-4 mb-4">
                        Don't have an Account ? <a class="text-gray-700 underline" href="{{route('register')}}">Create account here</a>
                    </form>
                </div>
                <span class="w-fit flex flex-start underline text-yellow-900"><svg width="25px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#713f12" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path><path fill="#713f12" d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"></path></g></svg><a href="{{route('welcome')}}">Back to home</a></span>
            </div>

        </div>

    </div>


</body>

</html>
