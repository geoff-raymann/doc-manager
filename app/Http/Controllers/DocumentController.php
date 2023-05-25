<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    //Implementing Document COntroller
    
    public function index()
    {
        $documents = Document::all();

        return view('documents.index', compact('documents'));

    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'file' => 'required|file'
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $file->storeAs('documents', $filename);

        Document::create([
            'description' => $request->input('description'),
            'filename' => $filename
        ]);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');

    }

    public function download($id)
    {
        $document = Document::findOrFail($id);
        return Storage::download('documents/' . $document->filename);
    }
}
