@extends('layouts.app')

@section('title', 'Ubah Password - Sistem Informasi Pondok Pancasila Reo')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-islamic-green-900">Ubah Password</h1>
            <p class="text-gray-600 mt-1">Perbarui password akun Anda</p>
        </div>

        <!-- Password Form -->
        <div class="bg-white shadow-lg rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <form method="POST" action="{{ route('profile.update-password') }}">
                    @csrf

                    <!-- Current Password -->
                    <div class="mb-6">
                        <label for="current_password" class="block text-sm font-medium text-gray-700">
                            Password Saat Ini
                        </label>
                        <input type="password" id="current_password" name="current_password" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-islamic-green-500 focus:border-islamic-green-500 sm:text-sm @error('current_password') border-red-300 @enderror">
                        @error('current_password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password Baru
                        </label>
                        <input type="password" id="password" name="password" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-islamic-green-500 focus:border-islamic-green-500 sm:text-sm @error('password') border-red-300 @enderror">
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                            Konfirmasi Password Baru
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-islamic-green-500 focus:border-islamic-green-500 sm:text-sm @error('password_confirmation') border-red-300 @enderror">
                        @error('password_confirmation')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Requirements -->
                    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-md">
                        <h4 class="text-sm font-medium text-blue-800 mb-2">
                            <i class="fas fa-info-circle mr-2"></i>Persyaratan Password:
                        </h4>
                        <ul class="text-sm text-blue-700 space-y-1">
                            <li>• Minimal 8 karakter</li>
                            <li>• Mengandung huruf besar dan kecil</li>
                            <li>• Mengandung angka</li>
                        </ul>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('profile.index') }}" class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-islamic-green-500">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-islamic-green-600 hover:bg-islamic-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-islamic-green-500">
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.main-content {
    padding-top: 4rem;
}
</style>
@endsection