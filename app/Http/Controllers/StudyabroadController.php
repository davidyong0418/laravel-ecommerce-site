<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;

class StudyabroadController extends Controller
{   
  public function Study_Abroad_Course_Btech(Request $request)
  {
      return view('shiksha/Studyabroad/abroad_course_btech');
  }
  public function University_by_Country(Request $request)
  {
      return view('shiksha/Studyabroad/university_by_country');
  }
   public function Country_by_University(Request $request)
  {
      return view('shiksha/Studyabroad/country_by_university');
  }
   public function Country_Home(Request $request)
  {
      return view('shiksha/Studyabroad/country_home');
  }
   public function Tofel(Request $request)
  {
      return view('shiksha/Studyabroad/tofel');
  }
   public function Study_App_Writting(Request $request)
  {
      return view('shiksha/Studyabroad/study_application_app_writting');
  }

  
}
