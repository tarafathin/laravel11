<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = ['nama_departemen'];

    // Relasi: satu department punya banyak pegawai
    public function employees()
    {
        return $this->hasMany(Employee::class, 'departemen_id');
    }
}
