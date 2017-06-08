<?php

namespace CornerStudio\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Payment;
use CornerStudio\Http\Entities\Activity;
use CornerStudio\Http\Entities\Subscription;
use CornerStudio\Http\Requests\SubscriptionRequest;

class SubscriptionController extends Controller
{
    /**
     * @var Activity
     */
    protected $activity;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Log
     */
    protected $log;

    /**
     * @var Payment
     */
    protected $payment;

    /**
     * @var Subscription
     */
    protected $subscription;

    /**
     * SubscriptionController constructor.
     *
     * @param Activity $activity
     * @param Client $client
     * @param Log $log
     * @param Payment $payment
     * @param Subscription $subscription
     */
    public function __construct(Activity $activity, Client $client, Log $log, Payment $payment,
        Subscription $subscription)
    {
        $this->activity     = $activity;
        $this->client       = $client;
        $this->log          = $log;
        $this->payment      = $payment;
        $this->subscription = $subscription;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = $this->subscription
            ->with(['client', 'payment', 'activities'])
            ->name(request('search'))
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return view('subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = $this->activity->pluck('name', 'id');
        $clients    = $this->client->pluck('full_name', 'id');
        $payments   = $this->payment->pluck('name', 'id');

        return view('subscriptions.create', compact('activities', 'clients', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SubscriptionRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $subscription = $this->subscription->create(request()->all());
            $subscription->activities()->attach(request('activities'));
            DB::commit();

            return response()->json(['status' => true, 'url' => '/subscriptions']);
        } catch ( Exception $e )
        {
            $this->log->error("Error Store Subscription: " . $e->getMessage());
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription = $this->subscription->with(['activities'])->findOrFail($id);

        return view('subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscription = $this->subscription->findOrFail($id);
        $activities   = $this->activity->get();
        $clients      = $this->client->pluck('full_name', 'id');
        $payments     = $this->payment->pluck('name', 'id');

        return view('subscriptions.edit', compact('activities', 'clients', 'subscription', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubscriptionRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionRequest $request, $id)
    {
        DB::beginTransaction();
        try
        {
            $subscription = $this->subscription->with(['activities'])->findOrFail($id);
            $subscription->update(request()->all());
            $subscription->activities()->sync(request('activities'));
            DB::commit();

            return response()->json(['status' => true, 'url' => '/subscriptions']);
        } catch ( Exception $e )
        {
            $this->log->error("Error Update Subscription: " . $e->getMessage());
            DB::rollBack();

            return response()->json(['status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $subscription = $this->subscription->findOrFail($id);
            $subscription->delete();

            return response()->json(['status' => true]);
        } catch ( Exception $e )
        {
            $this->log->error('Error Delete Subscription: ' . $e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
