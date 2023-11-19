<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\BookType;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::query()->get();
        return view(ADMIN . DOT . BOOK . DOT . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = Author::query()->get();
        $book_type = BookType::query()->get();
        return view(ADMIN . DOT . BOOK . DOT . __FUNCTION__, compact('author', 'book_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = new Book();
        $createBook = [
            'name'=>$request->name,
            'image'=>$request->image,
            'publishing_company'=>$request->publishing_company,
            'publishing_year'=>$request->publishing_year,
            'description'=>$request->description,
            'pages'=>$request->pages,
            'weight'=>$request->weight,
            'size'=>$request->size,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'status'=>$request->status,
            'discount'=>$request->discount,
            'author_id'=>$request->author_id,
        ];
        $book->fill($createBook);
        if ($request->hasFile('image')) {
            $book->image = upload_file(BOOK, $request->file('image'));
        }
        $book->save();
        $book_types = $request->book_type;
        foreach ($book_types as $key=>$value){
            $bookDetail = new BookDetail();
            $bookDetail->fill(
                [
                    'book_id'=>$book->id,
                    'book_type_id'=>$value,
                ]
            );
            $bookDetail->save();
        }


        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $author = Author::query()->get();
        return view(ADMIN . DOT . BOOK . DOT . __FUNCTION__, compact('author', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $old_img = $book->image;
        $book->fill($request->all());
        if ($request->hasFile('image')) {
            $book->image = upload_file(BOOK, $request->file('image'));
            $book->save();
            delete_file($old_img);
        }
        $book->save();
        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $old_img = $book->image;
        $book->delete();
        delete_file($old_img);
        return redirect()->route('admin.books.index');
    }

    public function home()
    {
        //Lấy tất cả sách
        $data = Book::query()->get();
        //Lấy tất cả thể loại sách
        $book_type = BookType::query()->get();
        //Lấy ra sách bán chạy nhất
        $book = DB::table('order_details')
            ->select('book_id', DB::raw('SUM(sum_quantity) as total_sum_quantity'))
            ->groupBy('book_id')
            ->orderBy('total_sum_quantity', 'desc')
            ->limit(1)
            ->get();
        foreach ($book as $b) {
            $book_id = $b->book_id;
        }
        $book_hot = Book::query()->findOrFail($book_id);
        //Lấy ra sách đc chọn bởi tác giả
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

        //Lấy ra sách mới nhất
        $book_new = Book::query()->orderBy('id', 'desc')->limit(3)->get();
        //Đếm thể loại sách bán chạy
        $bookd = DB::table('book_details')
            ->select('book_type_id', DB::raw('COUNT(book_type_id) as total_count_book_type'))
            ->groupBy('book_type_id')
            ->orderBy('total_count_book_type', 'desc')
            ->limit(4)
            ->get();
        foreach ($bookd as $bd) {
            $book_type_id[] = $bd->book_type_id;
        }
        foreach ($book_type_id as $key => $value) {
            $type[] = BookType::query()->findOrFail($value);
        }
        //Đánh giá sách
        $review = DB::select('select avg(star) as star, book_id from reviews group by book_id');
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
            return view('user.home', compact('data', 'book_type', 'cartHead', 'countCart', 'book_hot', 'book_new', 'type', 'bookd', 'review', 'b5', 'bookDetail', 'topauthor'));
        }
        return view('user.home', compact('data', 'book_type', 'book_hot', 'book_new', 'type', 'bookd', 'review', 'b5', 'bookDetail', 'topauthor'));

    }

    public function book()
    {
        $book_type = BookType::query()->get();
        $data = Book::paginate(8);
        foreach ($book_type as $c) {
            $count[] = DB::select('select count(book_id) as count, book_type_id  from book_details GROUP BY book_type_id HAVING book_type_id = ?', [$c->id]);
        }
        $book = DB::table('order_details')
            ->select('book_id', DB::raw('SUM(sum_quantity) as total_sum_quantity'))
            ->groupBy('book_id')
            ->orderBy('total_sum_quantity', 'desc')
            ->limit(1)
            ->get();
        foreach ($book as $b) {
            $book_id = $b->book_id;
        }

        $book_hot = Book::query()->findOrFail($book_id);
        $bookDetail = BookDetail::query()->get();
        $topauthor = DB::table('authors')
            ->select('authors.id', 'authors.name', 'authors.image', DB::raw('COUNT(books.id) as book_count'))
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderBy('book_count', 'desc')
            ->limit(3)
            ->get();
        $review = DB::select('select avg(star) as star, book_id from reviews group by book_id');
        if (isset(Auth()->user()->id)) {
            $user_id = Auth()->user()->id;
            $cartHead = Cart::query()->where('user_id', $user_id)->get();
            $countCart = Cart::where('user_id', $user_id)->count('id');
            return view('user.books.products', compact('data', 'book_type', 'count', 'cartHead', 'countCart', 'book_hot', 'bookDetail', 'topauthor', 'review'));
        }
        return view('user.books.products', compact('data', 'book_type', 'count', 'book_hot', 'bookDetail', 'topauthor', 'review'));

    }

    public function book_type($book_type_id)
    {

        $data = BookDetail::where('book_type_id', [$book_type_id])->paginate(8);
        $bt = BookType::where('id', [$book_type_id])->first();
        $book_type = BookType::query()->get();
        foreach ($book_type as $c) {
            $count[] = DB::select('select count(book_id) as count, book_type_id  from book_details GROUP BY book_type_id HAVING book_type_id = ?', [$c->id]);
        }
        $bookDetail = BookDetail::query()->get();
        $book = DB::table('order_details')
            ->select('book_id', DB::raw('SUM(sum_quantity) as total_sum_quantity'))
            ->groupBy('book_id')
            ->orderBy('total_sum_quantity', 'desc')
            ->limit(1)
            ->get();
        foreach ($book as $b) {
            $book_id = $b->book_id;
        }
        $book_hot = Book::query()->findOrFail($book_id);
        $topauthor = DB::table('authors')
            ->select('authors.id', 'authors.name', 'authors.image', DB::raw('COUNT(books.id) as book_count'))
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderBy('book_count', 'desc')
            ->limit(3)
            ->get();
        $review = DB::select('select avg(star) as star, book_id from reviews group by book_id');
        if (isset(Auth()->user()->id)) {
            $user_id = Auth()->user()->id;
            $cartHead = Cart::query()->where('user_id', $user_id)->get();
            $countCart = Cart::where('user_id', $user_id)->count('id');
            return view('user.books.book_type', compact('book_type', 'data', 'bt', 'count', 'countCart', 'cartHead', 'bookDetail', 'book_hot', 'topauthor', 'review'));
        }
        return view('user.books.book_type', compact('book_type', 'data', 'bt', 'count', 'bookDetail', 'book_hot', 'topauthor','review'));

    }

    public function bookdetail($id, $author_id)
    {
        $book_type = BookType::query()->get();
        $book = Book::where('id', $id)->first();
        $data = Book::where('author_id', $author_id)->get();
        $book_detail = BookDetail::where('book_id', $id)->get();
        $reviews = Review::query()->where('book_id', $id)->get();
        $star = Review::query()->where('book_id', $id)->avg('star');
        $bookDetail = BookDetail::query()->get();
        foreach ($book_type as $c) {
            $count[] = DB::select('select count(book_id) as count, book_type_id  from book_details GROUP BY book_type_id HAVING book_type_id = ?', [$c->id]);
        }
        $books = DB::table('order_details')
            ->select('book_id', DB::raw('SUM(sum_quantity) as total_sum_quantity'))
            ->groupBy('book_id')
            ->orderBy('total_sum_quantity', 'desc')
            ->limit(1)
            ->get();
        foreach ($books as $b) {
            $book_id = $b->book_id;
        }
        $book_hot = Book::query()->findOrFail($book_id);
        $review = DB::select('select avg(star) as star, book_id from reviews group by book_id');
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
            return view('user.books.book_detail', compact('book', 'book_detail', 'data', 'count', 'book_type', 'cartHead', 'countCart', 'reviews', 'bookDetail', 'book_hot','review', 'topauthor', 'star'));

        }

        return view('user.books.book_detail', compact('book', 'book_detail', 'data', 'count', 'book_type', 'reviews','bookDetail', 'book_hot', 'review', 'topauthor', 'star'));

    }

    public function search(Request $request)
    {
        $search = '%' . $request->search . '%';
        $s = $request->search;
        $data = DB::select("SELECT b.*, au.name as author FROM books b JOIN book_details bd ON b.id = bd.book_id JOIN book_types bt ON bd.book_type_id = bt.id
    JOIN authors au ON au.id = b.author_id WHERE b.name LIKE ? OR au.name LIKE ? OR bt.name LIKE ?", [$search, $search, $search]);
        $book_type = BookType::query()->get();
        $bookDetail = BookDetail::query()->get();
        foreach ($book_type as $c) {
            $count[] = DB::select('select count(book_id) as count, book_type_id  from book_details GROUP BY book_type_id HAVING book_type_id = ?', [$c->id]);
        }
        $book = DB::table('order_details')
            ->select('book_id', DB::raw('SUM(sum_quantity) as total_sum_quantity'))
            ->groupBy('book_id')
            ->orderBy('total_sum_quantity', 'desc')
            ->limit(1)
            ->get();
        foreach ($book as $b) {
            $book_id = $b->book_id;
        }
        $book_hot = Book::query()->findOrFail($book_id);
        $review = DB::select('select avg(star) as star, book_id from reviews group by book_id');
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
            return view('user.books.search', compact('data', 's', 'book_type', 'count', 'countCart', 'cartHead', 'bookDetail', 'book_hot', 'review', 'topauthor'));
        }
        return view('user.books.search', compact('data', 's', 'book_type', 'count', 'bookDetail', 'book_hot', 'review', 'topauthor'));

    }

    public function bestselling()
    {
        $bookhots = DB::table('order_details')
            ->select('book_id', DB::raw('SUM(sum_quantity) as total_sum_quantity'))
            ->groupBy('book_id')
            ->orderBy('total_sum_quantity', 'desc')
            ->limit(8)
            ->get();
        foreach ($bookhots as $b) {
            $books_id[] = $b->book_id;
        }
        $book3 = array();
        foreach ($books_id as $key => $value) {
            array_push($book3, Book::query()->where('id', $value)->get());
        }
        $data = array();
        foreach ($book3 as $b3) {
            foreach ($b3 as $b){
                array_push($data, $b);
            }
        }
        $book_type = BookType::query()->get();
        foreach ($book_type as $c) {
            $count[] = DB::select('select count(book_id) as count, book_type_id  from book_details GROUP BY book_type_id HAVING book_type_id = ?', [$c->id]);
        }
        $book = DB::table('order_details')
            ->select('book_id', DB::raw('SUM(sum_quantity) as total_sum_quantity'))
            ->groupBy('book_id')
            ->orderBy('total_sum_quantity', 'desc')
            ->limit(1)
            ->get();
        foreach ($book as $b) {
            $book_id = $b->book_id;
        }
        $book_hot = Book::query()->findOrFail($book_id);
        $bookDetail = BookDetail::query()->get();
        $review = DB::select('select avg(star) as star, book_id from reviews group by book_id');
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
            return view('user.books.bestselling', compact('data', 'book_type', 'count', 'cartHead', 'countCart', 'book_hot', 'bookDetail', 'bookhots', 'review', 'topauthor'));
        }
        return view('user.books.bestselling', compact('data', 'book_type', 'count', 'book_hot', 'bookDetail', 'bookhots','review', 'topauthor'));

    }
}
