<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\HelloMail;
use App\Models\Address;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\BookType;
use App\Models\Cart;
use App\Models\DiscountCode;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentMethod;
use App\Models\Review;
use App\Models\ShippingMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::query()->get();
        return view(ADMIN . DOT . ORDER . DOT . __FUNCTION__, compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        if ($order->order_status == 0) {
            $order->order_status = 1;
            $order->save();
        } elseif ($order->order_status == 1) {
            $order->order_status = 2;
            $order->save();
        } elseif ($order->order_status == 2) {
            $order->order_status = 3;
            $order->save();
        }
        return redirect()->route('admin.orders.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }


    public function address()
    {
        $shipping = ShippingMethod::query()->get();
        $payment = PaymentMethod::query()->get();
        if (!empty($_GET['id'])) {
            $carts = Cart::where('id', $_GET['id'])->get();
            $check = 1;
        } else {
            $carts = Cart::query()->where('user_id', Auth()->user()->id)->get();
            $check = 0;
        }
        $count = 0;
        foreach ($carts as $c) {
            $count++;
        }
        $discount = DiscountCode::query()->get();
        $address = Address::query()->where('id', $_GET['address_id'])->get();


        return view('user.order.order', compact('carts', 'shipping', 'payment', 'count', 'check', 'discount', 'address'));
    }

    public function addOrder(OrderRequest $request)
    {
        if (empty($request->hi)) {
            $request->hi = "Không";
        }
        $order = new Order();
        $order->fill([
            'address_id' => $request->address_id,
            'order_status' => $request->order_status,
            'total_money' => $request->total_money,
            'gift' => $request->hi,
            'loichuc' => $request->loichuc,
            'giamgia' => $request->giamgia,
            'note' => $request->note,
            'user_id' => $request->user_id,
            'payment_method_id' => $request->payment_method_id,
            'shipping_method_id' => $request->shipping_method_id,
        ]);
        $order->save();
        if ($request->check == 1) {
            $book = Book::query()->where('id', $request->book_id)->first();
            $quantity = $book->quantity - $request->sum_quantity;
            $order_details = [
                'book_id' => $request->book_id,
                'order_id' => $order->id,
                'sum_quantity' => $request->sum_quantity,
                'sum_money' => $request-> sum_quantity * money_discount($book->price, $book->discount),
            ];
            if ($quantity == 0) {
                DB::table('books')->where('id', $request->id)->update(['quantity' => $quantity, 'status' => 'Hết hàng']);
            } else {
                DB::table('books')->where('id', $request->id)->update(['quantity' => $quantity]);
            }
            OrderDetail::query()->create($order_details);
            $order_detail = OrderDetail::query()->where('order_id', $order->id)->get();
            Cart::where('id', $request->cart_id)->delete();
            $user = User::query()->findOrFail($request->user_id);
            $mail = new HelloMail($user, $order, $order_detail);
            Mail::to($user->email)->send($mail);
            return view('user.order.thankyou', compact('order'));
        } else {
            $carts = Cart::query()->where('user_id', $request->user_id)->get();
            foreach ($carts as $cart) {
                $book = Book::query()->where('id', $cart->book_id)->get();
                foreach ($book as $b) {
                    $quantity = $b->quantity - $cart->quantity;
                }
                $order_details = [
                    'book_id' => $cart->book_id,
                    'order_id' => $order->id,
                    'sum_quantity' => $cart->quantity,
                    'sum_money' => $cart->sum_money,
                ];
                DB::table('books')->where('id', $cart->book_id)->update(['quantity' => $quantity]);
                OrderDetail::query()->create($order_details);
                Cart::where('id', $cart->id)->delete();

            }
            $order_detail = OrderDetail::query()->where('order_id', $order->id)->get();
            $user = User::query()->findOrFail($request->user_id);
            $mail = new HelloMail($user, $order, $order_detail);
            Mail::to($user->email)->send($mail);
            return view('user.order.thankyou', compact('order'));
        }


    }

    public function order()
    {
        $shipping = ShippingMethod::query()->get();
        $payment = PaymentMethod::query()->get();
        return view('user.order', compact('shipping', 'payment'));
    }

    public function dashboard()
    {
        $year = date('Y');
        $month = date('m');
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $from = $year . '-' . $month . '-' . '1';
        $to = $year . '-' . $month . '-' . $day;
        $total_money = Order::query()->where('order_status', 3)->sum('total_money');
        $total_money_month = Order::whereBetween('created_at', [$from, $to])->where('order_status', 3)->sum('total_money');
        if ($total_money_month == null) {
            $total_money_month = 0;
        }
        $count = Order::where('order_status', 0)->count('id');
        $complete = Order::where('order_status', 3)->count('id');
        return view('admin.dashboard', compact('total_money', 'total_money_month', 'month', 'complete', 'count'));
    }

    public function confirm()
    {
        $data = $count = Order::where('order_status', 0)->get();
        return view(ADMIN . DOT . ORDER . 'index', compact('data'));
    }

    public function complete()
    {
        $data = $count = Order::where('order_status', 4)->get();
        return view(ADMIN . DOT . ORDER . 'index', compact('data'));
    }

    public function orderUser(User $user)
    {
        $bookDetail = BookDetail::query()->get();
        $book_type = BookType::query()->get();
        $orders = Order::query()->where('user_id', $user->id)->orderBy('id' , 'desc')->get();
        $cartHead = Cart::query()->where('user_id', $user->id)->get();
        $countCart = Cart::where('user_id', $user->id)->count('id');
        $topauthor = DB::table('authors')
            ->select('authors.id', 'authors.name', 'authors.image', DB::raw('COUNT(books.id) as book_count'))
            ->leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->groupBy('authors.id', 'authors.name')
            ->orderBy('book_count', 'desc')
            ->limit(3)
            ->get();
        $reviews = Review::query()->get();
        return view('user.order.index', compact('orders','cartHead', 'countCart', 'reviews', 'bookDetail', 'book_type', 'topauthor'));
    }


}
