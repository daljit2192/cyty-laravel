<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use JWTAuth;

/**
 * Class Category.
 */
class Product extends Authenticatable
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','cat_id','price','description','images','discount','offer','coupon_code','seller_info','created_at','updated_at'];
}
