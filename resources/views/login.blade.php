
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - REDLION</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">
  <style>body{font-family:'Inter',sans-serif;}
    body {
    background-image: url("/images/background.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
  </style>

</head>
<body class="min-h-screen text-white flex items-center justify-center"
  style="background-image: url('{{ asset('images/final.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

  <div class="w-full max-w-md p-8 bg-gray-900/60 border border-white/10 rounded-2xl shadow-xl">
    <div class="text-center mb-6">
      <img src="/images/logo.jpg" alt="logo" class="mx-auto h-12 w-auto object-contain">
      <h1 class="mt-4 text-2xl font-bold">Sign in to your account</h1>
      <p class="text-gray-400 text-sm mt-1">Enter your credentials to continue</p>
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

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
      @csrf

      <div>
        <label class="block text-sm text-gray-300 mb-1">Email</label>
        <input name="email" type="email" value="{{ old('email') }}" required autofocus
               class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-600" />
      </div>

      <div>
        <label class="block text-sm text-gray-300 mb-1">Password</label>
        <input name="password" type="password" required
               class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-white/10 focus:outline-none focus:ring-2 focus:ring-red-600" />
      </div>

      <div class="flex items-center justify-between text-sm text-gray-300">
        <label class="flex items-center gap-2">
          <input type="checkbox" name="remember" class="h-4 w-4 text-red-600 rounded" />
          Remember me
        </label>
        <a href="{{ url('/password/reset') }}" class="hover:underline">Forgot password?</a>
      </div>

      <div>
        <button type="submit" class="w-full py-3 bg-red-600 hover:bg-red-700 rounded-lg font-semibold">Login</button>
      </div>
    </form>

    <p class="mt-6 text-center text-gray-400 text-sm">Don't have an account? <a href="{{ url('auth/register') }}" class="text-white hover:underline">Register</a></p>

  </div>

</body>
</html>
