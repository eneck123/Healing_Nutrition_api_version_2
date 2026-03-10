<?php

// app/Models/Question.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Relation avec Utilisateur.
     * Une question est répondue par un utilisateur.
     */
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    /**
     * Relation avec Reponse.
     * Une question est répondue par une réponse.
     */
    public function reponse()
    {
        return $this->hasOne(Reponse::class);
    }

    public function possibleAnswers()
    {
        return $this->hasMany(QuestionPossibleAnswer::class);
    }

    /**
     * Relation vers la question parente (si question conditionnelle).
     */
    public function parent()
    {
        return $this->belongsTo(Question::class, 'parent_question_id');
    }

    /**
     * Relation vers les questions enfants (questions conditionnelles déclenchées par cette question).
     */
    public function children()
    {
        return $this->hasMany(Question::class, 'parent_question_id');
    }
}

