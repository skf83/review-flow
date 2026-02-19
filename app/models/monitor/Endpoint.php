<?php

namespace app\models\monitor;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'monitor_endpoints';

    /**
     * Specifying which columns, we want to write to...
     */
    protected $fillable = [

        'uri',
        'frequency'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses() {

        return $this->hasMany(Status::class)->orderBy('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status() {

        return $this->hasOne(Status::class)->orderBy('created_at', 'desc');
    }

    /**
     * @return bool
     */
    public function isBackUp() {

        return $this->status->isUp() && ($this->statuses->get(1) && $this->statuses->get(1)->isDown());
    }
}
