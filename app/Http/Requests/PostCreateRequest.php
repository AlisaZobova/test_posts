<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'post_info' => [
                'required',
                function ($attribute, $value, $fail) {

                    $mimes = ['application/xml', 'application/json', 'text/xml'];

                    if (!in_array($value->getMimeType(), $mimes)) {
                        $fail('Invalid file mime type! Allowed extensions: json, xml.');
                        return;
                    }

                    $data = $value->get();

                    if ($value->getMimeType() !== 'application/json') {
                        $xmlString = simplexml_load_string($data);
                        $data = json_encode($xmlString);
                    }

                    $data = json_decode($data, true);

                    if (!$data) {
                        $fail('Invalid data!');
                        return;
                    }

                    if (!array_key_exists('category_id', $data) || !$data['category_id']) {
                        $fail('Post should contain category_id field!');
                    }

                    if (!array_key_exists('title', $data) || !$data['title']) {
                        $fail('Post should contain title field!');
                    }

                    if (!array_key_exists('description', $data) || !$data['description']) {
                        $fail('Post should contain description field!');
                    }

                    if (array_key_exists('category_id', $data)
                        && $data['category_id']
                        && !Category::find($data['category_id'])
                    ) {
                        $fail("Category with this id doesn't exist!");
                    }

                    if (array_key_exists('tag_id', $data)
                        && $data['tag_id']
                        && !Tag::find($data['tag_id'])
                    ) {
                        $fail("Tag with this id doesn't exist!");
                    }
                }]
        ];
    }
}
