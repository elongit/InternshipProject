
    <fieldset class='w-full md:w-2/3 m-auto my-10 shadow-md rounded'>
        <legend class='text-blue-600 text-xl font-bold'>تسجيل الدخول</legend>
        <form class='flex flex-col p-5 gap-5' wire:submit='store'>
            <x-form-error name='Invalidcredentials' />
            
            <div class='flex flex-col gap-2'>
                <x-form-label name='email'>البريد الإلكتروني</x-form-label>
                <x-form-input wire:model='email' type="email" name='email' id='email'
                    placeholder='أدخل بريدك الإلكتروني' />
                <x-form-error name='email' />
            </div>
            
            <div class='flex flex-col gap-2'>
                <x-form-label name='password'>كلمة المرور</x-form-label>
                <x-form-input  wire:model='password' type="password" name='password' id='password'
                    placeholder='******'/>
                <x-form-error name='password' />
            </div>
            
            <x-form-button>
                تسجيل الدخول
            </x-form-button>
            
            <small>
                ليس لديك حساب بعد؟ <x-nav-link name="{{ route('register') }}">اشترك الآن</x-nav-link>
            </small>
        </form>
    </fieldset>
