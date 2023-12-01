<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Doctor Appointments</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-" crossorigin="anonymous" />


    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


    {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    .btn {
      @apply bg-white rounded-md px-4 py-2 text-center font-medium text-slate-500 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 h-10;
    }

    .input {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-md border-slate-300;
    }

    .authentication-card {
      @apply text-sm rounded-md bg-white px-8 py-12 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10;
    }

    .cards {
      @apply text-sm rounded-md bg-white px-6 py-6 h-40 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10;
    }
  </style>
  {{-- blade-formatter-enable --}}
</head>

<body>
    <main>
        <nav class="py-5 px-5 flex justify-between text-md font-medium">
            <ul class="flex space-x-2">
                <li>
                    <a href="{{ route('homepage') }}">Homepage</a>
                </li>
            </ul>
            <ul class="flex space-x-4  items-center">
                @auth
                    <li>
                        {{ auth()->user()->first_name ?? 'Anonymous' }}
                        {{ auth()->user()->last_name ?? 'Anonymous' }}
                    </li>

                    <li>
                        <form action="{{ route('auth.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn">Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('auth.create') }}">Sign in</a>
                    </li>

                @endauth
            </ul>
        </nav>
        <div class="container mx-auto mt-10 mb-10 max-w-4xl">
            <div x-data="{ flash: true }">
                @if (session()->has('success') || $errors->any())
                    <div x-show="flash" role="alert"
                        class="relative mb-5 rounded border {{ session()->has('success') ? 'border-green-400 bg-green-100 text-green-700' : 'border-red-400 bg-red-100 text-red-700' }} px-4 py-3 pr-12 text-md inline-block max-w-full">
                        <strong class="font-bold">{{ session()->has('success') ? 'Success!' : 'Error!' }}</strong>

                        @if (session()->has('success'))
                            {{ session('success') }}
                        @else
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        @endif

                        <span class="absolute top-0 bottom-0 right-0 px-4 py-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" @click="flash = false" stroke="currentColor"
                                class="h-6 w-6 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </span>
                    </div>
                @endif
            </div>
            @yield('content')
        </div>
    </main>
</body>

</html>
