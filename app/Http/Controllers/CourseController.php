<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data course
        $courses = Course::orderBy('id', 'desc')->get();
        return view('pages.course', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat course baru
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nama_course' => 'required|string|max:255',
            'jenis_course' => 'required|string|max:255',
            'materi_course' => 'required|string',
            'modul' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
            'link_course' => 'required|string|max:255',
        ]);

        // Proses upload file modul
        if ($request->hasFile('modul')) {
            $file = $request->file('modul');
            // Simpan file di folder 'moduls' di storage
            $filePath = $file->store('moduls', 'public');
            $validatedData['modul'] = $filePath;
        }

        // Simpan data course ke database
        Course::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('courses.index')->with('success', 'Course berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // Tampilkan detail dari course tertentu
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Temukan satu course berdasarkan ID
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nama_course' => 'required|string|max:255',
            'jenis_course' => 'required|string|max:255',
            'materi_course' => 'required|string',
            'modul' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
            'link_course' => 'required|string|max:255',
        ]);

        // Cek apakah ada file modul yang diupload baru
        if ($request->hasFile('modul')) {
            $file = $request->file('modul');
            // Simpan file baru di folder 'moduls' di storage
            $filePath = $file->store('moduls', 'public');
            $validatedData['modul'] = $filePath;
        }

        // Update data course
        $course->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('courses.index')->with('success', 'Course berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Hapus course
        $course->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('courses.index')->with('success', 'Course berhasil dihapus');
    }
}
