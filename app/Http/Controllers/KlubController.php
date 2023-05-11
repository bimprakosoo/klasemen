<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Klub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class KlubController extends Controller
{

    public function index()
    {
      $klub = Klub::all();
      return view('klub', compact('klub'));
    }

    public function store(Request $request)
    {
      $attributes = request()->validate([
        'name' => ['required'],
        'kota_klub' => ['required'],
      ]);
      
      $attributes['point'] = 0;
  
      Klub::create($attributes);
  
      return redirect()->back()->with('success', 'Klub berhasil ditambahkan.');
    }

}
