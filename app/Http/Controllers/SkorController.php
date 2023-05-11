<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Klub;
use App\Models\Skor;
use Illuminate\Http\Request;

class SkorController extends Controller
{

    public function index()
    {
      $klub = Klub::all();
      return view('skor', compact('klub'));
    }
    
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'klub1' => ['required'],
      'klub2' => ['required'],
      'skor_klub1' => ['required'],
      'skor_klub2' => ['required'],
    ]);
    
    $pertandingan = Skor::max('pertandingan') + 1;
    
    //menambahkan skor untuk klub1
    $skor1 = new Skor();
    $skor1->pertandingan = $pertandingan;
    $skor1->klub_id = $validatedData['klub1'];
    $skor1->skor = $validatedData['skor_klub1'];
    $skor1->save();
    
    //menambahkan skor untuk klub2
    $skor2 = new Skor();
    $skor2->pertandingan = $pertandingan;
    $skor2->klub_id = $validatedData['klub2'];
    $skor2->skor = $validatedData['skor_klub2'];
    $skor2->save();
    
    //setting point berdasarkan skor
    $klub1Points = 0;
    $klub2Points = 0;
    
    if ($validatedData['skor_klub1'] > $validatedData['skor_klub2']) { //jika klub mempunya skor lebih besar, maka mendapat 3 points
      $klub1Points = 3;
    } elseif ($validatedData['skor_klub1'] < $validatedData['skor_klub2']) {
      $klub2Points = 3;
    } elseif ($validatedData['skor_klub1'] == $validatedData['skor_klub2']) { //jika seri maka masing masing klub mendapat 1 point
      $klub1Points = 1;
      $klub2Points = 1;
    }
    
    $klub1 = Klub::findOrFail($validatedData['klub1']); //menambahkan points ke klub1
    $klub1->point += $klub1Points;
    $klub1->save();
    
    $klub2 = Klub::findOrFail($validatedData['klub2']); //menambahkan points ke klub2
    $klub2->point += $klub2Points;
    $klub2->save();
    
    return redirect()->back()->with('success', 'Skor berhasil disimpan.');
  }
  
  public function multiple_store(Request $request)
  {
    
    $klubCount = $request->input('klubCount') - 1;
    
    // looping berdasarkan total klub
    for ($i = 1; $i <= $klubCount; $i += 2) {
      $pertandingan = Skor::max('pertandingan') + 1;
  
      $klub1Index = 'klub' . $i;
      $klub2Index = 'klub' . ($i + 1);
      $skor1Index = 'skor_klub' . $i;
      $skor2Index = 'skor_klub' . ($i + 1);
      
      // cetak skor untuk klub 1
      $skor1 = new Skor();
      $skor1->pertandingan = $pertandingan;
      $skor1->klub_id = $request->input($klub1Index);
      $skor1->skor = $request->input($skor1Index);
      $skor1->save();
  
      // cetak skor untuk klub 2
      $skor2 = new Skor();
      $skor2->pertandingan = $pertandingan;
      $skor2->klub_id = $request->input($klub2Index);
      $skor2->skor = $request->input($skor2Index);
      $skor2->save();
      
      // menghitung point berdasarkan skor
      $klub1Points = 0;
      $klub2Points = 0;
      
      if ($request->input($skor1Index) > $request->input($skor2Index)) {
        $klub1Points = 3;
      } elseif ($request->input($skor1Index) < $request->input($skor2Index)) {
        $klub2Points = 3;
      } elseif ($request->input($skor1Index) == $request->input($skor2Index)) {
        $klub1Points = 1;
        $klub2Points = 1;
      }
      
      $klub1 = Klub::findOrFail($request->input($klub1Index));
      $klub1->point += $klub1Points;
      $klub1->save();
      
      $klub2 = Klub::findOrFail($request->input($klub2Index));
      $klub2->point += $klub2Points;
      $klub2->save();
    }
    
    return redirect()->back()->with('success', 'Skor berhasil disimpan.');
  }
}
