<x-layout>
    <x-slot name="title">
        إضافة مستخدم
    </x-slot>

    <section>
        <x-form-button class="float-left px-4">
            <x-nav-link name='{{ route("addUser") }}' class="text-white">
                إضافة مستخدم
            </x-nav-link>
        </x-form-button>

        <div>
            <form method="GET" action="{{ route('users') }}">
                <input
                    type="search"
                    name="search"
                    id="search"
                    value="{{ old('search') }}"
                    class="p-3 bg-slate-200 w-1/2 outline-none ring-2 ring-transparent focus:ring-blue-500 focus:ring-2 focus:ring-offset-2 rounded-md transition-all duration-300 hover:ring-gray-300"
                    placeholder="البحث عن المستخدمين">
                <button type="submit" class="hidden">Search</button>
            </form>

            <div class="relative overflow-x-auto mt-5 bg-white shadow rounded-lg">
                <table class="cursor-pointer text-sm w-full text-right rtl:text-right rounded-lg" dir="rtl">
                    <thead class="text-xs uppercase bg-slate-800 text-white sticky top-0">
                        <tr>
                            <th scope="col" class="p-4">id</th>
                            <th scope="col" class="p-4">الاسم الأول</th>
                            <th scope="col" class="p-4">اسم العائلي</th>
                            <th scope="col" class="p-4">البريد الإلكتروني</th>
                            <th scope="col" class="p-4">تاريخ التسجيل</th>
                            <th scope="col" class="p-4"></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="text-black font-semibold hover:bg-gray-100 transition duration-200 border-b">
                            <td class="px-4 py-6">{{ $user->id }}</td>
                            <td class="px-4 py-6">{{ $user->first_name }}</td>
                            <td class="px-4 py-6">{{ $user->last_name }}</td>
                            <td class="px-4 py-6">{{ $user->email }}</td>
                            <td class="px-4 py-6">{{ $user->created_at }}</td>
                            <td class="grid grid-cols-2 p-1 gap-2">

                                <form action="{{ route('user.delete', ['user' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @method('DELETE')
                                    @csrf
                                    <x-form-button class="w-full px-4 bg-red-500 hover:bg-red-600">
                                        <i class="fa-solid fa-trash"></i>
                                    </x-form-button>
                                </form>


                                <x-form-button class="px-4 bg-green-500 hover:bg-green-600">
                                    <x-nav-link name='{{ route("user.edit" , ["user" => $user->id]) }}' class="text-white">
                                        <i class="fas fa-edit"></i>
                                    </x-nav-link>
                                </x-form-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $users->links() }}

            </div>
        </div>
    </section>
</x-layout>