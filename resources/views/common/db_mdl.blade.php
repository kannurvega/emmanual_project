<style>
#res_tbl_db tr th{
    padding:2px;
}
#res_tbl_db tr td{
    padding:2px;
}
#db_modal_body{
    

}
#stored_procedures,#db_tables{
    height:40%;
    overflow-y:scroll;
    font-size:12px;

}
.tbl_snd_sp{
    height:60vh;
    border-right:2px solid black;
}

.sp_name,.tb_name{
    margin-bottom:1px;
    border-bottom:1px solid black;
    cursor:pointer;
}

.tb_name:hover{
  background:green;
  color:white;
}

.sp_name:hover{
  background:green;
  color:white;
}

.prevent-select {
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */
}
#res_tbl_tbody_db{
    font-size:12px;
}
#thead_tbl_db{
    font-size:12px;
}
.qry_dv{
    height:60vh;
    overflow:scroll;
}
#table-list {
            border: 1px solid #ccc;
            background: white;
            position: absolute;
            max-height: 150px;
            overflow-y: auto;
            width: 100%;
            display: none;
            z-index: 10;
            margin-top: 5px;
        }
        #table-list div {
            padding: 8px;
            cursor: pointer;
        }
        #table-list div:hover {
            background-color: #f0f0f0;
        }
        #db_cntnr{
            display:none;
        }
        #login_cntnr{
            border:2px solid black;
            width:40vh;
            height:30vh;
            margin:auto;
            text-align:center;
        }
</style>
<div class="modal" id="db_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Database <span id="db_name"></span>/<span id="db_host"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="db_modal_body">
      <div id="login_cntnr">
<div>
    <h6>Login</h6>
</div>
      <input type="text" id="db_user" class="form-control input_with_ui" placeholder="Username">
      <br>
      <input type="password" id="db_pass" class="form-control input_with_ui" placeholder="Password">
      <br>
      <input type="button"  class="btn btn-sm btn-primary" value="Login" onclick="validate_login();">
<h5 class="text-danger" id="log_err"></h5>
      </div>
      <div class="container" id="db_cntnr">
	
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-3 tbl_snd_sp">

    <h6>Stored Proceure</h6>
    <div id="stored_procedures">SP</div>
    <hr>
    <h6>Tables</h6>

    <div id="db_tables">Table</div>


        </div>
        
    <div class="col-lg-9 col-md-9 col-sm-9 qry_dv">
        
    
     <div class="form-group">
        <label>Query</label>
        <textarea id="query_box" name="" rows="4" cols="80" style="width:100%"></textarea>
        <div id="table-list">ss</div>
    <input type="button"  id="rn_btn" onclick="run_query();" name="" class="btn btn-sm btn-dark" value="Run">
    <input type="button"  id="" onclick="clear_qry();" name="" class="btn btn-sm btn-danger" value="Clear">
    
      </div>
    

         
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        
    
        <table class="table  table-bordered"  id="res_tbl_db">
            <thead id="thead_tbl_db"></thead>
    
    
    <tbody id="res_tbl_tbody_db"></tbody>
        </table>
    </div>
    </div>
    
    
    </div>
    
    
    
    
 
    
    
    
    
    </div>
      </div>
     
    </div>
  </div>
</div>


<script>

$(document).ready(function () {
    
            $(document).on('keydown', function (e) {
           
                if (e.key === "F1") { 

                    e.preventDefault(); 
                    
                     $('#db_modal').modal('show');  

                     $("#db_user").focus();
                }
            });




   });

function validate_login(){

   
    var db_user = document.getElementById("db_user").value;
    var db_pass = document.getElementById("db_pass").value;

    if(db_user=='' || db_pass==''){
        document.getElementById("log_err").innerHTML = 'Please enter username and password';
  
        return false;
    }else if(db_user=='ADMIN' && db_pass=='123'){
        document.getElementById("login_cntnr").style.display = "none";
        document.getElementById("db_cntnr").style.display = "block";
        document.getElementById("query_box").focus();
        load_tb_and_sp();
      
    }else{
        document.getElementById("log_err").innerHTML = 'Invalid Credentials..';
    }


}



   function clear_qry(){
    document.getElementById("res_tbl_tbody_db").innerHTML = '';
    document.getElementById("thead_tbl_db").innerHTML = '';
    document.getElementById('query_box').value = '';
   }
   function load_tb_and_sp(){
    var csrfToken = '{{ csrf_token() }}';
    fetch('/fetch_sp_nd_tbl',{
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        body:1
    }).then(response => response.json())
    .then(response =>{

        var tables = response['tables'];
        var sps = response['sps'];
        var databaseHost = response['databaseHost'];
        var databaseName = response['databaseName'];


        $("#db_name").text(databaseName);
        $("#db_host").text(databaseHost);

tb_str='';
sps_str='';
for(i=0;i<tables.length;i++){

    tb_str+='<div class="tb_name prevent-select" ondblclick="set_table(this);">'+tables[i]['name']+'</div>';
}

for(k=0;k<sps.length;k++){

    sps_str+='<div class="sp_name prevent-select"  ondblclick="set_sp(this);">'+sps[k]['name']+'</div>';
 

}
$("#db_tables").html(tb_str);
$("#stored_procedures").html(sps_str);



    });

   }




   const queryText = document.getElementById('query_box');
        const tableList = document.getElementById('table-list');
      

    
        queryText.addEventListener('input', function() {
            const tableDivs = Array.from(document.querySelectorAll('.tb_name'));
            const query = queryText.value;
            const lastWord = query.split(/\s+/).pop(); 

            if (lastWord.length > 0) {
              
                const filteredTables = tableDivs.filter(tableDiv => tableDiv.textContent.toLowerCase().includes(lastWord.toLowerCase()));

                if (filteredTables.length > 0) {
                    tableList.innerHTML = filteredTables.map((tableDiv, index) => `<div data-index="${index}">${tableDiv.textContent}</div>`).join('');
                    tableList.style.display = 'block';
                    selectedIndex = -1; 
                } else {
                    tableList.style.display = 'none';
                }
            } else {
                tableList.style.display = 'none';
            }
        });
  
        tableList.addEventListener('click', function(event) {
            if (event.target.tagName.toLowerCase() === 'div') {
                const selectedTable = event.target.textContent;
                const query = queryText.value;

              
                const updatedQuery = query.replace(/\S+$/, selectedTable);
                queryText.value = updatedQuery;

           
                tableList.style.display = 'none';
            }
        });







        queryText.addEventListener('keydown', function(event) {
    event.stopPropagation();  
    if (event.ctrlKey && event.key === 'Enter') {
                event.preventDefault(); 
                run_query();  
          
                return;  
            }

    
    const items = tableList.querySelectorAll('div');
    const totalItems = items.length;

    if (event.key === 'ArrowDown') {
        if (selectedIndex < totalItems - 1) {
            selectedIndex++;
            updateSelection(items);
        }
    } else if (event.key === 'ArrowUp') {
        if (selectedIndex > 0) {
            selectedIndex--;
            updateSelection(items);
        }
    } else if (event.key === 'Enter' && selectedIndex >= 0) {
        const selectedTable = items[selectedIndex].textContent;
        const query = queryText.value;
        const updatedQuery = query.replace(/\S+$/, selectedTable);
        queryText.value = updatedQuery;
        tableList.style.display = 'none';
    }
}, true);


function updateSelection(items) {
        
            items.forEach(item => item.style.backgroundColor = 'white');
          
            items[selectedIndex].style.backgroundColor = '#e0e0e0';
        }
        document.addEventListener('click', function(event) {
            if (!tableList.contains(event.target) && event.target !== queryText) {
                tableList.style.display = 'none';
            }
        });

function set_table(elm){

    var divText = elm.textContent || elm.innerText;
    document.getElementById('query_box').value='';
    qry="select * from "+divText+";";
    document.getElementById('query_box').value=qry;

}
function set_sp(elm){

    var divText = elm.textContent || elm.innerText;
    document.getElementById('query_box').value='';
    qry=divText+"' ';";
    document.getElementById('query_box').value=qry;

}


   function run_query() {
    Qry_val=document.getElementById('query_box').value.trim();
    if(Qry_val==''){
        var loading = '<tr><td colspan="100%" style="color: red;">Query Empty..  </td></tr>';
        document.getElementById("res_tbl_tbody_db").innerHTML = loading;
        return false;
    }
    var loading = '<tr><td colspan="100%" style="color: red;">Loading.......  </td></tr>';
    document.getElementById("res_tbl_tbody_db").innerHTML = loading;
    var html = '';
    document.getElementById("res_tbl_tbody_db").innerHTML = '';
    document.getElementById("thead_tbl_db").innerHTML = '';

    var queryData = new FormData();
    queryData.append('query_box', document.getElementById('query_box').value.trim());


    var csrfToken = '{{ csrf_token() }}';

    fetch('/run_query', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        body: queryData,
    })
    .then(response => response.json())  
    .then(response => {
     
        if (response.error) {
           
            var errorHtml = '<tr><td colspan="100%" style="color: red;">' + response.message + '</td></tr>';
            document.getElementById("res_tbl_tbody_db").innerHTML = errorHtml;
        } else {
           
            var grid = response;
if(grid.length>0){
    


            var keys = Object.keys(grid[0]);

            var htm = '';
            htm += '<tr><th scope="col">Sl No</th>';
            for (var k = 0; k < keys.length; k++) {
                htm += '<th scope="col">' + keys[k] + '</th>';
            }
            htm += '</tr>';

            document.getElementById("thead_tbl_db").innerHTML = htm;

            var new_data = [];
            html = '';

            for (var i = 0; i < grid.length; i++) {
                var x = i + 1;
                html += '<tr><td>' + x + '</td>';

                new_data = Object.values(grid[i]);

                for (var j = 0; j < new_data.length; j++) {
                    html += '<td>' + new_data[j] + '</td>';
                }
                html += '</tr>';
            }

            document.getElementById("res_tbl_tbody_db").innerHTML = html;

        }
        else{
            var errorHtml = '<tr><td colspan="100%" style="color: red;">No Record Found.. </td></tr>';
            document.getElementById("res_tbl_tbody_db").innerHTML = errorHtml;
        }
        }
    })
    .catch(error => {

        var errorHtml = '<tr><td colspan="100%" style="color: red;">An error occurred: ' + error.message + '  '+error.error+'  </td></tr>';
        document.getElementById("res_tbl_tbody_db").innerHTML = errorHtml;
    })
    .finally(() => {
      
    });
}


</script>



