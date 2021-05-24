<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacplace extends Model
{
    use HasFactory;

    protected $fillable = ['fedstate','zip','city','adress'];

    public function vacplace():HasMany{
        return $this->hasMany(Vacdate::class);
    }
}
