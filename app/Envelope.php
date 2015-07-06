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
        // TODO: Get all things
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
