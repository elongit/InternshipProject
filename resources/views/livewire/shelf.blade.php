<fieldset class='w-full md:w-2/3  m-auto my-10   shadow-md rounded'>
        <legend class='text-xl font-semibold p-2 ' >إضافة رف</legend>
        <form class='flex flex-col p-5 gap-5  ' wire:submit='store'>

            <div class='flex flex-col gap-2'>
                <x-form-label name='shelf_name'>اسم الرف</x-form-label>
                <x-form-input wire:model='shelf_name' type="text" name='shelf_name' id='shelf_name' placeholder='اسم الرف' />
                <x-form-error name='shelf_name' />
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='shelf_number'>رقم الرف</x-form-label>
                <x-form-input wire:model='shelf_number'  type="number" name='shelf_number' id='shelf_number' min='1' />
                <x-form-error name='shelf_number' />
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='shelf_location'>موقع الرف</x-form-label>
                <textarea wire:model='shelf_location'  name='shelf_location' id='shelf_location' class='bg-slate-200 p-3'></textarea>
                <x-form-error name='shelf_location' />
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='treasury_id'>اختر خزنة</x-form-label>
                <select wire:model='treasury_id'  name="treasury_id" id="treasury_id" class='bg-slate-200 p-3' required>
                    <option value="" disabled selected>اختر خزنة</option>
                    @foreach($Treasuries as $treasury)
                        <option value="{{ $treasury->id }}">{{ $treasury->treasury_name }}</option>
                    @endforeach
                </select>
                <x-form-error name='treasury_id' />
            </div>

            <x-form-button>إضافة رف</x-form-button>
        </form>

    </fieldset>