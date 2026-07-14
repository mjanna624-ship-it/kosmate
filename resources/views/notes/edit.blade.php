<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            ✏ Edit Catatan
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('notes.update', $note->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Judul
                </label>

                <input
                    type="text"
                    name="judul"
                    value="{{ old('judul', $note->judul) }}"
                    class="w-full border rounded p-2">

            </div>

            <div class="mb-4">

                <label class="block font-semibold mb-2">
                    Isi Catatan
                </label>

                <textarea
                    name="isi"
                    rows="6"
                    class="w-full border rounded p-2">{{ old('isi', $note->isi) }}</textarea>

            </div>

            <button
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                💾 Update Catatan

            </button>

        </form>

    </div>

</x-app-layout>