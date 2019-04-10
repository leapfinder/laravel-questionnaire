<?php

namespace LeapFinder\Questionnaire;

use Illuminate\Support\ServiceProvider;
use LeapFinder\Questionnaire\Contracts\Answer as AnswerContract;
use LeapFinder\Questionnaire\Contracts\Question as QuestionContract;

class QuestionnaireServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (isNotLumen()) {
            $this->publishes([
                __DIR__.'/../config/questionnaire.php' => config_path('questionnaire.php'),
            ], 'config');

            if (! class_exists('CreateQuestionnaireTables')) {
                $timestamp = date('Y_m_d_His', time());

                $this->publishes([
                    __DIR__.'/../database/migrations/create_questionnaire_tables.php.stub' => $this->app->databasePath()."/migrations/{$timestamp}_create_questionnaire_tables.php",
                ], 'migrations');
            }
        }

        $this->registerModelBindings();
    }

    public function register()
    {
        if (isNotLumen()) {
            $this->mergeConfigFrom(
                __DIR__.'/../config/questionnaire.php',
                'questionnaire'
            );
        }
    }

    protected function registerModelBindings()
    {
        $config = $this->app->config['questionnaire.models'];

        $this->app->bind(QuestionContract::class, $config['question']);
        $this->app->bind(AnswerContract::class, $config['answer']);
    }
}
