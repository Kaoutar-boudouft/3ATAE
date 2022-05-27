<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table='category';

    public function souscategories(){
        return $this->hasMany(SousCategories::class);
    }
}
