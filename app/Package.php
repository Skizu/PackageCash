<?php

namespace App;

use App\Domain\Audit\Auditable;
use App\Contracts\Auditable as AuditableContract;
use App\Money\MoneyTrait;
use Cache;
use Illuminate\Database\Eloquent\Model;

class Package extends Model implements AuditableContract
{
    use MoneyTrait, Auditable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'packages';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['envelopes'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['amount'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function envelopes()
    {
        return $this->hasMany(Envelope::class);
    }

    public function getAmountAttribute()
    {
        return $this->envelopes->sum('amount');
    }
}