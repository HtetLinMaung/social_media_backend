<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class PostRequest extends FormRequest
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
            'description' => 'required'
        ];
    }
    
    /**
     * get the validation messages that apply to the request attributes
     * @return array
     */
    public function messages()
    {
        return [
           
            'description.required'  => 'Post description is required',
        ];
    }
}