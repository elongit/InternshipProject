<x-layout>
    <x-slot name="title">
        طلب استخراج
    </x-slot>

    <fieldset class='text-left rtl:text-right w-2/3 m-auto my-10 p-2 shadow-md rounded' dir="rtl">
        <legend class='text-gray-600 text-2xl font-semibold'>طلب استخراج الملف من المحاضر</legend>
        <form action="{{ route('request.store') }}" method="post" class='flex flex-col p-5 gap-5'>
            @csrf
            <div class='grid grid-cols-2 gap-2'>
                <div class='flex flex-col gap-2'>
                    <x-form-label name='id'>رقم المستخدم</x-form-label>
                    <x-form-input type="text" name='id' id='id' value="{{ $user_id }}" readonly />
                    <x-form-error name='id' />
                </div>
                <div class='flex flex-col gap-2'>
                    <x-form-label name='last_name'>الاسم الكامل</x-form-label>
                    <x-form-input type="text" name='last_name' id='last_name' value="{{ $user_name }}" readonly />
                    <x-form-error name='last_name' />
                </div>
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='division_id'>القسم الخاص بك</x-form-label>
                <select name="division_id" id="division_id" class='bg-slate-200 p-3' required>
                    @foreach($divisions as $division)
                        <option value="{{ $division->id }}">
                            {{ $division->division_name }}
                        </option>
                    @endforeach
                </select>
                <x-form-error name='division_id' />
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='operation_topic'>لأي غرض تحتاج هذا الملف؟</x-form-label>
                <textarea name='operation_topic' id='operation_topic' class='bg-slate-200 p-3' required></textarea>
                <x-form-error name='operation_topic' />
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='request_reference'>مرجع الطلب</x-form-label>
                <x-form-input type="text" name='request_reference' id='request_reference' 
                              placeholder='مرجع الطلب'  required />
                <x-form-error name='request_reference' />
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div class='flex flex-col gap-2'>
                    <x-form-label name='delivery_date'>تاريخ التسليم</x-form-label>
                    <x-form-input type="date" name='delivery_date' id='delivery_date' required />
                    <x-form-error name='delivery_date' />
                </div>

                <div class='flex flex-col gap-2'>
                    <x-form-label name='return_date'> ﺗﺎرﻳﺦ ارﺟﺎع اﻟﻤﻠﻒ </x-form-label>
                    <x-form-input type="date" name='return_date' id='return_date'   />
                    <x-form-error name='return_date' />
                </div>
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='operation_type'>اختر نوع العملية</x-form-label>
                <select name="operation_type" id="operation_type" required class='bg-slate-200 p-3'>
                    <option value="download" >تنزيل</option>
                    <option value="print" >طباعة</option>
                </select>
                <x-form-error name='operation_type' />
            </div>

            <x-form-button>
                استخراج
            </x-form-button>
        </form>
    </fieldset>
</x-layout>
