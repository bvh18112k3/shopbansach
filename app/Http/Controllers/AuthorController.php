<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\BookType;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Author::query()->get();
        return view(ADMIN.DOT.AUTHOR.DOT.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(ADMIN.DOT.AUTHOR.DOT.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $author = new Author();
        $author->fill($request->all());

        if($request->hasFile('image')){
            $author->image = upload_file(AUTHOR, $request->file('image'));
        }else{
            $author->image = 'storage/authors/noavatar.png';
        }
        $author->save();
        return redirect()->route('admin.authors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view(ADMIN.DOT.AUTHOR.DOT.__FUNCTION__, compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {

        $old_img = $author->image;
        $author->fill($request->all());
        if($request->hasFile('image')){
            $author->image = upload_file(AUTHOR, $request->file('image'));
            $author->save();
            delete_file($old_img);
        }
        $author->save();
        return redirect()->route('admin.authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $old_img = $author->image;
        $author->delete();
        delete_file($old_img);
        return redirect()->route('admin.authors.index');
    }
    public function author(){
        $book_type = BookType::query()->get();
        $authors = Author::query()->get();
        $topauthor = DB::table('authors')
            ->select('authors.id', 'authors.name', 'authors.image', DB::raw('COUNT(books.id) as book_count'))
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderBy('book_count', 'desc')
            ->limit(3)
            ->get();
        foreach ($authors as $au){
            $count[]= DB::select('select author_id, count(name) as count FROM books GROUP BY author_id HAVING author_id = ?', [$au->id]);
        }
        $data = Book::query()->get();
        $bookhots = DB::table('order_details')
            ->select('book_id', DB::raw('SUM(sum_quantity) as total_sum_quantity'))
            ->groupBy('book_id')
            ->orderBy('total_sum_quantity', 'desc')
            ->limit(5)
            ->get();
        foreach ($bookhots as $b) {
            $books_id[] = $b->book_id;
        }
        $book3 = array();
        foreach ($books_id as $key => $value) {
            array_push($book3, Book::query()->where('id', $value)->get());
        }
        $b5 = array();
        foreach ($book3 as $b3) {
            foreach ($b3 as $b){
                array_push($b5, $b);
            }
        }
        $bookDetail = BookDetail::query()->get();
        $review = Review::query()->get();
        if (isset(Auth()->user()->id)) {
            $user_id = Auth()->user()->id;
            $cartHead = Cart::query()->where('user_id', $user_id)->get();
            $countCart = Cart::where('user_id', $user_id)->count('id');
            return view('user.author.authors', compact('topauthor','authors', 'count', 'book_type', 'cartHead', 'countCart', 'data', 'bookDetail', 'b5', 'review'));

        }
        return view('user.author.authors', compact('topauthor','authors', 'count', 'book_type', 'bookDetail', 'b5', 'review'));
    }
    public function author_detail($id){
        $book_type = BookType::query()->get();
        $author = Author::where('id', $id)->first();
        $data = Book::where('author_id', $id)->paginate(8);
        $topauthor = DB::table('authors')
            ->select('authors.id', 'authors.name', 'authors.image', DB::raw('COUNT(books.id) as book_count'))
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderBy('book_count', 'desc')
            ->limit(3)
            ->get();
        $count = DB::select('select count(name) as count FROM books WHERE author_id = ?', [$id]);
        $bookDetail = BookDetail::query()->get();
        $review = Review::query()->get();
        if (isset(Auth()->user()->id)) {
            $user_id = Auth()->user()->id;
            $cartHead = Cart::query()->where('user_id', $user_id)->get();
            $countCart = Cart::where('user_id', $user_id)->count('id');
            return view('user.author.author_detail', compact('author','data', 'count','book_type', 'countCart', 'bookDetail', 'cartHead', 'topauthor', 'review'));
        }
        return view('user.author.author_detail', compact('author','data', 'count','book_type', 'bookDetail', 'topauthor', 'review'));

    }
}
