<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->get();
        return view('pages.book', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'penerbit' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'harga' => 'required',
        ]);

        if ($request->hasFile('cover')) {
            // Ambil file yang di-upload
            $file = $request->file('cover');
            // Buat nama file dengan time stamp dan nama asli file
            $fileName = time() . '_'     . $file->getClientOriginalName();
            // Simpan file di folder public/covers secara langsung
            $file->move(public_path('covers'), $fileName);

            // Simpan data buku di database
            Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'penerbit' => $request->penerbit,
                'cover' => 'covers/' . $fileName, // Simpan path relatif gambar
                'description' => $request->description,
                'harga' => $request->harga,
            ]);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('book.index')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Validasi input
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'penerbit' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'harga' => 'required',
        ]);

        // Update data buku
        $book->title = $request->title;
        $book->author = $request->author;
        $book->penerbit = $request->penerbit;
        $book->description = $request->description;
        $book->harga = $request->harga;

        // Cek jika ada file cover yang diupload
        if ($request->hasFile('cover')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path($book->cover))) {
                unlink(public_path($book->cover));
            }

            // Ambil file yang di-upload
            $file = $request->file('cover');
            // Buat nama file dengan time stamp dan nama asli file
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Simpan file di folder public/covers
            $file->move(public_path('covers'), $fileName);
            // Update path cover
            $book->cover = 'covers/' . $fileName;
        }

        // Simpan perubahan
        $book->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('book.index')->with('success', 'Buku berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Hapus gambar dari penyimpanan jika ada
        if (file_exists(public_path($book->cover))) {
            unlink(public_path($book->cover));
        }

        // Hapus data buku dari database
        $book->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('book.index')->with('success', 'Buku berhasil dihapus');
    }

}
