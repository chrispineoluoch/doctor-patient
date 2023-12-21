<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Doctor Appointments</title>

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <script src="https://cdn.tailwindcss.com"></script>

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
  </style>
  {{-- blade-formatter-enable --}}
</head>

<body>
    <main>
      <nav class="py-5 px-5 flex justify-between text-lg font-medium">
        <ul class="flex space-x-2">
          <li>
            <a href="{{ route('homepage') }}">Homepage</a>
          </li>
        </ul>
        <ul class="flex space-x-2">
          @auth

          <li>
            {{ auth()->user()->first_name ?? 'Anonymous' }}
          </li>
          <li>
            <form action="{{ route('auth.destroy') }}" method="POST">
              @csrf
              @method('DELETE')
              <button>Logout</button>
            </form>
          </li>

            @else

            <li>
              <a href="{{ route('auth.create') }}">Sign in</a>
            </li>

          @endauth
        </ul>
      </nav>
      <div class="container mx-auto mt-10 mb-10 max-w-sm">
        @yield('content')
      </div>
    </main>
  
</body>

</html>