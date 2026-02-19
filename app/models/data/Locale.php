<?php

namespace app\models\data;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'locales';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'name',
        'code',
        'iso',
        'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //'id',
        'created_at',
        'updated_at'
    ];
}
