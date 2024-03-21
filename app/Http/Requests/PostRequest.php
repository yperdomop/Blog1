<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //en el proximo capitulo vamos a ver como evitar que un usuario cree un post y se lo asigne a otro usuario diferente
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $post = $this->route()->parameter('post'); //esto para q al momento de editar un post si ya existe no me muestre error debo concatenar el $post en la regla de validación y tiene un valor null

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2',
            'file' => 'image',
        ];

        if ($post) {
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }


        if ($this->status == 2) {
            //array_merge fusiona los dos rules
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }
        return $rules;
    }
}
