<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'comment' => ['required', 'string', 'max:255'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'comment.required' => 'コメントを入力してください。',
            'comment.string' => '正しくコメントを入力してください。',
            'comment.max' => 'コメントは255文字以内で入力してください。',
        ];
    }
}
