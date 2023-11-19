<?php

namespace App\Http\Controllers;

use App\Models\BookDetail;
use App\Models\BookType;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    public function newlist(){
        $book_type= BookType::query()->get();
        foreach ($book_type as $c) {
            $count[] = DB::select('select count(book_id) as count, book_type_id  from book_details GROUP BY book_type_id HAVING book_type_id = ?', [$c->id]);
        }
        $bookDetail = BookDetail::query()->get();
        $topauthor = DB::table('authors')
            ->select('authors.id', 'authors.name', 'authors.image', DB::raw('COUNT(books.id) as book_count'))
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderBy('book_count', 'desc')
            ->limit(3)
            ->get();
        if (isset(Auth()->user()->id)) {
            $user_id = Auth()->user()->id;
            $cartHead = Cart::query()->where('user_id', $user_id)->get();
            $countCart = Cart::where('user_id', $user_id)->count('id');
            return view('user.news.newlist', compact( 'cartHead', 'countCart', 'book_type', 'bookDetail', 'count', 'topauthor'));
        }else{
            return view('user.news.newlist', compact(  'book_type', 'bookDetail','count', 'topauthor'));
        }
    }
}
