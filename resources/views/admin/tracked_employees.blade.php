<x-layout>
    <x-slot name="title">
        سجل الأنشطة الوثائقية للموظفين  
    </x-slot>

    <div class="relative mt-5 shadow-md sm:rounded-lg overflow-x-auto">
        <table class="w-full text-sm text-right bg-white shadow rounded-lg rtl:text-right">
            <thead class="text-xs uppercase bg-slate-800 text-white sticky top-0 z-10">
                <tr>
                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        رقم المستخدم
                    </th>

                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        المُسلِم      
                    </th>

                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        المسلم اليه  
                    </th>

                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        القسم
                    </th>

                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        الموضوع
                    </th>
                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        مرجع الوثيقة
                    </th>
                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        نوع العملية
                    </th>

                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        وقت العملية 
                    </th>

                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        السنة
                    </th>

                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        تاريخ التسليم
                    </th>
                    <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">
                        ﺗﺎرﻳﺦ ارﺟﺎع اﻟﻤﻠﻒ
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($documentInfo as $document)
                    <tr class="font-semibold text-gray-950 hover:bg-slate-100 border-b-2 border-gray-200">
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$document->user->id}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$document->user->first_name}} {{$document->user->last_name}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$document->employee_full_name ?? '---'}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$document->division->division_name}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$document->operation_topic}}
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$document->document->full_number}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{ ucfirst($document->operation_type) == 'Print' ? 'طباعة' : 'تحميل' }}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{\Carbon\Carbon::parse($document->created_at)->format('H:i:s')}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{\Carbon\Carbon::parse($document->created_at)->format('Y')}}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{\Carbon\Carbon::parse($document->created_at)->format('Y-m-d')}}
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$document->return_date}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $documentInfo->links() }} 
    </div>
</x-layout>
