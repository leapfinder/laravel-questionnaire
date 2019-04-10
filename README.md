# Add questionnaires to your Laravel application

* [Installation](#installation)
* [Usage](#usage)

This package allows you to add questionnaires for all users in your Laravel application

## Installation

This package can be used in Laravel 5.8 or higher.

``` bash
composer require leapfinder/laravel-questionnaire
php artisan vendor:publish --provider='LeapFinder\Questionnaire\QuestionnaireServiceProvider'
```

## Usage

The models supplied by this package can be used the same as any other model in a laravel application.

Samples:

```php
// Get all questions that the currently authenticated user has not answered
Question::answered(false)->get();

// Get answers for a specific user
Answer::where('user_id', $id)->get();
```

## Credits

- [Milo Cesar](https://github.com/milo526) - laravel-questionnaire is a package based off [laravel-survey](https://github.com/milo526/laravel-survey)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
