<?php

namespace CornerStudio\Http\Requests;

use Illuminate\Routing\Route;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * @var \Illuminate\Routing\Route $route
     */
    protected $route;

    /**
     * @param Route $route 
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
        switch ( $this->method() )
        {
            case 'POST':
            {
                return [
                    'first_name'   => ['required'],
                    'male_surname' => ['required'],
                    'email'        => ['required', 'email', 'unique:users,email']
                ];
            }
            case 'PUT':
            {
                return [
                    'first_name'            => ['required'],
                    'male_surname'          => ['required'],
                    'password'              => ['required', 'confirmed'],
                    'password_confirmation' => ['required'],
                    'email'                 => ['required', 'email', 'unique:users,email,' . $this->route()->parameter('user')]
                ];
            }
        }
    }
}
