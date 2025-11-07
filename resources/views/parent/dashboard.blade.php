@extends('layouts.app')

@section('title', 'Dashboard Orang Tua - Sistem Informasi Pondok Pancasila Reo')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-islamic-green-900">Dashboard Orang Tua</h1>
            <p class="text-gray-600 mt-1">Selamat datang, {{ $user->name }}!</p>
        </div>

        <!-- Children Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Child Card Placeholder -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-islamic-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-child text-white text-lg"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-900">Anak 1</h3>
                            <p class="text-sm text-gray-500">Kelas X-A</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-500">Nilai Rata-rata:</span>
                            <span class="font-semibold text-gray-900 ml-1">-</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Kehadiran:</span>
                            <span class="font-semibold text-gray-900 ml-1">-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- View Children Progress -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-islamic-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-white text-lg"></i>
                        </div>
                        <h3 class="ml-4 text-lg font-semibold text-gray-900">Progress Anak</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Lihat perkembangan akademik anak</p>
                    <a href="#" class="inline-flex items-center text-islamic-green-600 hover:text-islamic-green-700 font-medium">
                        Lihat Progress
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Attendance Records -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gold-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-check text-white text-lg"></i>
                        </div>
                        <h3 class="ml-4 text-lg font-semibold text-gray-900">Kehadiran</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Cek catatan kehadiran anak</p>
                    <a href="#" class="inline-flex items-center text-islamic-green-600 hover:text-islamic-green-700 font-medium">
                        Lihat Kehadiran
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>

            <!-- Academic Reports -->
            <div class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-file-alt text-white text-lg"></i>
                        </div>
                        <h3 class="ml-4 text-lg font-semibold text-gray-900">Rapor</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Lihat laporan akademik anak</p>
                    <a href="#" class="inline-flex items-center text-islamic-green-600 hover:text-islamic-green-700 font-medium">
                        Lihat Rapor
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white shadow-lg rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Aktivitas Terbaru Anak
                </h3>
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-history text-4xl mb-3"></i>
                    <p>Belum ada aktivitas terbaru</p>
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