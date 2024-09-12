<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('tailwind.js') }}"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
        rel="stylesheet"/>
    <title>Profile | DNN Beauty</title>
</head>

<body class="font-poppins" data-success="{{ session('success') }}" data-error="{{ $errors->first() }}">
<nav class="py-4 px-10">
    <div class="flex items-center gap-x-3 mb-5">
        <img src="./assets/logo.png" alt="Logo DNN" class="h-24"/>
        <h1 class="font-bold text-4xl">DNN Beauty</h1>
    </div>
    <div class="flex gap-x-10">
        <ul class="flex flex-1 gap-x-5 uppercase justify-between">
            <li>
                <a class="hover:underline" href="{{route('home')}}">Home</a>
            </li>
            <li>
                <a class="hover:underline" href="{{route('collection')}}">Collection</a>
            </li>
            <li>
                <a class="hover:underline" href="{{route('products')}}">Our Product</a>
            </li>
            <li>
                <a class="hover:underline" href="{{route('arrival')}}">New Arrival</a>
            </li>
            <li>
                <a class="hover:underline" href="{{route('bestseller')}}">Best Seller</a>
            </li>
            <li>
                <a class="hover:underline" href="{{route('about')}}">About Us</a>
            </li>
        </ul>
        <div class="flex gap-x-5 flex-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
            </svg>
            <a href="{{route('cart')}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/>
                </svg>
            </a>
            <div class="relative group">
                <a href="{{ route('profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                              d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
                <div
                    class="absolute left-0 right-0 mt-2 w-max bg-pink-500 text-white text-sm rounded p-4 hidden group-hover:block">
                    {{ Auth::user()->name }}
                </div>
            </div>
            <a href="{{route('logout')}}">Logout</a>
        </div>
    </div>
</nav>
<div class="bg-[#F9BAC9] py-8 text-center relative mb-[30rem] h-[300px]">
    <h1 class="text-5xl font-bold mb-14">My Profile</h1>
    <div
        class="bg-[#FAE1F5] shadow-md absolute left-1/2 -translate-x-1/2 flex flex-col items-center mx-auto px-5 py-5 w-1/3">
        <a class="ml-auto underline text-gray-600 flex items-center gap-x-1" href="{{route('user-edit')}}">
            <p>Edit Profile</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd"
                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg>
        </a>
        <img src="./assets/profile.png" alt="" class="w-32"/>
        <div class="flex flex-col self-start text-left mt-3 gap-y-5">
            <div>
                <p class="text-[#9F9F9F]">Nama</p>
                <p class="font-medium">{{ $user->name }}</p>
            </div>
            <div>
                <p class="text-[#9F9F9F]">Username Pengguna</p>
                <p class="font-medium">{{ $user->username }}</p>
            </div>
            <div>
                <p class="text-[#9F9F9F]">Tanggal Lahir</p>
                <p class="font-medium">{{ $user->birth_date }}</p>
            </div>
            <div>
                <p class="text-[#9F9F9F]">No. Telp</p>
                <p class="font-medium">{{ $user->phone }}</p>
            </div>
        </div>
        <button class="uppercase bg-[#FD4E5D] mt-8 px-12 py-4 text-white font-bold rounded-full">
            Member Gold
        </button>
    </div>
</div>
<div class="bg-[#F9BAC9] flex justify-between py-5 px-20">
    <div class="flex gap-x-4 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-clipboard"
             viewBox="0 0 16 16">
            <path
                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z"/>
            <path
                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z"/>
        </svg>
        <p class="text-lg">My Order</p>
    </div>
    <p class="text-[#656060] text-lg">Order History ></p>
</div>
<div class="mt-12 mb-20 flex justify-between gap-x-14 px-32">
    <div class="flex gap-x-4 items-center text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-wallet"
             viewBox="0 0 16 16">
            <path
                d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a2 2 0 0 1-1-.268M1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1"/>
        </svg>
        <p>To Pay</p>
        <p class="text-[#FF640D]">(1 Purchase)</p>
    </div>
    <div class="flex gap-x-4 items-center text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-archive"
             viewBox="0 0 16 16">
            <path
                d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
        </svg>
        <p>To Ship</p>
        <p class="text-[#FF640D]">(4 Purchases)</p>
    </div>
    <div class="flex gap-x-4 items-center text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-truck"
             viewBox="0 0 16 16">
            <path
                d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
        </svg>
        <p>To Receive</p>
        <p class="text-[#FF640D]">(0 Purchase)</p>
    </div>
</div>
<footer class="bg-[#FDCEDF] px-24 py-8">
    <div class="grid grid-cols-6 gap-x-10">
        <div class="col-span-2 flex flex-col items-start gap-y-5">
            <p class="text-2xl font-bold">DNN Beauty</p>
            <p class="text-[#9F9F9F]">
                Kelompok 1 PEMWEB-B Sistem Informasi Universitas Brawijaya
            </p>
        </div>
        <div class="col-span-1 flex flex-col items-start gap-y-5">
            <a class="font-medium hover:underline hover:cursor-pointer text-[#9F9F9F]">Links</a>
            <a class="font-medium hover:underline hover:cursor-pointer">Home</a>
            <a class="font-medium hover:underline hover:cursor-pointer">Shop</a>
            <a class="font-medium hover:underline hover:cursor-pointer">About</a>
            <a class="font-medium hover:underline hover:cursor-pointer">Contact</a>
        </div>
        <div class="col-span-1 flex flex-col items-start gap-y-5">
            <a class="font-medium hover:underline hover:cursor-pointer text-[#9F9F9F]">Help</a>
            <a class="font-medium hover:underline hover:cursor-pointer">Payment Options</a>
            <a class="font-medium hover:underline hover:cursor-pointer">Costumer Care</a>
            <a class="font-medium hover:underline hover:cursor-pointer">Privacy Policies</a>
        </div>
        <div class="col-span-2 flex flex-col items-start gap-y-5">
            <p class="font-medium text-[#9F9F9F]">Social Media</p>
            <div class="flex gap-x-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                     class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                     class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-youtube"
                     viewBox="0 0 16 16">
                    <path
                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-twitter"
                     viewBox="0 0 16 16">
                    <path
                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                </svg>
            </div>
        </div>
    </div>
    <p>2024 Kelompok 1 All rights reverved</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset("script.js")}}"></script>
</body>
</html>
