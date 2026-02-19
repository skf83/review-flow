<?php

namespace app\models\data;

use Illuminate\Database\Eloquent\{Model};

class Role extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'roles';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'slug',
        'name',
        'permissions'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        //
    ];
}
