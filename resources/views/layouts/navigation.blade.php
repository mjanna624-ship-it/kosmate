<nav x-data="{ open: false }" class="bg-gradient-to-r from-pink-300 via-fuchsia-300 to-purple-300 shadow-lg">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">

                <a href="{{ route('dashboard') }}"
                   class="text-2xl font-bold text-white">

                    🌸 KosMate

                </a>

                <div class="hidden sm:flex space-x-2 ml-10">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">

                        🏠 Dashboard

                    </x-nav-link>

                    <x-nav-link
                        :href="route('schedules.index')"
                        :active="request()->routeIs('schedules.*')">

                        📅 Jadwal

                    </x-nav-link>

                    <x-nav-link
                        :href="route('todos.index')"
                        :active="request()->routeIs('todos.*')">

                        ✅ Todo

                    </x-nav-link>

                    <x-nav-link
                        :href="route('bills.index')"
                        :active="request()->routeIs('bills.*')">

                        💰 Tagihan

                    </x-nav-link>

                    <x-nav-link
                        :href="route('notes.index')"
                        :active="request()->routeIs('notes.*')">

                        📝 Catatan

                    </x-nav-link>

                    <x-nav-link
                        :href="route('calendar')"
                        :active="request()->routeIs('calendar')">

                        📆 Kalender

                    </x-nav-link>

                </div>

            </div>

            <!-- User -->

            <div class="hidden sm:flex items-center">

                <x-dropdown align="right">

                    <x-slot name="trigger">

                        <button
                            class="bg-white/20 backdrop-blur px-4 py-2 rounded-xl text-white hover:bg-white/30 transition">

                            👤 {{ Auth::user()->name }}

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">

                            ⚙ Profil

                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">

                                🚪 Logout

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

        </div>

    </div>

</nav>