@extends('layouts.app')

@section('title', 'Profil Saya - Sistem Informasi Pondok Pancasila Reo')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-islamic-green-900">Profil Saya</h1>
            <p class="text-gray-600 mt-1">Kelola informasi profil Anda</p>
        </div>

        <!-- Profile Card -->
        <div class="bg-white shadow-lg rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center mb-6">
                    <div class="w-20 h-20 bg-islamic-green-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-3xl"></i>
                    </div>
                    <div class="ml-6">
                        <h2 class="text-xl font-semibold text-gray-900">{{ $user->name }}</h2>
                        <p class="text-gray-600">{{ $user->email }}</p>
                        <div class="mt-2">
                            @foreach($user->roles as $role)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-islamic-green-100 text-islamic-green-800">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Informasi Akun</h3>
                        <dl class="mt-2 space-y-1">
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <dt class="text-sm text-gray-600">Nama Lengkap</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $user->name }}</dd>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <dt class="text-sm text-gray-600">Email</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $user->email }}</dd>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <dt class="text-sm text-gray-600">Terdaftar sejak</dt>
                                <dd class="text-sm font-medium text-gray-900">{{ $user->created_at->format('d M Y') }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Aksi Cepat</h3>
                        <div class="mt-2 space-y-2">
                            <a href="{{ route('profile.edit') }}" class="block w-full text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-islamic-green-500">
                                <i class="fas fa-edit mr-2"></i> Edit Profil
                            </a>
                            <a href="{{ route('profile.edit-password') }}" class="block w-full text-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-islamic-green-500">
                                <i class="fas fa-key mr-2"></i> Ubah Password
                            </a>
                        </div>
                    </div>
                </div>
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