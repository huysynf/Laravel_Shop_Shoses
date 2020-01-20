<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use ImageTrait;

    protected $table = 'slides';

    protected $fillable = [
        'image',
        'description',
        'status',
    ];

    public function scopeWithStatus($query, $status)
    {
        $query->when($status,fn($q)=>$q->where('status', $status));
    }

    public function paginate($limit)
    {
        return $this->latest('id')->paginate($limit);
    }

    public function countSlideShow()
    {
        return $this->withStatus(1)->get()->count();
    }

    public function countSlideNotShow()
    {
        return $this->withStatus(0)->get()->count();
    }
}
