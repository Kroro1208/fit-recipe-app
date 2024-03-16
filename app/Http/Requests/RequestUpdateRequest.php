<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        return [
            // formのname属性と合わせる
            'title' => 'required|string|max:500',
            'description' => 'required|string|max:500',
            'category_id' => 'required',
            'image' => 'file|file|image|mimes:jpeg,jpg,png|max:2048',
            'ingredients.*.name' => 'required|string|max:50',
            'ingredients.*.quantity' => 'required|string|max:50',
            'steps.*' => 'required|string|max:50',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'レシピ名',
            'description' => 'レシピ名の概要',
            'category_id' => 'カテゴリー',
            'image' => 'レシピ画像',
            'ingredients.*.name' => '材料名',
            'ingredients.*.quantity' => '分量',
            'steps.*' => '手順'
        ];
    }
}
