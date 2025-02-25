<x-layout>
    <x-slot name="title">
       قائمة الوثائق
    </x-slot>

    <div class="relative  overflow-x-auto mt-5 bg-white shadow  rounded-lg">
        <table class=" cursor-pointer text-sm w-full text-right rtl:text-right rounded-lg" dir="rtl">
            <thead class="text-xs uppercase bg-slate-800 text-white sticky top-0">
                <tr>
                    <th scope="col" class="px-4 py-3">القسم</th>
                    <th scope="col" class="px-4 py-3">الرقم الكامل</th>
                    <th scope="col" class="px-4 py-3">معرف الوثيقة</th>
                    <th scope="col" class="px-4 py-3">رمز الوثيقة</th>
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
</x-layout>
