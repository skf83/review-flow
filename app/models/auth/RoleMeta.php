<?php

namespace app\models\auth;

use app\models\data\Locale;

use Illuminate\Database\Eloquent\{
    Model
};

use Illuminate\Database\Eloquent\Relations\{
    BelongsTo
};

class RoleMeta extends Model {

    /**
     * Making sure that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'roles_meta';

    /**
     * Specifying which columns we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'role_id',
        'name',
        'locale'
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
     * @return BelongsTo
     */
    public function locale(): BelongsTo {

        return $this->belongsTo(Locale::class, 'locale');
    }
}
