<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use JWTAuth;

/**
 * Class ServiceProvider.
 */
class ServiceProvider extends Authenticatable
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'service_provider';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id','contractor_type','job_category','skill','tag_line','description','experience','portfolio','price','avalaibility','location','licence_img','latitude','longitude','created_at','updated_at'];
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
