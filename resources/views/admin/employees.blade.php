<x-layout>
    <x-slot name="title">
        الموظفون
    </x-slot>

    <div class="relative overflow-x-auto mt-5 shadow-md sm:rounded-lg">
        <table class="cursor-pointer w-full text-sm text-right bg-white shadow rounded-lg rtl:text-right">
            <thead class="text-xs uppercase bg-slate-800 text-white sticky top-0">
                <tr>
                    <th scope="col" class="px-4 py-3 text-center">
                        رقم المستخدم
                    </th>

                    <th scope="col" class="px-4 py-3 text-center">
                        اسم الموظف
                    </th>

                    <th scope="col" class="px-4 py-3 text-center">
                        القسم
                    </th>
                   
                    <th scope="col" class="px-4 py-3 text-center">
                        الموضوع
                    </th>
                    <th scope="col" class="px-4 py-3 text-center">
                        مرجع الوثيقة
                    </th>
                    <th scope="col" class="px-4 py-3 text-center">
                        نوع العملية
                    </th>

                    <th scope="col" class="px-4 py-3 text-center">
                    وقت العملية 
                     </th>

                    <th scope="col" class="px-4 py-3 text-center">
                        السنة
                    </th>

                    <th scope="col" class="px-4 py-3 text-center">
                        تاريخ التسليم
                    </th>
                    <th scope="col" class="px-4 py-3 text-center">
                        ﺗﺎرﻳﺦ ارﺟﺎع اﻟﻤﻠﻒ
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($documentInfo as $document)
                    <tr class=" font-semibold text-gray-950 hover:bg-slate-100 border-b-2 border-gray-200">
                        <td class="px-1 py-3 text-center">
                            {{$document->user->id}}
                        </td>

                        <td class="px-1 py-3 text-center">
                            {{$document->user->first_name}} {{$document->user->last_name}}
                        </td>

                        <td class="px-1 py-3 text-center">
                            {{$document->division->division_name}}
                        </td>

                       
                        <td class="px-1 py-3 text-center">
                            {{$document->operation_topic}}
                        </td>
                        <td class="px-1 py-3 text-center">
                            {{$document->document->full_number}}
                        </td>
                     
                        <td class="px-1 py-3 text-center">
                         {{ ucfirst($document->operation_type) == 'Print' ? 'طباعة' : 'تحميل' }}
                        </td>
                        
                        <td class="px-1 py-3 text-center">
                        {{\Carbon\Carbon::parse($document->created_at)->format('H:i:s')}}
                        </td>

                        
                        <td class="px-1 py-3 text-center">
                            {{\Carbon\Carbon::parse($document->created_at)->format('Y')}}
                        </td>
                       

                        <td class="px-1 py-3 text-center">
                            {{\Carbon\Carbon::parse($document->created_at)->format('Y-m-d')}}
                        </td>
                        <td class="px-1 py-3 text-center">
                            {{$document->return_date}}
                        </td>
          
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
