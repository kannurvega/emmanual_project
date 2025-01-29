<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class LoginController extends Controller
{
    public function __construct()
    {
        $connection = DB::connection('sqlsrv');
    }




    public function check_login(Request $request){

$Staff_Pwd=trim($request->Staff_Pwd);
$Staff_Code=trim($request->Staff_Code);
$Sys_CompanyID=$request->Sys_CompanyID;

$result = DB::select("SET NOCOUNT ON; EXEC Wb_Proc_StaffLogin '$Sys_CompanyID','$Staff_Code','$Staff_Pwd'");

if(sizeof($result)==1){
 session([
            'Staff_ID' => $result[0]->Staff_ID,
            'Staff_Type' => $result[0]->Staff_Type,
            'Staff_Name' => $result[0]->Staff_Name,
            'Branch_ID' => $result[0]->Branch_ID,
            'Branch_Name' => $result[0]->Branch_Name,
            'Staff_Menu' => $result[0]->Staff_Menu
           
        ]);
        return redirect()->route('backend_index');
    }
else{
    return redirect()->route('login')
    ->withErrors(['login_error' => 'Invalid Login Credentials']);


    }
}





public function logout(Request $request){

    session()->flush();
    return redirect()->route('login');

}


}