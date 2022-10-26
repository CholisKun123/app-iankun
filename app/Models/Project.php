<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_project',
        'tanggal',
        'Deskripsi',
        'foto',
    ];
    protected $table = 'project';
    public function siswa(){
        return $this->belongsTo('App\Models\project' , 'id');
    }
}