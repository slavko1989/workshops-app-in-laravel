<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Art;

class ArtRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'address'=>'required',
            'number'=>'required',
            'mat_number'=>'required',
            'city'=>'required',
            'images'=>'required|mimes:jpeg,jpg,png,gif',
            'title'=>'required',
            'text'=>'required',
            'begin_at'=>'required',
            'seats'=>'required',
            'country'=>'required'
        ];
    }
}
