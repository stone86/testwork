<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'severity','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        $this->hasMany(History::class);
    }
}
