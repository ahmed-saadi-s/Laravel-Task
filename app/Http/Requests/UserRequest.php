<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
           'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
            'nationality' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'account_type' => 'required|string|in:seeking_room,seeking_roommate',
            'date_of_birth' => 'required|date',
            'country_id' => 'required|integer',
            'city_id' => 'required|integer',
            'marital_status' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required.',
            'first_name.string' => 'First Name must be a string.',
            'first_name.max' => 'First Name may not be greater than 255 characters.',
            
            'last_name.required' => 'Last Name is required.',
            'last_name.string' => 'Last Name must be a string.',
            'last_name.max' => 'Last Name may not be greater than 255 characters.',
            
            'email.required' => 'Email is required.',
            'email.string' => 'Email must be a string.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email may not be greater than 255 characters.',
            'email.unique' => 'Email has already been taken.',
            
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            
            'phone_number.required' => 'Phone Number is required.',
            'phone_number.string' => 'Phone Number must be a string.',
            'phone_number.max' => 'Phone Number may not be greater than 15 characters.',
            
            'nationality.required' => 'Nationality is required.',
            'nationality.string' => 'Nationality must be a string.',
            'nationality.max' => 'Nationality may not be greater than 255 characters.',
            
            'job.required' => 'Job is required.',
            'job.string' => 'Job must be a string.',
            'job.max' => 'Job may not be greater than 255 characters.',
            
            'account_type.required' => 'Account Type is required.',
            'account_type.integer' => 'Account Type must be an integer.',
            
            'date_of_birth.required' => 'Date of Birth is required.',
            'date_of_birth.date' => 'Date of Birth must be a valid date.',
            
            'country_id.required' => 'Country is required.',
            'country_id.integer' => 'Country must be an integer.',
            
            'city_id.required' => 'City is required.',
            'city_id.integer' => 'City must be an integer.',
            
            'marital_status.required' => 'Marital Status is required.',
            'marital_status.string' => 'Marital Status must be a string.',
            'marital_status.max' => 'Marital Status may not be greater than 255 characters.',
            
            'gender.required' => 'Gender is required.',
            'gender.string' => 'Gender must be a string.',
            'gender.max' => 'Gender may not be greater than 10 characters.',
        ];
    }
}
