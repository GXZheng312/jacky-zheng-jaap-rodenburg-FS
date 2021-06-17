<?php

namespace App\Http\Requests;

use App\Rules\UniqueMenu;
use Illuminate\Foundation\Http\FormRequest;

class GerechtRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'menunummer' => ['numeric', 'nullable', new UniqueMenu($this->menu_toevoeging, $this->id)],
      'prijs' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
      'menu_toevoeging' => ['alpha', 'nullable'],
      'naam' => ['required'],
      'soortgerecht_id' => ['exists:soort_gerecht,id'],
      'pittigheid_id' => ['exists:pittigheids,id'],
      'Allergenes.*' => ['exists:allergenes,id'],
    ];
  }
}
