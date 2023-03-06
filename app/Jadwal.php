<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Ruang;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','ruang_id','title','start','finish','keterangan'];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ruang() : BelongsTo
    {
        return $this->belongsTo(Ruang::class);
    }
}
