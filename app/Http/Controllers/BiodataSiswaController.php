<?php

namespace App\Http\Controllers;

use App\Models\BiodataSiswa;
use Illuminate\Http\Request;

class BiodataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data BiodataSiswa
        $biodataSiswa = BiodataSiswa::all();
        return view('pages.profile', compact('biodataSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk input data baru
        return view('pages.biodata_siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'required|string|max:255'
        ]);

        // Simpan data ke dalam database
        $biodataSiswa = new BiodataSiswa();
        $biodataSiswa->nama_lengkap = $request->nama_lengkap;
        $biodataSiswa->jurusan = $request->jurusan;
        $biodataSiswa->kelas = $request->kelas;
        $biodataSiswa->bio = $request->bio;

        // Proses upload foto profil
        if ($request->hasFile('foto_profil')) {
            $imageName = time() . '.' . $request->foto_profil->extension();
            // Simpan gambar ke folder storage
            $request->foto_profil->storeAs('profiles', $imageName, 'public');
            $biodataSiswa->foto_profil = $imageName; // Simpan nama file di database
        }

        $biodataSiswa->save();

        return redirect()->route('home')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menampilkan detail dari data siswa
        $biodataSiswa = BiodataSiswa::findOrFail($id);
        return view('pages.biodata_siswa.show', compact('biodataSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Menampilkan form edit data
        $biodataSiswa = BiodataSiswa::findOrFail($id);
        return view('pages.biodata_siswa.edit', compact('biodataSiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'bio' => 'required|string|max:255'
        ]);

        // Update data di database
        $biodataSiswa = BiodataSiswa::findOrFail($id);
        $biodataSiswa->nama_lengkap = $request->nama_lengkap;
        $biodataSiswa->jurusan = $request->jurusan;
        $biodataSiswa->kelas = $request->kelas;
        $biodataSiswa->bio = $request->bio;


        // Cek apakah ada file foto yang diupload
        if ($request->hasFile('foto_profil')) {
            $imageName = time().'.'.$request->foto_profil->extension();
            $request->foto_profil->move(public_path('images'), $imageName);
            $biodataSiswa->foto_profil = $imageName;
        }

        $biodataSiswa->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus data siswa
        $biodataSiswa = BiodataSiswa::findOrFail($id);
        $biodataSiswa->delete();

        return redirect()->route('biodata_siswa.index')->with('success', 'Data berhasil dihapus.');
    }
}
