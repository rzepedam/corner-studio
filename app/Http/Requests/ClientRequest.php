<?php

namespace CornerStudio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ClientRequest extends FormRequest
{
    /**
     * @var Route
     */
    protected $route;

    /**
     * ClientRequest constructor.
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
     * @param Request $request
     *
     * @return array
     */
    public function rules(Request $request)
    {

        switch ( $this->method() )
        {
            case 'POST':
            {
                return [
                    'male_surname'      => ['required'],
                    'female_surname'    => ['required'],
                    'first_name'        => ['required'],
                    'rut'               => ['required', 'unique:clients,rut'],
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
                    'rut'               => ['required', 'unique:clients,rut,' . $this->route->parameter('client')],
                    'birthday'          => ['required'],
                    'marital_status_id' => ['required'],
                    'country_id'        => ['required'],
                    'is_male'           => ['required'],
                    'address'           => ['required'],
                    'commune_id'        => ['required'],
                    'email'             => ['required', 'unique:clients,email,' . $this->route->parameter('client')],
                    'phone1'            => ['required']
                ];
            }
        }
    }
}
