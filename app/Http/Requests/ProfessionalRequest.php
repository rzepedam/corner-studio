<?php

namespace CornerStudio\Http\Requests;

use Illuminate\Routing\Route;
use Illuminate\Foundation\Http\FormRequest;

class ProfessionalRequest extends FormRequest
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * ProfessionalRequest constructor.
     *
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
                    'male_surname'      => ['required'],
                    'female_surname'    => ['required'],
                    'first_name'        => ['required'],
                    'rut'               => ['required', 'unique:professionals,rut'],
                    'birthday'          => ['required'],
                    'marital_status_id' => ['required'],
                    'country_id'        => ['required'],
                    'is_male'           => ['required'],
                    'address'           => ['required'],
                    'commune_id'        => ['required'],
                    'email'             => ['required'],
                    'phone1'            => ['required']
                ];
            }

            case 'PUT':
            {
                return [
                    'male_surname'      => ['required'],
                    'female_surname'    => ['required'],
                    'first_name'        => ['required'],
                    'rut'               => ['required', 'unique:professionals,rut,' . $this->route->parameter('professional')],
                    'birthday'          => ['required'],
                    'marital_status_id' => ['required'],
                    'country_id'        => ['required'],
                    'is_male'           => ['required'],
                    'address'           => ['required'],
                    'commune_id'        => ['required'],
                    'email'             => ['required', 'unique:professionals,email,' . $this->route->parameter('professional')],
                    'phone1'            => ['required']
                ];
            }
        }
    }
}
