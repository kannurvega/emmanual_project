<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PDO;


class db_controller extends Controller
{

    public function __construct()
    {
        $connection = DB::connection('sqlsrv');
    }


    function db_chk(){
        return 1;
    }

public function run_db_qry($qry){


    try {

        $pdo = new PDO('sqlsrv:Server=103.177.225.245,54321;Database=TrafiqPro_PO_Emm', 'sa', '##v0e3g9a#');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare($qry);


    $stmt->execute();


    $nxt_row = 0;
    $result = [];


    // if ($stmt->nextRowset() === true) {
    //     $nxt_row = 1;
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
       
    // } else {
    //     $stmt->execute();
       
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);



    if (empty($result)) {
$result=[];
    } else {
     
        // dd($result);  g
    }



$pdo = null;
return $result;

    } catch (QueryException $e) {
  
        return response()->json([
            'message' => 'Error executing query',
            'error' => $e->getMessage()
        ], 500);

    } catch (\Exception $e) {
        
        return response()->json([
            'message' => 'An unexpected error occurred',
            'error' => $e->getMessage()
        ], 500);
    }

}



    public function run_query(Request $request)
{
    
 $qry = $request->query_box;
    
try {

        $pdo = new PDO('sqlsrv:Server=103.177.225.245,54321;Database=TrafiqPro_PO_Emm', 'sa', '##v0e3g9a#');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare($qry);


    $stmt->execute();


    $nxt_row = 0;
    $result = [];

  
    // if ($stmt->nextRowset() === true) {
    //     $nxt_row = 1;
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    // } else {
    //     $stmt->execute();
       
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    if (empty($result)) {
        $result=[];
    } else {
     
        // dd($result);  g
    }



$pdo = null;
return response()->json($result);

    } catch (QueryException $e) {
  
        return response()->json([
            'message' => 'Error executing query',
            'error' => $e->getMessage()
        ], 500);

    } catch (\Exception $e) {
        
        return response()->json([
            'message' => 'An unexpected error occurred',
            'error' => $e->getMessage()
        ], 500);
    }
}
    public function run_query_old(Request $request){
        


    }
 











public function fetch_sp_nd_tbl(){

    $tables = DB::select("select name from sys.tables ORDER BY name;");
    $sps= DB::select("select name FROM sys.procedures ORDER BY name");
    $databaseName = DB::getDatabaseName();
        
   
    $databaseHost = '';
     return response()->json(array('tables'=>$tables,'sps'=>$sps,'databaseName'=>$databaseName,'databaseHost'=>$databaseHost));
    // $data = array('tables' => $tables, 'sps' => $sps);
    // $encryptedData = Crypt::encrypt($data);

   
    // return response()->json(['encrypted_data' => $encryptedData]);

}






}
