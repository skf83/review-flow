<?php

namespace app\models\data;

use Illuminate\Database\Eloquent\Model;

class AuthReminder extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'reminders';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'user_id',
        'code',
        'completed',
        'completed_at',
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
