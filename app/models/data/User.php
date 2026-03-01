<?php

namespace app\models\data;

use app\handlers\auth\jwt\contracts\JwtSubject;

use app\models\auth\Permission;
use app\models\auth\Role;

use Element\Sentinel\Contracts\UserInterface;

use Illuminate\Database\Eloquent\{
    Model
};

use Illuminate\Database\Eloquent\Relations\{
    belongsToMany,
    HasMany,
    HasOne
};

/**
 * @method static paginate(int $per_page)
 */
class User extends Model implements JwtSubject, UserInterface {

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
        'activation_token',
        'is_activated'
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
     * Specifying which relations we want our model to include...
     *
     * @var string[]
     */
    protected $with = [

        'permissions.items',
        'roles.permissions.items',
        'sso'
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
     * @return BelongsToMany
     */
    public function addresses(): belongsToMany {

        return $this->belongsToMany(Address::class, 'users_addresses')->withPivot('user_id', 'address_id', 'address_type');
    }

    /**
     * @return HasOne
     */
    public function telephone(): HasOne {

        return $this->hasOne(UserTelephone::class);
    }

    /**
     * @return HasMany
     */
    public function sso(): HasMany {

        return $this->hasMany(UserSocial::class);
    }

    /**
     * @return HasOne
     */
    public function permissions(): HasOne {

        return $this->hasOne(Permission::class, 'user');
    }

    /**
     * @return belongsToMany
     */
    public function roles(): belongsToMany {

        return $this->belongsToMany(Role::class, 'users_roles')->withPivot('user_id', 'role_id');
    }

    public function getId() {

        // TODO: Implement getId() method.
    }

    public function isActivated() {

        // TODO: Implement isActivated() method.
    }

    public function markActivated() {

        // TODO: Implement markActivated() method.
    }
}
