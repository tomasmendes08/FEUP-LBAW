<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aux = new Home();

        if(Auth::check()){
            $questions = $aux->userQuestionFeed(Auth::id());
        }
        else $questions = $aux->visitorQuestionFeed();

        return $questions;
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

    }

    public function show(){
        $questions = $this->index();

        return view('pages.common.homepage', ['questions' => $questions]);
    }

    public function showMore(){
        $questions = $this->index();
        
        //Log::debug($questions);
        $views = array();
        for($i = 0; $i < count($questions); $i++){
            $view = view('partials.cards.question_card', ['question' => $questions[$i]]);
            $view = $view->render();
            array_push($views, $view);
        }

        return response()->json(array('views' => $views));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
