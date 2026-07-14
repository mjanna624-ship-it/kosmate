<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            ✏️ Edit Jadwal
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold">Judul</label>
                <input
                    type="text"
                    name="judul"
                    value="{{ old('judul', $schedule->judul) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Tanggal</label>
                <input
                    type="date"
                    name="tanggal"
                    value="{{ old('tanggal', $schedule->tanggal) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Jam</label>
                <input
                    type="time"
                    name="jam"
                    value="{{ old('jam', substr($schedule->jam,0,5)) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Keterangan</label>
                <textarea
                    name="keterangan"
                    class="w-full border rounded p-2">{{ old('keterangan', $schedule->keterangan) }}</textarea>
            </div>

            <button
                type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded-lg shadow">
                💾 Update Jadwal
            </button>

        </form>

    </div>
</x-app-layout>