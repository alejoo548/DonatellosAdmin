<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'category_id',
    ];
    public $sortable = [
        'name',
    ];
    protected $guarded = [
        'id',
    ];
    protected $with = [
        'category',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function options()
    {
        return $this->hasMany(ProductOption::class);
    }
}
