<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookTypeRequest;
use App\Http\Requests\UpdateBookTypeRequest;
use App\Models\BookType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BookType::query()->get();
        return view(ADMIN.DOT.BOOKTYPE.DOT.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(ADMIN.DOT.BOOKTYPE.DOT.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookTypeRequest $request)
    {

        $book_type = new BookType();
        $book_type->fill($request->all());
        $book_type->save();
        return redirect()->route('admin.book_types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookType $book_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookType $book_type)
    {
        return view(ADMIN.DOT.BOOKTYPE.DOT.__FUNCTION__, compact('book_type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookTypeRequest $request, BookType $book_type)
    {
        $table_name = (new BookType())->getTable();
        $this->validate($request, [
            'name'=>['required', Rule::unique($table_name)->ignore($book_type->id)],

        ]);
        $old_img = $book_type->image;
        $book_type->fill($request->all());
        $book_type->save();
        return redirect()->route('admin.book_types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookType $book_type)
    {
        $book_type->delete();
        return redirect()->route('admin.book_types.index');
    }
    public function bookType($id){

    }
}
