<?php

namespace app\models\data;

use Illuminate\Database\Eloquent\{
    Model
};

/**
 * @method static paginate(int $per_page)
 */
class UserSocial extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'users_socials';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'user_id',
        'service',
        'uid',
        'username',
        'name',
        'email',
        'photo',
        'link_uid',
        'show_on_website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        //
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user() {

        return $this->hasOne(User::class);
    }
}
