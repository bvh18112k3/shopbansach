<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDetail;
use App\Models\BookType;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Review::query()->get();
        return view(ADMIN.DOT.REVIEW.DOT.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user, Order $order)
    {
        $orderDetail = OrderDetail::query()->where('order_id', $order->id)->get();
        foreach ($orderDetail as $od){
            $book_detail[] = BookDetail::query()->where('book_id', $od->book_id);
        }
        $cartHead = Cart::query()->where('user_id', $user->id)->get();
        $countCart = Cart::where('user_id', $user->id)->count('id');
        $book_type = BookType::query()->get();
        $bookDetail = BookDetail::query()->get();
        $topauthor = DB::table('authors')
            ->select('authors.id', 'authors.name', 'authors.image', DB::raw('COUNT(books.id) as book_count'))
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderBy('book_count', 'desc')
            ->limit(3)
            ->get();
        return view('user.review.post', compact('orderDetail', 'book_detail', 'countCart', 'cartHead', 'book_type', 'bookDetail', 'topauthor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request){
        $review = new Review();
        $review->fill($request->all());
        $review->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view(ADMIN.DOT.REVIEW.DOT.__FUNCTION__, compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $table_name = (new Review())->getTable();
        $this->validate($request, [
            'name'=>['required', Rule::unique($table_name)->ignore($review->id)],
            'detail'=>['required'],
        ]);
        $review->fill($request->all());
        $review->save();
        return redirect()->route('admin.reviews.index');
    }
}
