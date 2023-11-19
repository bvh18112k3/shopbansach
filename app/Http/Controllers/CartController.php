<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\BookType;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =Cart::query()->get();
        return view(ADMIN.DOT.CART.DOT.__FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = false;
        $carts = Cart::where('user_id', [$request->user_id])->get();
        foreach ($carts as $c ){
            if($c->book_id == $request->book_id){
                $quan = $c->quantity + $request->quantity;
                if ($request->quantity>1){
                    $price = $c->sum_money + ($request->sum_money *  $request->quantity);
                }else{
                    $price = $c->sum_money + $request->sum_money;
                }
                DB::table('carts')
                    ->where('id', $c->id)->update(['quantity'=>$quan, 'sum_money'=>$price]);
                $result = true;

            }
        }
        if($result === false ){
            $cart = new Cart();
            $cart->fill($request->all());
            if($request->quantity>1){
                $cart->sum_money = $request->quantity * $request->sum_money;
            }
            $cart->save();
        }else{
            $cart = Cart::where('book_id', $request->book_id)->where('user_id',$request->user_id )->first();
        }
        $id = $cart->id;
        if(empty($request->note)){
            return redirect()->route('cart', $request->user_id);
        }else{
            $user_id = Auth()->user()->id;
            $address = Address::query()->where('user_id', $user_id)->get();
            return view('user.address.index', compact('id', 'address'));
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cart = Cart::where('id', $id)->get();
        if (isset(Auth()->user()->id)) {
            $user_id = Auth()->user()->id;
            $cartHead = Cart::query()->where('user_id', $user_id)->get();
            $countCart = Cart::where('user_id', $user_id)->count('id');
            return view('user.carts.cart_edit',compact('cart', 'cartHead', 'countCart'));

        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCart(Request $request)
    {

        $sum_money = $request->quantity * $request->price;
        DB::table('carts')->where('id', $request->id)->update(['quantity'=>$request->quantity,'sum_money'=>$sum_money]);

        return redirect()->route('cart', $request->user_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart', $cart->user_id);

    }
    public function cart($user_id){
        $book_type = BookType::query()->get();
        $cart = Cart::where('user_id', [$user_id])->get();
        $cartHead = Cart::query()->where('user_id', $user_id)->get();
        $countCart = Cart::where('user_id', $user_id)->count('id');
        $bookDetail = BookDetail::query()->get();
        $topauthor = DB::table('authors')
            ->select('authors.id', 'authors.name', 'authors.image', DB::raw('COUNT(books.id) as book_count'))
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderBy('book_count', 'desc')
            ->limit(3)
            ->get();
        return view('user.carts.cart', compact('cart','book_type', 'cartHead', 'countCart','bookDetail', 'topauthor'));
    }
}
