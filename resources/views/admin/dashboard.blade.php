@extends('layouts.master')
@section('dashboard')
    <section class=" px-4 lg:px-20 py-9 w-full md:m-auto h-[80vh] md:w-3/5">
        <div class="border-2 border-amber-400 h-full flex rounded-3xl flex-col">
            <div class="flex justify-center w-full pt-4 pb-4 ">
                <h2 class="font-semibold font-[inter] text-4xl text-amber-400">
                    Statistiques
                </h2>
            </div>
            <hr class="mx-auto border-2 border-amber-400 w-4/5">
            <div class="grid  grid-cols-1 lg:grid-cols-2  p-10 gap-4 overflow-auto">


                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">
                        <div class="text-white text-xl ">
                            Users : {{$numberOfUsers}}
                        </div>
                    </div>

                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">


                        <div class="text-white text-xl ">
                            Books : {{$numberOfBooks}}
                        </div>
                    </div>

                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">


                        <div class="text-white text-xl ">
                            Top User : {{substr($topUser,0,25)}}
                        </div>
                    </div>

                </div>

               
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">


                        <div class="text-white text-xl ">
                          Popular Book : {{$mostPopularBook}}
                        </div>
                    </div>

                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">


                        <div class="text-white text-xl ">
                           Accessoire : {{$numberOfAccessoires}}
                        </div>
                    </div>

                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">


                        <div class="text-white text-xl ">
                            Commands : {{$numberOfSuccessfulCommands}}
                        </div>
                    </div>

                </div>
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">


                        <div class="text-white text-xl ">
                            Popular Accessoire : {{substr($mostPopularAccessoire,0,25)}}
                        </div>
                    </div>

                </div>
               
                <div class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                    <div class="flex gap-2">


                        <div class="text-white text-xl ">
                            Best Rating : {{substr($articleWithBestRating,0,25)}}
                        </div>
                    </div>

                </div>
                

            </div>
        </div>
    </section>
@endsection
