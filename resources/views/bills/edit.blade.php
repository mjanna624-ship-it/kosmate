<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            ✏️ Edit Tagihan
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('bills.update', $bill->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold">Nama Tagihan</label>
                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $bill->nama) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Jumlah (Rp)</label>
                <input
                    type="number"
                    name="jumlah"
                    value="{{ old('jumlah', $bill->jumlah) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Jatuh Tempo</label>
                <input
                    type="date"
                    name="jatuh_tempo"
                    value="{{ old('jatuh_tempo', $bill->jatuh_tempo) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Status</label>

                <select
                    name="status"
                    class="w-full border rounded p-2">

                    <option value="Belum Lunas"
                        {{ $bill->status == 'Belum Lunas' ? 'selected' : '' }}>
                        Belum Lunas
                    </option>

                    <option value="Lunas"
                        {{ $bill->status == 'Lunas' ? 'selected' : '' }}>
                        Lunas
                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">

                💾 Update Tagihan

            </button>

        </form>

    </div>

</x-app-layout>