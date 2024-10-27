<!DOCTYPE html>
<html x-data="data" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Pendaftaran Mahasiswa Baru', 'Pendaftaran Mahasiswa Baru') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Scripts -->
    <script src="{{ asset('js/init-alpine.js') }}"></script>
</head>

<body>
    <div
        class="flex h-screen bg-gray-50"
        :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('layouts.navigation')
        <!-- Mobile sidebar -->
        <!-- Backdrop -->
        @include('layouts.navigation-mobile')
        <div class="flex flex-col flex-1 w-full">
            @include('layouts.top-menu')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">

                    <!-- ALERT -->
                    @if (session('error'))
                    <div id="error-alert-container" role="alert" class="rounded-xl border border-red-500 bg-red-200 p-4 mt-5">
                        <div class="flex items-start gap-4">
                            <span class="text-red-600">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>

                            <div class="flex-1">
                                <strong class="block font-medium text-gray-900">Error</strong>
                                <p class="mt-1 text-sm text-gray-700">{{ session('error') }}</p>
                            </div>

                            <button class="text-gray-500 transition hover:text-gray-600" onclick="closeAlert('error-alert-container')">
                                <span class="sr-only">Dismiss popup</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endif

                    @if (session('success'))
                    <div id="success-alert-container" role="alert" class="rounded-xl border border-green-500 bg-green-200 p-4 mt-5">
                        <div class="flex items-start gap-4">
                            <span class="text-green-600">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>

                            <div class="flex-1">
                                <strong class="block font-medium text-gray-900">Success</strong>
                                <p class="mt-1 text-sm text-gray-700">{{ session('success') }}</p>
                            </div>

                            <button class="text-gray-500 transition hover:text-gray-600" onclick="closeAlert('success-alert-container')">
                                <span class="sr-only">Dismiss popup</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endif

                    <script>
                        function closeAlert(containerId) {
                            const alertContainer = document.getElementById(containerId);
                            if (alertContainer) {
                                alertContainer.style.display = 'none';
                            }
                        }
                    </script>

                    <!-- ALERT -->
                    @if (isset($header))
                    <h2 class="my-6 text-2xl font-semibold text-gray-700">
                        {{ $header }}
                    </h2>
                    @endif
                    <!-- ALERT -->
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>