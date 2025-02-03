<!-- App Layout (app.blade.php) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Layout</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icons Bootstrap (optionnel) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
        <!-- Styles -->
        <style>
        [x-cloak] {
            display: none;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2">
                @include('navigation.sidebar')
            </div>
            <main class="px-4 sm:px-6 flex-1">
                    {{ $slot }}
                </main>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Toggle dropdown visibility
        const userMenuBtn = document.querySelector('button');
        const dropdown = document.querySelector('div[role="menu"]');

        userMenuBtn.addEventListener('click', () => {
            dropdown.classList.toggle('hidden');
        });
    </script>
</body>
</html>
