<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 20-09-2018
 * Time: 13:05
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    protected $table = "address_book";
    protected $primaryKey = 'addess_book_id';
    protected $fillable = [ 'first_name','last_name','contact_no','email_id' , 'is_active','users_id'];

    protected $hidden = ['created_at','updated_at' ,'address_book_id'];

    /*
    * Get address of User
    *
    */

//    public function users()
//    {
//        return $this->hasMany('App\Users','users_id');
//    }

}