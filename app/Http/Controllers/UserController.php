<?php

namespace CornerStudio\Http\Controllers;

use CornerStudio\User;
use Illuminate\Http\Request;
use CornerStudio\Mail\SignUp;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use CornerStudio\Mail\UpdateProfile;
use Illuminate\Support\Facades\Mail;
use CornerStudio\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * @var \Illuminate\Log\Writer
     */
    protected $log;
    
    /**
     * @var \CornerStudio\User
     */
    protected $user;


    /**
     * @param Log $user 
     * @param User $user 
     */
    public function __construct(Log $log, User $user)
    {
        $this->log  = $log;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $password = str_random(15);
        $request->request->add(['password' => $password]);
        DB::beginTransaction();

        try
        {
            $user = $this->user->create($request->all());
            Mail::to($user)->send(new SignUp($password, $user));   // Sending email with credentials...
            DB::commit();
            session()->flash('message', 'El registro fue almacenado satisfactoriamente.');

            return ['status' => true, 'url' => '/users'];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store User: " . $e->getMessage());
            DB::rollback();

            return ['status' => false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $user = $this->user->findOrFail($id);

            return view('users.edit', compact('user'));
        } catch ( \Exception $e )
        {
            $this->log->error("Error Update User: " . $e->getMessage());
            DB::rollback();

            return ['status' => false];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        DB::beginTransaction();
        try
        {
            $user = $this->user->findOrFail($id);
            $user->update($request->all());
            Mail::to($user)->send(new UpdateProfile($user));   // Sending email update profile...
            session()->flash('message', 'Perfil Actualizado satisfactoriamente.');
            DB::commit();

            return ['status' => true, 'url' => '/users'];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Update User: " . $e->getMessage());
            DB::rollback();

            return ['status' => false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $user = $this->user->findOrFail($id);
            $user->delete();

            return response()->json(['status' => true]);
        } catch ( \Exception $e )
        {
            $this->log->error('Error Delete User: ' . $e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
