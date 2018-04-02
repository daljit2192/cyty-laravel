<?php
namespace App\Repositories\Backend\Client;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use File;

class ClientRepository extends BaseRepository
{
    public static function save_product($request){
        $datetime = Carbon::now();
        $name = explode(".", $request["images"]->getClientOriginalName());
        $imageName = $name[0].$datetime->toDateTimeString();
        $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $imageName);
        $request["images"]->move(public_path("user-images"),$imageName.".".$request["images"]->getClientOriginalExtension());
        $product = new Product();
        $product->fill($request);
        $product->images = $imageName.".".$request["images"]->getClientOriginalExtension();
        if($product->save()){
            return true;
        } else {
            return false;
        }
    }
    public static function update_product($request){
        $product = Product::find($request["id"]);
        $product->fill($request);
        if($product->save()){
            return true;
        } else {
            return false;
        }
    }
    public static function get_all_clients(){
        $clients = User::where('id','<>',auth()->id())->get();
        if(count($clients)>0 && isset($clients) && !empty($clients)){
            return $clients->toArray();
        } else {
            return array();
        }
    }
    
    public static function get_category($id){
        $category = Category::find($id);
        if(count($category->toArray())>0 && isset($category) && !empty($category)){
            return $category->toArray();
        } else {
            return array();
        }
    }
    
    public static function delete_category($id){
        Category::where("id",$id)->delete();
    }
}
