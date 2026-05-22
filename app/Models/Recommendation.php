<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'maladie_chronique_id',
        'question_text',
        'answer_value',
        'objective',
        'weight_loss_range',
        'pathology',
        'content',
    ];

    public function maladieChronique()
    {
        return $this->belongsTo(MaladieChronique::class);
    }
}
