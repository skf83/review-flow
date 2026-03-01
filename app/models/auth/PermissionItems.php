<?php

namespace app\models\auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasOne};

class PermissionItems extends Model {

	/**
	 * Making sure that our model-class is
	 * referring to the correct table !?
	 */
	protected $table = 'permissions_items';

	/**
	 * Specifying which columns we want to write to...
	 */
    protected $fillable = [

        'permission_id',
        'permission_type',
        'name',
        'view',
        'create',
        'update',
        'delete',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

//        'id',
//        'permission_id',
        'created_at',
    ];

    /**
     * @return HasOne
     */
    public function permission(): HasOne {

        return $this->hasOne(Permission::class);
    }
}
