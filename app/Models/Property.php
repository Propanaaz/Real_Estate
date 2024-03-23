<?php

namespace App\Models;

use App\Models\Propertytype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ["name","location","description","price","slug","image1","image2","image3","image4","feature1","feature2","feature3","feature1ans","feature2ans","feature3ans","user_id","propertytype_id","tag"];



    public function propcat(){
        return $this->belongsTo(Propertytype::class,"propertytype_id");
    }



}


