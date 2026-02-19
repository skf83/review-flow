<?php

namespace app\models\data;

use Illuminate\Database\Eloquent\Model;

class UserTelephone extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'users_telephone';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'user_id',
        'tel_home',
        'tel_mobile',
        'tel_mobile_full',
        'accepts_sms'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'id',
        'user_id',
        'created_at'
    ];

}