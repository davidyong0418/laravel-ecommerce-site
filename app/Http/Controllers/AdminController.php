<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\product;
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
           $foo     = new product();
           $product = $foo->all_data();

        foreach ($product as $key => $value) {
           $value->booked = DB::table('payments')->where('product_id',$value->id)->count();
         } 
        
           return view('admin/raffle_view',array('data'=>$product));
         
    }
    public function Raffle(Request $request,$productID){
            $foo     = new product();
            $product = $foo->all_data_by_id($productID);
      foreach ($product as $key => $value) {
         $value->user = DB::table('users')->where('id',$value->user_id)->first();
      }
          return view('admin/run_raffle',array('data'=>$product));
    }
    public function Round1(Request $request){
         $data  = $_POST;
         print_r($data);
        foreach ($data as $key => $value) {
      
     
          $insertArray =  array('product_id' => $value['product_id'],
                                'pos'        => $value['pos'][0],
                                'user_ticket'=> $value['order'][0],
                                'user_name'  => $value['name'][0]
                               );

         $result =  DB::table('raffle_winner')->insert($insertArray);
        }

     
    }
    // Admin user manage controller
    public function UserManage(Request $request)
    {
        if($request->isMethod('post')){
            DB::table('users')
                    ->where('id', $request->delete_id)
                    ->delete();
            
        }
        $users = DB::table('users')->get();
        return view('admin/user_manage',array('users' => $users));
    }
    public function UserManageEdit(Request $request)
    {
        if($request->isMethod('post')){
                DB::table('users')
                    ->where('id', $request->id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email                        
                    ]);
                return redirect('admin/user-manage');
        }
        else{
            $user = DB::table('users')->where('id', $request->id)->first();
            return view('admin/user_manage_edit',array('user' => $user));
        }
        
    }
    
}
