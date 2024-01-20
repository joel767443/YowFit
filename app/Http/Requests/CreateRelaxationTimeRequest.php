<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CreateRelaxationTimeRequest
 */
class CreateRelaxationTimeRequest  extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'time' => 'required|date_format:H:i:s',
            'description' => 'required|string',
            'schedule_id' => 'required|exists:schedules,id',
        ];
    }
}
