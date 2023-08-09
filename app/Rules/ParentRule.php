<?php

namespace App\Rules;

use App\Constants\Common;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ParentRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $condition = [
            'id'         => (int)$value,
            'active'     => Common::ACTIVE,
            'parent_id'  => 0
        ];
        $parent = DB::table('products')->where($condition)->get()->toArray();

        if (empty($parent)) {
            return false;
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
        return 'The validation error message.';
    }
}
