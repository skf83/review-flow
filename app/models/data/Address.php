<?php

namespace app\models\data;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'addresses';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'address1',
        'address2',
        'zip',
        'city',
        'country_code',
        'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'updated_at'
    ];
}
