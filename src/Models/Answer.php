<?php

namespace LeapFinder\Questionnaire\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LeapFinder\Questionnaire\Contracts\Answer as AnswerContract;

class Answer extends Model implements AnswerContract
{
    use SoftDeletes;

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $fillable = [
      'text',
      'user_id',
      'question_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('questionnaire.models.user'));
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(config('questionnaire.models.question'));
    }
}
