<?php namespace App;

use App\Contracts\Auditable as AuditableContract;
use App\Domain\Audit\Auditable;
use App\Money\MoneyTrait;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model implements AuditableContract {

    use MoneyTrait, Auditable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transfers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'amount'];

    public function source()
    {
        return $this->morphTo();
    }

    public function destination()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}