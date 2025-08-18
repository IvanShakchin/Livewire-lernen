<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Добавьте эту строку
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory; // Добавьте эту строку
    
    protected $fillable = ['name', 'type'];

    public function hardwares(): HasMany
    {
        return $this->hasMany(Hardware::class);
    }
}