<?php

namespace CornerStudio\Http\Controllers;

use CornerStudio\User;
use CornerStudio\Mail\SignUp;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use CornerStudio\Mail\UpdateProfile;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use CornerStudio\Http\Requests\UserRequest;
use CornerStudio\Http\Requests\AvatarProfileRequest;

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
     * @param Log $log
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
        $users = $this->user->name(request('search'))->paginate();

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
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $password = str_random(15);
        $request->request->add(['password' => $password]);
        $request->request->add(['full_name' => '']);
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
     * @param AvatarProfileRequest $request
     *
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function submitImage(AvatarProfileRequest $request)
    {
        DB::beginTransaction();
        try
        {
            $name = $this->moveAvatar();
            $user = $this->user->findOrFail(auth()->id());
            if ( ! is_null($user->avatar) )
            {
                Storage::delete($user->getOriginal('avatar'));
            }
            $user->avatar = $name;
            $user->save();
            DB::commit();

            return redirect()->back();
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store Avatar: " . $e->getMessage());
            session()->flash('error', 'Ha ocurrido un error. Contacte personal encargado.');
            DB::rollback();

            return redirect()->back();
        }

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
     * @param UserRequest $request
     * @param  int $id
     *
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
     * @param  int $id
     *
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

    /**
     * @return string
     */
    protected function moveAvatar()
    {
        $name  = time() . '.jpg';
        $image = Image::make(request()->file('file')->getRealPath())
            ->orientate()
            ->crop(ceil(request('w')), ceil(request('h')), ceil(request('x')), ceil(request('y')))
            ->encode('jpg', 100);

        Storage::put($name, $image);

        return $name;
    }
}
