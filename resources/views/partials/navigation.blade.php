@auth
    <nav class="bg-islamic-green-600 shadow-lg" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                            <i class="fas fa-graduation-cap text-gold-500 text-2xl"></i>
                            <span class="text-white font-bold text-xl">Pondok Pancasila Reo</span>
                        </a>
                    </div>

                    <!-- Main Navigation -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        @if(auth()->user()->hasRole('Admin'))
                            <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-users mr-2"></i>
                                Pengguna
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-file-alt mr-2"></i>
                                CBT
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-user-check mr-2"></i>
                                Absensi
                            </a>
                        @elseif(auth()->user()->hasRole('Teacher'))
                            <a href="{{ route('teacher.dashboard') }}" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-file-alt mr-2"></i>
                                Ujian
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-user-check mr-2"></i>
                                Absensi
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Laporan
                            </a>
                        @elseif(auth()->user()->hasRole('Student'))
                            <a href="{{ route('student.dashboard') }}" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-clipboard-list mr-2"></i>
                                Ujian
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-chart-line mr-2"></i>
                                Nilai
                            </a>
                        @elseif(auth()->user()->hasRole('Parent'))
                            <a href="{{ route('parent.dashboard') }}" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-child mr-2"></i>
                                Anak
                            </a>
                            <a href="#" class="text-white hover:text-gold-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent hover:border-gold-300 transition-colors duration-200">
                                <i class="fas fa-chart-line mr-2"></i>
                                Progress
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Right side buttons -->
                <div class="flex items-center">
                    <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                        <!-- Notifications -->
                        <button class="text-white hover:text-gold-300 p-1 rounded-full hover:bg-islamic-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-islamic-green-500">
                            <i class="fas fa-bell"></i>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" class="text-white hover:text-gold-300 flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-islamic-green-500">
                                    <i class="fas fa-user-circle text-2xl"></i>
                                    <span class="ml-2 hidden lg:block">{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                                </button>
                            </div>

                            <div
                                x-show="open"
                                @click.away="open = false"
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                                style="display: none;"
                            >
                                <div class="py-1">
                                    <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user mr-2"></i> Profil Saya
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = !open" class="text-white hover:text-gold-300 inline-flex items-center justify-center p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="open" x-transition class="sm:hidden" style="display: none;">
            <div class="pt-2 pb-3 space-y-1">
                @if(auth()->user()->hasRole('Admin'))
                    <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gold-300 block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-gold-300">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                @elseif(auth()->user()->hasRole('Teacher'))
                    <a href="{{ route('teacher.dashboard') }}" class="text-white hover:text-gold-300 block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-gold-300">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                @elseif(auth()->user()->hasRole('Student'))
                    <a href="{{ route('student.dashboard') }}" class="text-white hover:text-gold-300 block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-gold-300">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                @elseif(auth()->user()->hasRole('Parent'))
                    <a href="{{ route('parent.dashboard') }}" class="text-white hover:text-gold-300 block pl-3 pr-4 py-2 border-l-4 border-transparent hover:border-gold-300">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                @endif
            </div>
            <div class="pt-4 pb-3 border-t border-islamic-green-700">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-user-circle text-3xl text-white"></i>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-islamic-green-300">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-base font-medium text-white hover:text-gold-300 hover:bg-islamic-green-700">
                        <i class="fas fa-user mr-2"></i> Profil Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-white hover:text-gold-300 hover:bg-islamic-green-700">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
@endauth