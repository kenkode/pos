<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Item;
use App\Stock;
use App\Client;
use App\Order;
use App\Orderitem;
use App\Organization;
use App\User;
use PDF;

class ReportsController extends Controller
{
    //
    public function items(){
        $items = Item::orderBy('id','DESC')->get();
        $bar = "reports";
        $organization = Organization::find(1);
        $view = \View::make('reports.items',compact('items','organization','f','t'));
        $html = $view->render();

        PDF::setFooterCallback(function($pdf) {

        // Position at 15 mm from bottom
        $pdf->SetY(-15);
        // Set font
        $pdf->SetFont('helvetica', 'I', 8);
        // Page number
        $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });

        //$pdf = new TCPDF();
        PDF::SetTitle('Items');
        PDF::AddPage('L');
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('items.pdf');
    }

    public function categories(){
        $categories = Category::orderBy('id','DESC')->get();
        $bar = "reports";
        $organization = Organization::find(1);
        $view = \View::make('reports.categories',compact('categories','organization','f','t'));
        $html = $view->render();

        PDF::setFooterCallback(function($pdf) {

        // Position at 15 mm from bottom
        $pdf->SetY(-15);
        // Set font
        $pdf->SetFont('helvetica', 'I', 8);
        // Page number
        $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });

        //$pdf = new TCPDF();
        PDF::SetTitle('Categories');
        PDF::AddPage('P');
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('categories.pdf');
    }

    public function suppliers(){
        $suppliers = Client::orderBy('id','DESC')->get();
        $bar = "reports";
        $organization = Organization::find(1);
        $view = \View::make('reports.suppliers',compact('suppliers','organization','f','t'));
        $html = $view->render();

        PDF::setFooterCallback(function($pdf) {

        // Position at 15 mm from bottom
        $pdf->SetY(-15);
        // Set font
        $pdf->SetFont('helvetica', 'I', 8);
        // Page number
        $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });

        //$pdf = new TCPDF();
        PDF::SetTitle('Suppliers');
        PDF::AddPage('L');
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('suppliers.pdf');
    }

    public function users(){
        $users = User::orderBy('id','DESC')->get();
        $bar = "reports";
        $organization = Organization::find(1);
        $view = \View::make('reports.users',compact('users','organization','f','t'));
        $html = $view->render();

        PDF::setFooterCallback(function($pdf) {

        // Position at 15 mm from bottom
        $pdf->SetY(-15);
        // Set font
        $pdf->SetFont('helvetica', 'I', 8);
        // Page number
        $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });

        //$pdf = new TCPDF();
        PDF::SetTitle('Users');
        PDF::AddPage('P');
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('Users.pdf');
    }

    public function salesperiod(){
        $bar  = "sales report";
        return view('reports.salesperiod',compact('bar'));
    }

    public function sales(Request $request){

        $from = date('Y-m-d', strtotime($request->from));
        $to = date('Y-m-d', strtotime($request->to));

        $orders = Order::orderBy('id','DESC')->whereBetween('date', array($from, $to))->get();
        $organization = Organization::find(1);
        $view = \View::make('reports.sales',compact('orders','organization','from','to'));
        $html = $view->render();

        PDF::setFooterCallback(function($pdf) {

        // Position at 15 mm from bottom
        $pdf->SetY(-15);
        // Set font
        $pdf->SetFont('helvetica', 'I', 8);
        // Page number
        $pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });

        //$pdf = new TCPDF();
        PDF::SetTitle('Sales');
        PDF::AddPage('L');
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output('sales_'.$from.'_'.$to.'.pdf');
    }

    public function receipt($id){
        
        $orderitems = Orderitem::where('order_id', $id)->get();
        $order = Order::find($id);
        $organization = Organization::find(1);
        $view = \View::make('reports.receipt',compact('orderitems','order','organization','f','t'));
        $html = $view->render();

        PDF::setFooterCallback(function($pdf) use ($organization){

        // Position at 15 mm from bottom
        $pdf->SetY(-15);
        // Set font
        $pdf->SetFont('helvetica', 'I', 6);
        // Page number
        $pdf->Cell(0, 10, $organization->receipt_footer, 0, false, 'C', 0, '', 0, false, 'T', 'M');

        });

        //$pdf = new TCPDF();
        PDF::SetTitle('Receipt');
        PDF::AddPage('P','A7');
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::Output($order->order_no.'_receipt.pdf');
    }

    public function store(Request $request){

        $stock = new Stock;

        $stock->item_id       = $request->item;
        $stock->quantity_in   = $request->quantity;
        $stock->date          = date('Y-m-d',strtotime(date('Y-m-d',strtotime($request->date))));
        $stock->user_id       = Auth::user()->id;
        $stock->save();

        return Redirect::to('/stocks')->withFlashMessage('Stock successfully added!');
    }

    public function show($id){
        $stock = Item::find($id);
        $bar  = "stocks";
        return view('stocks.show',compact('stock','bar'));
    }

    public function edit($id){
        $stock = Stock::find($id);
        $bar   = "stocks";
        $items = Item::all();
        return view('stocks.edit',compact('stock','items','bar'));
    }

    public function update(Request $request,$id){
        $stock = Stock::find($id);

        $stock->item_id       = $request->item;
        $stock->quantity_in   = $request->quantity;
        $stock->date          = date('Y-m-d',strtotime(date('Y-m-d',strtotime($request->date))));
        
        $stock->update();

        return Redirect::to('/stocks')->withFlashMessage('Stock successfully updated!');
    }

    public function destroy($id){
        Stock::destroy($id);
        return Redirect::to('/stocks')->withFlashMessage('Stock successfully deleted!');
    }

}
