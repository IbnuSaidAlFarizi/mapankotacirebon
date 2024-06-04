<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Hero_news;
use App\Models\Meta;
use App\Models\News;
use App\Models\Setting;
use App\Models\Tag_news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $meta = Meta::where('key', 'news')->first();
        $data = News::select('id', 'title', 'keyword', 'description', 'count_seen')->get();
        $news = Hero_news::first();
        return view('admin.news', compact('data', 'setting', 'meta', 'news'));
    }

    function meta(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|string',
            'description' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        Meta::where('key', 'news')->update([
            'keyword' => $request->keyword,
            'description' => $request->description,
        ]);
        return redirect()->route('news')->with('success', 'Meta berhasil diperbarui');
    }

    function update_hero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'h1' => 'required|string|max:255',
            'p' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = Hero_news::first();
        $about->update([
            'h1' => $request->h1,
            'p' => $request->p,
        ]);
        return redirect()->route('news')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy(Request $request)
    {
        $news = News::findOrFail($request->id);
        if ($news->photo) {
            $oldImagePath = public_path('assets/images/blog/' . $news->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $news->delete();
        return redirect()->route('news')->with('success', 'Data berhasil dihapus');
    }
    public function v_update(Request $request)
    {
        $news = News::findOrFail($request->id);
        $category = Categories::all();
        $setting = Setting::first();
        return view('admin.crud.update_news', compact('setting', 'category', 'news'));
    }
    public function v_add()
    {
        $category = Categories::all();
        $setting = Setting::first();
        return view('admin.crud.add_news', compact('setting', 'category'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|string',
            'description' => 'required|string',
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,jpeg|max:2048',
            'quote' => 'required|string',
            'quoter' => 'required|string',
            'categories_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image = $request->photo;
        $imageName = $image->hashName();
        $image->move(public_path('assets/images/blog'), $imageName);
        $news = new News();
        $news->keyword = $request->keyword;
        $news->description = $request->description;
        $news->title = $request->title;
        $news->title = Str::slug($request->title);
        $news->photo = $imageName;
        $news->quote = $request->quote;
        $news->quoter = $request->quoter;
        $news->categories_id = $request->categories_id;
        $news->content = $request->content;
        $news->published_at = now();
        $news->users_id = Auth::id();
        $news->save();
        return redirect()->route('news')->with('success', 'Data berhasil disimpan');
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'keyword' => 'required|string',
            'description' => 'required|string',
            'title' => 'required|string|max:255',
            'photo' => 'image|mimes:jpg,jpeg|max:2048',
            'quote' => 'string',
            'quoter' => 'string',
            'categories_id' => 'required|exists:categories,id',
            'content' => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mengambil data service berdasarkan ID
        $data = News::findOrFail($request->id);

        // Jika ada file foto yang diunggah
        if ($request->hasFile('photo')) {
            $oldImagePath = public_path('assets/images/blog/' . $data->photo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image = $request->photo;
            $imageName = $image->hashName(); // Mendapatkan nama asli file
            $image->move(public_path('assets/images/blog'), $imageName);
            $data->photo = $imageName;
        }

        $data->keyword = $request->keyword;
        $data->description = $request->description;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->quote = $request->quote;
        $data->quoter = $request->quoter;
        $data->categories_id = $request->categories_id;
        $data->content = $request->content;
        $data->save();
        return redirect()->route('news')->with('success', 'Data berhasil diperbarui');
    }
    public function category_news()
    {
        $setting = Setting::first();
        $meta = Meta::where('key', 'news')->first();
        $data = Categories::all();
        return view('admin.news_category', compact('data', 'setting', 'meta'));
    }
    public function category_store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:categories',
            'keyword' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Membuat dan menyimpan data kategori baru
        $category = new Categories();
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->keyword = $request->keyword;
        $category->description = $request->description;
        $category->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('news.category')->with('success', 'Kategori berhasil disimpan');
    }

    public function category_destroy(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:categories,id',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $category = Categories::findOrFail($request->id);
        $news = News::where('categories_id', $category->id)->count();
        if ($news > 0) {
            return redirect()->back()->with('error', 'Kategori tidak dapat dihapus karena masih memiliki berita terkait');
        }

        // Hapus kategori
        $category->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('news.category')->with('success', 'Kategori berhasil dihapus');
    }

    public function category_update(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255|unique:categories,title,' . $request->id,
            'keyword' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Ambil data kategori
        $category = Categories::findOrFail($request->id);

        // Update data kategori
        $category->title = $request->title;
        $category->slug = Str::slug($request->title);
        $category->keyword = $request->keyword;
        $category->description = $request->description;
        $category->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('news.category')->with('success', 'Kategori berhasil diperbarui');
    }

    public function tag_news()
    {
        $setting = Setting::first();
        $meta = Meta::where('key', 'news')->first();
        $data = Tag_news::all();
        return view('admin.news_tag', compact('data', 'setting', 'meta'));
    }
    public function tag_store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:tag_news',
            'keyword' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Membuat dan menyimpan data tag news baru
        $tag = new Tag_news();
        $tag->title = $request->title;
        $tag->keyword = $request->keyword;
        $tag->description = $request->description;
        $tag->slug = Str::slug($request->title);
        $tag->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('news.tag')->with('success', 'Tag News berhasil disimpan');
    }

    public function tag_destroy(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:tag_news,id',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Hapus tag news
        Tag_news::findOrFail($request->id)->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('news.tag')->with('success', 'Tag News berhasil dihapus');
    }

    public function tag_update(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:tag_news,id',
            'title' => 'required|string|max:255|unique:tag_news,title,' . $request->id,
            'keyword' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Ambil data tag news
        $tag = Tag_news::findOrFail($request->id);

        // Update data tag news
        $tag->title = $request->title;
        $tag->keyword = $request->keyword;
        $tag->description = $request->description;
        $tag->slug = Str::slug($request->title);
        $tag->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('news.tag')->with('success', 'Tag News berhasil diperbarui');
    }
}
