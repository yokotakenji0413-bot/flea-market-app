<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>COACHTECH</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div style="background:red; color:white;">
        GUEST TEST
    </div>

    {{ $slot }}

</body>

</html>