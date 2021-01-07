<?php

namespace App\Http\Controllers;

use App\Models\QuestionPaper;
use Illuminate\Http\Request;
use App\Models\logged_in_user;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
class HomeController extends Controller
{

    private $paginatePapers = 10;
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
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users=User::all();

        $search =  $request->input('search');
        if($search!=""){
            $papers = QuestionPaper::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('year', 'like', '%'.$search.'%')
                    ->orWhere('paper_name', 'like', '%'.$search.'%');
            })
                ->paginate($this->paginatePapers);
            $papers->appends(['search' => $search]);
        }
        else{
            $papers = QuestionPaper::paginate($this->paginatePapers);
        }
        return view('home',compact('users', 'papers', 'search'));
    }

    public function test(Request $request)
    {
        dd($request->input('content'));
    }
}
