<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Envelope extends Model {

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
    protected $fillable = ['name', 'amount'];

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

}
