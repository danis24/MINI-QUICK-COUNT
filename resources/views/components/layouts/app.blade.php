<!-- resources/views/components/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <livewire:styles />
    <livewire:scripts />
    <script src="{{asset('js/app.js')}}"></script>
    <title>BADA - SmartElection</title>
</head>

<body>
    <main>
        {{ $slot }}
    </main>
</body>

</html>