<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title }}</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body class="relative bg-slate-50 p-0 m-0 box-border " dir="rtl">

        <!-- Sidebar/Navbar -->
        <header class="flex flex-col gap-5 bg-slate-200 w-60 p-5 h-full fixed top-0 right-0 z-50">
            <h1 class="text-2xl text-black text-right">
                <x-nav-link name="{{ route('/') }}" class="" :active="request()->is('/')"> التطبيقية</x-nav-link>
            </h1>
            <nav class="font-semibold mt-4">
                <ul class="flex flex-col gap-4 text-right">
                    @guest
                    <li>
                        <x-nav-link name="{{ route('login') }}" :active="request()->is('login')">
                            تسجيل الدخول
                        </x-nav-link>
                    </li>
                    @endguest

                    @AdminAuth
                 
                    <li>
                        <x-nav-link name="{{ route('division') }}" :active="request()->is('division')">
                            إضافة قسم
                        </x-nav-link>
                    </li>

                    <li>
                        <x-nav-link name="{{ route('treasury') }}" :active="request()->is('treasury')">
                            إضافة خزنة
                        </x-nav-link>
                    </li>

                    <li>
                        <x-nav-link name="{{ route('shelf') }}" :active="request()->is('shelf')">
                            إضافة رف
                        </x-nav-link>
                    </li>

                    <li>
                        <x-nav-link name="{{ route('box') }}" :active="request()->is('box')">
                            إضافة علبة 
                        </x-nav-link>
                    </li>

                    <li>
                        <x-nav-link name="{{ route('AddDocument') }}" :active="request()->is('AddDocument')">
                            إضافة ملف
                        </x-nav-link>
                    </li>


                    <li>
                        <x-nav-link name="{{ route('users') }}" :active="request()->is('users')">
                        قائمة المستخدمين 
                      </x-nav-link>
                    </li>

                    <li>
                        <x-nav-link name="{{ route('employees') }}" :active="request()->is('employees')" class="text-sm">
                        سجل الأنشطة الوثائقية للموظفين  
                        </x-nav-link>
                    </li>

                  
                    @endAdminAuth

                    @auth
                    <li>
                        <x-nav-link name="{{ route('documents') }}" :active="request()->is('documents')">
                            الوثائق
                        </x-nav-link>
                    </li> 
                    
                    <li>
                        <x-nav-link name="{{ route('request') }}" :active="request()->is('request')">
                            استخراج الملف
                        </x-nav-link>
                    </li>

                    <form action="/logout" method="post" id="delete-form">
                        @csrf
                        <button type="submit" form="delete-form" class="bg-red-500 rounded p-2 hover:scale-95 transition-all ">
                            <li class="text-white">تسجيل الخروج</li>
                        </button>
                    </form>
                    @endauth
                </ul>
            </nav>
        </header>

        <!-- Main Content Area -->
        <div class="mr-60 p-5">
                @if(session('success'))
            <div class="bg-green-300 text-white  gap-3 items-center font-semibold py-3 px-5 text-center rounded  w-1/2 mx-auto mb-4">
                    <span>{{ session("success") }}</span>
                    <button class="text-white text-xl float-left mb-1" onclick="this.parentElement.style.display='none'"> &times; </button>
                </div>
            @endif

            <main class="p-2  ">
                {{ $slot }}
            </main>
        </div>

       
    </body>
</html>
