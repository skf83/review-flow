<?php

namespace app\models\monitor;

use Illuminate\Database\Eloquent\Model;

class Status extends Model {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'monitor_statuses';

    /**
     * Specifying which columns, we want to write to...
     */
    protected $fillable = [

        'endpoint_id',
        'status_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'id',
        'endpoint_id',
        'updated_at'
    ];

    /**
     * @return bool
     */
    public function isUp() {

        return substr((string) $this->status_code, 0, 1) === '2';
    }

    /**
     * @return bool
     */
    public function isDown() {

        return !$this->isUp();
    }
}
