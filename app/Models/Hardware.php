<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Добавьте эту строку
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hardware extends Model
{
    use HasFactory; // Добавьте эту строку

    protected $table = 'hardwares'; // Явно указываем имя таблицы
    
    protected $fillable = [
        'title',
        'sku',
        'description',
        'price',
        'unit',
        'category_id',
        'image'
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}