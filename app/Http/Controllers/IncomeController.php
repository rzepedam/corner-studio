<?php

namespace CornerStudio\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use CornerStudio\Http\Entities\Activity;
use CornerStudio\Http\Entities\Subscription;

class IncomeController extends Controller
{
    /**
     * @var Activity
     */
    protected $activity;

    /**
     * @var Subscription
     */
    protected $subscription;

    /**
     * IncomeController constructor.
     *
     * @param Activity $activity
     * @param Subscription $subscription
     */
    public function __construct(Activity $activity, Subscription $subscription)
    {
        $this->activity     = $activity;
        $this->subscription = $subscription;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $months = Carbon::parse('-3 months');

        if ( request()->ajax() )
        {
            switch ( request('option') )
            {
                // This option measures the incomes per day of the month
                case 0:
                    $subscriptions = DB::table('activities')
                        ->select(DB::raw("DATE_FORMAT(subscriptions.created_at, '%d') as dates, sum(amount) AS amount"))
                        ->join('activity_subscription', 'activities.id', 'activity_subscription.activity_id')
                        ->join('subscriptions', function ($join) use ($months)
                        {
                            $join->on('activity_subscription.subscription_id', '=', 'subscriptions.id')
                                ->where('subscriptions.created_at', '>=', Carbon::now()->startOfMonth())
                                ->where('subscriptions.created_at', '<', Carbon::now());
                        })
                        ->groupBy('dates')
                        ->orderBy('dates')
                        ->pluck('amount', 'dates');

                    return response()->json([
                        'status' => true,
                        'months' => $subscriptions->keys(),
                        'amounts' => $subscriptions->values()
                    ]);

                case 1:
                    $months = Carbon::parse('-3 months');

                    break;

                case 2:
                    $months = Carbon::parse('-6 months');

                    break;

                case 3:
                    $months = Carbon::parse('-12 months');

                    break;
                default:
                    return response()->json(['status' => false]);
            }
        }

        $subscriptionsMap = DB::table('activities')
            ->select(DB::raw("DATE_FORMAT(subscriptions.created_at, '%M-%y') as dates, DATE_FORMAT(subscriptions.created_at, '%Y') as years, DATE_FORMAT(subscriptions.created_at, '%m') as months, sum(amount) AS amount"))
            ->join('activity_subscription', 'activities.id', 'activity_subscription.activity_id')
            ->join('subscriptions', function ($join) use ($months)
            {
                $join->on('activity_subscription.subscription_id', '=', 'subscriptions.id')
                    ->where('subscriptions.created_at', '>=', $months)
                    ->where('subscriptions.created_at', '<', Carbon::now()->startOfMonth());
            })
            ->groupBy('dates', 'months', 'years')
            ->orderBy('years')
            ->orderBy('months')
            ->get(['amount', 'dates']);

        $subscriptions = $subscriptionsMap->mapWithKeys(function($item) {
            return [ucfirst($item->dates) => $item->amount];
        });

        if ( request()->ajax() )
        {
            return response()->json([
                'status' => true,
                'months' => $subscriptions->keys(),
                'amounts' => $subscriptions->values()
            ]);
        }

        return view('incomes.index', compact('subscriptions'));
    }
}
