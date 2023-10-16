<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    public function showUsers(Request $request){
        
        $aux = new Search();
        $users = $aux->searchUsers($request);
        //dd($users);
        return view('pages.common.search_user', ['all_filters' => $request->all(), 'users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   

        //dd($request['text_search']);
        $questions = $this->showQuestions($request);
        $answers = $this->showAnswers($request);
        $comments = $this->showComments($request);
        
        //dd($request->all());
        return view('pages.common.search', ['all_filters' => $request->all(), 'questions' => $questions, 'answers' => $answers, 'comments' => $comments]);
    }

    public function showQuestions(Request $request){
        
        //$text = $request['query'];
        $aux = new Search();
        $questions = $aux->searchQuestions($request);
        

        return $questions;
    }

    public function showAnswers(Request $request){
        
        //$text = $request['query'];
        $aux = new Search();
        $answers = $aux->searchAnswers($request);

        return $answers;
    }

    public function showComments(Request $request){
    
        
        //$text = $request['query'];
        $aux = new Search();
        $comments = $aux->searchComments($request);

        return $comments;
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
