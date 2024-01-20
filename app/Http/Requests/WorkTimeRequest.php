<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class WorkTimeRequest
 */
class WorkTimeRequest extends FormRequest
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
            'work_time_from' => 'required|date_format:H:i',
            'work_time_to' => 'required|date_format:H:i|after:work_time_from',
            'type' => 'required|in:Job,Personal,Freelance',
            'schedule_id' => 'required|exists:schedules,id',
        ];
    }
}
