<?php namespace App;

use App\Domain\Audit\Auditable;
use App\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Money\MoneyTrait;

class Envelope extends Model implements AuditableContract
{
    use MoneyTrait, Auditable;

    const BLUE = 0;
    const GREEN = 1;
    const YELLOW = 2;
    const ORANGE = 3;
    const PINK = 4;
    const PURPLE = 5;

    public static $colours = [
        self::BLUE => 'blue',
        self::GREEN => 'green',
        self::YELLOW => 'yellow',
        self::ORANGE => 'orange',
        self::PINK => 'pink',
        self::PURPLE => 'purple',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'envelopes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'amount', 'colour'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function transfers()
    {
        return Transfer::where('source_id', $this->id)
            ->orWhere('destination_id', $this->id)->get();
    }

    public function source()
    {
        return $this->morphMany(Transfer::class, 'source');
    }

    public function destination()
    {
        return $this->morphMany(Transfer::class, 'destination');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function scopeUnsorted(Builder $query) {
        return $query->whereDoesntHave('package')->get();
    }

    public function getColourAttribute($value)
    {
        return array_get(self::$colours, $value);
    }

    public function setColourAttribute($value)
    {
        return $this->attributes['colour'] = array_search($value, self::$colours);
    }

    public function colourOptions()
    {
        $colours = self::$colours;
        $colour = $this->colour;
        if (($key = array_search($colour, $colours)) !== false) {
            unset($colours[$key]);
        }
        return $colours;
    }

}
