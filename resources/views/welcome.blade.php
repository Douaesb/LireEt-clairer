@extends('layouts.master')
@section('welcome')
    <section class="px-4 lg:px-32 py-9 mt-6 h-[70vh] w-4/5  m-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="flex flex-col justify-start items-start gap-4">
                <div class="flex mt-8">
                    <hr class="border-2 border-amber-300 w-16 relative left-2 top-4 mr-4">
                    <div class="text-white text-2xl font-normal font-handlee">Bienvenue à Lire et Éclairer</div>
                </div>
                <div class="flex flex-col justify-start items-start gap-4">
                    <div class="text-white text-3xl font-bold font-handlee">Les livres sont une unique magie portable
                    </div>
                    <div class="text-slate-300 text-lg font-normal leading-7">Il y en a plein de livres gratuit à
                        télécharger. Il suffit de créer un compte ou se connecter pour en bénéficier. Vous pouvez ainsi
                        commander des livres exclusifs ou des accessoires.</div>
                </div>
                <div class="flex gap-4 pt-10 md:flex-row flex-col">
                    <div
                        class="text-center md:px-6 md:py-1.5 pt-2 bg-amber-400 rounded-full text-white text-center text-lg font-bold font-handlee leading-normal tracking-tight">
                        Commandez !</div>
                    <div
                        class="px-4 md:px-6 md:py-1.5 px-4.5 py-2 bg-yellow-900 rounded-full border-2 border-amber-300 text-white text-center text-lg font-bold font-handlee leading-normal tracking-tight">
                        Téléchargez gratuitement !</div>
                </div>
                {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class=" p-4 rounded-lg text-center">
                        <div class="flex gap-2 items-center">

                            <div class="w-4 h-4 bg-amber-400 rounded-full mx-auto"></div>
                            <div class="text-white text-xl font-bold leading-7">Pages:</div>
                        </div>
                        <div class="text-slate-300 text-md font-normal leading-7">586 pages</div>
                    </div>
                    <div class=" p-4 rounded-lg text-center">
                        <div class="flex gap-2 items-center">

                            <div class="w-4 h-4 bg-amber-400 rounded-full mx-auto"></div>
                            <div class="text-white text-xl font-bold leading-7">Durée:</div>
                        </div>

                        <div class="text-slate-300 text-md font-normal leading-7">10 Hours</div>
                    </div>
                    <div class=" p-4 rounded-lg text-center">
                        <div class="flex gap-2 items-center">

                            <div class="w-4 h-4 bg-amber-400 rounded-full mx-auto"></div>
                            <div class="text-white text-xl font-bold leading-7">Avis:</div>
                        </div>

                        <div class="text-slate-300 text-md font-normal leading-7">4.5/5 (305 avis)</div>
                    </div>
                </div> --}}
            </div>
            <div class="hidden md:flex justify-center">
                <div class="w-full max-w-md h-[480px] bg-white border-8 border-zinc-200">
                    <div class="flex justify-center mt-4 ">
                        <h1 class="text-3xl w-3/5 font-bold font-[Inter] text-center">Vast shop of books and accessories</h1>
                    </div>
                    <img src="./img/booksyellow.png" alt="" class="w-4/5 h-4/5 object-cover flex justify-center m-auto">
                </div>
            </div>
        </div>
    </section>
    <section class="newsletter bg-white w-full md:h-[480px] flex justify-center items-center">
        <div class="bg-amber-300 w-9/12 flex  flex-col h-fit  md:h-3/5 ">
            <div class="flex justify-center items-center flex-col gap-6">
                <h2 class=" text-yellow-900 text-4xl font-semibold font-[cardo] pt-8 text-center">Abonnez-vous à notre newsletter</h2>
                <hr class="border-2 border-yellow-900 w-1/5">
                <p class="text-yellow-900 text-lg md:w-3/6 text-center">Recevez les nouvelles collections de livres,
                    accessoires, restez à jour et profitez des réductions de notre plateforme.</p>
                <div class="flex flex-col md:flex-row gap-3">
                    <input type="email" name="email" id="" placeholder="Votre Email ..." class="p-2 md:p-4 md:w-[450px]">
                    <button class="bg-yellow-900 text-white px-14 mb-4 md:mb-0 py-2">S’abonnez !</button>
                </div>
            </div>
        </div>
    </section>
@endsection
