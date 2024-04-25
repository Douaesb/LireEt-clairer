@extends('layouts.master')
@section('users')
    
    <section class=" px-4 lg:px-20 py-9 w-full md:m-auto h-[90vh] md:w-3/5">
        <div class="border-2 border-amber-400 h-full flex rounded-3xl flex-col">
            <div class="flex justify-center w-full pt-4 pb-4 ">
                <h2 class="font-semibold font-[inter] text-4xl text-amber-400">
                    Users
                </h2>
            </div>
            <hr class="mx-auto border-2 border-amber-400 w-4/5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 p-10 gap-4  overflow-auto">
                @foreach ($users as $user)
                    @if ($user->ban)
                        <div
                            class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                            <div class="flex gap-2">
                                <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                            fill="#fbbf24"></path>
                                        <path
                                            d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                            fill="#fbbf24"></path>
                                        <path
                                            d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                            fill="#fbbf24"></path>
                                    </g>
                                </svg>

                                <div class="text-white text-xl  overflow-hidden whitespace-nowrap break-all">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="flex w-full justify-end pr-4 pt-2 ">
                                <form action="{{ route('unban.user', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div title="unban">
                                        <button type="submit">
                                            <svg width="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4.52185 7H7C7.55229 7 8 7.44772 8 8C8 8.55229 7.55228 9 7 9H3C1.89543 9 1 8.10457 1 7V3C1 2.44772 1.44772 2 2 2C2.55228 2 3 2.44772 3 3V5.6754C4.26953 3.8688 6.06062 2.47676 8.14852 1.69631C10.6633 0.756291 13.435 0.768419 15.9415 1.73041C18.448 2.69239 20.5161 4.53782 21.7562 6.91897C22.9963 9.30013 23.3228 12.0526 22.6741 14.6578C22.0254 17.263 20.4464 19.541 18.2345 21.0626C16.0226 22.5842 13.3306 23.2444 10.6657 22.9188C8.00083 22.5931 5.54702 21.3041 3.76664 19.2946C2.20818 17.5356 1.25993 15.3309 1.04625 13.0078C0.995657 12.4579 1.45216 12.0088 2.00445 12.0084C2.55673 12.0079 3.00351 12.4566 3.06526 13.0055C3.27138 14.8374 4.03712 16.5706 5.27027 17.9625C6.7255 19.605 8.73118 20.6586 10.9094 20.9247C13.0876 21.1909 15.288 20.6513 17.0959 19.4075C18.9039 18.1638 20.1945 16.3018 20.7247 14.1724C21.2549 12.043 20.9881 9.79319 19.9745 7.8469C18.9608 5.90061 17.2704 4.3922 15.2217 3.6059C13.173 2.8196 10.9074 2.80968 8.8519 3.57803C7.11008 4.22911 5.62099 5.40094 4.57993 6.92229C4.56156 6.94914 4.54217 6.97505 4.52185 7Z" fill="#fbbf24"></path> </g></svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div
                            class="border-amber-400 border-2 rounded-lg h-[100px] flex flex-col justify-center items-center">
                            <div class="flex flex-wrap gap-2">
                                <svg width="30px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z"
                                            fill="#fbbf24"></path>
                                        <path
                                            d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z"
                                            fill="#fbbf24"></path>
                                        <path
                                            d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z"
                                            fill="#fbbf24"></path>
                                    </g>
                                </svg>

                                <div class="text-white text-xl  overflow-hidden whitespace-nowrap break-all ">
                                    {{ $user->name }}
                                </div>
                            </div>
                            <div class="flex w-full justify-end pr-4 pt-2 ">
                                <form action="{{ route('ban.user', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div title="ban">
                                        <button type="submit">
                                            <svg width="30px" viewBox="0 0 24 24" id="meteor-icon-kit__regular-ban"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM18.3287 19.7429C16.6049 21.1536 14.4013 22 12 22C6.47715 22 2 17.5228 2 12C2 9.59873 2.84637 7.39513 4.25706 5.67126L18.3287 19.7429ZM19.743 18.3287L5.67128 4.25705C7.39515 2.84636 9.59873 2 12 2C17.5228 2 22 6.47715 22 12C22 14.4013 21.1536 16.6049 19.743 18.3287Z"
                                                        fill="#cbd5e1"></path>
                                                </g>
                                            </svg>
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section>
    @endsection
