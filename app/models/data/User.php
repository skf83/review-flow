<?php

namespace app\models\data;

use app\handlers\auth\jwt\contracts\JwtSubject;

use Illuminate\Database\Eloquent\{Model};

/**
 * @method static paginate(int $per_page)
 */
class User extends Model implements JwtSubject {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'users';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'email',
        'password',
        'img_cover',
        'img_avatar',
        'first_name',
        'middle_names',
        'last_name',
        'last_login',
        'activation_token'
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
     * update -> Password
     *
     * @param $password
     */
    public function updatePassword($password) : void {

        $this->update([

            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    /**
     * @return int
     */
    public function getJwtIdentifier() : int {

        return $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function addresses() {

        return $this->belongsToMany(Address::class, 'users_addresses')->withPivot('user_id', 'address_id', 'address_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function telephone() {

        return $this->hasOne(UserTelephone::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sso() {

        return $this->hasMany(UserSocial::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function roles() {

        return $this->belongsToMany(Role::class, 'role_users');
    }
}
