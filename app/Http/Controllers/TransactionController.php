<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\db_controller;

class TransactionController extends Controller
{
    public function __construct()
    {
     
        $this->dbController = new db_controller();


    }




public function save_pu_header(Request $request){

$row_id=$request->row_id;
$hidden_status=$request->hidden_status;
$sup_id=$request->sup_id;
$notes=$request->notes;
$t_date=$request->t_date;
$po_code=$request->po_code;
if($po_code==0){
    $po_code='';
}
$po_status=$request->po_status;
if($hidden_status==2){
    $po_status=1;
}

$staffName = Session::get('Staff_Name');
$Staff_ID = Session::get('Staff_ID');
$branchID = Session::get('Branch_ID');
$Sys_CompanyID = Session::get('Sys_CompanyID');

$result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_Save_PurchaseOrder '$Sys_CompanyID','$po_code','$t_date',$Staff_ID,'$sup_id','$notes',$po_status,'$staffName',$branchID");


return $result;

}




public function save_product_po(Request $request){
    $po_code=$request->po_code;
    $pro_code=$request->pro_code;
    $pro_batch_gp=$request->pro_batch_gp;
    $pro_batch_sub_sp=$request->pro_batch_sub_sp;
    $buyer_id=$request->buyer_id;
    $sup_id=$request->sup_id;
    $prd_hsn=$request->prod_hsn;
    $prd_tax_code=$request->prd_tax_code;
    $prd_ean_code=$request->prod_ean;
    $prd_brand=$request->prd_brand;
    $prd_fit=$request->prd_fit;
    $prd_shape=$request->prd_shape;
    $prd_style=$request->prd_style;
    $prd_size=$request->prd_size;
    $prd_color=$request->prd_color;
    $prd_desc=$request->prd_desc;
    $prd_qty=$request->prd_qty;
    $prd_rate=$request->prd_rate;
    $prd_value=$request->prd_value;
    $prd_taxperc=$request->prd_taxperc;
    $prd_mrp=$request->prd_mrp;
    $pmdl_batch_code=$request->pmdl_batch_code;
$row_id=$request->pmdl_batch_code;
    $hidden_status=$request->pmdl_hidden_status;
    $row_id=$request->row_id;

    $status=0;
if($hidden_status==2){
    $status=1;
}

    $staffName = Session::get('Staff_Name');
$Staff_ID = Session::get('Staff_ID');
$branchID = Session::get('Branch_ID');
$Sys_CompanyID = Session::get('Sys_CompanyID');



$result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_Save_PO_Batch_Rev '$Sys_CompanyID','$po_code','$pmdl_batch_code',$row_id,'$pro_code',
$pro_batch_gp,$pro_batch_sub_sp,$Staff_ID,'$sup_id','$prd_hsn','$prd_tax_code','$prd_ean_code','$prd_brand','$prd_fit',
'$prd_shape','$prd_style','$prd_size','$prd_color','$prd_desc',$prd_qty,$prd_rate,$prd_value,$prd_taxperc,$prd_mrp,'$staffName',$branchID,$status");


return $result;


}






public function save_branch_split_qty(Request $request){
    $po_code=$request->po_code;
    $pmdl_batch_code=$request->pmdl_batch_code;
    $pmdl_batch_code=$request->pmdl_batch_code;
    $pmdl_row_id=$request->pmdl_row_id;

    $status=0;
    $barr=$request->barr;
    $staffName = Session::get('Staff_Name');
    $Staff_ID = Session::get('Staff_ID');
    
    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $result='';
    foreach ($barr as $key => $value) {
        $b_qty=$value['b_qty'];
        $branchID=$value['branchID'];
        $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_Save_Branch_Splitup '$Sys_CompanyID','$po_code','$pmdl_batch_code',$pmdl_row_id,$b_qty,$status,'$staffName',$branchID");

    }



  return $result;


}





public function validate_po_order(Request $request){

    $staffName = Session::get('Staff_Name');
    $Staff_ID = Session::get('Staff_ID');
    
    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $po_code=$request->po_code;
    $sup_id=$request->sup_id;
    $t_date=$request->t_date;
    $status=1;
    $branchID = Session::get('Branch_ID');
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_Save_POStatus '$Sys_CompanyID','$po_code','$t_date',$Staff_ID,'$sup_id',$status,'$staffName',$branchID");

return $result;
    
}




}
