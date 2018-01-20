<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ['name', 'surname' => 'required|min:5|max:45',
            'email' => 'required',
        ];
    }
}