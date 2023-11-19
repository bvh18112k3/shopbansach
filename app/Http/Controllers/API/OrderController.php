<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function sum()
    {
        $date = date('Y');
        for ($i = 1; $i <= 12; $i++) {
            $num = cal_days_in_month(CAL_GREGORIAN, $i, $date);
            $data[] = DB::select("SELECT SUM(total_money) as total FROM `orders`WHERE order_status = 3 AND created_at BETWEEN '$date-$i-1' AND '$date-$i-$num'");
        }
        foreach ($data as $d){
            foreach ($d as $t){
                if($t->total == null){
                    $total[] = 0;
                }else{
                    $total[] = $t->total;
                }

            }
        }
        $day = array();
        for ($i = 1; $i<=12; $i++){
            array_push($day, $i);
        }
        $sum = [
            'month'=>$day,
            'total'=>$total
        ];
        return response()->json($sum);
    }
}
