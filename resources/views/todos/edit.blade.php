<x-app-layout>

    <x-slot name="header">
        <div class="bg-gradient-to-r from-pink-300 via-fuchsia-300 to-purple-300 rounded-3xl p-6 shadow-xl">

            <h2 class="text-3xl font-bold text-white">
                ✏️ Edit Tugas
            </h2>

            <p class="text-pink-100 mt-2">
                Perbarui tugasmu dengan mudah 🌸
            </p>

        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-pink-50 via-purple-50 to-rose-100 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white rounded-3xl shadow-xl border border-pink-100 p-8">

                <form action="{{ route('todos.update', $todo) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            📝 Nama Tugas
                        </label>

                        <input
                            type="text"
                            name="tugas"
                            value="{{ old('tugas', $todo->tugas) }}"
                            class="w-full rounded-xl border-pink-200 focus:border-pink-400 focus:ring-pink-300">

                    </div>

                    <div class="mb-5">

                        <label class="block font-semibold mb-2">
                            📅 Deadline
                        </label>

                        <input
                            type="date"
                            name="deadline"
                            value="{{ old('deadline', $todo->deadline) }}"
                            class="w-full rounded-xl border-pink-200 focus:border-pink-400 focus:ring-pink-300">

                    </div>

                    <div class="mb-6">

                        <label class="block font-semibold mb-2">
                            ✅ Status
                        </label>

                        <select
                            name="status"
                            class="w-full rounded-xl border-pink-200 focus:border-pink-400 focus:ring-pink-300">

                            <option value="Belum"
                                {{ $todo->status == 'Belum' ? 'selected' : '' }}>
                                Belum
                            </option>

                            <option value="Selesai"
                                {{ $todo->status == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                        </select>

                    </div>

                    <div class="flex gap-3">

                        <button
                            type="submit"
                            class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-xl shadow">

                            💾 Simpan

                        </button>

                        <a href="{{ route('todos.index') }}"
                           class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-xl">

                            Batal

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>