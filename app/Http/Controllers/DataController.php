<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\db_controller;
class DataController extends Controller
{
    public function __construct()
    {
        // $connection = DB::connection('sqlsrv');
        $this->dbController = new db_controller();


    }


public function fetch_table_view(Request $request){
    $sp_name=$request->sp_name;
$param1=$request->param1;
$param2=$request->param2;
$result = $this->dbController->run_db_qry("$sp_name '$param1','$param2'");

return $result;




}


    public function batch_nd_sub_grp_save(Request $request){

  
        $table_name='';
        $menu_type=$request->menu_type;
        $m_code=$request->m_code;
        $m_name=$request->m_name;
        $hidden_status=$request->hidden_status;
        $row_id=$request->row_id;
        $del_status=0;
        $UUID=123;

        $staffName = Session::get('Staff_Name');
        $branchID = Session::get('Branch_ID');
        $Sys_CompanyID = Session::get('Sys_CompanyID');

    $flag=0;
    $msg='';
    $result='';
    $res1='';
        if($menu_type=='BG'){
          
if($hidden_status==0){
$row_id=0;
$del_status=0;


}else if($hidden_status==1){
    $row_id=$row_id;
    $del_status=0;

}else{

    $row_id=$row_id;
    $del_status=1;
}
$result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_Save_BatchCatagory '$Sys_CompanyID',$row_id,'$m_code','$m_name',$del_status,$UUID,'$staffName',$branchID");
$res1=$result;
}



else if($menu_type=='SG'){
    
    if($hidden_status==0){
    $row_id=0;
    $del_status=0;
    
    
    }else if($hidden_status==1){
        $row_id=$row_id;
        $del_status=0;
    
    }else{
    
        $row_id=$row_id;
        $del_status=1;
    }
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_Save_BatchSubCatagory '$Sys_CompanyID',$row_id,'$m_code','$m_name',$del_status,$UUID,'$staffName',$branchID");
    $res1=$result;
        }


    
    return $res1;
    
    }




public function get_supplier_det(Request $request){
    $term=$request->term;
    $branch_id=$request->branch_id;
    $company_id=$request->company_id;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_GetSupplier '$company_id','$term'");
    return $result;
}



public function fetch_product_details(Request $request){
    $staffName = Session::get('Staff_Name');
    $branchID = Session::get('Branch_ID');
    $Sys_CompanyID = Session::get('Sys_CompanyID');
$product_Code=$request->product_Code;
$result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_GetItem '$Sys_CompanyID','$product_Code'");
return $result;

}





public function load_batch_group(Request $request){
    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $ser_val=$request->ser_val;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_GetBatchCatagory '$Sys_CompanyID','$ser_val'");
    return $result;






}
public function load_batch_sub_group(Request $request){
    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $ser_val=$request->ser_val;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_GetBatchSubCatagory '$Sys_CompanyID','$ser_val'");
    return $result;



}

public function load_purchase_order_list(Request $request){

    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $Staff_ID = Session::get('Staff_ID');
    $sup_id=$request->sup_id;
    $dt1=$request->dt1;
    $dt2=$request->dt2;
    $sts=$request->sts;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_List_PO '$Sys_CompanyID',$Staff_ID,'$sup_id','$dt1','$dt2',$sts");
    return $result;
}




public function load_products_of_po(Request $request){
    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $Staff_ID = Session::get('Staff_ID');
    $branchID = Session::get('Branch_ID');
    $po_code=$request->po_code;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_List_PO_Item '$Sys_CompanyID','$po_code',$branchID");
    return $result;
}

public function load_po_header_det(Request $request){
    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $Staff_ID = Session::get('Staff_ID');
    $branchID = Session::get('Branch_ID');
    $po_code=$request->po_code;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_Get_PO_Header '$Sys_CompanyID','$po_code',$branchID");
    return $result;
}

public function load_product_det(Request $request){
    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $Staff_ID = Session::get('Staff_ID');
    $branchID = Session::get('Branch_ID');
    $po_code=$request->po_code;
    $prd_code=$request->prd_code;
    $po_row=$request->po_row;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_Get_PO_Batch_Details '$Sys_CompanyID','$po_code','$prd_code',$po_row,$branchID");
    return $result;
}



public function load_branches(Request $request){
    $Sys_CompanyID = Session::get('Sys_CompanyID');
$ser_val=$request->ser_val;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_GetBranch '$Sys_CompanyID','$ser_val'");
    return $result;

}



public function load_brnch_split(Request $request){
    $Sys_CompanyID = Session::get('Sys_CompanyID');
    $Staff_ID = Session::get('Staff_ID');
    $branchID = Session::get('Branch_ID');

    $po_code=$request->po_code;
    $po_batch_code=$request->po_batch_code;
    $po_row_id=$request->po_row_id;
    $result = $this->dbController->run_db_qry("SET NOCOUNT ON; EXEC Wb_Proc_GetBranchSplit '$Sys_CompanyID','$po_code','$po_batch_code',$po_row_id");
    return $result;
    
}




}
