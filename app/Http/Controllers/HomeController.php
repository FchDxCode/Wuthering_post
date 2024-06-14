<?php
namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\News;
use App\Models\Tips;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        $Vguides = Guide::all();
        $Vnews = News::all();
        $Vtips = Tips::all();

        return view('welcome', compact('Vguides', 'Vnews', 'Vtips'));
    }
}
