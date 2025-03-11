<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finesse Me</title>
    @vite('resources/css/app.css')
</head>
<body>
    <style>
        body {
            background-color: #020202d5;
        }
    </style>
    <div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
