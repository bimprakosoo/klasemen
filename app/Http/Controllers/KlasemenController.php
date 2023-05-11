<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Klub;
use App\Models\Skor;
use Illuminate\Http\Request;

class KlasemenController extends Controller
{
    public function index()
    {
      $klubs = Klub::all();
      $statistics = [];
  
      // perhitungan untuk tiap klub
      foreach ($klubs as $klub) {
        $statistics[$klub->id] = [
          'no' => $klub->id,
          'klub' => $klub->name,
          'Ma' => 0,
          'Me' => 0,
          'S' => 0,
          'K' => 0,
          'GM' => 0,
          'GK' => 0,
          'Point' => $klub->point,
        ];
      
        // mengambil pertandingan dimana klub tersebut terlibat
        $pertandingans = Skor::where('klub_id', $klub->id)->pluck('pertandingan');
    
        foreach ($pertandingans as $pertandingan) {
          
          // mengambil skor untuk tiap pertandingan
          $skor1 = Skor::where('pertandingan', $pertandingan)
            ->where('klub_id', $klub->id)
            ->value('skor');
      
          // mencari skor klub musuh untuk tiap pertandiangan
          $opponent = Skor::where('pertandingan', $pertandingan)
            ->where('klub_id', '!=', $klub->id)
            ->first();
      
          $skor2 = $opponent ? $opponent->skor : 0;
      
          // update statistik berdasarkan 2 skor antar klub
          $statistics[$klub->id]['Ma'] += 1;
      
          if ($skor1 > $skor2) {
            $statistics[$klub->id]['Me'] += 1;
            $statistics[$klub->id]['GM'] += $skor1;
            $statistics[$klub->id]['GK'] += $skor2;
          } elseif ($skor1 < $skor2) {
            $statistics[$klub->id]['K'] += 1;
            $statistics[$klub->id]['GM'] += $skor1;
            $statistics[$klub->id]['GK'] += $skor2;
          } else {
            $statistics[$klub->id]['S'] += 1;
            $statistics[$klub->id]['GM'] += $skor1;
            $statistics[$klub->id]['GK'] += $skor2;
          }
        }
      }
  
      // sorting klub berdasarkan point yang tertinggi
      usort($statistics, function ($a, $b) {
        return $b['Point'] - $a['Point'];
      });
  
      return view('klasemen', compact('statistics'));
    }
}
