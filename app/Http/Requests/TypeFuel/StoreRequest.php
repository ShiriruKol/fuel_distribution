<?php

namespace App\Http\Requests\TypeFuel;
use App\Models\Fuel;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'fuel_id' => 'required|numeric|between:0,1000',
            'user_id' => 'required|numeric|between:0,1000',
            'number_fuel' => 'required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $fuel = Fuel::find($validator->safe()->fuel_id);
            $number_fuel = $validator->safe()->number_fuel;

            if($fuel->calculationRemaining_fuel() - $number_fuel < 0) {
                $validator->errors()->add('number_fuel', 'Кол-во введенного топлива превышает оставшееся');
            }
        });
    }

}
