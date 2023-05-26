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
                            <a href="{{ route('documents.download', $document->id) }}" target="_blank">Download</a>
                        </td>
                        <td>
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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

