<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();

        return view('documents.index', ['documents'=> $documents]);
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'file' => 'required|file|mimes:doc,docx,pdf,ppt,pptx,jpg,png|max:2048',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('documents');

        Document::create([
            'description' => $request->input('description'),
            'file_path' => $filePath,
        ]);

        return redirect()->route('documents.index')
            ->with('success', 'Document uploaded successfully.');
    }
}

