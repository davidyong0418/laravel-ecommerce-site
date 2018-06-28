<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;

class CounsellingController extends Controller
{   
  public function Career_After_12_Science(Request $request)
  {
    return view('shiksha/Counselling/career_after_12_science');
  }

  
}
