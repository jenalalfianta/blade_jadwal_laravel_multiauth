<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Ruang extends Model
{
    use HasFactory;

    use Sortable;

    protected $fillable = ['kode_ruang','nama_ruang','lantai_ruang'];

    public $sortable = ['kode_ruang','nama_ruang','lantai_ruang'];
}
