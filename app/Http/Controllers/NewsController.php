<?php
namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    public function index()
    {
        $Vnews = News::all();
        return view('news')->with('Vnews', $Vnews);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_news' => 'required|string|max:255',
            'gambar_news' => 'required|string',
            'video_news' => 'required|string',
            'deskripsi_news' => 'required|string',
        ]);


        News::create($validatedData);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function update(Request $request, News $news)
    {
        $this->validateRequest($request);

        $news->update($request->all());

        return redirect()->route('news.index')->with('success', 'Guide updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::where('id_news', $id)->first();

        if (!$news) {
            return redirect()->route('news.index')->with('error', 'News not found.');
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }


    protected function validateRequest(Request $request): void
    {
        $request->validate([
            'nama_news' => 'required|string|max:255',
            'gambar_news' => 'required|string',
            'video_news' => 'required|string',
            'deskripsi_news' => 'required|string',
        ]);
    }
}
