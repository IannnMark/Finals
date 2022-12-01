<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class service extends Model
{
    use HasFactory, SoftDeletes;
    protected   $table ='services';

    protected   $fillable = ['service_description', 'service_cost', 'image'];

    protected   $dates = ['deleted_at'];
}
