<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='pets';

    protected $fillable = ['pet_name', 'description', 'pet_age', 'pet_gender', 'pet_image',
        'customer_id' ];

        protected $dates = ['deleted_at'];
}
