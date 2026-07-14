<x-app-layout>

    <x-slot name="header">
        <div class="bg-gradient-to-r from-pink-300 via-fuchsia-300 to-purple-300 rounded-3xl p-6 shadow-xl">

            <h2 class="text-3xl font-bold text-white">
                🌸 KosMate Dashboard
            </h2>

            <p class="text-pink-100 mt-2">
                Kelola kehidupan anak kost dengan lebih manis 💖
            </p>

        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-pink-50 via-purple-50 to-rose-100 min-h-screen">

        <div class="max-w-6xl mx-auto">

            <div class="bg-white rounded-3xl shadow-xl border border-pink-100 p-8">

                <!-- Sapaan -->
                <h1 class="text-3xl font-bold">
                    Halo, {{ Auth::user()->name }} 👋
                </h1>

                <p class="text-gray-500 mt-2">
                    Selamat datang di KosMate.
                </p>

                <!-- Motivasi -->
                <div class="mt-6 bg-gradient-to-r from-pink-300 via-fuchsia-300 to-purple-300 rounded-3xl p-6 text-white shadow-lg">

                    <h2 class="text-2xl font-bold">
                        🌸 Semangat Hari Ini!
                    </h2>

                    <p class="mt-2">
                        Jangan lupa makan 🍱, minum air putih 💧,
                        dan selesaikan satu tugas hari ini.
                        Kamu pasti bisa! 💖
                    </p>

                </div>

                <!-- Jadwal Hari Ini -->
                @if($jadwalHariIni->count())

                <div class="mt-8 bg-blue-50 border-l-4 border-blue-400 rounded-2xl p-5">

                    <h2 class="font-bold text-blue-700 text-xl">
                        📅 Jadwal Hari Ini
                    </h2>

                    @foreach($jadwalHariIni as $jadwal)

                        <p class="mt-2">
                            <strong>{{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}</strong>
                            —
                            {{ $jadwal->judul }}
                        </p>

                    @endforeach

                </div>

                @endif

                <!-- Statistik -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

                    <div class="bg-pink-200 rounded-3xl p-6 shadow-lg hover:scale-105 transition">

                        <h3 class="font-bold text-xl">
                            📅 Total Jadwal
                        </h3>

                        <p class="text-4xl font-bold text-pink-700 mt-3">
                            {{ $totalJadwal }}
                        </p>

                        <p class="text-gray-600">
                            Jadwal tersimpan
                        </p>

                    </div>

                    <div class="bg-purple-200 rounded-3xl p-6 shadow-lg hover:scale-105 transition">

                        <h3 class="font-bold text-xl">
                            ✅ Total Tugas
                        </h3>

                        <p class="text-4xl font-bold text-purple-700 mt-3">
                            {{ $totalTodo }}
                        </p>

                        <p class="text-gray-600">
                            Tugas tersimpan
                        </p>

                    </div>

                    <div class="bg-orange-200 rounded-3xl p-6 shadow-lg hover:scale-105 transition">

                        <h3 class="font-bold text-xl">
                            💰 Total Tagihan
                        </h3>

                        <p class="text-4xl font-bold text-orange-600 mt-3">
                            {{ $totalTagihan }}
                        </p>

                        <p class="text-gray-600">
                            Tagihan tersimpan
                        </p>

                    </div>

                    <div class="bg-rose-200 rounded-3xl p-6 shadow-lg hover:scale-105 transition">

                        <h3 class="font-bold text-xl">
                            📝 Total Catatan
                        </h3>

                        <p class="text-4xl font-bold text-rose-700 mt-3">
                            {{ $totalCatatan }}
                        </p>

                        <p class="text-gray-600">
                            Catatan tersimpan
                        </p>

                    </div>

                </div>

                <!-- Progress -->
                <div class="mt-8 bg-white rounded-3xl shadow-lg border border-pink-100 p-6">

                    <h2 class="text-xl font-bold mb-4">
                        📈 Progress Tugas
                    </h2>

                    <div class="w-full bg-gray-200 rounded-full h-5">

                        <div
                            class="bg-gradient-to-r from-pink-400 via-fuchsia-400 to-purple-400 h-5 rounded-full transition-all duration-700"
                            style="width: {{ $progress }}%">
                        </div>

                    </div>

                    <p class="mt-3">

                        {{ $tugasSelesai }}
                        dari
                        {{ $totalTodo }}
                        tugas selesai

                        ({{ $progress }}%)

                    </p>

                </div>

                <!-- Jadwal -->
                <div class="mt-8 bg-white rounded-3xl shadow-lg border border-pink-100 p-6">

                    <h2 class="text-xl font-bold mb-4">
                        📅 Jadwal Hari Ini
                    </h2>

                    @forelse($jadwalHariIni as $jadwal)

                        <div class="border-b border-pink-100 py-3">

                            <div class="font-semibold">
                                {{ $jadwal->judul }}
                            </div>

                            <div class="text-gray-500">
                                {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}
                            </div>

                            @if($jadwal->keterangan)

                                <div class="text-gray-400">
                                    {{ $jadwal->keterangan }}
                                </div>

                            @endif

                        </div>

                    @empty

                        <p class="text-gray-400">
                            Tidak ada jadwal hari ini.
                        </p>

                    @endforelse

                </div>

                <!-- Tagihan -->
                <div class="mt-8 bg-white rounded-3xl shadow-lg border border-pink-100 p-6">

                    <h2 class="text-xl font-bold mb-4">
                        🔔 Tagihan Mendekati Jatuh Tempo
                    </h2>

                    @forelse($tagihanMendekati as $bill)

                        <div class="border-b border-pink-100 py-3">

                            <div class="font-semibold">
                                {{ $bill->nama }}
                            </div>

                            <div class="text-gray-600">

                                Jatuh Tempo :
                                {{ \Carbon\Carbon::parse($bill->jatuh_tempo)->format('d M Y') }}

                            </div>

                            <div class="text-red-500 font-bold">

                                {{ $bill->status }}

                            </div>

                        </div>

                    @empty

                        <p class="text-gray-400">
                            Tidak ada tagihan mendekati jatuh tempo.
                        </p>

                    @endforelse

                </div>

                <!-- Grafik -->
                <div class="mt-8 bg-white rounded-3xl shadow-lg border border-pink-100 p-6">

                    <h2 class="text-xl font-bold mb-5">
                        📊 Statistik KosMate
                    </h2>

                    <canvas id="statistikChart"></canvas>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctx = document.getElementById('statistikChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: [

                    'Jadwal',
                    'Tugas',
                    'Tagihan',
                    'Catatan'

                ],

                datasets: [{

                    label: 'Jumlah Data',

                    data: [

                        {{ $totalJadwal }},
                        {{ $totalTodo }},
                        {{ $totalTagihan }},
                        {{ $totalCatatan }}

                    ],

                    backgroundColor: [

                        '#F9A8D4',
                        '#D8B4FE',
                        '#FDBA74',
                        '#FDA4AF'

                    ],

                    borderRadius: 12

                }]

            },

            options: {

                responsive: true,

                plugins: {

                    legend: {

                        display: false

                    }

                },

                scales: {

                    y: {

                        beginAtZero: true

                    }

                }

            }

        });

    </script>

</x-app-layout>