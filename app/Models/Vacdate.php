<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vacdate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = ['vacday', 'start','end','maxpersons','vaccine','vacplace_id','user_id'];

    /**
     * places has many dates, dates belong to one place
     */
    public function vacplace():BelongsTo{
        return $this->belongsTo(Vacplace::class);
    }

    public function users():BelongsToMany{
        return $this->belongsToMany(User::class)->withTimestamps(); //->withPivot('vacday', 'start','end');
    }
}
