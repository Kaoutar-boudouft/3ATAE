<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategories extends Model
{
    use HasFactory;
    protected $table='souscategory';
    
    function categories(){
        return $this->belongsTo(Categories::class);
    }
}
