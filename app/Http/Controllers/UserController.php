<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use App\User;
use App\LocalGovernment;
use App\Role;

class UserController extends Controller
{
    private $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $lgs = LocalGovernment::all();
        $users = $this->user->getAll();

        return view('pages.users.index', compact('users', 'lgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        );

        //save roles
        foreach ($request->input("role") as $role){
            $add_hobby = new Role;
            $add_hobby->name= $role;
            $add_hobby->save();
        }

        $user = new User();
        $user->name = request('fname');
        $user->email = request('email');
        $user->password = request('password');
        $user->user_type = request('user_type');
        $user->lg_id = request('lg');

        $user->save();


        return redirect('home');
    }

    public function show($id)
    {
        $lgs = LocalGovernment::all();
        $users = $this->user->getById($id);
        $roles = Role::all();
        return view('pages.users.update', compact('users', 'lgs', 'roles'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function register(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'user_type'=>'required',
            'lg'=>'required'
        );


        $user = new User();
        $user->name = request('fname');
        $user->email = request('email');
        $user->password = request('password');
        $user->user_type = request('user_type');
        $user->lg_id = request('lg');

        $user->save();


        return redirect('users/register');


    }
}
