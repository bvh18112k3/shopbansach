<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookDetailRequest;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\BookType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use function Psy\bin;

class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $book = BookDetail::query()->get();
       return view(ADMIN.DOT.BOOKDETAIL.DOT.__FUNCTION__, compact('book' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::query()->get();
        $book_type = BookType::query()->get();
        return view(ADMIN.DOT.BOOKDETAIL.DOT.__FUNCTION__, compact('books', 'book_type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookDetailRequest $request)
    {

        $book_detail = new BookDetail();
        $book_detail->fill($request->all());
        $book_detail->save();
        return redirect()->route('admin.book_details.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookDetail $bookDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookDetail $bookDetail)
    {
        $book = Book::query()->get();
        $book_type = BookType::query()->get();
        return view('admin.book_details.edit', compact('bookDetail', 'book', 'book_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookDetailRequest $request, BookDetail $bookDetail)
    {
        $bookDetail->fill($request->all());
        $bookDetail->save();
        return redirect()->route('admin.book_details.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookDetail $bookDetail)
    {
        $bookDetail->delete();
        return redirect()->route('admin.book_details.index');
    }
}
