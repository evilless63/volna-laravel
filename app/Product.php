<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{

    public $filled = ['title','main_image_path','description','productcategory_id','is_active','add_shema','meta_keys', 'meta_description'];

    public function product_images(){
        return $this->hasMany('App\ProductImage');
    }

    public function product_category(){
        return $this->belongsTo('App\ProductCategory');
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
