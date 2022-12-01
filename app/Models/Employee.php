<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    use HasFactory, SoftDeletes;
    protected   $table ='employees';

    protected   $fillable = ['lname', 'fname', 'address','phone', 'image'];

    protected   $dates = ['deleted_at'];
}
