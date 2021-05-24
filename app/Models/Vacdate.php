<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacdate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = ['vacday','start','end','maxpersons','vaccine','vacplace','user_id'];

    public function isVacdateFree() : bool{
        return $this->maxpersons >= 35;
    }

    /**
     * places has many dates, dates belong to one place
     */
    public function vacplace():BelongsTo{
        return $this->belongsTo(Vacplace::class);
    }
}
