<?php

namespace Soma\Http\Requests;

class VideoRequest extends Request
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
            'youtube_link' => 'required|url',
            'title' => 'required|max:30',
            'description' => 'required',
            'category' => 'required',
        ];
    }
}
