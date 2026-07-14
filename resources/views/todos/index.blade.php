<x-app-layout>

    <x-slot name="header">
        <div class="bg-gradient-to-r from-pink-300 via-fuchsia-300 to-purple-300 rounded-2xl p-6 shadow-lg">
            <h2 class="text-3xl font-bold text-white">
                ✅ To Do List
            </h2>

            <p class="text-pink-100 mt-2">
                Kelola tugasmu agar lebih produktif 💖
            </p>
        </div>
    </x-slot>

    <div class="py-8 bg-pink-50 min-h-screen">

        <div class="max-w-6xl mx-auto">

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">

                <form class="w-full md:w-1/2">
                    <input
                        type="text"
                        placeholder="🔍 Cari tugas..."
                        class="w-full rounded-xl border-pink-200 focus:border-pink-400 focus:ring-pink-300">
                </form>

                <a href="{{ route('todos.create') }}"
                    class="bg-gradient-to-r from-pink-500 to-purple-500
                    text-white px-6 py-3 rounded-xl shadow hover:scale-105 transition">

                    ➕ Tambah Tugas

                </a>

            </div>

            @if(session('success'))

                <div class="bg-green-100 border border-green-300 text-green-700 rounded-xl p-4 mb-6">
                    {{ session('success') }}
                </div>

            @endif

            <div class="grid md:grid-cols-2 gap-6">

                @forelse($todos as $todo)

                    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">

                        <div class="flex justify-between">

                            <h3 class="text-xl font-bold text-pink-600">
                                📝 {{ $todo->tugas }}
                            </h3>

                            @if($todo->status=="Selesai")

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    ✅ Selesai
                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                    ⏳ Belum
                                </span>

                            @endif

                        </div>

                        <div class="mt-4 text-gray-600">

                            📅 Deadline

                            <div class="font-semibold text-gray-800">

                                {{ \Carbon\Carbon::parse($todo->deadline)->format('d F Y') }}

                            </div>

                        </div>

                        <div class="flex gap-3 mt-6">

                            <a href="{{ route('todos.edit',$todo->id) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">

                                ✏ Edit

                            </a>

                            <form
                                action="{{ route('todos.destroy',$todo->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Hapus tugas ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                    🗑 Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="col-span-2">

                        <div class="bg-white rounded-2xl shadow p-10 text-center">

                            <div class="text-6xl">
                                📝
                            </div>

                            <h2 class="text-2xl font-bold mt-3">
                                Belum Ada Tugas
                            </h2>

                            <p class="text-gray-500 mt-2">
                                Yuk tambahkan tugas pertamamu.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>