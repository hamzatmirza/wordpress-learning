<?php

namespace Learning\Rules;

use Closure;
use Learning\Models\Post;
use Learning\Models\TermTaxonomy;
use WPWhales\Contracts\Validation\Rule;

class Taxonomy implements Rule
{

    private $taxonomy = "";

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($taxonomy)
    {
        $this->taxonomy = $taxonomy;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $count = TermTaxonomy::where([
            "taxonomy"=>$this->taxonomy,
            "term_id"=>$value
        ])->count();
        if ($count >0) {

            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Category';
    }
}
