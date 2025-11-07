@extends('layouts.app')

@section('title', 'Edit Profil - Sistem Informasi Pondok Pancasila Reo')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-islamic-green-900">Edit Profil</h1>
            <p class="text-gray-600 mt-1">Perbarui informasi profil Anda</p>
        </div>

        <!-- Edit Form -->
        <div class="bg-white shadow-lg rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf

                    <!-- Name Field -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Nama Lengkap
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-islamic-green-500 focus:border-islamic-green-500 sm:text-sm @error('name') border-red-300 @enderror">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-islamic-green-500 focus:border-islamic-green-500 sm:text-sm @error('email') border-red-300 @enderror">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('profile.index') }}" class="px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-islamic-green-500">
                            Batal
                        </a>
                        <button type="submit" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-islamic-green-600 hover:bg-islamic-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-islamic-green-500">
                            Simpan Perubahan
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