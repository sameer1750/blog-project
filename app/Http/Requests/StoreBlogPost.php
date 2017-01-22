<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
        $rules =  [
            'title'=>'required',
            'image'=>'required|image',
            'description'=>'required|min:100',
            'slug'=>'required|unique:blogs,slug',
            'published'=>'required'
        ];

        if($this->method() == 'PUT'){
            $rules['new_image'] = 'image';
            $rules['image'] = 'required';
            $rules['slug'] = 'required:blogs,slug,'.$this->id;
        }

        return $rules;
    }

    protected function getValidatorInstance()
    {
        $data = $this->all();
        $data['slug'] = preg_replace('/\s+/', '-',$data['slug']);
        $this->getInputSource()->replace($data);

        return parent::getValidatorInstance();
    }


}
