@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h1>Document Management</h1>

        <a href="{{ route('documents.create') }}" class="btn btn-primary">Upload Document</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($documents as $document)
                    <tr>
                        <td>{{ $document->description }}</td>
                        <td>
                            <a href="{{ asset($document->file_path) }}" target="_blank">Download</a>
                        </td>
                        <td>
                            <!-- Add delete functionality if needed -->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No documents found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
