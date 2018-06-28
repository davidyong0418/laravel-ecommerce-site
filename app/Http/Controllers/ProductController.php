<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Session;
use Validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   


    public function index($id)
    {
        $foo     = new product();
        $product = $foo->get_data_by_id($id);
        return view('productdetail',array('product'=>$product));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $foo     = new product();
        $product = $foo->all_data();
        return view('all_product',array('product' =>$product));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request,$id,$user)
    { 
      if($request->isMethod('post')){
       
           $validator = Validator::make($request->all(), [
             'fname'       =>  'required',
             'email'       =>  'required',
             'phone'       =>  'required',
             'country'     =>  'required',
             'state'       =>  'required',
             'city'        =>  'required',
             'address'     =>  'required',
             'zip'         =>  'required',
        ]);

        if ($validator->fails()) {
            return redirect('/checkout/'.$id.'/'.$user)
                        ->withErrors($validator)
                        ->withInput();
        }      
               $name      = $request->input('fname');
               $email     = $request->input('email');
               $address   = $request->input('address');
               $city      = $request->input('city');
               $state     = $request->input('state');
               $country   = $request->input('country');
               $telephone = $request->input('phone');
               $zip       = $request->input('zip');
         $updateArray = array(  'name'      =>trim($name),
                                'email'     =>trim($email),
                                'telephone' =>trim($telephone),
                                'country'   =>trim($country),
                                'state'     =>trim($state),
                                'city'      =>trim($city),
                                'zip'       =>trim($zip),
                                'address'   =>trim($address)
                          );  

       $update = DB::table('users')->where('id',$user)->update($updateArray);
    
            return redirect('order-review/'.$id.'/'.$user);
     

      }else{
         $foo     = new product();
         $product = $foo->get_data_by_id($id);
         return view('checkout',array('data'=>$product));
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request ,$id, $user)
    {
       $foo     = new product();
       $product = $foo->get_data_by_id($id);
       return view('order_review',array('data' => $product ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
           $amount       =      trim($_GET['amt']); 
           $Ccurrency    =      trim($_GET['cc']);
           $userId       =      trim($_GET['item_name']);
           $product_id   =      trim($_GET['item_number']);
           $status       =      trim($_GET['st']);
           $orderNumber  =      trim($_GET['tx']);
                       
           $insertArray  = array('user_id'      => $userId,
                                 'product_id'   => $product_id,    
                                 'amount'       => $amount,
                                 'currency'     => $Ccurrency,
                                 'status'       => $status,
                                 'order_number' => $orderNumber
                               );    
       
          $foo     = new product();
          $insert  = $foo->add($insertArray);
       if($insert == 1){
          return redirect('raffle-order');

       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function raffle()
    {       

            $id      = Auth::user()->id; 
            $foo     = new product();
            $product = $foo->get_order_by_id($id);
            if($product != null){
            
            foreach($product as $value){
               $value->Pdetail = DB::table('products')->where('id',$value->product_id)->first();
               $value->Udetail = DB::table('users')->where('id',$value->user_id)->first(); 
            }
            }           
          return view('raffle_order',array('order'=>$product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
