<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    public function magazineListByMonth($year)
    {
        $months = Magazine::select('month')
        ->where('year', '=', $year)
        ->where('published', '=', 1)
        ->groupBy('month')
        ->orderBy('month', 'DESC')
        ->get();
        return $months;
    }
    public function magazineByMonth($month,$year)
    {
        $magazines = Magazine::where('month', '=', $month)
        ->where('year', '=', $year)
        ->where('published', '=', 1)
        ->get();
        return $magazines;
    }
}
