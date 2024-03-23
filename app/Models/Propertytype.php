<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Propertytype extends Model
{
    use HasFactory;
    protected $fillable = ["property_type","description"];


    public function catprop(){

        return $this->hasMany(Property::class);
     }



}
