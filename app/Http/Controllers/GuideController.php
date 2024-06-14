<?php
namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GuideController extends Controller
{
    public function index()
    {
        $Vguides = Guide::all();
        return view('guides')->with('Vguides', $Vguides);
    }

    public function create()
    {
        return view('guides.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_game' => 'required|string|max:255',
        'gambar_game' => 'required|string',
        'video_game' => 'required|string',
        'deskripsi_game' => 'required|string',
    ]);

    Guide::create($validatedData);

    return redirect()->route('guides.index')->with('success', 'Guide created successfully.');
}

    public function update(Request $request, Guide $guide)
    {
        $this->validateRequest($request);

        $guide->update($request->all());

        return redirect()->route('guides.index')->with('success', 'Guide updated successfully.');
    }

    public function destroy($id)
{
    $guide = Guide::where('id_game', $id)->first();

    if (!$guide) {
        return redirect()->route('guides.index')->with('error', 'Guide not found.');
    }

    $guide->delete();

    return redirect()->route('guides.index')->with('success', 'Guide deleted successfully.');
}
    protected function validateRequest(Request $request): void
    {
        $request->validate([
            'nama_game' => 'required|string|max:255',
            'gambar_game' => 'required|string',
            'video_game' => 'required|string',
            'deskripsi_game' => 'required|string',
        ]);
    }
}
