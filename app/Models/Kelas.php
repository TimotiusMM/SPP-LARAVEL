<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelass'; // Sesuaikan dengan nama tabel yang ada di database Anda

    use HasFactory;

    protected $fillable = ['namaKelas', 'jurusan'];

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function($query, $find) {
            return $query
                ->where('namaKelas', 'LIKE', $find . '%')
                ->orWhere('jurusan', 'LIKE', '%' . $find . '%');
        });
    }

    public function scopeRender($query, $search)
    {
        return $query
            ->search($search)
            ->paginate(5)
            ->appends([
                'search' => $search,
            ]);
    }
}

