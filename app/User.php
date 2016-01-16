<?php

namespace App;

use App\Domain\Audit\Auditable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Contracts\Auditable as AuditableContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, AuditableContract
{
    use Authenticatable, CanResetPassword, Auditable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }

    public function envelopes()
    {
        return $this->hasMany(Envelope::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transfers()
    {
        return $this->hasMany(Transfer::class);
    }
}
