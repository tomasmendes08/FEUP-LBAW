<?php

namespace App\Models;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Comment;
use App\Models\Space;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Search extends Model
{
    use HasFactory;

    public function searchUsers($request){
        $users_aux = collect();
       
        if(($request['text_search'] === null && $request['order'] === null) || empty($request->all())){
            $users_aux = User::paginate(10);
        }
        else if($request['text_search'] !== null && $request['order'] === null){
            $users_aux = $this->handleTextSearchUser($request['text_search'])->paginate(10);
        }
        else if($request['order'] !== null){
            $users_text_search = $this->handleTextSearchUser($request['text_search']);
            $users_aux = $this->handleOrderByUser($users_text_search, $request['order'])->paginate(10);
        }

        return $users_aux;
    }

    public function handleTextSearchUser($text){
        $users = User::where(function($query) use ($text){
            $query->whereRaw('username @@ plainto_tsquery(\'english\', ?)', [$text])
            ->orWhere('name', 'ILIKE', "%".$text."%");
        })
        ->orderByRaw('ts_rank(to_tsvector(username), plainto_tsquery(\'english\', ?)) DESC', [$text]);

        return $users;
    }

    public function handleOrderByUser($users, $order){
        $users_aux = collect();
        
        if($order === "high_reputation") $users_aux = $users->orderByDesc('reputation');
        else if($order === "low_reputation") $users_aux = $users->orderBy('reputation');

        return $users_aux;
    }

    public function handleTextSearchQuestion($text){
        
        $questions = Question::where(function($query) use ($text){
            $query->whereRaw('question_body @@ plainto_tsquery(\'english\', ?)', [$text])
            ->orWhere('question_title', 'ILIKE', "%".$text."%");
        })
        ->orderByRaw('ts_rank(to_tsvector(question_body), plainto_tsquery(\'english\', ?)) DESC', [$text]);
        //dd($questions);
        return $questions;
    }

    public function handleOrderByQuestion($questions, $order){
        $questions_aux = collect();
        if($order === "upvotes"){
            $questions_aux = $questions->select(DB::raw('question.*, COUNT(CASE WHEN question_vote.vote = TRUE THEN 1 ELSE null END) - COUNT(CASE when question_vote.vote = FALSE then 1 else null END) as votes'))
            ->leftJoin('question_vote', 'question_vote.question_id', '=', 'question.question_id')
            ->groupBy('question.question_id')
            ->orderByDesc('votes');
            //Log::debug($questions_aux);

        }
        else if($order === "downvotes"){
            $questions_aux = $questions->select(DB::raw('question.*, COUNT(CASE WHEN question_vote.vote = TRUE THEN 1 ELSE null END) - COUNT(CASE when question_vote.vote = FALSE then 1 else null END) as votes'))
            ->leftJoin('question_vote', 'question_vote.question_id', '=', 'question.question_id')
            ->groupBy('question.question_id')
            ->orderBy('votes');

        }
        else if($order === "newest"){
            $questions_aux = $questions->orderByDesc('question.question_date');

        }
        else if($order === "oldest"){
            //dd($questions->get());
            $questions_aux = $questions->orderBy('question.question_date');
            //Log::debug($questions_aux);
        }

        return $questions_aux;
    }

    public function handleSpaceQuestion($questions, $space_name){
        $space = Space::firstWhere('space_name', $space_name);
        $questions_space = $questions->where('belongs', '=', $space->space_id);

        return $questions_space;
    }

    public function searchQuestions($request){
        //dd(($request['text_search']));
        
        $questions_aux = collect();
        if(empty($request->all())){
            $questions_aux = $this->handleTextSearchQuestion(null)->paginate(5);
        }
        else if($request['space'] === null && $request['order'] === null){
            $text = $request['text_search'];
            $questions_aux = $this->handleTextSearchQuestion($text)->paginate(5);

        }
        else if($request['space'] !== null && $request['order'] === null){
            $text = $request['text_search'];
            $questions = $this->handleTextSearchQuestion($text);
            
            $questions_aux = $this->handleSpaceQuestion($questions, $request['space'])
            ->paginate(5);
            
        }
        else if($request['space'] === null && $request['order'] !== null){
            $text = $request['text_search'];
            $questions = $this->handleTextSearchQuestion($text);
            $questions_aux = $this->handleOrderByQuestion($questions, $request['order'])
            ->paginate(5);
            
        }
        else if($request['space'] !== null && $request['order'] !== null){
            $text = $request['text_search'];
            $questions = $this->handleTextSearchQuestion($text);
            $questions_space = $this->handleSpaceQuestion($questions, $request['space']);
            
            $questions_aux = $this->handleOrderByQuestion($questions_space, $request['order'])
            ->paginate(5);

        }
        

        return $questions_aux;
    }

    public function handleTextSearchAnswer($text){
        $answers = Answer::where(function($query) use ($text){
            $query->whereRaw('answer_body @@ plainto_tsquery(\'english\', ?)', [$text])
            ->orWhere('answer_body', 'ILIKE', "%".$text."%");
        })
        ->orderByRaw('ts_rank(to_tsvector(answer_body), plainto_tsquery(\'english\', ?)) DESC', [$text]);
        Log::debug($answers->get());
        return $answers;
    }

    public function handleOrderByAnswer($answers, $order){
        $answers_aux = collect();
        if($order === "upvotes"){
            $answers_aux = $answers->select(DB::raw('answer.*, COUNT(CASE WHEN answer_vote.vote = TRUE THEN 1 ELSE null END) - COUNT(CASE when answer_vote.vote = FALSE then 1 else null END) as votes'))
            ->leftJoin('answer_vote', 'answer_vote.answer_id', '=', 'answer.answer_id')
            ->groupBy('answer.answer_id')
            ->orderByDesc('votes');

        }
        else if($order === "downvotes"){
            $answers_aux = $answers->select(DB::raw('answer.*, COUNT(CASE WHEN answer_vote.vote = TRUE THEN 1 ELSE null END) - COUNT(CASE when answer_vote.vote = FALSE then 1 else null END) as votes'))
            ->leftJoin('answer_vote', 'answer_vote.answer_id', '=', 'answer.answer_id')
            ->groupBy('answer.answer_id')
            ->orderBy('votes');

        }
        else if($order === "newest"){
            $answers_aux = $answers->orderByDesc('answer_date');

        }
        else if($order === "oldest"){
            $answers_aux = $answers->orderBy('answer_date');

        }

        return $answers_aux;
    }

    public function handleSpaceAnswer($answers, $space_name){
        $space = Space::firstWhere('space_name', $space_name);
        $answers_space = $answers->join('question', 'question.question_id', '=', 'answer.question_id')
        ->where('question.belongs', '=', $space->space_id);
        //dd($answers_space);

        return $answers_space;
    }

    public function searchAnswers($request){
        $answers_aux = collect();
        //dd($request->all());
        if($request['space'] === null && $request['order'] === null){
            $text = $request['text_search'];
            $answers_aux = $this->handleTextSearchAnswer($text)->paginate(5);
            
        }
        else if($request['space'] !== null && $request['order'] === null){
            $text = $request['text_search'];
            $answers = $this->handleTextSearchAnswer($text);

            $answers_aux = $this->handleSpaceAnswer($answers, $request['space'])
            ->paginate(5);

        }
        else if($request['space'] === null && $request['order'] !== null){
            $text = $request['text_search'];
            $answers = $this->handleTextSearchAnswer($text);
            $answers_aux = $this->handleOrderByAnswer($answers, $request['order'])
            ->paginate(5);

        }
        else if($request['space'] !== null && $request['order'] !== null){
            $text = $request['text_search'];
            $answers = $this->handleTextSearchAnswer($text);
            $answers_space = $this->handleSpaceAnswer($answers, $request['space']);
            
            $answers_aux = $this->handleOrderByAnswer($answers_space, $request['order'])
            ->paginate(5);

        }
        

        return $answers_aux;
    }


    public function handleTextSearchComment($text){
        $comments = Comment::where(function($query) use ($text){
            $query->whereRaw('comment_body @@ plainto_tsquery(\'english\', ?)', [$text])
            ->orWhere('comment_body', 'ILIKE', "%".$text."%");
        })
        ->orderByRaw('ts_rank(to_tsvector(comment_body), plainto_tsquery(\'english\', ?)) DESC', [$text]);

        return $comments;
    }

    public function handleOrderByComment($comments, $order){
        $comments_aux = collect();
        
        if($order === "newest"){
            $comments_aux = $comments->orderByDesc('comment_date');

        }
        else if($order === "oldest"){
            $comments_aux = $comments->orderBy('comment_date');

        }

        if($comments_aux->count() === 0) return $comments;
        return $comments_aux;
    }

    public function handleSpaceComment($comments, $space_name){
        $space = Space::firstWhere('space_name', $space_name);
        $comments_space = $comments->join('answer', 'answer.answer_id', '=', 'comment.answer_id')
        ->join('question', 'question.question_id', '=', 'answer.question_id')
        ->where('question.belongs', '=', $space->space_id);
        

        return $comments_space;
    }

    public function searchComments($request){
        
        $comments_aux = collect();
        if($request['space'] === null && $request['order'] === null){
            $text = $request['text_search'];
            $comments_aux = $this->handleTextSearchComment($text)->paginate(5);
            //dd($request->all());

        }
        else if($request['space'] !== null && $request['order'] === null){
            $text = $request['text_search'];
            $comments = $this->handleTextSearchComment($text);

            $comments_aux = $this->handleSpaceComment($comments, $request['space'])
            ->paginate(5);

        }
        else if($request['space'] === null && $request['order'] !== null){
            $text = $request['text_search'];
            $comments = $this->handleTextSearchComment($text);
            $comments_aux = $this->handleOrderByComment($comments, $request['order'])
            ->paginate(5);

        }
        else if($request['space'] !== null && $request['order'] !== null){
            $text = $request['text_search'];
            $comments = $this->handleTextSearchComment($text);
            $comments_space = $this->handleSpaceComment($comments, $request['space']);
            
            $comments_aux = $this->handleOrderByComment($comments_space, $request['order'])
            ->paginate(5);

        }
        

        return $comments_aux;
    }
    



}
