<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $connection = DB::connection('sqlsrv');
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
