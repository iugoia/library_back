<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
//        $books = Book::all();
//        foreach ($books as $book){
//            $bookFeedbacks[] = [
//                'book' => $book,
//                'feedbacks' => Feedback::all()->where('book_id', '=', $book->id)
//            ];
//        }
//        foreach ($bookFeedbacks as $bookFeedback){
//            $sumScore = 0;
//            foreach ($bookFeedback['feedbacks'] as $feedback){
//                $sumScore += $feedback->score;
//            }
//            $count = $bookFeedback['feedbacks']->count();
//            $score = $sumScore / $count;
//            $bookScores[] = [
//                'book' => $bookFeedback['book'],
//                'score' => $score,
//                'ratingWidth' => ($score * 22) + (floor($score) * 3)
//            ];
//        }
//
//        usort($bookScores, function($a, $b){
//            if ($a['score'] < $b['score']){
//                return 1;
//            } elseif ($a['score'] > $b['score']){
//                return -1;
//            }
//            return 0;
//        });

//        return view('index', compact('bookScores'));
        return view('index');
    }
}
