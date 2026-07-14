<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="text-center mb-8">

            <h1 class="text-5xl mb-3">
                🌸
            </h1>

            <h2 class="text-4xl font-bold text-pink-600">
                KosMate
            </h2>

            <p class="text-gray-500 mt-2">
                Kelola kehidupan anak kost dengan lebih manis 💖
            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-2xl p-8">

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>

                    <x-input-label
                        for="email"
                        value="📧 Email"
                        class="text-pink-600 font-semibold"/>

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl border-pink-300 focus:border-pink-500 focus:ring-pink-300"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"/>

                </div>

                <!-- Password -->
                <div class="mt-5">

                    <x-input-label
                        for="password"
                        value="🔒 Password"
                        class="text-pink-600 font-semibold"/>

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl border-pink-300 focus:border-pink-500 focus:ring-pink-300"
                        type="password"
                        name="password"
                        required />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"/>

                </div>

                <!-- Remember -->
                <div class="mt-5 flex items-center">

                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        class="rounded border-pink-300 text-pink-500 focus:ring-pink-400">

                    <label
                        for="remember_me"
                        class="ml-2 text-gray-600">

                        Ingat Saya

                    </label>

                </div>

                <!-- Forgot Password -->
                @if(Route::has('password.request'))

                    <div class="mt-4">

                        <a
                            href="{{ route('password.request') }}"
                            class="text-pink-500 hover:text-pink-700 text-sm">

                            Lupa Password?

                        </a>

                    </div>

                @endif

                <!-- Button -->
                <button
                    type="submit"
                    class="mt-6 w-full bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 text-white py-3 rounded-xl font-bold shadow-lg transition duration-300">

                    🌸 Masuk ke KosMate

                </button>

            </form>

            <div class="text-center mt-6">

                <span class="text-gray-500">
                    Belum punya akun?
                </span>

                <a
                    href="{{ route('register') }}"
                    class="text-pink-600 font-semibold hover:underline">

                    Daftar

                </a>

            </div>

        </div>

    </div>

</x-guest-layout>