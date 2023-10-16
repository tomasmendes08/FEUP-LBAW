<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage
Route::get('/', 'HomeController@show');

Route::get('/homepage', 'HomeController@show');

// Read More in Question Feed
Route::post('api/question_feed/read_more', 'HomeController@showMore');

// About Us
Route::get('/about', function(){
    return view('pages.common.about');
});

// Contact Us
Route::get('/contactus', function(){
    return view('pages.common.contactus');
});

// FAQ
Route::get('/faq', function(){
    return view('pages.common.faq');
});

//Recover Password
Route::get('/recover', function(){
    return view('auth.recover_password');
});

// Vote Question
Route::post('api/question/{question_id}/vote', 'QuestionController@handleQuestionVote');

// Report Question
Route::post('api/question/{question_id}/report', 'ReportQuestionController@store');
Route::delete('api/question/{question_id}/unreport', 'ReportQuestionController@destroy');

// Vote Answer
Route::post('api/answer/{answer_id}/vote', 'AnswerController@handleAnswerVote');

// Highlight Answer
Route::put('api/answer/{answer_id}/highlight', 'AnswerController@addHighlightAnswer');
Route::delete('api/answer/{answer_id}/highlight', 'AnswerController@deleteHighlightAnswer');
// Report Answer
Route::post('api/answer/{answer_id}/report', 'ReportAnswerController@store');

// Report Comment
Route::post('api/comment/{comment_id}/report', 'ReportCommentController@store');

// Auth
Route::post('api/login', 'Auth\LoginController@authenticate');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/signup', 'Auth\RegisterController@show');
Route::post('/signup', 'Auth\RegisterController@signUp')->name('signup');

// Read MoreReported  Questions
Route::post('api/admin/read_more', 'AdminController@readMore');


// Add Question
Route::get('/add_question', 'QuestionController@create');

//Search
//Route::post('/search', 'SearchController@show');
Route::get('/search', 'SearchController@show');
Route::get('/search_users', 'SearchController@showUsers');


// Read More Questions In Space
Route::post('/api/{space_name}/read_more', 'SpaceController@readMore');

// User Profile
Route::get('/users/{user_id}', 'UserController@show');
Route::get('/users/{user_id}/edit_profile', 'UserController@edit');
Route::put('/users/{user_id}/edit_profile', 'UserController@update')->name('edit_profile');
Route::delete('/users/{user_id}/delete', 'UserController@destroy')->name('delete_profile');

// Administrate
Route::get('/admin', 'AdminController@show');
Route::post('/add_admin/{user_id}', 'AdminController@store')->name('add_admin');

// Question
Route::get('/question/{question_id}', 'QuestionController@show');
Route::get('/add_question', 'QuestionController@create');
Route::post('/add_question', 'QuestionController@store')->name('add_question');
Route::delete('/question/{question_id}/delete', 'QuestionController@destroy');
Route::get('/edit_question/{question_id}', 'QuestionController@edit');
Route::put('/edit_question/{question_id}', 'QuestionController@update')->name('edit_question');
Route::delete('/api/question/{question_id}/delete', 'QuestionController@destroyAPI');


// Add Comment
Route::post('api/answer/{answer_id}/comment', 'CommentController@store');

// Edit Comment
Route::get('api/comment/{comment_id}/edit', 'CommentController@edit');
Route::post('api/comment/{comment_id}/edit', 'CommentController@update');

//Delete Comment
Route::delete('api/comment/{comment_id}/delete', 'CommentController@destroy');

// Add Answer
Route::post('api/question/{question_id}/answer', 'AnswerController@store');

// Edit Answer
Route::get('api/answer/{answer_id}/edit', 'AnswerController@edit');
Route::post('api/answer/{answer_id}/edit', 'AnswerController@update');

//Delete Answer
Route::delete('api/answer/{answer_id}/delete', 'AnswerController@destroy');


// Space
Route::get('/{space_name}', 'SpaceController@show');
