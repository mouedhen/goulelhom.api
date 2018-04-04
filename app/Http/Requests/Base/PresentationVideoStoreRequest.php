<?php
/**
 * Created by IntelliJ IDEA.
 * User: mouedhen
 * Date: 04/04/18
 * Time: 02:03
 */

namespace App\Http\Requests\Base;


use Illuminate\Foundation\Http\FormRequest;

class PresentationVideoStoreRequest extends FormRequest
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
            'name' => 'required|min:4|max:255',
            'url' => 'required|min:4|max:255|url',
            'is_selected' => 'required|boolean',
        ];
    }
}