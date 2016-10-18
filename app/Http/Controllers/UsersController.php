<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use \App\User;
use App\Http\Controllers\Controller;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data['users'] = User::search($request->search)->paginate(10);
        } else {
            $data['users'] = User::paginate(10);
        }
        return view('users.index')->with($data);
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
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $data['posts'] = $user->posts;
        $data['user'] = $user;
        return view('users.show')->with($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $data = ['user' => $user];
        return view('users.edit')->with($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hashed_password = Hash::make($password);

            $rules = array(
            'title' => 'required',
            'url'   => 'required',
            'content' => 'required',
        );

        $request->session()->flash('ERROR_MESSAGE', 'User was not saved. Please see messages under inputs');
        $this->validate($request, $rules);
        $request->session()->forget('ERROR_MESSAGE');

        $user = user::findOrFail($id);
        $user->name = $request->name;
        $user->email= $request->email;
        $user->password = $request->password;
        $user->save();

        $request->session()->flash('SUCCESS_MESSAGE', 'user was updated successfully');
        return redirect()->action('UsersController@show', $user->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
