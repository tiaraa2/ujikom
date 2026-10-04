<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Jurusan;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\Kontak;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $jurusans = Jurusan::latest()->get();
    $galeris = Galeri::latest()->get();
    $beritas = Berita::latest()->get();
    $kontaks = Kontak::latest()->get();

    return view('welcome', compact(
        'jurusans',
        'galeris',
        'beritas',
        'kontaks'
    ));

})->name('home');


/*
|--------------------------------------------------------------------------
| KONTAK - PUBLIC
|--------------------------------------------------------------------------
*/

Route::post('/kontak', function (Request $request) {

    $request->validate([
        'nama' => 'required|max:100',
        'kontak' => 'required|max:100',
        'pesan' => 'required',
    ]);

    Kontak::create([
        'nama' => $request->nama,
        'kontak' => $request->kontak,
        'pesan' => $request->pesan,
    ]);

    return redirect()
        ->route('home')
        ->with('success', 'Pesan berhasil dikirim.');

})->name('kontak.store');


/*
|--------------------------------------------------------------------------
| SEMUA BERITA - PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/berita', function () {

    $beritas = Berita::latest()->get();

    return view('berita', compact('beritas'));

})->name('berita');


/*
|--------------------------------------------------------------------------
| DETAIL BERITA - PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/admin/berita/{id}/detail', function ($id) {

    $berita = Berita::findOrFail($id);

    return view('admin.detail-berita', compact('berita'));

})->name('detail.berita');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {

    return view('login');

})->name('login');


Route::post('/login', function (Request $request) {

    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    if (
        Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])
    ) {

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    return back()
        ->withErrors([
            'username' => 'Username atau password salah.',
        ])
        ->withInput();

})->name('login.process');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/dashboard', function () {

        $jumlahJurusan = Jurusan::count();
        $jumlahGaleri = Galeri::count();
        $jumlahBerita = Berita::count();
        $jumlahKontak = Kontak::count();

        return view('admin.dashboard', compact(
            'jumlahJurusan',
            'jumlahGaleri',
            'jumlahBerita',
            'jumlahKontak'
        ));

    })->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | JURUSAN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/jurusan', function () {

        $jurusans = Jurusan::latest()->get();

        return view('admin.jurusan', compact('jurusans'));

    })->name('admin.jurusan');


    Route::get('/admin/jurusan/tambah', function () {

        return view('admin.tambah-jurusan');

    })->name('admin.tambah-jurusan');


    Route::post('/admin/jurusan', function (Request $request) {

        $request->validate([
            'singkatan' => 'required|max:20',
            'nama' => 'required|max:150',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'singkatan' => $request->singkatan,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request->file('gambar')
                ->store('jurusan', 'public');
        }

        Jurusan::create($data);

        return redirect()
            ->route('admin.jurusan')
            ->with('success', 'Jurusan berhasil ditambahkan.');

    })->name('admin.jurusan.store');


    Route::get('/admin/jurusan/{id}/edit', function ($id) {

        $jurusan = Jurusan::findOrFail($id);

        return view('admin.edit-jurusan', compact('jurusan'));

    })->name('admin.jurusan.edit');


    Route::put('/admin/jurusan/{id}', function (Request $request, $id) {

        $jurusan = Jurusan::findOrFail($id);

        $request->validate([
            'singkatan' => 'required|max:20',
            'nama' => 'required|max:150',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'singkatan' => $request->singkatan,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request->file('gambar')
                ->store('jurusan', 'public');
        }

        $jurusan->update($data);

        return redirect()
            ->route('admin.jurusan')
            ->with('success', 'Jurusan berhasil diperbarui.');

    })->name('admin.jurusan.update');


    Route::delete('/admin/jurusan/{id}', function ($id) {

        $jurusan = Jurusan::findOrFail($id);

        $jurusan->delete();

        return redirect()
            ->route('admin.jurusan')
            ->with('success', 'Jurusan berhasil dihapus.');

    })->name('admin.jurusan.destroy');


    /*
    |--------------------------------------------------------------------------
    | GALERI
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/galeri', function () {

        $galeris = Galeri::latest()->get();

        return view('admin.galeri', compact('galeris'));

    })->name('admin.galeri');


    Route::get('/admin/galeri/tambah', function () {

        return view('admin.tambah-galeri');

    })->name('admin.tambah-galeri');


    Route::post('/admin/galeri', function (Request $request) {

        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:100',
            'tanggal' => 'required|date',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request->file('gambar')
                ->store('galeri', 'public');
        }

        Galeri::create($data);

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Foto berhasil ditambahkan.');

    })->name('admin.galeri.store');


    Route::get('/admin/galeri/{id}/edit', function ($id) {

        $galeri = Galeri::findOrFail($id);

        return view('admin.edit-galeri', compact('galeri'));

    })->name('admin.galeri.edit');


    Route::put('/admin/galeri/{id}', function (Request $request, $id) {

        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:100',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request->file('gambar')
                ->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Foto berhasil diperbarui.');

    })->name('admin.galeri.update');


    Route::delete('/admin/galeri/{id}', function ($id) {

        $galeri = Galeri::findOrFail($id);

        $galeri->delete();

        return redirect()
            ->route('admin.galeri')
            ->with('success', 'Foto berhasil dihapus.');

    })->name('admin.galeri.destroy');


    /*
    |--------------------------------------------------------------------------
    | BERITA ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/berita', function () {

        $beritas = Berita::latest()->get();

        return view('admin.berita', compact('beritas'));

    })->name('admin.berita');


    Route::get('/admin/berita/tambah', function () {

        return view('admin.tambah-berita');

    })->name('admin.tambah-berita');


    Route::post('/admin/berita', function (Request $request) {

        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:100',
            'tanggal' => 'required|date',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
        ];

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil ditambahkan.');

    })->name('admin.berita.store');


    Route::get('/admin/berita/{id}/edit', function ($id) {

        $berita = Berita::findOrFail($id);

        return view('admin.edit-berita', compact('berita'));

    })->name('admin.berita.edit');


    Route::put('/admin/berita/{id}', function (Request $request, $id) {

        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:100',
            'tanggal' => 'required|date',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'isi' => $request->isi,
        ];

        if ($request->hasFile('gambar')) {

            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil diperbarui.');

    })->name('admin.berita.update');


    Route::delete('/admin/berita/{id}', function ($id) {

        $berita = Berita::findOrFail($id);

        $berita->delete();

        return redirect()
            ->route('admin.berita')
            ->with('success', 'Berita berhasil dihapus.');

    })->name('admin.berita.destroy');


    /*
    |--------------------------------------------------------------------------
    | KONTAK ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/kontak', function () {

        $kontaks = Kontak::latest()->get();

        return view('admin.kontak', compact('kontaks'));

    })->name('admin.kontak');


    Route::delete('/admin/kontak/{id}', function ($id) {

        $kontak = Kontak::findOrFail($id);

        $kontak->delete();

        return redirect()
            ->route('admin.kontak')
            ->with('success', 'Pesan berhasil dihapus.');

    })->name('admin.kontak.destroy');


    /*
    |--------------------------------------------------------------------------
    | PROFIL ADMIN
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/profil', function () {

        return view('admin.profil');

    })->name('admin.profil');


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', function (Request $request) {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');

    })->name('logout');

});