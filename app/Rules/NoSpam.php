<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoSpam implements Rule
{
    /**
     * The list of spam keywords or patterns.
     *
     * @var array
     */
    protected $spamKeywords = [
        'http://', 'https://', 'www', 'free', 'win', 'prize', 'offer', 'promotion',
        'click here', 'buy now', 'discount', 'limited time', 'urgent', 'act now',
        'congratulations', 'winner', 'award', 'gift', 'claim your prize', 'exclusive offer',
        'special deal', 'limited offer', 'free trial', 'free gift', 'free access', 'free download',
        'free membership', 'free subscription', 'free service', 'free product', 'free software',
        'free app', 'free game', 'free course', 'free ebook', 'free tutorial', 'free guide',
        'free report', 'free webinar', 'free consultation', 'free demo', 'free sample'
    ];

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($this->spamKeywords as $keyword) {
            if (stripos($value, $keyword) !== false) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute contains prohibited content.';
    }
}
