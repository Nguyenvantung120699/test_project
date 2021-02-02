<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = ['name','gallery','category_id','quantity','price','description'];

    public function Category_Foregin(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
