<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

  {{-- Header --}}
  @isset($header)
    <header class="bg-white shadow p-4">
      {{ $header }}
    </header>
  @endisset

  {{-- Main Content --}}
  <main class="p-6">
    {{ $slot }}
  </main>

</body>

</html>