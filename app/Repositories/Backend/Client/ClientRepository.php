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
    public static function save_client($request){
        
        $client = new User();
        $client->fill($request);
        $client->password = bcrypt($client->password);
        if($client->save()){
            return true;
        } else {
            return false;
        }
    }
    public static function update_client($request){
        $client = User::find($request["id"]);
        $client->fill($request);
        if($client->save()){
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
    
    public static function get_client($id){
        $cleint = User::find($id);
        if(count($cleint->toArray())>0 && isset($cleint) && !empty($cleint)){
            return $cleint->toArray();
        } else {
            return array();
        }
    }
    
    public static function delete_cleint($id){
        User::where("id",$id)->delete();
    }
}
