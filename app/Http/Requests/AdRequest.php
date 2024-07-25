<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'location_description' => 'nullable|string|max:255',
            'room_size' => 'nullable|numeric',
            'furnished' => 'nullable|boolean',
            'number_of_rooms' => 'nullable|integer',
            'number_of_bathrooms' => 'nullable|integer',
            'budget' => [
                'required',
                'numeric',
                'min:0',
                'regex:/^\d{1,8}(\.\d{1,2})?$/',
            ],
               'residence_type' => 'required|string|max:255',
            'availability_date' => 'required|date',
            'notes' => 'nullable|string',
            'smoking_allowed' => 'nullable|boolean',
            'pets_allowed' => 'nullable|boolean',
            'contact_email' => 'nullable|email',
            'images.*' => 'nullable|image|mimes:jpeg,png,gif|max:2048'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 255 characters.',
            
            'contact_phone.required' => 'The contact phone field is required.',
            'contact_phone.string' => 'The contact phone must be a string.',
            'contact_phone.max' => 'The contact phone may not be greater than 20 characters.',
            
            'country_id.required' => 'The country field is required.',
            'country_id.exists' => 'The selected country is invalid.',
            
            'city_id.required' => 'The city field is required.',
            'city_id.exists' => 'The selected city is invalid.',
            
            'location_description.string' => 'The location description must be a string.',
            'location_description.max' => 'The location description may not be greater than 255 characters.',
            
            'room_size.numeric' => 'The room size must be a numeric value.',
            
            'furnished.boolean' => 'The furnished field must be true or false.',
            
            'number_of_rooms.integer' => 'The number of rooms must be an integer.',
            
            'number_of_bathrooms.integer' => 'The number of bathrooms must be an integer.',
            
            'budget.required' => 'The budget field is required.',
            'budget.numeric' => 'The budget must be a numeric value.',
            'budget.min' => 'The budget must be at least 0.',
            'budget.regex' => auth()->user()->account_type == 'seeking_room'
                ? 'The budget must be a number with a maximum of 10 digits, including up to 2 decimal places.'
                : 'The price must be a number with a maximum of 10 digits, including up to 2 decimal places.',
            
            'residence_type.required' => 'The residence type field is required.',
            'residence_type.string' => 'The residence type must be a string.',
            'residence_type.max' => 'The residence type may not be greater than 255 characters.',
            
            'availability_date.required' => 'The preferred move-in date is required.',
            'availability_date.date' => 'The preferred move-in date must be a valid date.',
            
            'notes.string' => 'The notes must be a string.',
            
            'smoking_allowed.boolean' => 'The smoking allowed field must be true or false.',
            
            'pets_allowed.boolean' => 'The pets allowed field must be true or false.',
            
            'contact_email.email' => 'The contact email must be a valid email address.',
            
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Each image must be a file of type: jpeg, png, gif.',
            'images.*.max' => 'Each image may not be greater than 2048 kilobytes.',
        ];
    }
}
