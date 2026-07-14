<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            ➕ Tambah Tagihan
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('bills.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Nama Tagihan</label>
                <input
                    type="text"
                    name="nama"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Jumlah (Rp)</label>
                <input
                    type="number"
                    name="jumlah"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Jatuh Tempo</label>
                <input
                    type="date"
                    name="jatuh_tempo"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Status</label>

                <select
                    name="status"
                    class="w-full border rounded p-2">

                    <option value="Belum Lunas">Belum Lunas</option>
                    <option value="Lunas">Lunas</option>

                </select>

            </div>

            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">

                💾 Simpan Tagihan

            </button>

        </form>

    </div>

</x-app-layout>