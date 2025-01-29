<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $connection = DB::connection('sqlsrv');
        // $menuItems = [
        //     ['module_id' => '12','module_url' => 'purchase_order', 'module_prefix' => 'PO', 'menu_type' => 2, 'module_name' => 'Purchase Order','sp_name' => ''],
        //     ['module_id' => '2','module_url' => 'batchGroup', 'module_prefix' => 'BG', 'menu_type' => 2, 'module_name' => 'Batch Group','sp_name' => ''],
        //     ['module_id' => '5','module_url' => 'subGroup', 'module_prefix' => 'SG', 'menu_type' => 2, 'module_name' => 'Sub Group','sp_name' => ''],
        //     ['module_id' => '8','module_url' => 'grouped_report', 'module_prefix' => 'rp', 'menu_type' => 2, 'module_name' => 'Report','sp_name' => '']
        // ];
    }

public function purchase_order($id,$typ)
{    $menu_name='Purchase Order';
    $sp_name='';
    return view('PurchaseOrder',compact('id','typ','menu_name','sp_name'));  

}
public function batchGroup($id,$typ)
{
    $menu_name='Batch Group';
    $sp_name='Wb_Proc_GetBatchCatagory';
    return view('batchGroupndSgroup',compact('id','typ','menu_name','sp_name'));  

}
public function subGroup($id,$typ)
{
    $menu_name='Sub Group';
    $sp_name='Wb_Proc_GetBatchSubCatagory';

    return view('batchGroupndSgroup',compact('id','typ','menu_name','sp_name'));  

}
public function login(){

$result = DB::select('EXEC Wb_Proc_GetCompanyInfo @REGKEY = ?', ['1']);
$Sys_CompanyName=$result[0]->Sys_CompanyName;
    $Sys_CompanyID=$result[0]->Sys_CompanyID;
    session([
'Sys_CompanyName'=>$Sys_CompanyName,
'Sys_CompanyID'=>$Sys_CompanyID,
'decimal_place'=>2
    ]);

        return view('auth.login',compact('Sys_CompanyName','Sys_CompanyID'));
    }
    


public function backend_index(){


    return view('backend_index');
}





}
