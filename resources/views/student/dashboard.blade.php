@extends('layouts.app')

@section('title', 'Dashboard Siswa - Sistem Informasi Pondok Pancasila Reo')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-islamic-green-900">Dashboard Siswa</h1>
            <p class="text-gray-600 mt-1">Selamat datang, {{ $user->name }}!</p>
        </div>

        <!-- Student Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Available Tests -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-islamic-green-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-clipboard-list text-white"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Ujian Aktif
                                </dt>
                                <dd class="text-lg font-semibold text-gray-900">
                                    0
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Tests -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gold-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Ujian Selesai
                                </dt>
                                <dd class="text-lg font-semibold text-gray-900">
                                    0
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Average Score -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-chart-line text-white"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Nilai Rata-rata
                                </dt>
                                <dd class="text-lg font-semibold text-gray-900">
                                    -
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attendance Rate -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-user-check text-white"></i>
                            </div>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">
                                    Kehadiran
                                </dt>
                                <dd class="text-lg font-semibold text-gray-900">
                                    0%
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Tests -->
        <div class="bg-white shadow-lg rounded-lg mb-8">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Ujian Tersedia
                </h3>
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-clipboard-list text-4xl mb-3"></i>
                    <p>Belum ada ujian yang tersedia</p>
                </div>
            </div>
        </div>

        <!-- Recent Results -->
        <div class="bg-white shadow-lg rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Hasil Ujian Terbaru
                </h3>
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-chart-bar text-4xl mb-3"></i>
                    <p>Belum ada hasil ujian</p>
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