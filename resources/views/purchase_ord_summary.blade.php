@extends('layouts.main')
@section('pageTitle', 'Vega Soft')
@section('pageName',  $menu_name )
@section('page-content')
<style>

.bdy_dv{
    height:91%;

    font-size: 13px;
}.bdy_dv,.product_lst{
    height:90%;

}
.pu_ordl_lst_tr:hover{
    background:grey;
    color:white;
    cursor:pointer;
}
.pu_ordl_lst_tr_sel{
    background:grey;
    color:white;
}
#rec_tbl tr td {
  padding: 5px !important;
  vertical-align: middle;
}
.product_lst,.pu_ord_list{
    height:80vh;overflow-y:scroll;
    scrollbar-width: none;
}
.product_lst{
    overflow-x:scroll;
}
.product_lst table thead{
    background: #bdb64f;
}
.pu_ord_list{
    border-right:3px solid black;
}
.pu_ord_list table thead{
    background: #b98c8c;
}
.form_div{
    overflow:hidden !important;
}
.hdr_label_dv{
    text-align:center;
    width: 80%;
}
.btn-group{
    float:right;
}
</style>

<!-- <input type="hidden" value="Edit" class="additional_btn" color="bg-warning" btn_clk="set_edit_form">
<input type="hidden" value="Delete" class="additional_btn" color="bg-danger" btn_clk="set_delete_form"> -->
 <section>
  

<input type="hidden" id="hidden_status" value="0" />
<input type="hidden" id="menu_prefix" value="" />
<input type="hidden" id="row_id" value="0" />
<input type="hidden" id="menu_id" value="{{$id}}" />
<input type="hidden" id="menu_type" value="{{$typ}}" />
<input type="hidden" id="sp_name" value="{{$sp_name}}" />

</section>

<section class="form_div">

<div class="col-lg-12 col-md-12 col-sm-12 col-12 hdr_dv">
<div class="row">
    <div class="col-lg-4 col-md-4 col-m-4 col-4">

  
<div class="form-group row">

<label for="sup_name" class="col-sm-3 col-md-4 col-lg-3 ">Supplier</label>
<div class="col-sm-6 col-md-6 col-lg-6 col-6">
  <input type="text" class="form-control  validate ser-sup_hdr input_text" id="sup_name" sup_id="0" onclick="open_new_supplier_modal();">
  <div class="text-danger error_txt" id="sup_name_error"></div>




</div>
<div class="col-lg-2 col-md-2 col-sm-2 col-2"><button type="button" onclick="load_purchase_order_list();" class="btn btn-sm btn-success ml-1"><i class="fa fa-search"></i></button></div>


</div>

</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-3">

<div class="row">

  <label for="" class="col-lg-3 col-sm-3 col-md-3 col-3">
    From
  </label>
  <div class="col-lg-9 col-sm-9 col-md-9 col-9">
  <input style="height: 23px;" type="text" class="form-control   date_class"  onchange="load_purchase_order_list();"value="<?php echo date('d-M-Y', strtotime('-30 days')); ?>" id="frm_date" >

  </div>
  </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-3 col-3">

<div class="row">

<label for="" class="col-lg-3 col-sm-3 col-md-3 col-3">
  TO
</label>
<div class="col-lg-9 col-sm-9 col-md-9 col-9">
<input style="height: 23px;" type="text" class="form-control   date_class" onchange="load_purchase_order_list();" value="{{date('d-M-Y')}}" id="till_date" >

</div>
</div>
</div>
<div class="col-lg-2 col-md-2 col-sm-2 col-2">

<select style="height: 23px;" name="" class="form-control" id="sel_sts" onchange="filter_po_list();">

<option value="0" selected>All</option>
<option value="1">Pending</option>
<option value="2">Verified</option>
</select>
</div>




    </div>


</div>
<div class="hdr_label_dv">

<span id="po_no_lbl">PO NO</span>


</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 bdy_dv">

<div class="row" style="width:100%;">

<div class="col-lg-4 col-md-4 col-sm-4 col-4 pu_ord_list">
    <table class="table">
<thead>
    <tr>
        <th>Po Number</th>
        <th>Po Date</th>
        <th>Items</th>
    </tr>


</thead>


<tbody id="pu_ord_list">


</tbody>

    </table>


</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-8 product_lst">

<table class="table" id="product_list_tbl">

<thead>

<th>PO Code</th>
<th>Item Name</th>
<th>Group</th>
<th>Sub Group</th>
<th class="text-right">Qty</th>
<th class="text-right">Rate</th>
<th class="text-right">MRP</th>
<th class="text-right">Value</th>
</tr>

</thead>

<tbody id="product_list_tbdy">


</tbody>

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

@include('common.supplier_modal')

<script>

function filter_sup_list(){
  
  load_purchase_order_list();
}


function load_purchase_order_list(){
    $("#pu_ord_list").html('<img src="../../images/loading.gif" alt="" style="margin-left:45%;">');
    $.ajax({
        url: "/load_purchase_order_list",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
          
            sup_id:$("#sup_name").val().trim(),
            dt1:$("#frm_date").val().trim(),
            dt2:$("#till_date").val().trim(),
            sts:$("#sel_sts").val()
          
            
        
        },
        success:function(response){
        
            if(response.length==0){
    $("#pu_ord_list").html('<img src="../../images/no_data.gif" alt="" style="margin-left:45%;">');

            }
            else{
              

tr='';
$(response).each(function(key,val){

tr+='<tr class="pu_ordl_lst_tr" po_code="'+val['TLN00_Code']+'" onclick="load_products_of_po(this);">';
tr+='<td>'+val['TLN15_PO No']+'</td>';
tr+='<td>'+val['DLN10_PO Date']+'</td>';
tr+='<td>'+val['ICN10_Item Count']+'</td>';
tr+='/<tr>';
    
});

                $("#pu_ord_list").html(tr);
             
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



function load_products_of_po(elm){
    po_code=$(elm).attr('po_code');
    $(".pu_ordl_lst_tr").removeClass('pu_ordl_lst_tr_sel');
    $(elm).addClass('pu_ordl_lst_tr_sel');

    $("#product_list_tbdy").html('<img src="../../images/loading.gif" alt="" style="margin-left:45%;">');
    $.ajax({
        url: "/load_products_of_po",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
          
            po_code:po_code
          
            
        
        },
        success:function(response){
        
            if(response.length==0){
    $("#product_list_tbdy").html('<img src="../../images/no_data.gif" alt="" style="margin-left:45%;">');

            }
            else{
       
tr='';
$(response).each(function(key,val){

tr+='<tr>';
tr+='<td>'+val['TLN10_Code']+'</td>';
tr+='<td>'+val['TLN20_ItemName']+'</td>';
tr+='<td>'+val['TLN10_Group']+'</td>';
tr+='<td>'+val['TLN10_SubGrop']+'</td>';
tr+='<td class="text-right">'+val['CRY10_Qty']+'</td>';
tr+='<td class="text-right">'+val['CRN10_Rate']+'</td>';
tr+='<td class="text-right">'+val['CRN10_MRP']+'</td>';
tr+='<td class="text-right">'+val['CRY15_Value']+'</td>';
tr+='</tr>';


})



            $("#product_list_tbdy").html(tr);
      

           //let table = new DataTable('#product_list_tbl');
           new DataTable('#product_list_tbl', {
    dom: '<"d-flex justify-content-between align-items-center"lBf>rtip',
    buttons: [
        {
            extend: 'copyHtml5',
            title: 'Product List'
        },
        {
            extend: 'excelHtml5',
            title: 'Product List'
        },
        {
            extend: 'csvHtml5',
            title: 'Product List'
        },
        {
            extend: 'pdfHtml5',
            title: 'Product List'
        },
        {
            extend: 'print',
            title: 'Product List'
        }
    ]
});
             
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


</script>

@endsection

