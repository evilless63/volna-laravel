<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class ProductCategory extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public $fillable = ['title','short_description','description','image_path','productcategory_id','meta_description','meta_keys'];


    public function products(){
        return $this->hasMany('App\Product');
    }

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
