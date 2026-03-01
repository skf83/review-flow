<?php

namespace app\models\auth;

use app\models\data\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Permission extends Model {

	/**
	 * Making sure that our model-class is
	 * referring to the correct table !?
	 */
	protected $table = 'permissions';

	/**
	 * Specifying which columns we want to write to...
	 */
    protected $fillable = [

        'role',
        'user',
        'template',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'id',
        'created_at',
    ];

    /**
     * @return BelongsTo
     */
    public function role(): BelongsTo {

        return $this->belongsTo(Role::class, 'role');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo {

        return $this->belongsTo(User::class, 'user');
    }

    /**
     * @return HasMany
     */
    public function items(): HasMany {

        return $this->hasMany(PermissionItems::class)->orderBy('name');
    }
}
