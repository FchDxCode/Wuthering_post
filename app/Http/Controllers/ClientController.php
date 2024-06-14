<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guide;
use App\Models\News;
use App\Models\Tips;

class ClientController extends Controller
{
    public function vguide()
    {
        $Vguides = Guide::all();
        return view('client.Vguides')->with('Vguides', $Vguides);
    }

    public function vnews()
    {
        $Vnews = News::all();
        return view('client.Vnews')->with('Vnews', $Vnews);
    }

    public function vtips()
    {
        $Vtips = Tips::all();
        return view('client.Vtips')->with('Vtips', $Vtips);
    }
}
