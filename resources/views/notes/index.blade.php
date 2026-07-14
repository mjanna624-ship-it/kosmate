<x-app-layout>

    <x-slot name="header">

        <div class="bg-gradient-to-r from-pink-300 via-fuchsia-300 to-purple-300 rounded-2xl p-6 shadow-lg">

            <h2 class="text-3xl font-bold text-white">
                📝 Catatan
            </h2>

            <p class="text-pink-100 mt-2">
                Simpan ide, pengingat, dan cerita kecilmu 💖
            </p>

        </div>

    </x-slot>

    <div class="py-8 bg-pink-50 min-h-screen">

        <div class="max-w-6xl mx-auto">

            <div class="flex justify-between items-center mb-8">

                <h2 class="text-2xl font-bold text-gray-700">
                    Sticky Notes
                </h2>

                <a
                    href="{{ route('notes.create') }}"
                    class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-5 py-3 rounded-xl shadow hover:scale-105 transition">

                    ➕ Tambah Catatan

                </a>

            </div>

            @if(session('success'))

                <div class="bg-green-100 text-green-700 rounded-xl p-4 mb-6">
                    {{ session('success') }}
                </div>

            @endif

            <div class="grid md:grid-cols-3 gap-6">

                @forelse($notes as $note)

                <div class="bg-yellow-100 rounded-3xl shadow-lg p-6 hover:rotate-1 hover:scale-105 transition">

                    <h3 class="text-xl font-bold text-pink-700">
                        {{ $note->judul }}
                    </h3>

                    <p class="mt-4 text-gray-700 whitespace-pre-line">
                        {{ $note->isi }}
                    </p>

                    <div class="text-sm text-gray-500 mt-6">
                        {{ $note->created_at->format('d M Y') }}
                    </div>

                    <div class="flex gap-3 mt-5">

                        <a
                            href="{{ route('notes.edit',$note) }}"
                            class="bg-purple-400 hover:bg-purple-500 text-white px-3 py-2 rounded-lg">

                            ✏ Edit

                        </a>

                        <form
                            action="{{ route('notes.destroy',$note) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus catatan?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">

                                🗑 Hapus

                            </button>

                        </form>

                    </div>

                </div>

                @empty

                <div class="col-span-3">

                    <div class="bg-white rounded-3xl shadow-lg p-12 text-center">

                        <div class="text-6xl">
                            📝
                        </div>

                        <h2 class="text-2xl font-bold mt-4">

                            Belum Ada Catatan

                        </h2>

                        <p class="text-gray-500">

                            Yuk tulis catatan pertamamu 💖

                        </p>

                    </div>

                </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>