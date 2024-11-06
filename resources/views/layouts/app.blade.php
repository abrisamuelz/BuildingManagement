<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Hover Effect */
        .navbar-nav .nav-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Active Tab Highlight */
        .navbar-nav .nav-link.active {
            color: #ffffff !important;
            background-color: #3183ff;
            /* Bootstrap's primary color */
            border-radius: 0px;
        }
    </style>

</head>

<body>
    <!-- Include Navigation Bar -->
    @include('partials.navbar')

    <!-- Breadcrumbs -->
    <div class="container py-2">
        @yield('breadcrumbs')
    </div>

    <!-- Content -->
    <div class="container py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
