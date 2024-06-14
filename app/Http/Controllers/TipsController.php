<?php
namespace App\Http\Controllers;

use App\Models\Tips;
use Illuminate\Http\Request;

class TipsController extends Controller
{
    public function index()
    {
        $Vtips = Tips::all();
        return view('tips')->with('Vtips', $Vtips);
    }

    public function create()
    {
        return view('tips.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tips' => 'required|string|max:255',
            'gambar_tips' => 'required|string',
            'video_tips' => 'required|string',
            'deskripsi_tips' => 'required|string',
        ]);

        Tips::create($validatedData);

        return redirect()->route('tips.index')->with('success', 'Tips created successfully.');
    }

    public function update(Request $request, Tips $tips)
    {
       $this->validateRequest($request);

       $tips->update($request->all());

       return redirect()->route('tips.index')->with('success', 'Tips updated successfully.');
    }

    public function destroy($id)
    {
        $tips = Tips::where('id_tips', $id)->first();

        if (!$tips) {
            return redirect()->route('tips.index')->with('error', 'News not found.');
        }

        $tips->delete();

        return redirect()->route('tips.index')->with('success', 'Tips deleted successfully.');
    }

    protected function validateRequest(Request $request): void
    {
        $request->validate([
            'nama_tips' =>'required|string|max:255',
            'gambar_tips' =>'required|string',
            'video_tips' =>'required|string',
            'deskripsi_tips' =>'required|string',
        ]);
    }
}
