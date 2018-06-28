<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\View;

class EngineeringController extends Controller
{
    public function Popular_course(Request $request)
    {
        return view('shiksha/Engineering/popular_course'); 
    }

    public function Exam_Engineering(Request $request)
    {
        return view('shiksha/Engineering/exam_engineering'); 
       
    }

     public function Exam_cat(Request $request)//
    {
        return view('shiksha/Engineering/exam_cat'); 
        
    }
      public function Exam_Calender(Request $request)//
    {
        return view('shiksha/Engineering/exam_calender'); 
        
    }
    

    public function College_by_location_Engineering(Request $request)
    {   
       return view('shiksha/Engineering/college_by_location_engineering'); 
       
    }
     public function Top_College_Engineering(Request $request)
    {   
         return view('shiksha/Engineering/Top_college_engineering'); 
       
    }
     public function Top_Rank_Engineering(Request $request)
    {   
         return view('shiksha/Engineering/top_ranking_engineering'); 
       
    }

     public function Compare_College_Engineering(Request $request)
    {   
        return view('shiksha/Engineering/compare_college_engineering'); 
       
    }
      public function Other_Compare_College_Engineering(Request $request)
    {   
        return view('shiksha/Engineering/other_compare_college_engineering'); 
       
    }
       public function Rank_Predicator(Request $request)
    {   
        return view('shiksha/Engineering/rank_predicator'); 
       
    }	

      public function College_Predicator(Request $request)
    {   
        return view('shiksha/Engineering/college_pedicator'); 
       
    }	

      public function College_Review_Engineering(Request $request)
    {   
        return view('shiksha/Engineering/college_review_engineering'); 
       
    }
     public function Write_Review_Engineering(Request $request)
    {   
       return view('shiksha/Engineering/write_review_engineering'); 
       
    }

     public function Call_Padicator_Engineering(Request $request)
    {   
        return view('shiksha/Engineering/call_padicator_engineering'); 
       
    }

     public function Ask_Current_Engineering(Request $request)
    {   
        return view('shiksha/Engineering/ask_current_engineering'); 
       
    }

   
     public function News_Article_Engineering(Request $request)
    {   
        return view('shiksha/Engineering/news_article_engineering'); 
       
    }
    

    public function MBA_Alumani_Salary_Data(Request $request)
    {   
        return view('shiksha/Engineering/mba_alumani_salary_data'); 
       
    }

     public function Engineering_Resource_Apply_College(Request $request)
    {   
        return view('shiksha/Engineering/engineering_resource_apply_college'); 
       
    }  

          
}
