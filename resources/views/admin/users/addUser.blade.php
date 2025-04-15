<x-layout>
    <x-slot name="title">
        إضافة مستخدم
    </x-slot>
    <fieldset class='w-full md:w-2/3 m-auto my-10 p-2 shadow-md rounded'>
        <legend class='text-blue-600 text-2xl font-semibold'>
        إضافة مستخدم

        </legend>
        <form class='flex flex-col p-5 gap-5' action="{{ route('addUser.store') }}" method="post">
            @csrf
            <div class='grid grid-cols-2 gap-2'>
                <div class='flex flex-col gap-2'>
                    <x-form-label name='first_name'>الاسم الأول</x-form-label>
                    <x-form-input wire:model='first_name' required type="text" name='first_name' id='first_name' placeholder='أدخل اسمك الأول'/>
                    <x-form-error name='first_name' />
                </div>
                <div class='flex flex-col gap-2'>
                    <x-form-label name='last_name'>اسم العائلة</x-form-label>
                    <x-form-input wire:model='last_name' required type="text" name='last_name' id='last_name' placeholder='أدخل اسمك الأخير'/>
                    <x-form-error name='last_name' />
                </div>
            </div>
            <div class='flex flex-col gap-2'>
                <x-form-label name='email'>البريد الإلكتروني</x-form-label>
                <x-form-input wire:model='email' required type="email" name='email' id='email' placeholder='أدخل بريدك الإلكتروني'/>
                <x-form-error name='email' />
            </div>
            <div class='flex flex-col gap-2'>
                <x-form-label name='password'>كلمة المرور</x-form-label>
                <x-form-input wire:model='password' required type="password" name='password' id='password' placeholder='******'/>
                <x-form-error name='password' />
            </div>
            <div class='flex flex-col gap-2'>
                <x-form-label name='password_confirmation'>تأكيد كلمة المرور</x-form-label>
                <x-form-input wire:model='password_confirmation' required type="password" name='password_confirmation' id='password_confirmation' placeholder='******'/>
                <x-form-error name="password_confirmation" />
            </div>
            <x-form-button>
                تسجيل المستخدم
            </x-form-button>
        </form>
    </fieldset>
</x-layout>
