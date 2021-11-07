<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            margin: 0;
            text-align: center;
            font-family: "Helvetica";
        }

        .header,
        .main,
        .footer {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header {
            height: 100px;
        }

        .main {}

        .footer {
            background: #176c8d;
            height: 100px;
        }

    </style>
    <header class="header">
        @include('template.navbar')
    </header>
    <main class="main">
        @yield('content')
    </main>
    <footer class="footer">
        @include('template.footer')
    </footer>
</body>

</html>
