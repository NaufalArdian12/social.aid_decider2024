<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{
    use HasFactory;
    protected $table = 'bobot';

    protected $fillable = [
        'kriteria_id',
        'bobot'
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
