<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Integer;

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


    public function countSlideShow()
    {
        return $this->withStatus(1)->get()->count();
    }

    public function countSlideNotShow()
    {
        return $this->withStatus(2)->get()->count();

    }

    public function search($status)
    {
        return $this->withStatus($status)->latest('id')->paginate(10);
    }

    public function getAllActive()
    {
        return $this->withStatus(1)->get();
    }
}
