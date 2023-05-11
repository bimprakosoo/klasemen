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

    public function create()
    {
        //
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

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
