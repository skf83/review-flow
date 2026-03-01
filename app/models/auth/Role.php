<?php

namespace app\models\auth;

use Illuminate\Database\Eloquent\{
    Model
};

use Illuminate\Database\Eloquent\Relations\{
    HasMany,
    HasOne
};

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

    /**
     * @return HasMany
     */
    public function meta(): HasMany {

        return $this->hasMany(RoleMeta::class);
    }

    /**
     * @return HasOne
     */
    public function permissions(): HasOne {

        return $this->hasOne(Permission::class, 'role');
    }
}
