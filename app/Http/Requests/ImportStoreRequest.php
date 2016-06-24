<?php

namespace App\Http\Requests;

class ImportStoreRequest extends Request
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
        // TODO
        $mimes = ['csv',
            'xlsx',
            'xls'
        ];

        return [
            'file' => 'max:20000|mimes:csv,xls,xlsx|required'
        ];
    }
}
