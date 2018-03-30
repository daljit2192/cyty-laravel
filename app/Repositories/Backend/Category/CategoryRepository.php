<?php
namespace App\Repositories\Backend\Category;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use File;

class CategoryRepository extends BaseRepository
{
    public static function save_catgeory($request){
        $datetime = Carbon::now();
        $name = explode(".", $request["image"]->getClientOriginalName());
        $imageName = $name[0].$datetime->toDateTimeString();
        $imageName = preg_replace('/[^a-zA-Z0-9]/', '', $imageName);
        $request["image"]->move(public_path("user-images"),$imageName.".".$request["image"]->getClientOriginalExtension());
        $category = new Category();
        $category->fill($request);
        $category->image = $imageName.".".$request["image"]->getClientOriginalExtension();
        if($category->save()){
            return true;
        } else {
            return false;
        }
    }
    public static function update_catgeory($request){
        $category = Category::find($request["id"]);
        $category->fill($request);
        if($category->save()){
            return true;
        } else {
            return false;
        }
    }
    public static function get_all_categories(){
        $category = Category::all();
        if(count($category)>0 && isset($category) && !empty($category)){
            return $category->toArray();
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
