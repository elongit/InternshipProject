<fieldset class='w-full md:w-2/3 m-auto my-10 shadow-md rounded'>
        <legend class='text-xl font-semibold p-2'>إضافة  علبة</legend>
        <form  class='flex flex-col p-5 gap-5' wire:submit='store'>

            <div class='flex flex-col gap-2'>
                <x-form-label name='box_label'>اسم علبة</x-form-label>
                <x-form-input wire:model='box_label' type="text" name='box_label' id='box_label' placeholder='اسم علبة' />
                <x-form-error name='box_label' />
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='box_number'>رقم علبة</x-form-label>
                <x-form-input wire:model='box_number'  type="number" name='box_number' id='box_number' min='1' />
                <x-form-error name='box_number' />
            </div>

            <div class='flex flex-col gap-2'>
                <x-form-label name='shelf_id'>الرف</x-form-label>
                <select wire:model='shelf_id' name="shelf_id" id="shelf_id" class='bg-slate-200 p-3' required>
                    <option value="" selected disabled>اختر رفًا</option>
                    @foreach($Shelves as $shelf)
                        <option value="{{ $shelf->id }}">{{ $shelf->shelf_name }}</option>
                    @endforeach
                </select>
                <x-form-error name='shelf_id' />
            </div>

            <x-form-button>إضافة صندوق</x-form-button>
        </form>
    </fieldset>