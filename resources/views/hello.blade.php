<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
    <h1>The value is {{ $data }}</h1>
    <h1 @style([
        'color:red' => false,
    ])>Blade style directive</h1>

    @php
        $no = 5;
        $collection = [1, 2, 4, 5, 10];
    @endphp

    @for ($i = 0; $i < $no; $i++)
        <div class="p-2">
            <button type="button" @class(['btn' => true, 'btn-primary' => true])>This is button</button>

            <span class="border-2">{{ $i + 1 }}</span>
        </div>
    @endfor

    @foreach ($collection as $item)
        <div class="p-2">
            <button type="button" @class(['btn' => true, 'btn-primary' => "0"])>This is button</button>

            <span class="border-2">{{ $item }}</span>
        </div>
    @endforeach

</body>

</html>
