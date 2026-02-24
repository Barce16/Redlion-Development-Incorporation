<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - REDLION</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
  <style>body{font-family:'Inter',sans-serif;}</style>
</head>
<body class="min-h-screen bg-gray-950 text-white flex items-center justify-center">

  <div class="w-full max-w-md p-8 bg-gray-900/60 border border-white/10 rounded-2xl shadow-xl">
    <div class="text-center mb-6">
      <img src="/images/logo.jpg" alt="logo" class="mx-auto h-12 w-auto object-contain">
      <h1 class="mt-4 text-2xl font-bold">Create your account</h1>
      <p class="text-gray-400 text-sm mt-1">Register to access the dashboard</p>
    </div>

    @if(session('status'))
      <div class="mb-4 p-3 rounded bg-green-600 text-white text-sm">{{ session('status') }}</div>
    @endif

    @if($errors->any())
      <div class="mb-4 p-3 rounded bg-red-600 text-white text-sm">
        <ul class="list-disc list-inside">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
      @csrf

      <div>
        <label class="block text-sm text-gray-300 mb-1">Full name</label>
        <input name="name" type="text" value="{{ old('name') }}" required autofocus
               class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-600" />
      </div>

      <div>
        <label class="block text-sm text-gray-300 mb-1">Email</label>
        <input name="email" type="email" value="{{ old('email') }}" required
               class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-600" />
      </div>

      <div>
        <label class="block text-sm text-gray-300 mb-1">Password</label>
        <input name="password" type="password" required
               class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-600" />
      </div>

      <div>
        <label class="block text-sm text-gray-300 mb-1">Confirm Password</label>
        <input name="password_confirmation" type="password" required
               class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-600" />
      </div>

      <div>
        <button type="submit" class="w-full py-3 bg-red-600 hover:bg-red-700 rounded-lg font-semibold">Register</button>
      </div>
    </form>

    <p class="mt-6 text-center text-gray-400 text-sm">Already have an account? <a href="{{ url('auth/login') }}" class="text-white hover:underline">Sign in</a></p>

  </div>

</body>
</html>
