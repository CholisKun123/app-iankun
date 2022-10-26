<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'jk',
        'email',
        'foto',
        'about',
    ];
    protected $table = 'siswa';
    public function kontak(){
        return $this->BelongsToMany('App\Models\JenisKontak')->withPivot('deskripsi');
    }
    public function project(){
        return $this->hasMany('App\Models\Project' , 'siswa_id');
    }

}
