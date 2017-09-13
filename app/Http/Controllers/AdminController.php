<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joke;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = Joke::countAwaitingApproval();
        $countJokes = Joke::countJokes();
        $countUsers = User::countUsers();

        return view('admin-dashboard', compact('count', 'countJokes', 'countUsers'));
    }

    public function show()
    {
        $awaitingApproval = Joke::getAwaitingApproval();
        return view('admin-waiting-approval', compact('awaitingApproval'));
    }

    public function approve($id)
    {
        if (Joke::approveJoke($id)) {
            $awaitingApproval = Joke::getAwaitingApproval();
            return view('admin-waiting-approval', compact('awaitingApproval'));
        }
    }

    public function edit(Request $request){
        if(Joke::editJoke($request)){
            $awaitingApproval = Joke::getAwaitingApproval();
            return view('admin-waiting-approval', compact('awaitingApproval'));
        }
    }

    public function delete($id){
        if(Joke::deleteJoke($id)){
            $awaitingApproval = Joke::getAwaitingApproval();
            return view('admin-waiting-approval', compact('awaitingApproval'));
        }
}
}
