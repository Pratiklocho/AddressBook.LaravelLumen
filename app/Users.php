<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 20-09-2018
 * Time: 13:04
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = 'users_id';
    protected $fillable = [ 'first_name','last_name','email_id' ,'password', 'is_active'];
    protected $hidden = ['created_at','updated_at' ,'user_id'];
}