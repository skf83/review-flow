<?php

namespace app\models\upload;

use Element\Unique\Generate;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'images';

    /**
     * Specifying which columns, we want to write to...
     */
    protected $fillable = [

        'uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * @return void
     */
    public static function boot() {

        parent::boot();

        static::creating(function ($image) {

            try {

                $image->uuid = Generate::uuid4();

            } catch (\Exception $error) {

                dump("no uuid was generated?!");
                die;

            }
        });
    }
}
