<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Teamspeak3;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
class AdminController extends Controller
{ 
/*    public function __construct(){
          $total_users          = DB::table('users')->where('status',1)->count();
          $pending_users        = DB::table('users')->where('status',2)->where('block_status',1)->count();
          $total_college        = DB::table('college_name')->count();
          $total_course         = DB::table('course')->count();
          $total_management_cat = DB::table('category')->count();
          $total_review         = DB::table('college_ranking')->count();
          $pending_review       = DB::table('college_ranking')->where('status',2)->count();
          $review_name          = $data = DB::table('college_ranking')
                                  ->join('users', 'college_ranking.user_id', '=','users.id')
                                  ->select('users.name','college_ranking.created_at')
                                  ->where('college_ranking.status','=',2)
                                  ->orderby('created_at','DESC')
                                  ->get()->toArray();
          $username             = DB::table('users')->where('status',2)->where('block_status',1)->orderby('created_at','DESC')->get()->toArray();
          $data = array(    'total_users'       => $total_users,
                            'pending_users'     => $pending_users,
                            'total_college'     => $total_college,
                            'total_course'      => $total_course,
                            'total_category'    => $total_management_cat,
                            'total_review'      => $total_review,
                            'pending_review'    => $pending_review,
                        );
          View::share('datasss', $data);
          View::share('review_name', $review_name);
          View::share('userss', $username);
    }*/
            // import college Csv code
    /* public function csv()
    {
        return view('admin/items');
    }*/
    /* public function import(Request $request){
            $this->validate($request, [
                                    'imported-file'      => 'required|mimes:csv,txt',
                                          ]);
           if($request->file('imported-file')){
                $path = $request->file('imported-file')->getRealPath();
                $data = Excel::load($path, function($reader) {
                 })->get();
           if(!empty($data) && $data->count()){
               $data = $data->toArray();
              foreach ($data as $key => $value) { 
               $college_name =array(
                                    'college'       => $value['college'],
                                    'slug'          => str_replace(' ', '_', strtolower($value['college'])),
                                    'type'          => $value['type'],
                                    'location'      => $value['location'],
                                    'country'       => $value['country'],
                                    'establishment' => $value['establishment']
                                   );
              $insert     = DB::table('college_name')->insertGetId($college_name);
              $college_category = array(
                                    'college_id'   => $insert,
                                    'category_id'  => $value['category_id']
                                  );
              $insert_cat = DB::table('college_category')->insert($college_category);
              $college_contact = array(
                                    'college_id'   => $insert,
                                    'contact'      => $value['contact'],
                                    'email'        => $value['email'],
                                    'website'      => $value['website']  
                                     ); 
              $insert_con = DB::table('college_contact')->insert($college_contact);
              $college_facility = array(
                                    'college_id'   => $insert,
                                    'library'      => $value['library'],
                                    'hostel'       => $value['hostel'],
                                    'cafetaria'    => $value['cafetaria'],
                                    'sport'        => $value['sport'],
                                    'gym'          => $value['gym'],
                                    'classroom'    => $value['classroom'],
                                    'labs'         => $value['labs'],
                                    ); 
              $insert_fasility = DB::table('college_facility')->insert($college_facility);
              $college_event   = array(
                                    'college_id'   => $insert,
                                    'event_title'  => $value['event_title'],
                                    'description'  => $value['description'],
                                       ); 
              $insert_event   = DB::table('events')->insert($college_event); 
              }
              }
              }else{
              Session::flash('message','Please Provide CSV file');
              return redirect('add_college_csv'); 
              }
              Session::flash('message','Successfully imported CSV file!');
              return redirect('admin/view_college');
    }*/
          // Login
    public function index(Request $request){
       if($request->isMethod('post')){
           $validator = Validator::make($request->all(), [
                'email'       =>  'required|email', 
                'password'    =>  'required',
                                                         ]);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }      
          $email     = trim($request->input('email'));
          $password  = trim($request->input('password'));
          $query1    = DB::table('admin')->where('email',$email)->first();
          $checkUser = count($query1);
       if($checkUser > 0){
          $password1 = $query1->password;
       if($password == $password1){
          Session::put(['username'=>$query1]);
          return redirect('/admin/dashboard');
       }else{
           Session::flash('message', 'The Email and Password you have entered did not match.');
           Session::flash('alert-class', 'alert-danger');
           return view('/admin/login');
       }
       }else{
           Session::flash('message', 'Email does not exists.');
           Session::flash('alert-class', 'alert-danger');
           return view('/admin/login');
       }
       }else{
          return view('/admin/login');
       }
    }
           //Dashboard
    public function Dashboard(){
        /*  $total_users          = DB::table('users')->where('status',1)->count();
          $pending_users        = DB::table('users')->where('status',2)->count();
          $total_college        = DB::table('college_name')->count();
          $total_course         = DB::table('course')->count();
          $total_management_cat = DB::table('category')->count();
          $total_review         = DB::table('college_ranking')->count();
          $pending_review       = DB::table('college_ranking')->where('status',2)->count();

          $data = array(    'total_users'       => $total_users,
                            'pending_users'     => $pending_users,
                            'total_college'     => $total_college,
                            'total_course'      => $total_course,
                            'total_category'    => $total_management_cat,
                            'total_review'      => $total_review,
                            'pending_review'    => $pending_review,
                        );*/
           return view('admin/dashboard');  
         //return View::make('/admin/dashboard', array('data' => $data,'review_name'=> $review_name, 'userss' =>$username ));
    }
             //Logout
    Public function Logout(Request $request){
          $request->session()->flush();
          return redirect('admin/login');
    }
    Public function forgotPassword(Request $request){
        if ($request->isMethod('post')) {
           $validator = Validator::make($request->all(), [
                'email'       =>  'required|email', 
                                                         ]);
        if ($validator->fails()) {
            return redirect('admin/forgot_password')
                        ->withErrors($validator)
                        ->withInput();
        }      
           $email = trim($request->input('email'));
           $check_email = DB::table('admin')->where('email',$email)->first();

           $count = count($check_email);
        if($count > 0){
           $admin_id  = $check_email->id;
           $id = md5($admin_id);
           $string = str_replace("/","",$id);
           $updated_Arraay = array('remember_token' => $string);
           $update_data = DB::table('admin')->where('id',$admin_id)->update($updated_Arraay) ;
           $url = url('admin/reset_password/'.$string);
           $data = ['url' => $url,'type'=>'Admin'];
           Mail::send('admin/forget_pwd_page',$data , function ($m) use ($email) {
           $m->from('expinatortesting@gmail.com', 'Raffle');
           $m->to($email,' Admin')
           ->subject('Forgot Password Request');
              });
           Session::flash('message', "The link has been sent to your registered email address.");
           Session::flash('alert-class', 'alert-success');
           return redirect('admin/login');
           }else{
           Session::flash('message', 'The Email you have entered is invalid.');
           Session::flash('alert-class', 'alert-danger');
           return redirect('admin/forgot_password');
           }
           }else{
           return view('admin/forgotpassword');
       }
    }
    Public function resetPassword(Request $request){
          $token = $request->string;
          if($request->isMethod('post')){
          $validator = Validator::make($request->all(), [
                'password'       =>  'required',
                'confpassword'   =>  'required|same:password',
                                                     ]);
          if ($validator->fails()) {
            return redirect('admin/reset_password/'.$token)
                        ->withErrors($validator)
                        ->withInput();
          }      
            $check_token = DB::table('admin')->where('remember_token',$token)->get();
          $count = count($check_token);
          if($count >0){
          $admin_id = $check_token[0]->id;
          $password = $request->input('password');
          $updatedArray = array('password'=>$password,'remember_token'=>'');
          $updatePassword = DB::table('admin')->where('id',$admin_id)->update($updatedArray);
          
          Session::flash('message', 'Your New Password Set Successfully.');
          Session::flash('alert-class', 'alert-danger');
          return redirect('admin/login');
          
          }else{
          Session::flash('message', 'Your Token has Expired.');
          Session::flash('alert-class', 'alert-danger');
          return redirect('admin/login');
          }
          }else {
          return view('admin/resetpassword');
          }
    }
    public function RaffleView(Request $request){
          return view('admin/raffle_view');
         
    }
















    Public function Account_Setting(Request $request){   
        if($request->isMethod('post')){
           $this->validate($request, [
                       'username'    => 'required|max:255',
                       'email'       => 'required|email'
                                         ]);
           $username     = $request->input('username');
           $email        = $request->input('email');
           $admin_id     = $request->input('hide');
           $UpdateArray  = array( 'username'    => $username,
                                  'email'       => $email 
                               );
           $query = DB::table('admin')->where('id',$admin_id)->update($UpdateArray);
        if($query){
            $request->session()->flush();
             Session::flash('message','Information Saved Successfully Please Login!');
             return redirect('admin/login');
           }
        }else{
           $query = DB::table('admin')->first();
           return view('admin/account_setting',array('datas'=>$query));
           }
    } 
    Public function changePassword(Request $request){
             $value            = $request->session()->get('username');
             $session_data     = json_decode($value);
             $admin_id         = $session_data[0]->id;
             if(empty($admin_id)){
             return redirect('admin/login');
             }
             if($request->isMethod('post')) {
             Input::merge(array_map('trim', Input::all()));
             $this->validate($request, [
                                        'old_password'      => 'required',
                                        'new_password'      => 'required',
                                        'confirm_password'  => 'required|same:new_password'
                                         ]);    
             $password     = $request->input('old_password');
             $new_password = $request->input('new_password');
      
             $check = DB::table('admin')->where('password',$password)->get();
      
             if(count($check)> 0){
             $id = $check[0]->id;
             $updateArray = array('password'=> $new_password);
             $updated = DB::table('admin')->where('id',$admin_id)->update($updateArray);
             if(isset($updated)){
             $request->session()->flush();
             Session::flash('message','Password changed successfully');
             return redirect('admin/login');
             }else{         
             Session::flash('message','Server not responding. Please try again later');
             return redirect('admin/change_password');
             }
             }else{
        
             Session::flash('message','Old password not correct');
             return redirect('admin/change_password');
             }
             }else{
             return view('admin/change_password');
             }
    }
            // Web Page setting
    Public function PageSetting(Request $request){   
         if($request->isMethod('post')){
            $footer_contact =  $request->input('footer_contact')!=''?$request->input('footer_contact'):'';    
            $footer_timing  =  $request->input('footer_timing')!=''?$request->input('footer_timing'):'';
            $id             =  $request->input('hide');
         if($request->hasFile('logo_image')){ 
              $image = $request->file('logo_image');
              $destinationPath = 'shiksha/images/';   
              $extension   = $image->getClientOriginalExtension();
              $fileName1    = rand(11111,99999).'.'.$extension;
              Input::file('logo_image')->move($destinationPath, $fileName1);
              $UpdateArray = array('logo_image'       => $fileName1,
                                   'footer_contact'   => $footer_contact,
                                   'footer_timing'    => $footer_timing
                                 );
          }
            $query = DB::table('web_page_setting')->where('id',$id)->update($UpdateArray);
            Session::flash('message', "Page Setting Updated Successfully !");
            return redirect('admin/page_setting');
          }else{
               $query = DB::table('web_page_setting')->first();
               return view('admin/page_setting',array('datas'=>$query));
         } 
    }
            // Users
    Public function Total_User(Request $request){   
          $query = DB::table('users')->where('status',1)->orderby('id','DESC')->get();
          return view('admin/total_user',array('data' => $query));
    }
    Public function Delete_User($id){   
          $query = DB::table('users')->where('id',$id)->delete();      
          Session::flash('message','User Deleted Successfully');
          return redirect::to('admin/total_user'); 
    }
    Public function changedBlock(Request $request,$id){     
          $updating = array('block_status'=>1);  
          $update_status = DB::table('users')->where('id',$id)->update($updating);
          Session::flash('message','User blocked successfully');
          return redirect::to('admin/total_user');       
    }
    Public function changedUnBlock(Request $request,$id){     
          $updating      = array('block_status'=>2);  
          $update_status = DB::table('users')->where('id',$id)->update($updating);
          Session::flash('message','User Unblocked successfully');
          return redirect::to('admin/total_user');
    }
    Public function Pending_User(Request $request){   
          $query = DB::table('users')->where('status',2)->orWhere('status',3)->orderby('created_at','DESC')->get();
          return view('admin/pending_user',array('data' => $query));
    }
    Public function Approve_User($id){
           $updateArray = array('status' => 1);
           $query = DB::table('users')->where('id',$id)->update($updateArray);       
           Session::flash('message','User Approved Successfully By admin');
           return redirect::to('admin/total_user');       
    }
    Public function Decline_User($id){
           $updateArray = array('status' => 3);
           $query = DB::table('users')->where('id',$id)->update($updateArray);       
           Session::flash('message','User Request Declined By admin');
           return redirect::to('admin/pending_user');       
    }
          // Review Management
    Public function Approve_Review($id){
           $updateArray     =  array('status' => 1);
           $query           =  DB::table('college_ranking')->where('id',$id)->update($updateArray); 
           $get_college_id  =  DB::table('college_ranking')->where('id',$id)->get();
           $college_id      = $get_college_id[0]->college_id;
           $count       = count($query); 
           if($count > 0){
            Session::flash('message','Review Approved Successfully By admin');
            return redirect('admin/college_review'); 
          
           }else{
            Session::flash('message','Internal Server error! Please try Again');
            return redirect('admin/approve_review/'.$id); 
           }     
    }
    Public function Decline_Review($id){
           
           $updateArray     =  array('status' => 3);
           $query           =  DB::table('college_ranking')->where('id',$id)->update($updateArray); 
           $get_college_id  =  DB::table('college_ranking')->where('id',$id)->get();
           $college_id      = $get_college_id[0]->college_id;
           $count           = count($query); 
           if($count > 0){
            Session::flash('message','Review Disapproved By admin');
            return redirect('admin/college_review');       
           }else{
            Session::flash('message','Internal Server Error');
            return redirect('admin/decline_review/'.$id); 
           }     
    }
    Public function College_Review(Request $request){ 
               
          $users = DB::table('college_ranking')
                            ->leftjoin('users', 'college_ranking.user_id', '=', 'users.id')
                            ->leftjoin('college_name', 'college_ranking.college_id', '=','college_name.id')
                            ->select('college_ranking.*', 'users.name','college_name.college')                
                            ->orderby('college_ranking.created_at','DESC')
                            ->get();
                           
          return view('admin/college_review',array('data'=>$users));        
    }
    Public function Delete_Review($id){
            $get_college_id  =  DB::table('college_ranking')->where('id',$id)->get();
            $college_id      =  $get_college_id[0]->college_id;
            $query1          =  DB::table('college_ranking')->where('id',$id)->delete(); 
            if($query1){      
            Session::flash('message','Review Deleted Successfully By admin');
            return redirect('admin/college_review');
            }
    }
          // College 
    Public function Add_College(Request $request){   
         if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [ 
                    'college_name'      => 'required|max:255',
                    'establishment'     => 'required',
                    'images'            => 'required',
                    'location'          => 'required',  
                    'category'          => 'required',
                    'type'              => 'required',
                    'country'           => 'required',
                                                         ]); 
              if($validator->fails()) {
               return redirect('admin/add_college')
                        ->withErrors($validator)
                        ->withInput();
                }
            $input = Input::all();

            $college_name      = trim($request->input('college_name'));
            $slug              = str_replace(' ', '_', strtolower($college_name));
            $type              = trim($request->input('type'));  
            $location          = trim($request->input('location'));
            $year              = trim($request->input('establishment'));
            $category1         = $request->input('category');
            //$category2         = implode(',',$category1);
            $country           = $request->input('country');
                      
             if($request->hasFile('images')){ 
                $image = $request->file('images');
                $destinationPath = 'admin/img/college';   
                $filename        = $image->getClientOriginalName();
                $extension       = $image->getClientOriginalExtension();
                $images          = rand(11111,99999).'.'. $filename ;
                $image->move($destinationPath, $images);
                }else{
                Session::flash('message', 'Please Upload College Image');
                return Redirect('admin/add_college');
                }
              $insertArray = array('college'  =>$college_name,
                                   'slug'     =>$slug,
                                   'location' =>$location,
                                   'establishment'=>$year,
                                   'type'     =>$type,
                                   'image'    =>$images,
                                   'country'  =>$country
                                    );
              $insert   = DB::table('college_name')->insertGetId($insertArray);
              foreach($category1 as $value){
               $CategoryArray     = array(  'college_id'            =>  $insert,
                                            'category_id'           =>  $value
                                        );
               $RegisterCard = DB::table('college_category')->insert($CategoryArray);         
               }
               $message = "A New College Added Successfully !";
               Session::flash('message',$message);
               return redirect('admin/view_college');
           }else{
                $get_category   = DB::table('category')->orderby('id','DESC')->get();
                $get_country    = DB::table('apps_countries')->get();   
                return view('admin/add_college',array('data'=>$get_category,'country'=>$get_country));
               }
    } 
    Public function Edit_College_Facilities(Request $request,$id){
           if($request->isMethod('post')){
                $library   = $request->input('library')!='' ? $request->input('library'):'';
                $cafetaria = $request->input('cafetaria')!='' ? $request->input('cafetaria'):'';
                $hostel    = $request->input('hostel')!='' ? $request->input('hostel') :'';
                $sport     = $request->input('sport')!='' ? $request->input('sport') : '' ;
                $gym       = $request->input('gym')!='' ? $request->input('gym'): '';
                $classroom = $request->input('classroom')!='' ? $request->input('classroom') :'';
                $lab       = $request->input('lab')!='' ? $request->input('lab') :'';

                $check_id    = DB::table('college_facility')->where('college_id',$id)->count();
              if($check_id > 0){
                 $updateArray = array( 'college_id' => $id,
                                       'library'    => $library,
                                       'cafetaria'  => $cafetaria,
                                       'hostel'     => $hostel,
                                       'sport'      => $sport,
                                       'gym'        => $gym,
                                       'classroom'  => $classroom,
                                       'labs'        => $lab);
                $update = DB::table('college_facility')->where('college_id',$id)->update($updateArray);
              if($update){
                  $message = "College facility detail Updated Successfully !";
                  Session::flash('message',$message);  
                  return redirect('admin/edit_college_facilities/'.$id); 
                }else{
                  $message = "Internal Server Error! Please Try Again";
                  Session::flash('message',$message);  
                  return redirect('admin/edit_college_facilities/'.$id); 
                }                        
                }else{
                  $InsertArray = array( 'college_id' => $id,
                                        'library'    => $library,
                                        'cafetaria'  => $cafetaria,
                                        'hostel'     => $hostel,
                                        'sport'      => $sport,
                                        'gym'        => $gym,
                                        'classroom'  => $classroom,
                                        'labs'        => $lab);
                 $insert = DB::table('college_facility')->insert($InsertArray);
              if($insert){
                  $message = "College facility detail Added Successfully !";
                  Session::flash('message',$message);  
                  return redirect('admin/edit_college_facilities/'.$id); 
                }else{
                  $message = "Internal Server Error! Please Try Again";
                  Session::flash('message',$message);  
                  return redirect('admin/edit_college_facilities/'.$id); 
                }                        

                }  

           }else{
             $get_facility = DB::table('college_facility')->where('college_id',$id)->first();
             $get_college  = DB::table('college_name')->where('id',$id)->first();               
             return view('admin/edit_college_facilities',array('data'=>$get_facility,'name'=>$get_college));
                } 
    }
    Public function Edit_College_Contact(Request $request,$id){
        if($request->isMethod('post')){
             $contact     =  $request->input('contact')!='' ? $request->input('contact') :'';
             $email       =  $request->input('email')!='' ? $request->input('email') :'';
             $website     =  $request->input('website')!='' ? $request->input('website') :'';
             
             $get_contact = DB::table('college_contact')->where('college_id',$id)->count();
          if($get_contact > 0){
             $updateArray = array('contact'   => $contact,
                                  'email'     => $email,
                                  'website'   => $website,
                                  'college_id'=> $id );
             $query   = DB::table('college_contact')->where('college_id',$id)->update($updateArray); 
         if($query){
             $message = "Contact Detail Updated Successfully !";
             Session::flash('message',$message);  
             return redirect('admin/edit_college_contact/'.$id);             
            }
            }else{
             $insertArray = array('contact'   => $contact,
                                  'email'     => $email,
                                  'website'   => $website,
                                  'college_id'=> $id );
             $query   = DB::table('college_contact')->insert($insertArray); 
         if($query){
             $message = "Contact Detail Added Successfully !";
             Session::flash('message',$message);  
             return redirect('admin/edit_college_contact/'.$id);             
            }

            }
         }else{
             $get_contact = DB::table('college_contact')->where('college_id',$id)->first();
             $get_college = DB::table('college_name')->where('id',$id)->first();               
             return view('admin/edit_college_contact',array('data'=> $get_contact,'name'=>$get_college));
         }
    }
    public function View_College_Data(Request $request,$id){
       $get_college = DB::table('college_name')->where('id',$id)->first();
       return view('admin/view_college_data',array('id'=>$id,'name'=>$get_college)); 
    }
    Public function Edit_College(Request $request,$id){
            if($request->isMethod('post')){
                $this->validate($request, [
                                            'college_name'      => 'required|max:255',
                                            'establishment'     => 'required',
                                            'location'          => 'required',  
                                            'category'          => 'required',
                                            'type'              => 'required',
                                            'country'           => 'required',
                                          ]); 

                $college_name      = trim($request->input('college_name')); 
                $slug              = str_replace(' ', '_', strtolower($college_name));
                $location          = trim($request->input('location'));
                $category1         = $request->input('category');
                $year              = trim($request->input('establishment'));
                $type              = $request->input('type');
                $country           = $request->input('country');
             if($request->hasFile('images')){
                $get_img           = DB::table('college_name')->where('id',$id)->first();
                $file              = $get_img->image;
               // unlink('admin/img/college/'.$file); 
                $image             = $request->file('images');
                $destinationPath   = 'admin/img/college';   
                $filename          = $image->getClientOriginalName();
                $extension         = $image->getClientOriginalExtension();
                $images            = rand(11111,99999).'.'. $filename ;
                $image->move($destinationPath,$images);
                $CollegeArray      = array(   'college'           => $college_name,
                                             'image'             => $images,
                                             'location'          => $location,
                                             'establishment'     => $year,
                                             'type'              => $type,
                                             'country'           => $country
                                            );
               $AddCollege    = DB::table('college_name')->where('id',$id)->update($CollegeArray);
             foreach ($category1 as $key => $value) {
               $CategoryArray      = array(  
                                            
                                             'category_id'  =>  $value
                                          );
               $RegisterCard = DB::table('college_category')->where('college_id',$id)->update($CategoryArray);     
               }
               $message = "College Updated Successfully !";
               Session::flash('message',$message);
               return redirect('admin/view_college'); 
              }else{ 
               $CollegeArray     = array(  'college'           => $college_name,
                                           'location'          => $location,
                                           'type'              => $type,
                                           'establishment'     => $year,
                                           'country'           => $country
                                            );
               $AddCollege           = DB::table('college_name')->where('id',$id)->update($CollegeArray);
               $get_cat              = DB::table('college_category')->select('category_id')->where('college_id',$id)->get();
               $coll                 = json_decode( json_encode($get_cat), true); 
               $result               = array();
               $col                  = array_walk_recursive($coll,function($v, $k) use (&$result){ $result[] = $v; });
               $different            = array_merge(array_diff($result,$category1),array_diff($category1,$result));
              if(!empty($different)){
               $delete_old           = DB::table('college_category')->where('college_id',$id)->delete();  
              foreach($different as $key => $value){
                $CategoryArray      = array( 
                                             'college_id'      =>  $id,
                                             'category_id'     =>  $value
                                          );
                $RegisterCard = DB::table('college_category')->insert($CategoryArray); 
                }
                }else{
                  $message = "College Updated Successfully !";
                  Session::flash('message',$message);
                  return redirect('admin/view_college'); 
                } 
                  $message = "College Updated Successfully !";
                  Session::flash('message',$message);
                  return redirect('admin/view_college');
                } 
                   
              
              }else{
                  $college           =  DB::table('college_name')->where('id',$id)->first();        
                  $cate              =  DB::table('college_category')
                                          ->where('college_id',$id)
                                          ->select('category_id')->get()->toArray();
                  $coll              = json_decode( json_encode($cate), true); 
                  $result            = array();
                  $col               = array_walk_recursive($coll,function($v, $k) use (&$result){ $result[] = $v; });
                  $college->category = $result;
                  $category          =  DB::table('category')->get();
                  $get_country       =  DB::table('apps_countries')->get();
               return view('admin/edit_college',array('data'=>$college,'category'=>$category,'country'=>$get_country));
              }
    }  
    Public function View_College(Request $request){   
          if($request->isMethod('post')){  
             $segment1 = $request->get('Category');
          if($segment1 == 'all'){
             $get_college = DB::table('college_name')->orderby('id','DESC')->get();
             $category    = DB::table('category')->get();
             return view('admin/view_college',array('data'=>$get_college,'category'=>$category));
             exit();
             }
             $get_category = DB::table('college_category')->select('category_id')->get();
             $arr = array();
             foreach ($get_category as $key => $value) {
                   $stored_cat = $value->category_id;   
                   $arr[] =  explode(',',$stored_cat);
              }

             $singleArray = array_reduce($arr, 'array_merge', array());
              
             $a = in_array($segment1,$singleArray);
             if($a){
             
             $get_college = DB::table('college_name')
                                  ->leftjoin('college_category', 'college_category.college_id', '=', 'college_name.id')
                                  ->select('college_name.*')
                                  ->whereRaw("find_in_set($segment1,college_category.category_id)")
                                  ->get();

               $category    = DB::table('category')->get();
               return view('admin/view_college',array('data'=>$get_college,'category'=>$category));
                }else{
                  
                 $get_college = DB::table('college_name')
                                  ->leftjoin('college_category', 'college_category.college_id', '=', 'college_name.id')
                                  ->select('college_name.*')
                                  ->whereRaw("find_in_set($segment1,college_category.category_id)")
                                  ->get();

               $category    = DB::table('category')->get();
               return view('admin/view_college',array('data'=>$get_college,'category'=>$category));
                }
                           
            }else{
               $get_college = DB::table('college_name')->orderby('id','DESC')->get();
               $category    = DB::table('category')->get();
               return view('admin/view_college',array('data'=>$get_college,'category'=>$category));
             }
    }
    Public function  Delete_College($id){   
             $image    = DB::table('college_name')->where('id', $id)->first();
             $file     = $image->image;
             unlink('admin/img/college/' .$file);
             $query  = DB::table('college_name')->where('id',$id)->delete();
             $query1 = DB::table('college_category')->where('college_id',$id)->delete(); 
             $query2 = DB::table('college_ranking')->where('college_id',$id)->delete(); 
             Session::flash('message','College Deleted Successfully');
             return redirect::to('admin/view_college'); 
    }
    Public function View_Course_Data(Request $request,$id,$college_id){
       $get_college = DB::table('college_name')->where('id',$college_id)->first();
       $get_course  = DB::table('course')->where('id',$id)->first();
       return view('admin/view_course_data',array('id'=>$id,'name'=>$get_college,'course'=>$get_course)); 
    }
    Public function Course_Require(Request $request,$id,$college_id){
        if($request->isMethod('post')){
               $fees               =  $request->input('fees')!='' ? $request->input('fees') : '';
               $facilitate         =  $request->input('facility')!='' ? implode(',',$request->input('facility')) : ''; 
               $exam               =  $request->input('exam')!='' ? implode(',',$request->input('exam')) : '';
               $total_seat         =  $request->input('total_seat')!='' ? $request->input('total_seat') : ''; 
               $check_record       =  DB::table('course_require')->where('course_id',$id)->count();
         if($check_record > 0){
               $updateArray        =  array(    
                                           'course_id'   => $id,
                                           'college_id'  => $college_id,
                                           'fees'        => $fees,
                                           'facility'    => $facilitate,
                                           'total_seat'  => $total_seat,
                                           'exam'        => $exam
                                         );
               $update             = DB::table('course_require')->where('course_id',$id)->update($updateArray);
          if($update){  
               $message            = "Information Updated Successfully !";
               Session::flash('message',$message);
               return redirect('admin/course_require/'.$id.'/'.$college_id); 
        }else{
               $message            = "Internal server Error! Please Try Again.";
               Session::flash('message',$message);
               return redirect('admin/course_require/'.$id.'/'.$college_id); 
             }
        }else{
              $insertArray         =  array(    
                                          'course_id'   => $id,
                                           'college_id'  => $college_id,
                                           'fees'        => $fees,
                                           'facility'    => $facilitate,
                                           'total_seat'  => $total_seat,
                                           'exam'        => $exam
                                         );
               $insert         =  DB::table('course_require')->insert($insertArray);
            if($insert){  
               $message        = "Information Added Successfully !";
               Session::flash('message',$message);
                return redirect('admin/course_require/'.$id.'/'.$college_id); 
            }else{
               $message        = "Internal server Error! Please Try Again.";
               Session::flash('message',$message);
               return redirect('admin/course_require/'.$id.'/'.$college_id); 
             }
        }                           
        }else{
              $get_exam          = DB::table('exam')->get();
              $get_course        = DB::table('course')->where('id',$id)->first();
              $get_college       = DB::table('college_name')->where('id',$college_id)->first();
              $get_requirement   = DB::table('course_require')->where('course_id',$id)->first(); 
       
        return view('admin/require',array('exam'=>$get_exam,'name'=>$get_college,'course'=>$get_course,'require'=>$get_requirement)); 
        }
    }
    Public function Eligibility(Request $request,$id,$college_id){
        if($request->isMethod('post')){
               $HSC_general          =  $request->input('HSC_general')!='' ? $request->input('HSC_general') : '';
               $SSC_general          =  $request->input('SSC_general')!='' ? $request->input('SSC_general') : ''; 
               $Graduation_general   =  $request->input('graduation_general')!='' ? $request->input('graduation_general') : ''; 

               $HSC_obc              =  $request->input('HSC_obc')!='' ? $request->input('HSC_obc') : '';
               $SSC_obc              =  $request->input('SSC_obc')!='' ? $request->input('SSC_obc') : '';
               $Graduation_obc       =  $request->input('graduation_obc')!='' ? $request->input('graduation_obc') : '';

               $HSC_st               =  $request->input('HSC_st')!='' ? $request->input('HSC_st') : '';
               $SSC_st               =  $request->input('SSC_st')!='' ? $request->input('SSC_st') : '';
               $Graduation_st        =  $request->input('graduation_st')!='' ? $request->input('graduation_st') : '';
               
               $HSC_sc               =  $request->input('HSC_sc')!='' ? $request->input('HSC_sc') : '';
               $SSC_sc               =  $request->input('SSC_sc')!='' ? $request->input('SSC_sc') : '';
               $Graduation_sc        =  $request->input('graduation_sc')!='' ? $request->input('graduation_sc') : '';

               $HSC_pio              =  $request->input('HSC_pio')!='' ? $request->input('HSC_pio') : '';
               $SSC_pio              =  $request->input('SSC_pio')!='' ? $request->input('SSC_pio') : '';
               $Graduation_pio       =  $request->input('graduation_pio')!='' ? $request->input('graduation_pio') : '';

               $HSC_fn               =  $request->input('HSC_fn')!='' ? $request->input('HSC_fn') : '';
               $SSC_fn               =  $request->input('SSC_fn')!='' ? $request->input('SSC_fn') : '';
               $Graduation_fn        =  $request->input('graduation_fn')!='' ? $request->input('graduation_fn') : '';

               $HSC_pwd              =  $request->input('HSC_pwd')!='' ? $request->input('HSC_pwd') : '';
               $SSC_pwd              =  $request->input('SSC_pwd')!='' ? $request->input('SSC_pwd') : '';
               $Graduation_pwd       =  $request->input('graduation_pwd')!='' ? $request->input('graduation_pwd') : '';

               $HSC_international_student               =  $request->input('HSC_international_student')!='' ? $request->input('HSC_international_student') : '';
               $SCC_international_student               =  $request->input('SSC_international_student')!='' ? $request->input('SSC_international_student') : '';
               $Graduation_international_student        =  $request->input('graduation_international_student')!='' ? $request->input('graduation_international_student') : '';

               $HSC_nri_quota               =  $request->input('HSC_nri_quota')!='' ? $request->input('HSC_nri_quota') : '';
               $SSC_nri_quota               =  $request->input('SSC_nri_quota')!='' ? $request->input('SSC_nri_quota') : '';
               $Graduation_nri_quota        =  $request->input('graduation_nri_quota')!='' ? $request->input('graduation_nri_quota') : '';
               $minimum_age                 =  $request->input('minimum_age')!='' ? $request->input('minimum_age') : ''; 
               $minimum_experience          =  $request->input('minimum_experience')!='' ? $request->input('minimum_experience') : ''; 
              
              $check_data = DB::table('course_eligibility')->where('course_id',$id)->where('college_id',$college_id)->count();
          if($check_data > 0){
               $updateArray = array(
                                    'HSC_general'                => $HSC_general,
                                    'HSC_pwd'                    => $HSC_pwd,
                                    'HSC_fn'                     => $HSC_fn,
                                    'HSC_pio'                    => $HSC_pio,
                                    'HSC_sc'                     => $HSC_sc,
                                    'HSC_st'                     => $HSC_st,
                                    'HSC_obc'                    => $HSC_obc,
                                    'HSC_nri_quota'              => $HSC_nri_quota,
                                    'HSC_international_student'  => $HSC_international_student,
                                    'minimum_experience'         => $minimum_experience,
                                    'SSC_general'                => $SSC_general,
                                    'SSC_pwd'                    => $SSC_pwd,
                                    'SSC_fn'                     => $SSC_fn,
                                    'SSC_pio'                    => $SSC_pio,
                                    'SSC_sc'                     => $SSC_sc,
                                    'SSC_st'                     => $SSC_st,
                                    'SSC_obc'                    => $SSC_obc,
                                    'SSC_nri_quota'              => $SSC_nri_quota,
                                    'SSC_international_student'  => $SCC_international_student,
                                    'maximum_age'                => $minimum_age,
                                    'graduation_general'         => $Graduation_general,
                                    'graduation_pwd'             => $Graduation_pwd,
                                    'graduation_fn'              => $Graduation_fn,
                                    'graduation_pio'             => $Graduation_pio,
                                    'graduation_sc'              => $Graduation_sc,
                                    'graduation_st'              => $Graduation_st,
                                    'graduation_obc'             => $Graduation_obc,
                                    'graduation_nri_quota'       => $Graduation_nri_quota,
                                    'graduation_international_student'  => $Graduation_international_student
                                    );
               $update = DB::table('course_eligibility')->where('course_id',$id)->where('college_id',$college_id)->update($updateArray);
          if($update){
                    $message      = "Information Updated Successfully!";
                    Session::flash('message',$message);
                    return redirect('admin/eligible/'.$id.'/'.$college_id);
               }else{
                    $message      = "Internal Server Error! Please Try Again";
                    Session::flash('message',$message);
                    return redirect('admin/eligible/'.$id.'/'.$college_id);
               }    
          }else{
                   $InsertArray = array(
                                    'HSC_general'                => $HSC_general,
                                    'HSC_pwd'                    => $HSC_pwd,
                                    'HSC_fn'                     => $HSC_fn,
                                    'HSC_pio'                    => $HSC_pio,
                                    'HSC_sc'                     => $HSC_sc,
                                    'HSC_st'                     => $HSC_st,
                                    'HSC_obc'                    => $HSC_obc,
                                    'HSC_nri_quota'              => $HSC_nri_quota,
                                    'HSC_international_student'  => $HSC_international_student,
                                    'college_id'                 => $college_id,
                                    'SSC_general'                => $SSC_general,
                                    'SSC_pwd'                    => $SSC_pwd,
                                    'SSC_fn'                     => $SSC_fn,
                                    'SSC_pio'                    => $SSC_pio,
                                    'SSC_sc'                     => $SSC_sc,
                                    'SSC_st'                     => $SSC_st,
                                    'SSC_obc'                    => $SSC_obc,
                                    'SSC_nri_quota'              => $SSC_nri_quota,
                                    'SSC_international_student'  => $SSC_international_student,
                                    'course_id'                  => $id,
                                    'graduation_general'         => $graduation_general,
                                    'graduation_pwd'             => $graduation_pwd,
                                    'graduation_fn'              => $graduation_fn,
                                    'graduation_pio'             => $graduation_pio,
                                    'graduation_sc'              => $graduation_sc,
                                    'graduation_st'              => $graduation_st,
                                    'graduation_obc'             => $graduation_obc,
                                    'graduation_nri_quota'       => $graduation_nri_quota,
                                    'graduation_international_student'  => $graduation_international_student,
                                    'minimum_experience'         => $minimum_experience,
                                    'maximum_age'                => $minimum_age
                                    );
               $insert = DB::table('course_eligibility')->insert($InsertArray);
          if($insert){
                    $message      = "Information Added Successfully!";
                    Session::flash('message',$message);
                    return redirect('admin/eligible/'.$id.'/'.$college_id);
               }else{
                    $message      = "Internal Server Error! Please Try Again";
                    Session::flash('message',$message);
                    return redirect('admin/eligible/'.$id.'/'.$college_id);
               }
               }
         }else{
              $get_course        = DB::table('course')->where('id',$id)->first();
              $get_college       = DB::table('college_name')->where('id',$college_id)->first();
              $get_requirement   = DB::table('course_eligibility')->where('course_id',$id)->first(); 
           return view('admin/eligible',array('name'=>$get_college,'course'=>$get_course,'require'=>$get_requirement)); 
       
        }
    }
        
    Public function College_Exam(Request $request,$id){   
        if($request->isMethod('post')){
           $exam            = $request->input('exam');
           $exam_id         = implode(',',$exam);
           $check_record    = DB::table('college_exam')->where('college_id',$id)->count();
           if($check_record > 0) {
           $updateArray     = array( 
                                  'exam_id'    => $exam_id
                                  ); 
           $update_exam     =  DB::table('college_exam')->where('college_id',$id)->update($updateArray);
           $message         = "Exams Updated Successfully!";
           Session::flash('message',$message);
           return redirect('admin/college_exam/'.$id);
           }else{
           $insertArray     = array( 
                                  'college_id' => $id,
                                  'exam_id'    => $exam_id
                                  ); 
           $add_exam        =  DB::table('college_exam')->insert($insertArray);
           $message         = "Exams Added Successfully!";
           Session::flash('message',$message);
           return redirect('admin/college_exam/'.$id);
           }
           }else{
           $get_exam        = DB::table('exam')->get();
           $get_college     = DB::table('college_name')->where('id',$id)->first();
           $college_exam    = DB::table('college_exam')->select('exam_id')->where('college_id',$id)->first();
         
           return view('admin/college_exam',array('name'=> $get_college,'exam'=>$college_exam,'all'=>$get_exam));
           }
    } 
          // Course
    Public function Add_Course(Request $request,$id){   
        if($request->isMethod('post')){
                  $this->validate($request, [
                                            'course_name'        => 'required',
                                            'course_type'        => 'required',  
                                            'time'               => 'required',
                                            'duration'           => 'required|numeric',
                                            ]); 
                     $course_type   = $request->input('course_type');
                     $course_name   = $request->input('course_name');
                     $duration_type = $request->input('time');
                     $duration      = $request->input('duration').' '.$request->input('duration_type');  
                     $highlight     = $request->input('highlight') !='' ? $request->input('highlight') : '';     
            $insertArray = array(                              
                                'category_id'   =>  $course_type,
                                'course_name'   =>  $course_name,
                                'type'          =>  $duration_type,
                                'duration'      =>  $duration,
                                'college_id'    =>  $id,
                                'highlight'     =>  $highlight    
                              );           
            $query = DB::table('course')->insert($insertArray);
            $count = count($query);
          if($count > 0){
              Session::flash('message', "Course Added Successfully !");
              return redirect('admin/view_college_course/'.$id); 
          }else{
              Session::flash('message', "Server Not responding Please Try Again!");
              return redirect('admin/add_course/'.$id); 
         }
         }else{

           $get_college  = DB::table('college_name')->where('id',$id)->first();  
           $get_category = DB::table('category')->get();
           return view('admin/add_course',array('name' =>$get_college,'category'=>$get_category));
        }        
    } 
    Public function View_College_Course(Request $request,$id){   
              if($request->isMethod('post')){
                 $segment1 = $request->get('Category');
              if($segment1   == 'all'){
                 $get_course  = DB::table('course')->where('college_id',$id)->orderby('id','DESC')->get();
                 foreach ($get_course as $key => $value) {
                 $value->category_name = DB::table('category')->select('category_name')->where('id',$value->category_id)->first();
                 $value->fees          = DB::table('course_require')->select('fees')->where('course_id',$value->id)->first();
                 }
                 $category    = DB::table('category')->get();
                 $get_college = DB::table('college_name')->where('id',$id)->first();  
                 return view('admin/view_college_course',array('data'=>$get_course,'category'=>$category,'name'=>$get_college));
                 exit();
              }else{
                 $get_course  = DB::table('course')->where('category_id',$segment1)->Where('college_id',$id)->get(); 
                 foreach ($get_course as $key => $value) {
                 $value->category_name = DB::table('category')->select('category_name')->where('id',$value->category_id)->first();
                   $value->fees  = DB::table('course_require')->select('fees')->where('course_id',$value->id)->first();
                 }
                 $category    = DB::table('category')->get();
                 $get_college = DB::table('college_name')->where('id',$id)->first(); 
                 return view('admin/view_college_course',array('data' =>$get_course , 'category'=>$category,'name'=>$get_college)); 
                 }    
             }else{
                 $get_course   = DB::table('course')->where('college_id',$id)->get();
                 foreach ($get_course as $key => $value) {
                 $value->category_name = DB::table('category')->select('category_name')->where('id',$value->category_id)->first();
                 $value->fees          = DB::table('course_require')->select('fees')->where('course_id',$value->id)->first();
                 }
                 $category     = DB::table('category')->get();
                 $get_college  = DB::table('college_name')->where('id',$id)->first(); 
                 return view('admin/view_college_course',array('data' =>$get_course , 'category'=>$category,'name'=>$get_college));  
                 }       
    } 
    Public function Delete_Course(Request $request ,$id, $college_id) {  
        $get_course  = DB::table('course')->where('id',$id)->select('category_id')->first();
        $cat         = $get_course->category_id; 
        $delete      = DB::table('course')->where('id',$id)->delete();
       if($delete){
        Session::flash('message', "Course Deleted Successfully");
        return redirect('admin/view_college_course/'.$college_id);  
       }else{
        Session::flash('message', "Server Error Please Try Again to Delete !");
        return redirect('admin/view_college_course/'.$college_id);
       }
    }
    Public function Edit_Course(Request $request,$id,$college_id){   
       if($request->isMethod('post')){   
               $this->validate($request, [
                                            'course_name'        => 'required',
                                            'course_type'        => 'required',  
                                            'time'               => 'required',
                                            'duration'           => 'required|numeric',
                                         ]); 
                     $course_type   = $request->input('course_type');
                     $course_name   = $request->input('course_name');
                     $duration_type = $request->input('time');
                     $duration      = $request->input('duration').' '.$request->input('duration_type'); 
                     $highlight     = $request->input('highlight') != '' ? $request->input('highlight') : '';            
            $UpdateArray = array(                              
                                'category_id'   =>  $course_type,
                                'course_name'   =>  $course_name,
                                'type'          =>  $duration_type,
                                'duration'      =>  $duration,
                                'college_id'    =>  $college_id,
                                'highlight'     =>  $highlight
                               );           
           $query = DB::table('course')->where('id',$id)->update($UpdateArray);
        if($query){
           Session::flash('message', "Course Updated Successfully");
           return redirect('admin/view_college_course/'.$college_id);
        }else{
             Session::flash('message', "Course Updated Successfully");
           return redirect('admin/view_college_course/'.$college_id);
        }
       }else{
        $get_college  = DB::table('college_name')->where('id',$college_id)->first(); 
        $get_courses  = DB::table('course')->where('id',$id)->first();
        $get_course['college']  = $get_college;
        $get_course['course']   = $get_courses;
        $get_course['category'] = DB::table('category')->get();
        return view('admin/edit_course',array('data'=> $get_course));
       }
    }
                  // Exam
    Public function Add_Exam(Request $request){   
        if($request->isMethod('post')){
         $this->validate($request, [
                                      'exam_name'                => 'required',
                                      'exam_type'                => 'required',
                                  ]);
      
                    $exam_name         =  $request->input('exam_name'); 
                    $description       =  $request->input('description')!=''? $request->input('description'):''; 
                    $exam_type         =  $request->input('exam_type')!=''? $request->input('exam_type'):'';
                    $exam_date         =  $request->input('exam_date')!=''? $request->input('exam_date'):'';
                    $reg_start_date    =  $request->input('reg_start_date')!=''? $request->input('reg_start_date'):'';
                    $reg_end_date      =  $request->input('reg_end_date')!=''? $request->input('reg_end_date'):'';
                    $reg_form_available=  $request->input('reg_form_available')!=''? $request->input('reg_form_available'):'';
                    $result_date       =  $request->input('result_date')!=''? $request->input('result_date'):'';
                    $insertArray       = array(
                                          'exam'               =>  $exam_name,
                                          'description'        =>  $description,
                                          'category_id'        =>  $exam_type,
                                          'reg_start_date'     =>  $reg_start_date,
                                          'reg_end_date'       =>  $reg_end_date,
                                          'reg_available_from' =>  $reg_form_available,
                                          'exam_date'          =>  $exam_date,
                                          'result_date'        =>  $result_date
                                   );

                    $query = DB::table('exam')->insert($insertArray);
               if(count( $query) > 0){
                  Session::flash('message', "Exam Successfully Added");  
                  return redirect('admin/view_exam');     
              }else{
                  Session::flash('message', "Server Not Responding Please Try Again");
                  return redirect('admin/add_exam');   
              }  
              }else{
                  $get_category = DB::table('category')->get(); 
                  return view('admin/add_exam',array('category'=> $get_category));
             }
    }
    Public function Edit_Exam(Request $request, $id){   
        if($request->isMethod('post')){
         $this->validate($request, [
                                      'exam_name'                => 'required',
                                      'exam_type'                => 'required',
                                  ]);
                    $exam_name         =  $request->input('exam_name'); 
                    $description       =  $request->input('description')!=''? $request->input('description'):''; 
                    $exam_type         =  $request->input('exam_type')!=''? $request->input('exam_type'):'';
                    $exam_date         =  $request->input('exam_date')!=''? $request->input('exam_date'):'';
                    $reg_start_date    =  $request->input('reg_start_date')!=''? $request->input('reg_start_date'):'';
                    $reg_end_date      =  $request->input('reg_end_date')!=''? $request->input('reg_end_date'):'';
                    $reg_form_available=  $request->input('reg_form_available')!=''? $request->input('reg_form_available'):'';
                    $result_date       =  $request->input('result_date')!=''? $request->input('result_date'):'';
                    $updateArray       = array(
                                          'exam'               =>  $exam_name,
                                          'description'        =>  $description,
                                          'category_id'        =>  $exam_type,
                                          'reg_start_date'     =>  $reg_start_date,
                                          'reg_end_date'       =>  $reg_end_date,
                                          'reg_available_from' =>  $reg_form_available,
                                          'exam_date'          =>  $exam_date,
                                          'result_date'        =>  $result_date
                                   );
                    $query = DB::table('exam')->where('id',$id)->update($updateArray);
                 if($query){
                    Session::flash('message', "Exam Updated Successfully!");  
                    return redirect('admin/view_exam');     
                 }else{
                    Session::flash('message', "Server Not Responding Please Try Again");
                    return redirect('admin/edit_exam/'.$id);   
                 }  
                 }else{
                  $get_category = DB::table('category')->get(); 
                  $get_exam     = DB::table('exam')->where('id',$id)->first();
                  return view('admin/edit_exam',array('category'=> $get_category,'data'=>$get_exam));
                 }
    }
    Public function View_Exam(Request $request){   
         if($request->isMethod('post')){
              $segment1 = $request->get('Category');
           if($segment1   == 'all'){
                  $get_exam   = DB::table('exam')->get();
                  foreach ($get_exam as $key => $value) {
                  $value->category_name = DB::table('category')->select('category_name')->where('id',$value->category_id)->first();
                  }
                  $category    = DB::table('category')->get();
                  return view('admin/view_exam',array('data'=>$get_exam,'category'=>$category));
                  exit();
              }else{
                 $get_exam   = DB::table('exam')->where('category_id',$segment1)->get();
                 foreach ($get_exam as $key => $value) {
                 $value->category_name = DB::table('category')->select('category_name')->where('id',$value->category_id)->first();
                 } 
                 $category    = DB::table('category')->get();
                 return view('admin/view_exam',array('data' =>$get_exam , 'category'=>$category)); 
              }  
              }else{
                 $get_exam   = DB::table('exam')->get();
                 foreach ($get_exam as $key => $value) {
                 $value->category_name = DB::table('category')->select('category_name')->where('id',$value->category_id)->first();
                 }
                  $category    = DB::table('category')->get();
                  return view('admin/view_exam',array('data'=>$get_exam,'category'=>$category));  
              }       
    } 
    Public function Delete_Exam(Request $request,$id) {   
          $delete      = DB::table('exam')->where('id',$id)->delete();
         if($delete){
          Session::flash('message', "Exam Deleted Successfully");
          return redirect('admin/view_exam');  
         }else{
          Session::flash('message', "Server Error Please Try Again to Delete !");
          return redirect('admin/view_exam');
         }
    }
                 // Forgot Password
  
   
                // Category
    Public function Add_Category(Request $request){   
         if($request->isMethod('post')){
            $this->validate($request, [
                    
                    'category'        => 'required|unique:category,category_name',
                                    ]); 
            $category         = ucfirst(trim($request->input('category')));
          
            $CategoryArray      = array( 
                                         'category_name'           => $category
                                     );
           $RegisterCard  = DB::table('category')->insert($CategoryArray);         
           $message       = "A New Category Added Successfully !";
           Session::flash('message',$message);
           return redirect('admin/view_category'); 
               
          }else{
               return view('admin/add_category');
          }
    } 
    Public function View_Category(Request $request){   

               $get_category   = DB::table('category')->orderby('id','DESC')->get();
               return view('admin/view_category',array('data'=>$get_category));
    }
    Public function Edit_Category(Request $request,$id){
            if($request->isMethod('post')){
                $this->validate($request, [
                                           'category'   => 'required',
                                           ]); 
                 $category           = $request->input('category');
                
                 $CategoryArray      = array( 
                                             'category_name'     =>  $category
                                         );
               $RegisterCard = DB::table('category')->where('id',$id)->update($CategoryArray);     
               $message = "Category Updated Successfully !";
               Session::flash('message',$message);
               return redirect('admin/view_category'); 
            
            }else{
               $get_category   = DB::table('category')->where('id',$id)->first();
             
              return view('admin/edit_category',array('data'=>$get_category));

            }  
    }
    Public function Delete_Category($id){   
            $query1 = DB::table('category')->where('id',$id)->delete(); 
           if($query1){
             $delete_college = DB::table('college_category')->where('category_id',$id)->delete();
             $delete_exam    = DB::table('exam')->where('category_id',$id)->delete(); 

           }

             Session::flash('message','Category Deleted Successfully');
             return redirect::to('admin/view_category'); 
    }
                // Gallery
    Public function View_Gallery(Request $request,$id){
          $get_college = DB::table('college_name')->where('id',$id)->first();
          $get_gallery = DB::table('gallery')->where('college_id',$id)->get();

          return view('admin/view_gallery',array('data'=>$get_college,'gallery'=>$get_gallery));
    }
    Public function Add_Gallery(Request $request,$id){
        if($request->isMethod('post')){
                     $this->validate($request, [
                                            'images'      => 'required',
                                               ]); 
          $images1  = array();
          if($request->hasFile('images')){ 
              $image = $request->file('images');
          foreach($image as $file){
              $destinationPath = 'admin/img/college_gallery';   
              $filename        = $file->getClientOriginalName();
              $extension       = $file->getClientOriginalExtension();
              $images          = rand(11111,99999).'.'. $filename ;
              $file->move($destinationPath, $images);
              $insertArray = array('college_id'=>$id,
                                   'image'     =>$images
                                  );
              $query = DB::table('gallery')->insert($insertArray);
              }
             if($query){
                Session::flash('message', 'Images Added to Gallery');
                return Redirect('admin/view_gallery/'.$id);
              }
              
            }else{
             Session::flash('message', 'Please Upload College Image');
             return Redirect('admin/add_gallery');
               }           
            }else{

           $get_gallery = DB::table('college_name')->where('id',$id)->orderby('id','DESC')->get();
           return view('admin/add_gallery',array('data'=>$get_gallery));
        }
    }
    Public function Delete_Gallery(Request $request,$college_id,$id){
           $image    = DB::table('gallery')->where('id', $id)->first();
           $file     = $image->image;
           unlink('admin/img/college_gallery/' .$file);
           $query    = DB::table('gallery')->where('id',$id)->where('college_id',$college_id)->delete();
           if($query){
           $data['status']  = 1;
           $data['message'] = 'Image deleted Successfully';
           }else{
           $data['status']  =  0;
           $data['message'] = 'Internal Server Error! Please Try Again';
             }
          
           return $data;
    }
                // Event
    Public function View_Events(Request $request,$id){
     
           $get_events  = DB::table('events')->where('college_id',$id)->orderby('id','DESC')->get();
           $get_college = DB::table('college_name')->where('id',$id)->first(); 
           return view('admin/view_events',array('name'=>$get_college,'data'=>$get_events));
    }
    Public function Add_Events(Request $request,$id){
            if($request->isMethod('post')){
                         $this->validate($request, [
                                                     'image'       => 'required',
                                                     'event_title' => 'required|max:20',
                                                     'description' => 'required|min:20',
                                                   ]);
                $title        =  $request->input('event_title');
                $description  =  $request->input('description');          
            if($request->hasFile('image')){ 
                $image = $request->file('image');
                $destinationPath = 'admin/img/event/';   
                $filename        = $image->getClientOriginalName();
                $extension       = $image->getClientOriginalExtension();
                $images          = rand(11111,99999).'.'. $filename ;
                $image->move($destinationPath, $images);
                }else{
                Session::flash('message', 'Please Upload Event Image');
                return Redirect('admin/add_events/'.$id);
                }
                $insertArray     = array(     'college_id'  => $id,
                                              'image'       => $images,
                                              'event_title' => $title,
                                              'description' => $description
                                        );   
                $insert = DB::table('events')->insert($insertArray);
            if(count($insert) > 0){
                Session::flash('message', 'Event added Successfully!');
                return Redirect('admin/view_events/'.$id); 
            }else{
                 Session::flash('message', 'Internal Server Error! Please try again');
                 return Redirect('admin/add_events/'.$id);
                 }
            }else{ 
              $get_college = DB::table('college_name')->where('id',$id)->first(); 
              return view('admin/add_events',array('name'=>$get_college));
              }
    }
    Public function Delete_Events(Request $request,$id,$college_id){
           $image    = DB::table('events')->where('id', $id)->first();
           $file     = $image->image;
             unlink('admin/img/event/' .$file);
            $delete = DB::table('events')->where('id',$id)->delete();
           if($delete){
            Session::flash('message', 'Event Deleted Successfully!');
            return Redirect('admin/view_events/'.$college_id);   
           }else{
            Session::flash('message', 'Internal Server Error! Please try again');
            return Redirect('admin/view_events/'.$college_id);
           }  
    }
    Public function Edit_Events(Request $request,$id,$college_id){
            if($request->isMethod('post')){
                   $this->validate($request, [
                                       'event_title' => 'required|max:20',
                                       'description' => 'required|min:20',
                                             ]);
                $event         =   $request->input('event_title');
                $description   =   $request->input('description');
            if($request->hasFile('image')){ 
                $get_img           = DB::table('events')->where('id',$id)->first();
                $file              = $get_img->image;
                unlink('admin/img/event/'.$file); 
                $image = $request->file('image');
                $destinationPath = 'admin/img/event/';   
                $filename        = $image->getClientOriginalName();
                $extension       = $image->getClientOriginalExtension();
                $images          = rand(11111,99999).'.'. $filename ;
                $image->move($destinationPath,$images);
                $UpdateArray     = array(   
                                             'image'             => $images,
                                             'event_title'       => $event,
                                             'description'       => $description,
                                             'college_id'        => $college_id
                                            );
               $Updated    = DB::table('events')->where('id',$id)->update($UpdateArray);
             if($Updated){  
               $message = "Event Updated Successfully !";
               Session::flash('message',$message);
               return redirect('admin/view_events/'.$college_id); 
             }else{
               $message = "Internal server Error! Please Try Again.";
               Session::flash('message',$message);
               return redirect('admin/edit_events/'.$id.'/'.$college_id); 
             }             
             }else{ 
               $UpdateArray     = array(     
                                             'event_title'       => $event,
                                             'description'       => $description,
                                             'college_id'        => $college_id
                                       );
               $Updated    = DB::table('events')->where('id',$id)->update($UpdateArray);
             if($Updated){  
               $message = "Event Updated Successfully !";
               Session::flash('message',$message);
               return redirect('admin/view_events/'.$college_id); 
             }else{
               $message = "Internal server Error! Please Try Again.";
               Session::flash('message',$message);
               return redirect('admin/edit_events/'.$id.'/'.$college_id); 
             }  
             }
             }else{ 
               $get_college = DB::table('college_name')->where('id',$college_id)->first(); 
               $get_event   = DB::table('events')->where('id',$id)->first();

               return view('admin/edit_events',array('name'=>$get_college,'data'=>$get_event));
              }
    }
    Public function College_Apply(Request $request){
      if($request->isMethod('post')){
        echo "here";
      }else{
         $get_user               = DB::table('college_applied_list')->get()->toArray();
          foreach ($get_user as $key => $value) {
         $get_user['college_name']     = DB::table('college_name')->where('id',$value->college_id)->get()->toArray();
         $get_user['username']         = DB::table('users')->where('id',$value->user_id)->get()->toArray();   
         }
        return view('admin/college_applied',array('data'=>$get_user));
      }
    }
    
}
