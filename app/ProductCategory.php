<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
{

    public $filled = ['title','short_description','description','image_path','productcategory_id','meta_description','meta_keys'];


    public function products(){
        return $this->hasMany('App\Product');
    }

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
