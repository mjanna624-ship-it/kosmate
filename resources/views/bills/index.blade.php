<x-app-layout>

    <x-slot name="header">

        <div class="bg-gradient-to-r from-pink-300 via-fuchsia-300 to-purple-300 rounded-2xl p-6 shadow-lg">

            <h2 class="text-3xl font-bold text-white">
                💰 Tagihan
            </h2>

            <p class="text-pink-100 mt-2">
                Pantau semua pengeluaranmu dengan mudah 💖
            </p>

        </div>

    </x-slot>

    <div class="py-8 bg-pink-50 min-h-screen">

        <div class="max-w-6xl mx-auto">

            <div class="flex justify-between items-center mb-6">

                <input
                    type="text"
                    placeholder="🔍 Cari tagihan..."
                    class="rounded-xl border-pink-300 w-80">

                <a
                    href="{{ route('bills.create') }}"
                    class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-5 py-3 rounded-xl shadow hover:scale-105 transition">

                    ➕ Tambah Tagihan

                </a>

            </div>

            @if(session('success'))

                <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-5">
                    {{ session('success') }}
                </div>

            @endif

            <div class="grid md:grid-cols-2 gap-6">

                @forelse($bills as $bill)

                <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">

                    <div class="flex justify-between items-center">

                        <h3 class="text-xl font-bold text-pink-600">
                            {{ $bill->nama }}
                        </h3>

                        @if($bill->status=="Lunas")

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                ✅ Lunas
                            </span>

                        @else

                            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">
                                🔔 Belum Lunas
                            </span>

                        @endif

                    </div>

                    <div class="mt-5 space-y-2">

                        <p>
                            💵
                            <strong>
                                Rp {{ number_format($bill->jumlah,0,',','.') }}
                            </strong>
                        </p>

                        <p>
                            📅
                            {{ \Carbon\Carbon::parse($bill->jatuh_tempo)->translatedFormat('d F Y') }}
                        </p>

                    </div>

                    <div class="flex gap-3 mt-6">

                        <a
                            href="{{ route('bills.edit',$bill->id) }}"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-lg">

                            ✏ Edit

                        </a>

                        <form
                            action="{{ route('bills.destroy',$bill->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Hapus tagihan?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                🗑 Hapus

                            </button>

                        </form>

                    </div>

                </div>

                @empty

                <div class="col-span-2">

                    <div class="bg-white rounded-2xl shadow-lg p-10 text-center">

                        <div class="text-6xl">
                            💰
                        </div>

                        <h2 class="text-2xl font-bold mt-4">

                            Belum Ada Tagihan

                        </h2>

                        <p class="text-gray-500 mt-2">

                            Tambahkan tagihan pertamamu.

                        </p>

                    </div>

                </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>