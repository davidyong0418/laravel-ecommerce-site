<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    public function all_data(){
        $pro = DB::table('products')->get();
        return $pro;  
    }   
     public function all_datas(){
        $pro = DB::table('products')->where('raffle_end','>',date('Y-m-d H:i:s'))->get();
        return $pro;  
    }   
    public function all_data_by_id($id){
        $pro = DB::table('payments')->where('product_id',$id)->get();
        return $pro;  
    }   
     public function get_data_by_id($id){
        $pro = DB::table('products')->where('id',$id)->get();
        return $pro;  
    }   
    
     public function add($id){
        $pro = DB::table('payments')->insert($id);
        return 1;  
    }  

    public function get_order_by_id($id){
        $pro = DB::table('payments')->where('user_id',$id)->get();
        if(count($pro) > 0){
            return $pro;
        }  
        else{
            return null;
        } 
    }  

}
