<!doctype html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัตินักศึกษา</title>
    <link rel="stylesheet" href="{{ asset('css/student-theme.css') }}">
</head>
<body data-student-template="{{ config('student.theme_slug') }}">
    <h1>ประวัตินักศึกษา</h1>
    <p>Student ID: {{ $id }}</p>
</body>
</html>
