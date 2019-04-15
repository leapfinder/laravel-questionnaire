<?php

namespace LeapFinder\Questionnaire\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LeapFinder\Questionnaire\Contracts\Answer as AnswerContract;
use LeapFinder\Questionnaire\Contracts\Question as QuestionContract;

class Question extends Model implements QuestionContract
{
    use SoftDeletes;

    public $guarded = ['id'];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $fillable = [
      'text',
      'input_type',// text,radio,checkbox
      'options'
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(config('questionnaire.models.answer'));
    }
}
