<x-layout>
    <x-slot name="title">
        قائمة الوثائق
    </x-slot>

    <section>
       @AdminAuth

       <x-form-button class="float-left px-4">
            <x-nav-link name='{{ route("AddDocument") }}' class="text-white">
                اضافة ملف   
            </x-nav-link>
        </x-form-button>

        @endAdminAuth

        <div>
            <!-- Regular Search Form -->
            <form method="GET" action="{{ route('documents') }}">
                <input 
                    type="search" 
                    name="search" 
                    id="search" 
                    value="{{ old('search', $search) }}" 
                    class="p-3 bg-slate-200 w-1/2 outline-none ring-2 ring-transparent focus:ring-blue-500 focus:ring-2 focus:ring-offset-2 rounded-md transition-all duration-300 hover:ring-gray-300" 
                    placeholder="الرقم الملف الكامل"
                >
                <button type="submit" class="hidden">Search</button> 
            </form>

            <div class="relative overflow-x-auto mt-5 bg-white shadow rounded-lg">
                <table class="cursor-pointer text-sm w-full text-right rtl:text-right rounded-lg" dir="rtl">
                    <thead class="text-xs uppercase bg-slate-800 text-white sticky top-0">
                        <tr>
                            <th scope="col" class="p-4">القسم</th>
                            <th scope="col" class="p-4">الرقم الكامل</th>
                            <th scope="col" class="p-4">معرف الملف</th>
                            <th scope="col" class="p-4">رمز الملف</th>
                            <th scope="col" class="p-4">السنة</th>
                            <th scope="col" class="p-4">الخزنة</th>
                            <th scope="col" class="p-4">الرف</th>
                            <th scope="col" class="p-4">علبة</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($documents as $document)
                            <tr class="text-black font-semibold hover:bg-gray-100 transition duration-200 border-b">
                                <td class="px-4 py-6">{{ $document->division->division_name }}</td>
                                <td class="px-4 py-6">{{ $document->full_number }}</td>
                                <td class="px-4 py-6">{{ $document->id }}</td>
                                <td class="px-4 py-6">{{ $document->document_code }}</td>
                                <td class="px-4 py-6">
                                    {{ \Carbon\Carbon::parse($document->date_archived)->format('Y') }}
                                </td>
                                <td class="px-4 py-6">{{ $document->treasury->treasury_number }}</td>
                                <td class="px-4 py-6">{{ $document->box->shelf->shelf_number }}</td>
                                <td class="px-4 py-6">{{ $document->box->box_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $documents->links() }}  <!-- Display pagination links -->
            </div>
        </div>
    </section>
</x-layout>
