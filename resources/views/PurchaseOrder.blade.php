@extends('layouts.main')
@section('pageTitle', 'Vega Soft')
@section('pageName',  $menu_name )
@section('page-content')


<link rel="stylesheet" href="{{ asset('project-css/purchase_order.css') }}">
<input type="hidden" value="Edit" class="additional_btn" color="bg-warning" btn_clk="set_edit_form">
<input type="hidden" value="Delete" class="additional_btn" color="bg-danger" btn_clk="set_delete_form">
 <section>
  

<input type="hidden" id="hidden_status" value="0" />
<input type="hidden" id="menu_prefix" value="" />
<input type="hidden" id="row_id" value="0" />
<input type="hidden" id="sel_sup_id" value="0" />
<input type="hidden" id="menu_id" value="{{$id}}" />
<input type="hidden" id="menu_type" value="{{$typ}}" />
<input type="hidden" id="po_code" value="" />
</section>

<section class="form_div">
<div class="col-lg-12">

<ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" id="p1" href="#pu_ord_hdr_section" role="tab" aria-controls="pills-product_det" aria-selected="true">Purchase Order</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" id="p2" href="#pu_ord_detl" role="tab" onclick="load_products_of_po();"  aria-controls="pills-size_nd_qty" aria-selected="false">Products</a>
          </li>
       <span style="text-align: right;width: 39%;" id="po_no_txt"></span>
       <span style="text-align: right;width: 20%;" id="po_no_series"></span>
      
        </ul>
</div>
<div class="tab-content mt-2">
<div id="pu_ord_hdr_section" class="tab-pane fade show active" role="tabpanel" aria-labelledby="pu_ord_hdr_section-tab">
<div id="pu_ord_hdr">
    <div class="row">


    <div class="col-lg-1 col-md-3 col-sm-2">

<div class="form-group row">

<div class="col-sm-12 col-md-5 col-lg-12 col-5">
  <input type="text" class="form-control  vldt_splr input_with_ui date_class"  value="{{date('d-M-Y')}}" id="t_date" party_id="0">
  <div class="text-danger error_txt" id="t_date_error"></div>




</div>


</div>

</div>

  <div class="col-lg-3 col-md-3 col-sm-7">

<div class="form-group row">

<label for="sup_name" class="col-sm-3 col-md-3 col-lg-3  col-form-label text-left">Supplier <span class="text-danger">*</span></label>
<div class="col-sm-8 col-md-8 col-lg-8 col-8">
  <input type="text" class="form-control  validate ser-sup_hdr input_text" id="sup_name" sup_id="0" onclick="open_new_supplier_modal();">
  <div class="text-danger error_txt" id="sup_name_error"></div>




</div>


</div>

</div>



<div class="col-lg-2 col-md-4 col-sm-4 col-4">

<div class="col-lg-12 col-md-12 col-sm-12">

<div class="form-group row">

<label for="sup_gst" class="col-sm-3 col-md-3 col-lg-3  col-form-label text-left">GSTIN</label>
<div class="col-sm-8 col-md-5 col-lg-9 col-5">
<input type="text" class="form-control vldt_splr input_with_ui input_text" value="" id="sup_gst" readonly party_id="0">
<div class="text-danger error_txt" id="sup_gst_error"></div>


</div>


</div>

</div>

</div>


<div class="col-lg-3 col-md-3 col-sm-4">

<div class="form-group row">

<label for="NOTES" class="col-sm-3 col-md-3 col-lg-3  col-form-label text-left">Notes</label>
<div class="col-sm-8 col-md-8 col-lg-8 col-8">
  <input type="text" class="form-control  validate ser-sup_hdr vldt_splr input_with_ui input_text" id="notes" party_id="0" >
  <div class="text-danger error_txt" id="NOTES_error"></div>




</div>


</div>

</div>

<div class="col-lg-3 col-md-3 col-sm-4">

<div class="form-group row">

<label for="po_code" class="col-sm-4 col-md-3 col-lg-3  col-form-label text-left">PO Code</label>
<div class="col-sm-8 col-md-5 col-lg-5 col-5">
  <input type="text" class="form-control vldt_splr input_with_ui input_text" value="" id="po_code" readonly party_id="0">
  <div class="text-danger error_txt" id="po_code_error"></div>


</div>


</div>

</div>

   
     
</div>
<div class="row mt-1">
 
<div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">


<div class="btn-group" role="group" aria-label="Basic example">
  <!-- <button type="button" class="btn btn-sm btn-success ml-1">New</button> -->
  <button type="reset" class="btn btn-sm btn-secondary ml-1" onclick="clear_pu_hdr();">Reset</button>
  <button type="button" class="btn btn-sm btn-success ml-1 input_with_ui" onclick="save_pu_header_vld();">Save</button>

</div>
  <button type="button" onclick="load_product_detls();" class="btn btn-sm btn-warning ml-5">Add Product</button>
  <div></div>
</div>


</div>
<div class="row mt-2">
 <hr>
<div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
<div class="row">
<div class="col-lg-2 col-md-2 col-sm-3 col-2">
  <div class="row">

  <label for="" class="col-lg-3 col-sm-3 col-md-3 col-3">
    From
  </label>
  <div class="col-lg-9 col-sm-9 col-md-9 col-9">
  <input type="text" class="form-control  vldt_splr input_with_ui date_class"  onchange="load_purchase_order_list();"value="<?php echo date('d-M-Y', strtotime('-30 days')); ?>" id="frm_date" >

  </div>
  </div>



</div>
<div class="col-lg-2 col-md-2 col-sm-3 col-2">

<div class="row">

<label for="" class="col-lg-3 col-sm-3 col-md-3 col-3">
  TO
</label>
<div class="col-lg-9 col-sm-9 col-md-9 col-9">
<input type="text" class="form-control  vldt_splr input_with_ui date_class" onchange="load_purchase_order_list();" value="{{date('d-M-Y')}}" id="till_date" >

</div>
</div>
</div>
<div class="col-lg-1 col-md-1 col-sm-2 col-1">


<select name="" class="form-control" id="sel_sts" onchange="filter_po_list();">

<option value="0" selected>All</option>
<option value="1">Pending</option>
<option value="2">Verified</option>
</select>

</div>


</div>


</div>


</div>
  
    </div>




<div id="pu_ord_lst">

<img src="{{ asset('images/loading.gif') }}" alt="" style="margin-left:45%;">

<!-- <table id="pu_ord_lst_tbl" class="table">
<thead>
<tr>

<th>
#
</th>
<th>
PO No
</th>
<th>
Suppplier
</th>
<th>
Date
</th>
<th>
Code
</th>
<th>
&nbsp;
</th>


</tr>

</thead>

<tbody>
    @for($i = 0; $i < 25; $i++)
        <tr id="pu_ord_tr_{{ $i }}" >
            <td onclick="set_edit_pu_hdr(this);" >{{ $i }}</td> 
            <td onclick="set_edit_pu_hdr(this);" >PU00{{ $i }}</td> 
            <td onclick="set_edit_pu_hdr(this);" >Sup{{ $i }}</td> 
            <td onclick="set_edit_pu_hdr(this);" >01/01/2025</td> 
            <td onclick="set_edit_pu_hdr(this);" >OB{{ $i }}</td> 
            <td><i class="fa fa-trash"></i></td> 
        </tr>
    @endfor
</tbody>


</table> -->




</div>



</div>



<div id="pu_ord_detl" class="tab-pane fade" role="tabpanel" aria-labelledby="pu_ord_detl-tab">
<button type="button" onclick="load_product_detls();" class="btn btn-sm btn-warning ml-5">Add Product</button>

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12" id="po_product_list_dv">

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
@include('common.add_product_mdl')
@include('common.supplier_modal')




<script src="{{ asset('project-js/purchase_order_scripts.js') }}?v=2.4.0"></script>


@endsection

