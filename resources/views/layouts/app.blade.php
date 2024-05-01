<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('custom-style')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        label {
            @apply block uppercase text-slate-700 mb-2
        }

        input,
        textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }
        .error {
            @apply text-red-500 text-sm
        }

        [x-cloak] { display: none !important; }
    </style>
    {{-- blade-formatter-enable --}}
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    @session('success')
        <div 
            class="absolute top-4 right-4 mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700" 
            x-data="{open: true}" 
            x-show="open"
            x-init="setTimeout(() => open = false, 6000)"
        >
            <div class="font-bold">Success!</div>
            <div>{{ session('success') }}</div>
            <div class="absolute top-2 right-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" @click="open = false"
                    stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
    @endsession

    <h1 class="mb-4 text-2xl">@yield('title')</h1>
    <div>@yield('content')</div>
</body>
</html>
