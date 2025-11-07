@extends('layouts.app')

@section('title', 'Login - Sistem Informasi Pondok Pancasila Reo')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-islamic-green-50 to-islamic-green-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="mx-auto h-20 w-20 flex items-center justify-center rounded-full bg-islamic-green-600 shadow-lg">
                <i class="fas fa-graduation-cap text-gold-500 text-3xl"></i>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-islamic-green-900">
                Masuk ke Sistem
            </h2>
            <p class="mt-2 text-center text-sm text-islamic-green-700">
                Sistem Informasi Pondok Pancasila Reo
            </p>
        </div>

        @if (session('status'))
            <div class="rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-400"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">
                            {{ session('status') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border {{ $errors->has('email') ? 'border-red-300' : 'border-gray-300' }} placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-islamic-green-500 focus:border-islamic-green-500 focus:z-10 sm:text-sm"
                           placeholder="Email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <p class="mt-1 text-sm text-red-600">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border {{ $errors->has('password') ? 'border-red-300' : 'border-gray-300' }} placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-islamic-green-500 focus:border-islamic-green-500 focus:z-10 sm:text-sm"
                           placeholder="Password">
                    @if ($errors->has('password'))
                        <p class="mt-1 text-sm text-red-600">{{ $errors->first('password') }}</p>
                    @endif
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-islamic-green-600 focus:ring-islamic-green-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-islamic-green-700">
                        Ingat saya
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-islamic-green-600 hover:text-islamic-green-500">
                            Lupa password?
                        </a>
                    </div>
                @endif
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-islamic-green-600 hover:bg-islamic-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-islamic-green-500 transition-colors duration-200">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-lock text-islamic-green-500 group-hover:text-islamic-green-400"></i>
                    </span>
                    Masuk
                </button>
            </div>
        </form>

        <!-- Demo accounts information -->
        <div class="mt-6 bg-islamic-green-50 rounded-lg p-4 border border-islamic-green-200">
            <h3 class="text-sm font-semibold text-islamic-green-800 mb-2">
                <i class="fas fa-info-circle mr-2"></i>Akun Demo
            </h3>
            <div class="space-y-2 text-xs text-islamic-green-700">
                <div><strong>Admin:</strong> admin@pondokpancasila.sch.id / password</div>
                <div><strong>Guru:</strong> teacher@pondokpancasila.sch.id / password</div>
                <div><strong>Siswa:</strong> student@pondokpancasila.sch.id / password</div>
                <div><strong>Orang Tua:</strong> parent@pondokpancasila.sch.id / password</div>
            </div>
        </div>
    </div>
</div>
@endsection