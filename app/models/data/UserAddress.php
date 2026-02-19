<?php

namespace app\models\data;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'users_addresses';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'user_id',
        'address_id',
        'address_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

//        'user_id',
//        'address_id',
    ];
}
