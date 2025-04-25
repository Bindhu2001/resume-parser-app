<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use Smalot\PdfParser\Parser;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::latest()->paginate(10);
        return view('resume.index', compact('resumes'));
    }

    public function create()
    {
        return view('resume.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('resume');
        $path = $file->storeAs('resumes', $file->getClientOriginalName());

        $parser = new Parser();
        $pdf = $parser->parseFile(storage_path("app/" . $path));
        $text = $pdf->getText();

       
        preg_match('/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/', $text, $emails);
        preg_match('/(\+\d{1,2}\s)?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}/', $text, $phones);

        preg_match('/skills[:\s]+(.{10,1000}?)(experience|education|projects|$)/is', $text, $skillsMatch);
        $skills = trim(preg_replace('/\s+/', ' ', $skillsMatch[1] ?? 'To be updated'));

        $resume = Resume::create([
            'name' => 'Unknown',
            'email' => $emails[0] ?? null,
            'phone' => $phones[0] ?? null,
            'skills' => $skills,
            'experience' => 'To be updated',
        ]);

        return redirect()->route('resume.edit', $resume->id);
    }

    public function edit($id)
    {
        $resume = Resume::findOrFail($id);
        return view('resume.edit', compact('resume'));
    }

    public function update(Request $request, $id)
    {
        $resume = Resume::findOrFail($id);
        $resume->update($request->all());
        return redirect()->route('resume.index')->with('success', 'Resume updated successfully!');
    }
}

