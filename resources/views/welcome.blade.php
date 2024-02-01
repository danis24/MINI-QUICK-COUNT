<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        @vite('resources/css/app.css')
    <livewire:styles />
    <livewire:scripts />
    <script src="{{asset('js/app.js')}}"></script>
</head>

<body class="flex flex-wrap justify-center">
    <div class="flex w-full justify-center px-4 bg-green-900 text-white">
        <a class="mx-3 py-4" href="/"><img src="{{ url('images/logo.svg') }}" alt="" width="72"></a>
    </div>
    <div class="flex w-full justify-center px-4 mt-10">
        <h2>QUICK COUNT PEMILIHAN CALON LEGISLATIF</h2>
    </div>
    <div class="my-10 w-full flex justify-center">
        @yield('content')
    </div>

</body>

</html>