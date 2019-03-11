<?php
namespace App\Http\Requests\Admin;

use App\Safezone;
use Illuminate\Foundation\Http\FormRequest;

class StoreSafezonesRequest extends FormRequest
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
        return Safezone::storeValidation($this);
    }
}
