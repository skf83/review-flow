<?php

namespace app\models\auth;

use Element\Sentinel\Contracts\PersistenceRepositoryInterface;

use Illuminate\Database\Eloquent\Model;

class Persistency extends Model implements PersistenceRepositoryInterface {

    /**
     * Making sure, that our model-class is
     * referring to the correct table !?
     */
    protected $table = 'persistences';

    /**
     * Specifying which columns, we want to write to...
     *
     * @var array
     */
    protected $fillable = [

        'user_id',
        'code'
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

    /**
     * @param $userId
     * @return void
     */
    public function remember($userId): void
    {
        // TODO: Implement remember() method.
    }

    /**
     * @return int|string|null
     */
    public function userIdFromRememberCookie()
    {
        // TODO: Implement userIdFromRememberCookie() method.
    }

    /**
     * @param $userId
     * @return void
     */
    public function forgetUser($userId): void
    {
        // TODO: Implement forgetUser() method.
    }

    /**
     * @return void
     */
    public function forgetCurrent(): void
    {
        // TODO: Implement forgetCurrent() method.
    }

    /**
     * @return void
     */
    public function forgetCookie(): void
    {
        // TODO: Implement forgetCookie() method.
    }
}
