<?php

namespace CornerStudio\Http\Controllers;

use Illuminate\Support\Facades\DB;
use CornerStudio\Http\Entities\Client;
use CornerStudio\Http\Entities\Payment;
use CornerStudio\Http\Entities\Subscription;

class SubscriptionController extends Controller
{
    /**
     * @var Client
     */
    protected $client;

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
     * @param Client $client
     * @param Payment $payment
     * @param Subscription $subscription
     */
    public function __construct(Client $client, Payment $payment, Subscription $subscription)
    {
        $this->client       = $client;
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
        $subscriptions = $this->subscription->all();

        return view('subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients  = $this->client->pluck('full_name', 'id');
        $payments = $this->payment->pluck('name', 'id');

        return view('subscriptions.create', compact('clients', 'payments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->request->add(['start_date' => '']);
        DB::beginTransaction();
        try
        {
            $this->subscription->create(request()->all());
            DB::commit();

            return response()->json(['status' => true, 'url' => '/subscriptions' ]);
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription = $this->subscription->findOrFail($id);

        return view('subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
