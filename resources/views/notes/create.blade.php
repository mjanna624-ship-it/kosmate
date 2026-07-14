<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            ➕ Tambah Catatan
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('notes.store') }}" method="POST">

            @csrf

            <div class="mb-4">

                <label class="font-semibold block mb-2">
                    Judul
                </label>

                <input
                    type="text"
                    name="judul"
                    class="w-full border rounded p-2"
                    required>

            </div>

            <div class="mb-4">

                <label class="font-semibold block mb-2">
                    Isi Catatan
                </label>

                <textarea
                    name="isi"
                    rows="6"
                    class="w-full border rounded p-2"
                    required></textarea>

            </div>

            <button
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                💾 Simpan Catatan

            </button>

        </form>

    </div>

</x-app-layout>