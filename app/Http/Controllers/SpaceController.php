<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Space;
use App\Models\Question;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($space)
    {
        $recent_questions = Question::select('question.*')
        ->where('question.belongs', '=', $space->space_id)
        ->orderByDesc('question.question_date')
        ->paginate(7);

        if (is_int($space->space_id) && $space->space_id >= 1 && $space->space_id <= 4) {
            $question_interactions = DB::select(DB::raw('SELECT question_id, votes + answers + NumOfComments AS Interactions
            FROM question
            NATURAL JOIN (
                SELECT question.question_id, count(*) AS Votes
                FROM question LEFT JOIN question_vote ON question.question_id = question_vote.question_id
                GROUP BY question.question_id
            ) AS votes
            NATURAL JOIN (
                SELECT question.question_id, count(*) AS Answers
                FROM question LEFT JOIN answer ON question.question_id = answer.question_id
                GROUP BY question.question_id
            ) AS answers
            NATURAL JOIN (
                SELECT question.question_id, sum(coalesce(answer_num_of_comments.numofcomments, 0)) AS NumOfComments
                FROM (
                    SELECT answer.question_id, answer.answer_id, count("comment".comment_id) AS NumOfComments
                    FROM answer
                    LEFT JOIN "comment"
                    ON answer.answer_id = "comment".answer_id
                    GROUP BY answer.answer_id
                    ORDER BY answer.answer_id
                ) AS answer_num_of_comments
                FULL OUTER JOIN question ON answer_num_of_comments.question_id = question.question_id
                GROUP BY question.question_id
            ) AS numcomments
            WHERE question.belongs = ' . $space->space_id . '
            ORDER BY interactions DESC'));

            for ($i = 0; $i < count($question_interactions); $i++) {
                $question_interactions[$i] = Question::firstWhere('question_id', intval($question_interactions[$i]->question_id));
            }
        }
        $question_interactions = collect($question_interactions);

        $question_interactions = $this->paginate($question_interactions);

        $question_most_upvotes = Question::select(DB::raw('question.*, COUNT(CASE WHEN question_vote.vote = TRUE THEN 1 ELSE null END) - COUNT(CASE when question_vote.vote = FALSE then 1 else null END) as upvotes'))
        ->leftJoin('question_vote', 'question_vote.question_id', '=', 'question.question_id')
        ->where('question.belongs', "=", $space->space_id)
        ->groupBy('question.question_id')
        ->orderByDesc('upvotes')
        ->paginate(7);

        //dd($recent_questions);
        //dd(collect($question_interactions));
        //dd($question_most_upvotes);

        return array('recent_questions' => $recent_questions, 'question_most_upvotes' => $question_most_upvotes, 'question_interactions' => $question_interactions);
    }

    public function paginate($items, $perPage = 7, $page = 1, $options = [])    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof \Illuminate\Database\Eloquent\Collection ? $items : \Illuminate\Database\Eloquent\Collection::make($items);
        return new \Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($space_name)
    {

        $space = Space::firstWhere('space_name', strtolower($space_name));

        $questions_split = $this->index($space);

        return view('pages.spaces.science_space', ['space' => $space, 'space_recent_questions' => $questions_split['recent_questions'], 'space_most_upvotes_questions' => $questions_split['question_most_upvotes'], 'space_popular_questions' => $questions_split['question_interactions']]);
    }


    public function readMore(Request $request)
    {
        $space = Space::firstWhere('space_name', $request['space_name']);

        if($request['type'] === "recent"){
            $recent_questions = Question::select('question.*')
            ->where('question.belongs', '=', $space->space_id)
            ->orderByDesc('question.question_date')
            ->paginate(7);

            $views = array();
            for($i = 0; $i < count($recent_questions); $i++){
                $view = view('partials.cards.question_card', ['question' => $recent_questions[$i]]);
                $view = $view->render();
                array_push($views, $view);
            }

            return response()->json(array('views' => $views, 'space' => $space));
        }
        else if($request['type'] === "popular"){
            if (is_int($space->space_id) && $space->space_id >= 1 && $space->space_id <= 4) {
                $question_interactions = DB::select(DB::raw('SELECT question_id, votes + answers + NumOfComments AS Interactions
                FROM question
                NATURAL JOIN (
                    SELECT question.question_id, count(*) AS Votes
                    FROM question LEFT JOIN question_vote ON question.question_id = question_vote.question_id
                    GROUP BY question.question_id
                ) AS votes
                NATURAL JOIN (
                    SELECT question.question_id, count(*) AS Answers
                    FROM question LEFT JOIN answer ON question.question_id = answer.question_id
                    GROUP BY question.question_id
                ) AS answers
                NATURAL JOIN (
                    SELECT question.question_id, sum(coalesce(answer_num_of_comments.numofcomments, 0)) AS NumOfComments
                    FROM (
                        SELECT answer.question_id, answer.answer_id, count("comment".comment_id) AS NumOfComments
                        FROM answer
                        LEFT JOIN "comment"
                        ON answer.answer_id = "comment".answer_id
                        GROUP BY answer.answer_id
                        ORDER BY answer.answer_id
                    ) AS answer_num_of_comments
                    FULL OUTER JOIN question ON answer_num_of_comments.question_id = question.question_id
                    GROUP BY question.question_id
                ) AS numcomments
                WHERE question.belongs = ' . $space->space_id . '
                ORDER BY interactions DESC'));
    
                for ($i = 0; $i < count($question_interactions); $i++) {
                    $question_interactions[$i] = Question::firstWhere('question_id', intval($question_interactions[$i]->question_id));
                }
            }
            $question_interactions = collect($question_interactions);
    
            $question_interactions = $this->paginate($question_interactions);

            $views = array();
            for($i = 0; $i < count($question_interactions); $i++){
                $view = view('partials.cards.question_card', ['question' => $question_interactions[$i]]);
                $view = $view->render();
                array_push($views, $view);
            }

            return response()->json(array('views' => $views, 'space' => $space));
        }
        else if($request['type'] === "upvotes"){
            $question_most_upvotes = Question::select(DB::raw('question.*, COUNT(CASE WHEN question_vote.vote = TRUE THEN 1 ELSE null END) - COUNT(CASE when question_vote.vote = FALSE then 1 else null END) as upvotes'))
            ->leftJoin('question_vote', 'question_vote.question_id', '=', 'question.question_id')
            ->where('question.belongs', "=", $space->space_id)
            ->groupBy('question.question_id')
            ->orderByDesc('upvotes')
            ->paginate(7);

            $views = array();
            for($i = 0; $i < count($question_most_upvotes); $i++){
                $view = view('partials.cards.question_card', ['question' => $question_most_upvotes[$i]]);
                $view = $view->render();
                array_push($views, $view);
            }

            return response()->json(array('views' => $views, 'space' => $space));
        }


        return response()->json('deixou de dar');

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








