<x-layout>
    <x-slot name="title">
    البوابة
    </x-slot>
    <section>
        <figure>
            <img src="{{ asset('images/headerar.png') }}" alt="">
        </figure>
        <p class="p-5 font-bold text-gray-600 text-center text-xl my-5">
        البوابة ارشفة و ادارة ملفات قضائية
        </p>
    </section>

    <section class="grid grid-cols-3 items-center text-center text gap-5 cursor-pointer">
        <div class="px-5 py-10 shadow-md  font-bold border-2 border-slate-500 hover:scale-100 hover:bg-slate-500 transition-all rounded-md hover:text-white">
        اكثر من 100 خزانة
        </div>
        <div class="px-5 py-10 shadow-md  font-bold border-2 border-slate-500 hover:scale-100 hover:bg-slate-500 transition-all rounded-md hover:text-white">
        اكثر من 200 رف
        </div>
        <div class="px-5 py-10 shadow-md  font-bold border-2 border-slate-500 hover:scale-100 hover:bg-slate-500 transition-all rounded-md hover:text-white">
        اكثر من 700 علبة 

        </div>

        <div class="px-5 py-10 shadow-md  font-bold border-2 border-slate-500 hover:scale-100 hover:bg-slate-500 transition-all rounded-md hover:text-white col-span-3">
        اكثر من 1000 ملف
      
     </div>
    </section>

   
    <footer class="bg-slate-200  p-3 font-semibold text-center w-full fixed -left-24 bottom-0">
        

         البوابة ارشفة و ادارة ملفات قضائية Copyright © 2025 


    </footer>
</x-layout>