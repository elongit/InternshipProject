<section>
    <form method="get" wire:submit='store'>
        <input wire:model='search' name="search" type="search" class="p-3 bg-slate-200 w-1/2 outline-none ring-2 ring-transparent focus:ring-blue-500 focus:ring-2 focus:ring-offset-2 rounded-md transition-all duration-300 hover:ring-gray-300" id="" placeholder="الرقم الملف الكامل">
    </form>
    <div class="relative  overflow-x-auto mt-5 bg-white shadow  rounded-lg">

        <table class=" cursor-pointer text-sm w-full text-right rtl:text-right rounded-lg" dir="rtl">
            <thead class="text-xs uppercase bg-slate-800 text-white sticky top-0">
                <tr>
                    <th scope="col" class="px-4 py-3">القسم</th>
                    <th scope="col" class="px-4 py-3">الرقم الكامل</th>
                    <th scope="col" class="px-4 py-3">معرف الملف</th>
                    <th scope="col" class="px-4 py-3">رمز الملف</th>
                    <th scope="col" class="px-4 py-3">السنة</th>
                    <th scope="col" class="px-4 py-3">الخزنة</th>
                    <th scope="col" class="px-4 py-3">الرف</th>
                    <th scope="col" class="px-4 py-3">علبة</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($Documents as $document)
                <tr class="text-black font-semibold hover:bg-gray-100 transition duration-200 border-b">
                    <td class="px-4 py-3">{{$document->division->division_name}}</td>
                    <td class="px-4 py-3">{{$document->full_number}}</td>
                    <td class="px-4 py-3">{{$document->id}}</td>
                    <td class="px-4 py-3">{{$document->document_code}}</td>
                    <td class="px-4 py-3">
                        {{ \Carbon\Carbon::parse($document->date_archived)->format('Y') }}
                    </td>
                    <td class="px-4 py-3">{{$document->treasury->treasury_number}}</td>
                    <td class="px-4 py-3">{{$document->box->shelf->shelf_number}}</td>
                    <td class="px-4 py-3">{{$document->box->box_number}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>