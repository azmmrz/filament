<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model

{
    use HasFactory;

    protected $fillable = [
        'nim',//+
        'nama',//+
        'jurusan',//+
        'kelas',//+
        'angkatan',//+
    ];
    public function user(): BelongsTo//-
    {//-
        return $this->belongsTo(User::class);//-
    }//-
//+
    // Add any additional relationships or methods here//+
}
