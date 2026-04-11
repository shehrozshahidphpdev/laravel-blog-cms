@props([
    'title'
])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "Admin" }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen overflow-hidden">
        <x-partials.admin-sidebar />

        <!-- Main -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <x-partials.admin-header />
            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-5">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        function toggle(id) {
            const all = ['notif-dd'];
            all.forEach(d => {
                if (d !== id) document.getElementById(d).classList.add('hidden');
            });
            document.getElementById(id).classList.toggle('hidden');
        }

        document.addEventListener('click', function (e) {
            if (!e.target.closest('#notif-wrap') && !e.target.closest('#menu-wrap')) {
                document.getElementById('notif-dd').classList.add('hidden');
                document.getElementById('menu-dd').classList.add('hidden');
            }
        });
    </script>

</body>

</html>