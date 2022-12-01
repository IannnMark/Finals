<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;
    protected   $table ='customers';

    protected   $fillable = ['lname', 'fname', 'address','phone', 'image'];

    protected   $dates = ['deleted_at'];


//     use HasFactory;
//     use softDeletes;
//     protected $guarded = ['id'];

//     public static  $rules = [  'title' =>'required|min:3',
//     'lname'=>'required|alpha',
//     'fname'=>'required',
//     'address'=>'required',
//     'phone'=>'numeric',
//    ];

 

}
