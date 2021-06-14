<?php

namespace App\Rules;

use App\Models\Gerecht;
use Illuminate\Contracts\Validation\Rule;

class UniqueMenu implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($extra, $id)
    {
        $this->id = $id;
        $this->extra = $extra;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value == null) return true;
    
        $foundExamples = Gerecht::all()->where('menunummer', $value);
        if($this->id) $foundExamples = $foundExamples->where('id', '!=', $this->id); 
        if($this->extra) $foundExamples = $foundExamples->where('menu_toevoeging', $this->extra);

        return 1 > $foundExamples->count();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the menunumber and character combination must be unique';
    }
}
