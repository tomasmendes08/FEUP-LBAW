<?php

namespace App\Models;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    public function userQuestionFeed($user_id){
        $user = User::find($user_id);
        $fav_user_spaces = $user->favourite_spaces;
        $spaces = array();
        //dd(count($fav_user_spaces));
        if(count($fav_user_spaces) !== 0){
            for($i = 0; $i < count($fav_user_spaces); $i++){
                array_push($spaces, $fav_user_spaces[$i]->space_id);
            }

            if(count($spaces) === 1){
                $questions = Question::where('belongs', '=', $spaces[0])
                ->orderByDesc('question_date');
            }
            else if(count($spaces) === 2){
                $questions = Question::where('belongs', '=', $spaces[0])
                ->orWhere('belongs', '=', $spaces[1])
                ->orderByDesc('question_date');
                //dd($questions->get());
            }
            else if(count($spaces) === 3){
                $questions = Question::where('belongs', '=', $spaces[0])
                ->orWhere('belongs', '=', $spaces[1])
                ->orWhere('belongs', '=', $spaces[2])
                ->orderByDesc('question_date');
            }
            else if(count($spaces) === 4){
                $questions = Question::where('belongs', '=', $spaces[0])
                ->orWhere('belongs', '=', $spaces[1])
                ->orWhere('belongs', '=', $spaces[2])
                ->orWhere('belongs', '=', $spaces[3])
                ->orderByDesc('question_date');
            }

            return $questions->paginate(7);
        }
        else return $this->visitorQuestionFeed();
        
        //dd($questions->paginate(7));
        
    }

    public function visitorQuestionFeed(){
        return Question::orderByDesc('question_date')->paginate(7);
    }

}
