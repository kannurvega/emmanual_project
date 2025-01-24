@extends('layouts.main')
@section('pageTitle', 'Vega Soft')
@section('pageName',  $menu_name )
@section('page-content')

<style>

.frm_cntrl_dv{

    height:70vh;
    border:1px solid #0a1c2e;
    width:100vh;
    margin-left:auto;
    margin-right:auto;
    border-radius:5px;
    box-shadow: 4px 4px 15px rgba(0, 0, 0, 0.36), -4px -4px 15px rgba(0, 0, 0, 0.43); 
    transition: all 0.3s ease;
    
}
.frm_cntrl_dv_hdr{
    height:30px;width:100%;background:#0a1c2e;
}
.form_elements{
    height:25%;
    border-bottom:1px solid #0a1c2e;
    margin-top:10px;
}
.form_elements_list{
    height:65%;
overflow-y:scroll;
padding:5px;
}
.form_elements_list table tr th,.form_elements_list table tr td{
  padding:3px;

}
</style>

<input type="hidden" value="Edit" class="additional_btn" color="bg-warning" btn_clk="set_edit_form">
<input type="hidden" value="Delete" class="additional_btn" color="bg-danger" btn_clk="set_delete_form">
 <section>
  

<input type="hidden" id="hidden_status" value="0" />
<input type="hidden" id="menu_prefix" value="" />
<input type="hidden" id="row_id" value="0" />
<input type="hidden" id="menu_id" value="{{$id}}" />
<input type="hidden" id="menu_type" value="{{$typ}}" />
<input type="hidden" id="sp_name" value="{{$sp_name}}" />

</section>

<section class="form_div">


<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="frm_cntrl_dv">
<div class="frm_cntrl_dv_hdr">&nbsp;</div>
<div class="form_elements">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-6">
<div class="form-group row">

<label for="name" class="col-sm-4 col-md-4 col-lg-4  col-form-label text-left">Name <span class="text-danger">*</span></label>
<div class="col-sm-8 col-md-8 col-lg-8 col-8">
  <input type="text" class="form-control  input_with_ui input-text" id="name" party_id="0" >
  <div class="text-danger error_txt" id="name_error"></div>




</div>


</div>

</div>
<div class="col-lg-5 col-md-5 col-sm-5 col-5">

<div class="form-group row">

<label for="short" class="col-sm-4 col-md-4 col-lg-4  col-form-label text-left">Short </label>
<div class="col-sm-8 col-md-8 col-lg-8 col-8">
  <input type="text" class="form-control  input_with_ui input-text" id="short" party_id="0" >
  <div class="text-danger error_txt" id="short_error"></div>




</div>


</div>

</div>

</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center mt-4">


<div class="btn-group" role="group" aria-label="Basic example">
  <!-- <button type="button" class="btn btn-sm btn-success ml-1" >New</button> -->
  <button type="reset" class="btn btn-sm btn-secondary ml-1">Reset</button>
  <button type="button" class="btn btn-sm btn-success ml-1 input_with_ui"  onclick="submit_save_form();">Save</button>

</div>

</div>

</div>
<div class="form_elements_list">
<table class="table  table-bordered"  id="res_tbl_frm">
            <thead id="thead_tbl_frm"></thead>
    
    
    <tbody id="res_tbl_tbody_frm"></tbody>
        </table>

</div>

</div>



    </div>


</div>








</section>


<section class="page-foooter">

<div class="col-lg-12 col-md-12 col-sm-12 col-12 btn_foot row mb-3 ml-1">
   
      </div>
</section>




<section class="list_view" id="list_view">






</section>

  



@endsection
@section('page-script')




<script>

$("#name").focus();

fetch_table_view();
function submit_save_form(){
status=0;

if($("#name").val().trim()==''){

status=1;
$("#name_error").text("Name is Required..");
return false;
}

if(status==0){
   
save_form();

}

}

function save_form(){
  $.ajax({
url: "/batch_nd_sub_grp_save",
type: "POST",
headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        
data:{
  
    row_id:$("#row_id").val(),
    hidden_status:$("#hidden_status").val(),
    menu_type:$("#menu_type").val(),
    menu_id:$("#menu_id").val(),
    m_name:$("#name").val().trim(),
    m_code:$("#short").val().trim()

},
success:function(response){



flag=response[0]['Result_Status'];
msg=response[0]['Remarks'];


if(flag==1){
$(".input-text").val('');
$("#row_id").val(0);
$("#hidden_status").val(0);

alert(msg);
fetch_table_view();
//alertify.notify($(".page-title").text()+' '+msg, 'success', 5);
}else{
   // alertify.notify($(".page-title").text()+' '+msg, 'error', 5);
}


},
error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#_error').text(value[0]);                        });
                    }
                }
});


}
function edit_row(row_id,elm){


$("#row_id").val(row_id);
$("#hidden_status").val(1);
cells=$(elm).closest('tr').find('td');
var headers = $("#thead_tbl_frm th");
var rowData = {};
$(cells).each(function(key,val){

  var headerName = $(headers[key]).text().trim();
  rowData[headerName] = $(val).text().trim();


})
$("#name").val(rowData['Batch_CatName']);
$("#short").val(rowData['Batch_CatCode']);

}



</script>


@endsection

