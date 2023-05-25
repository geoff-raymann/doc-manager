<!-- resources/views/documents/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Management System</title>
</head>
<body>
    <h1>Documents</h1>

    <a href="{{ route('documents.create') }}">Upload Document</a>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>File</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td>{{ $document->description }}</td>
                    <td><a href="{{ route('documents.download', $document->id) }}">{{ $document->filename }}</a></td>
                    <td>
                        <a href="{{ route('documents.download', $document->id) }}">Download</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required>
        <br>
        <label for="file">Document:</label>
        <input type="file" name="file" id="file" required>
        <br>
        <button type="submit">Upload</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td>{{ $document->description }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $document->file_path) }}">Download</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> -->
</body>
</html>