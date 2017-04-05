<?php

namespace CornerStudio\Http\Requests;

use Illuminate\Routing\Route;
use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        switch ( $this->method() )
        {
            case 'POST':
            {
                return [
                    'client_id'   => ['required'],
                    'payment_id'  => ['required'],
                    'end_date'    => ['required'],
                    'num_voucher' => ['required'],
                    'payday'      => ['required'],
                    'activities'  => ['required']
                ];
            }

            case 'PUT':
            {
                return [
                    'client_id'   => ['required'],
                    'payment_id'  => ['required'],
                    'end_date'    => ['required'],
                    'num_voucher' => ['required', 'unique:subscriptions,num_voucher,' . $this->route->parameter('subscription')],
                    'payday'      => ['required'],
                    'activities'  => ['required']
                ];
            }
        }
    }
}
