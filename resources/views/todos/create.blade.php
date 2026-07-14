<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            ➕ Tambah Tugas
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('todos.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Nama Tugas</label>

                <input
                    type="text"
                    name="tugas"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Deadline</label>

                <input
                    type="date"
                    name="deadline"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Status</label>

                <select
                    name="status"
                    class="w-full border rounded p-2">

                    <option value="Belum">Belum</option>
                    <option value="Selesai">Selesai</option>

                </select>
            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded">

                💾 Simpan Tugas

            </button>

        </form>

    </div>

</x-app-layout>