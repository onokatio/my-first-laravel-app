<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
				$boards = Board::orderBy('id', 'desc')->paginate(10);
        return view('home', compact('boards'));
    }
		public function submit(Request $request){
			$validateRole = [
				'title' => 'required',
				'body' => 'required'
			];
			$this->validate($request, $validateRole);
			Board::create($request->all());
			return redirect('/home');
		}
		public function help(){
			return view('help');
		}
}
