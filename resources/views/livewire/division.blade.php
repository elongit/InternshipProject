<fieldset class='w-full md:w-2/3  m-auto my-10  shadow-md  rounded'>
        <legend class=' text-blue-600 text-xl font-semibold p-2'>إضافة قسم</legend>
        <form  class='flex flex-col  p-5 gap-5' wire:submit='store'>
            <div class='flex flex-col  gap-2'>
                <x-form-label name='division_name'>اسم القسم</x-form-label>
                <x-form-input wire:model='division_name' type="text" name='division_name' id='division_name'
                    required
                    placeholder='اسم القسم' />
                <x-form-error name='division_name' />
            </div>

            <div class='flex flex-col  gap-2'>
                <x-form-label name='division_location'>الموقع</x-form-label>
                <textarea wire:model='division_location' type="text" name='division_location' id='division_location' class='bg-slate-200 p-3' required> </textarea>
                <x-form-error name='division_location' />
            </div>

            <x-form-button>
                إضافة قسم
            </x-form-button>

        </form>
    </fieldset>