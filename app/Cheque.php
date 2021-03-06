<?php

namespace App;

use App\Contracts\Auditable as AuditableContract;
use App\Domain\Audit\Auditable;
use App\Money\MoneyTrait;
use Illuminate\Database\Eloquent\Builder;

class Cheque extends OwnedModel implements AuditableContract
{

    use MoneyTrait, Auditable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cheques';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'amount'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function transfers()
    {
        return $this->morphMany(Transfer::class, 'source');
    }

    public function scopeUnsorted(Builder $query) {
        return $query->where('amount', '>', 0)->get();
    }
}
