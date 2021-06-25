<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;
class ReportController extends Controller
{
    public function AllReports(){
     return view('Backend.report.report_view');

    } // end method


    /// search by date

    public function ReportsDate(Request $request){
        // dd($request->all());

        $date=new DateTime($request->date);
        $formatDate=$date->format('d F Y');
        // return $formatDate;
        $order=Order::where('order_date',$formatDate)->latest()->get();
        return view('Backend.report.report_show',compact('order'));


    } // end method

    /// serach by month and  year


    public function ReportsMonth(Request $request){
        $order=Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('Backend.report.report_show',compact('order'));

    } // end method

  /// search by year

  public function ReportsYear(Request $request){

  $order=Order::where('order_year',$request->year)->latest()->get(); 
  return view('Backend.report.report_show',compact('order'));
  } // end method

}
