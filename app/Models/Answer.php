<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questionPaper()
    {
        return $this->belongsTo(QuestionPaper::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
