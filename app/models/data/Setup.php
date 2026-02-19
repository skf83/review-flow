<?php

namespace app\models\data;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'setup';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'app_color',
        'app_sidebar_type',
        'app_navbar_fixed',
        'auth_sign_in_variant',
        'auth_sign_up_variant',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        // ...
    ];
}
