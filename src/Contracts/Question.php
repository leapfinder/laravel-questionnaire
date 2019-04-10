<?php

namespace LeapFinder\Questionnaire\Contracts;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface Question
{
    /**
     * Get all answers to this given question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(): HasMany;
}
