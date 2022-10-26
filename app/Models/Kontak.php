<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'jenis_kontak_id',
        'deskripsi',
    ];
    protected $table = 'kontak';
    public function siswa(){
        return $this->BelongsTo('App\Models\Siswa' , 'siswa_id');
    }
    public function JenisKontak(){
        return $this->BelongsTo('App\Models\JenisKontak' , 'Jenis_Kontak_id');
    }

}