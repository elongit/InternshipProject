<fieldset class="w-full md:w-2/3 m-auto my-10 rtl:text-right shadow-md rounded" dir="rtl">
    <legend class="text-xl font-semibold p-2">اضافة الملف</legend>
    <form class="flex flex-col p-5 gap-5" enctype="multipart/form-data" wire:submit.prevent="store">

      <div class="grid grid-cols-2 gap-5">
      <div class="flex flex-col gap-2">
            <x-form-label name="document_title">اسم الملف</x-form-label>
            <x-form-input wire:model="document_title" type="text" name="document_title" id="document_title" placeholder="اسم الملف" />
            <x-form-error name="document_title" />
        </div>

        <div class="flex flex-col gap-2">
            <x-form-label name="document_type">نوع الملف </x-form-label>
            <x-form-input wire:model="document_type"  type="text" name="document_type" id="document_type" placeholder="نوع الملف" />
            <x-form-error name="document_type" />
        </div>
      </div>

        <div class="flex flex-col gap-2 my-5 cursor-pointer">
            <x-form-label name="uploaded_document" >
                رفع الملف 
                <i class="fa-solid fa-download"></i>
            </x-form-label>
            <input wire:model="uploaded_document" type="file" name="uploaded_document" class='bg-slate-200 p-3' id="uploaded_document"  />
            <x-form-error name="uploaded_document" />
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="flex flex-col gap-2">
                <x-form-label name="date_archived">تاريخ الأرشفة</x-form-label>
                <x-form-input wire:model="date_archived" type="date" name="date_archived" id="date_archived" />
                <x-form-error name="date_archived" />
            </div>

            <div class="flex flex-col gap-2">
                <x-form-label name="document_code">رمز الملف </x-form-label>
                <x-form-input wire:model="document_code" type="number" name="document_code" id="document_code" min="1" />
                <x-form-error name="document_code" />
            </div>
        </div>

        <!-- Division Selection -->
        <div class="flex flex-col gap-2">
            <x-form-label name="division_id">القسم</x-form-label>
            <select wire:model="division_id" name="division_id" id="division_id" class="bg-slate-200 p-3">
                @foreach($Divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                @endforeach
            </select>
            <x-form-error name="division_id" />
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="flex flex-col gap-2">
                <x-form-label name="treasury_id">اختر خزنة</x-form-label>
                <select wire:model="treasury_id" name="treasury_id" id="treasury_id" class="bg-slate-200 p-3">
                    @foreach($Treasuries as $treasury)
                        <option value="{{ $treasury->id }}">{{ $treasury->treasury_name }}</option>
                    @endforeach
                </select>
                <x-form-error name="treasury_id" />
            </div>

            <div class="flex flex-col gap-2">
                <x-form-label name="box_id">اختر علبة</x-form-label>
                <select wire:model="box_id" name="box_id" id="box_id" class="bg-slate-200 p-3">
                    @foreach($Boxes as $box)
                        <option value="{{ $box->id }}">{{ $box->box_name }}</option>
                    @endforeach
                </select>
                <x-form-error name="box_id" />
            </div>
        </div>

        <x-form-button>إضافة مستند</x-form-button>
    </form>
</fieldset>
