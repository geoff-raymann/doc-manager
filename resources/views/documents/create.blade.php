<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management System - Upload Document</title>
</head>
<body>
    <h1>Upload Document</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach (@errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route(documents.store); }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>
        </div>
        <div>
            <label for="file">File:</label>
            <input type="file" id="file" name="file" required>
        </div>
        <div>
            <button type="submit">Upload</button>
        </div>
    </form>
</body>
</html>