<!-- resources/views/livewire/add-treasury.blade.php -->

<fieldset class="w-full md:w-2/3 m-auto my-10 shadow-md rounded">
    <legend class="text-blue-600 text-xl font-semibold p-2">إضافة خزنة</legend>
    <form class="flex flex-col p-5 gap-5" wire:submit.prevent="store">
        <!-- Treasury Name Field -->
        <div class="flex flex-col gap-2">
            <x-form-label name="treasury_name">اسم الخزنة</x-form-label>
            <x-form-input wire:model="treasury_name" type="text" name="treasury_name" id="treasury_name" placeholder="اسم الخزنة" required />
            <x-form-error name="treasury_name" />
        </div>

        <!-- Treasury Number Field -->
        <div class="flex flex-col gap-2">
            <x-form-label name="treasury_number">رقم الخزنة</x-form-label>
            <x-form-input wire:model="treasury_number" type="number" name="treasury_number" id="treasury_number" placeholder="رقم الخزنة" min="1" required />
            <x-form-error name="treasury_number" />
        </div>

        <!-- Treasury Location Field -->
        <div class="flex flex-col gap-2">
            <x-form-label name="treasury_location">موقع الخزنة</x-form-label>
            <textarea wire:model="treasury_location" name="treasury_location" id="treasury_location" class="bg-slate-200 p-3" required></textarea>
            <x-form-error name="treasury_location" />
        </div>

        <!-- Submit Button -->
        <x-form-button>
            إضافة خزنة
        </x-form-button>
    </form>
</fieldset>
