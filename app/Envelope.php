<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Envelope extends Model
{

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
        return $this->belongsTo('App\User');
    }

    public function transactions()
    {
        return Transaction::where('source_id', $this->id)
            ->orWhere('destination_id', $this->id)->get();
    }

    public function payments()
    {
        return $this->morphMany('App\Payment', 'source');
    }

    public function source()
    {
        return $this->morphMany('App\Transaction', 'source');
    }

    public function destination()
    {
        return $this->morphMany('App\Transaction', 'destination');
    }

    public function getAmountAttribute($value)
    {
        setlocale(LC_MONETARY, $this->user->locale);
        $money = money_format('%.2n', $value / 100);
        setlocale(LC_MONETARY, env('LOCALE'));
        return $money;
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
