<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;

class WebController extends Controller
{

            // MBA nav bar 
    public function HomePage(Request $request)
    {    
        return view('shiksha/index');   
    }

    public function Popular_course_MBA(Request $request)
    {
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/popular_course_mba'); 
    }

    public function Exam_MBA(Request $request)
    {
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/exam_mba'); 
       
    }

     public function Exam_cat(Request $request)//
    {
       // $course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
       // $exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/exam_cat'); 
        
    }
      public function Exam_Calender(Request $request)//
    {
       // $course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
       // $exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/exam_calender'); 
        
    }
    

    public function College_by_location_MBA(Request $request)
    {   
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/college_by_location_mba'); 
       
    }
     public function Top_College(Request $request,$slug)
    {   
          $college = DB::table('college_name')->where('slug',$slug)->first();
       // $course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/college/Top_college',array('data'=>$college)); 
       
    }
     public function Top_Rank(Request $request)
    {   
        // $course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/top_ranking'); 
       
    }

     public function Compare_College_MBA(Request $request)
    {   
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/compare_college_mba'); 
       
    }
      public function Other_Compare(Request $request)
    {   
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/other_compare_college'); 
       
    }
//
      public function College_Review_MBA(Request $request)
    {   
       // $course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
       // $exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/college_review_mba'); 
       
    }
     public function Write_Review(Request $request)
    {   
       // $course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
       // $exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/write_review'); 
       
    }

     public function Call_Padicator(Request $request)
    {   //
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/call_padicator'); 
       
    }

     public function Ask_Current_MBA(Request $request)
    {   
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
       // $exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/ask_current_mba'); 
       
    }

    public function Ask_Current_MBA_Other_MBA(Request $request)
    {   
       // $course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
       // $exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/current_mba_other_mba'); 
       
    }

 public function MBA_Alumani_Salary_Data(Request $request)
    {   
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/mba_alumani_salary_data'); 
       
    }

     public function MBA_Resource_Apply_College(Request $request)
    {   
        //$course = DB::table('popular_course')->where('category','MBA')->orderby('id','DESC')->get();
        //$exam   = DB::table('popular_exam')->where('category','MBA')->orderby('id','DESC')->get();
        return view('shiksha/MBA/mba_resource_apply_college'); 
       
    }  
}
