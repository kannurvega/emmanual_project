<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Query</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
   
<div class="container">
	
<div class="row">
	
<div class="col-lg-3">
	

 <div class="form-group">
    <label>Query</label>
    <textarea id="query_box" name="" rows="4" cols="80"></textarea>

<input type="button" onclick="run_query();" name="" class="btn btn-md btn-dark" value="Run">

  </div>

</div>


</div>



<div class="col-lg-5 offset-lg-4">
	

	

</div>

<div id="data"></div>
<div class="col-lg-12">
	

	<table class="table table-responsive table-bordered"  id="res_tbl">
		<thead id="thead_tbl"></thead>


<tbody id="res_tbl_tbody"></tbody>
	</table>
</div>




</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  </body>
</html>


<script type="text/javascript">

$("#loding_gif").hide();
	function run_query(){


html='';
$("#res_tbl_tbody").html('');
$("#thead_tbl").html('')
$("#loding_gif").show();

$.ajax({
                type: 'POST',
                url: '/load_data',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                   query_box: $('#query_box').val().trim()                   
                 
                },
                error: function (request, error) {
                    alert("Please Wait, Loading...");
                },
                success: function (response) {


// data=JSON.parse(response);
// console.log(data)

// console.log(response);

data=response; 


grid=data;

keys=Object.keys(grid[0]);

htm='';
htm+='<tr><th scope="col">Sl No</th>';
for(k=0;k<keys.length;k++){



htm+='<th scope="col">'+keys[k]+'</th>';


}
htm+='</tr>';

$("#thead_tbl").html(htm);


new_data=[];

for(i=0;i<grid.length;i++){

x=i+1;

html+='<tr><td>'+x+'</td>';

new_data=Object.values(grid[i]);

for(j=0;j<new_data.length;j++){

html+='<td>'+new_data[j]+'</td>';


}
html+='</tr>';

}

$("#res_tbl_tbody").html(html);
                }
                    
         }); 

	}
	

	       
    














                






</script>
