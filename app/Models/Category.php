<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name','logo','description'];

    public function Products_Foregin(){
        return $this->hasMany('App\Models\Product','id');
    }

}
