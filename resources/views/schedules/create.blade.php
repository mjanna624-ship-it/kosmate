<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            ➕ Tambah Jadwal
        </h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Judul</label>
                <input type="text" name="judul"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Tanggal</label>
                <input type="date" name="tanggal"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Jam</label>
                <input type="time" name="jam"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Keterangan</label>
                <textarea name="keterangan"
                    class="w-full border rounded p-2"></textarea>
            </div>

            <button
    type="submit"
    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow">
    💾 Simpan Jadwal
</button>
        </form>
    </div>
</x-app-layout>