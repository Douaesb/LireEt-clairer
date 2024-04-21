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
            <div class="w-full flex flex-col justify-center items-center">

                <div class="flex flex-col gap-3 h-full justify-center">
                    <div class="flex justfiy-center flex-col">
                        <h1 class="font-[Inter] text-4xl font-semibold flex w-full justify-center "> Create an account
                        </h1>
                    </div>
                    <form action="{{route('registerP')}}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="client">
                        <div>
                            <label class="font-semibold text-xl p-2" for="">Name : </label>
                            <input class="mt-2 mb-2 w-full px-6 py-2 rounded-xl" type="text" name="name"
                                placeholder="Enter your name">
                        </div>
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
                            <button type="submit" class="mb-2 bg-yellow-900 text-white w-full py-2 rounded-xl font-[Inter] text-xl">
                                Register
                            </button>
                        </div>
                        {{-- <input type="checkbox" name="" id="" class="font-semibold mr-1">I accept <span class="text-gray-700"> the Terms and Conditions</span> --}}
                        <hr class="border-yellow-900 mt-2 mb-2">
                       Already have an Account ? <a class="text-gray-700 underline" href="{{route('login')}}">Login here</a>
                    </form>
                </div>
            </div>

        </div>

    </div>


</body>

</html>
