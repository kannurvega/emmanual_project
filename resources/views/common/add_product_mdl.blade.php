<style>

#addProductModal{
    margin-top: 50px;
}
.nav-item{
    /* border: 1px solid #007bff !important;
  border-radius: 11px !important; */
}
.tab-content{
    border: 1px solid #b7b5b5;
    margin-bottom: 10px;
}

#product_det{
    background:#e6ceb0;
}
#size_nd_qty{
    background: #46a5dd;
}
#branch_split{
    background:#f5d6f7;
}
#brnch_split_tbl  tr th{
    padding:3px;
}
#brnch_split_tbl  tr td{
    padding:3px;
}
.mndatory_fld{
      border:1px solid #d55757;
    }

#batch_check,#sub_batch_check{
    margin-top:20px;
}

.form-control-placeholder {
      position: absolute;
      top: 50%;
      left: 13px;
      transform: translateY(-50%);
      transition: all 0.2s ease;
      color: #aaa;
      pointer-events: none;
    }

    .form-control:focus + .form-control-placeholder,
    .form-control:not(:placeholder-shown) + .form-control-placeholder {
      top: -10px;
      font-size: 12px;
      color: #333;
    }
    .form-group {
      position: relative;
      margin-top: 20px;
    }


    @media (min-width: 576px) {
        .mdl_pdt_det_cntnr{
height:74vh;
}
  }
  @media (min-width: 992px) {
    .mdl_pdt_det_cntnr{
        height:70vh;
}
  }
  .lens-button {
            background-color: #007BFF; /* Blue background */
            border: none; /* Remove border */
            color: white; /* White text */
            padding: 10px; /* Padding around the icon */
            font-size: 14px; /* Icon size */
            cursor: pointer; /* Pointer cursor on hover */
            border-radius: 40%; /* Circular button */
            width: 30px; /* Fixed width */
            height: 30px; /* Fixed height */
            display: flex; /* Flexbox for centering */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Shadow for depth */
            margin-top:15px;
        }

        /* Hover effect */
        .lens-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .plus-button {
  width: 25px;
  height: 25px;
  border: none;
  border-radius: 50%;
  background-color: #007bff;
  color: white;
  font-size: 20px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  transition: background-color 0.3s ease;
  margin-top:20px;
}
        .plus-button2 {
  width: 25px;
  height: 25px;
  border: none;
  border-radius: 50%;
  background-color:rgba(129, 61, 159, 0.93);
  color: white;
  font-size: 20px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  transition: background-color 0.3s ease;
  margin-top:20px;
}

.plus-button:hover {
  background-color: #0056b3;
}

.plus-icon {
  line-height: 1;
}
</style>

<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">

<input type="hidden" id="pmdl_hidden_status" value="0">
<input type="hidden" id="pmdl_row_id" value="0">
<input type="hidden" id="pmdl_batch_code" value="0">


            <div class="container mdl_pdt_det_cntnr" >
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12 col-sm-12" >
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#product_det" role="tab" aria-controls="pills-product_det" aria-selected="true">Product <i class="fa fa-databse"></i></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#size_nd_qty" role="tab" aria-controls="pills-size_nd_qty" aria-selected="false">Size And Color</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" style="float:left;" onclick="load_brnch_split();" data-toggle="pill" href="#branch_split" role="tab" aria-controls="pills-branch_split" aria-selected="false">Branch Split</a>

<span><input type="checkbox" id="brnch_split_check"/></span>

          </li>
      
        </ul>
        <div class="tab-content mt-2">
        <div class="tab-pane fade show active" id="product_det" role="tabpanel" aria-labelledby="product_det-tab">
        <div id="productForm">
        <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="">
    
        <div class="input-group row">
        <div class="col-lg-10 col-md-10 col-sm-10 col-10">

        <div class="form-group">
        <input type="text" class="form-control input_with_ui mndatory_fld" id="product_Code" prod_id="0" placeholder=" ">
        <label class="form-control-placeholder" for="product_Code">Product Code <span class="text-danger">*</span></label>
       
      </div>


        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-2">
        <button class="lens-button" type="button" onclick="load_product();">
        <i class="fas fa-search"></i> <!-- Font Awesome lens icon -->
    </button>
        <!-- <span class="input-group-text" onclick="load_product();" style="cursor:pointer;">
                <i class="fa fa-search"></i>
            </span> -->
        </div>

     

            <!-- <label for="productCode" class="form-label"></label>
            <input type="text" class="form-control input_with_ui mndatory_fld" id="product_Code" prod_id="0" placeholder="Product Code *"> -->


         
        </div>
        <div class="text-danger error_txt" id="product_Code_error"></div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 col-7">
        <div class="">
        <div class="form-group">
        <input type="text" class="form-control ipt_val input_with_ui  vldt_flds mndatory_fld" id="productName" placeholder=" ">
        <label class="form-control-placeholder" for="productName">Product Name <span class="text-danger">*</span></label>
      </div>
       
            <!-- <label for="productName" class="form-label"></label>
            <input type="text" class="form-control ipt_val input_with_ui  vldt_flds mndatory_fld"  id="productName" placeholder="Product Name *">
       
        -->
       
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
        <div class="">


        <div class="form-group">
        <input type="text" class="form-control ipt_val input_with_ui  vldt_flds" id="prd_taxperc" prd_tax_code="0"  placeholder=" ">
        <label class="form-control-placeholder" for="prd_taxperc">Tax%</label>
      </div>


            <!-- <label for="productName" class="form-label"></label>
            <input type="text" class="form-control ipt_val input_with_ui  vldt_flds" id="prd_taxperc" prd_tax_code="0" placeholder="Tax%"> -->
        </div>
    </div>
</div>
                         
            <div class="row">
                
            
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-4 row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-1">


<span><input    type="checkbox" id="batch_check"  ></span>

            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="">
            <div class="form-group">
            <input type="text" class="form-control ipt_val input_with_ui mndatory_fld" batch_id="0" placeholder="" id="pro_batch_gp">
        <label class="form-control-placeholder" for="pro_batch_gp">Batch Group <span class="text-danger">*</span></label>
      </div>
                                <!-- <label for="batchGroup" class="form-label"></label>

                                <input type="text" class="form-control ipt_val input_with_ui mndatory_fld" batch_id="0" placeholder="Batch Group *" id="pro_batch_gp"> -->
                            </div>
        <div class="text-danger error_txt" id="pro_batch_gp_error"></div>

            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-1">
            <button class="plus-button" type="button" onclick="open_batch_nd_sb_mdl('BG','Wb_Proc_GetBatchCatagory');">
  <span class="plus-icon">+</span>
</button>

            </div>
           
            <div class="col-lg-1 col-md-1 col-sm-1 col-1">


<span><input    type="checkbox" id="sub_batch_check"  ></span>

            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-10">
            <div class="">

            <div class="form-group">
            <input type="text" class="form-control ipt_val input_with_ui mndatory_fld" Batch_subCatID="0" placeholder="" id="pro_batch_sub_sp">

            <label class="form-control-placeholder" for="pro_batch_sub_sp">Sub Group <span class="text-danger">*</span></label>
</div>
                                <!-- <label for="subGroup" class="form-label"></label>

                                <input type="text" class="form-control ipt_val input_with_ui mndatory_fld" Batch_subCatID="0" placeholder="Sub Group *" id="pro_batch_sub_sp"> -->

                                <div class="text-danger error_txt" id="pro_batch_sub_sp_error"></div>

                            </div>
</div>
<div class="col-lg-1 col-md-1 col-sm-1 col-1">
            <button class="plus-button2"  type="button" onclick="open_batch_nd_sb_mdl('SG','Wb_Proc_GetBatchSubCatagory');">
  <span class="plus-icon">+</span>
</button>

            </div>

<div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="">
            <div class="form-group">
            <input type="text" class="form-control ipt_val input_with_ui " placeholder="" id="prd_brand">
            <label class="form-control-placeholder" for="prd_brand">Brand</label>


</div>
                                <!-- <label for="batchGroup" class="form-label"></label>
                                <input type="text" class="form-control ipt_val input_with_ui " placeholder="Brand" id="prd_brand"> -->

                            </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="">

            <div class="form-group">
            <input type="text" class="form-control ipt_val input_with_ui " id="prd_fit" placeholder="">

            <label class="form-control-placeholder" for="prd_fit">Fit</label>
</div>
                                <!-- <label for="batchGroup" class="form-label"></label>

                               <input type="text" class="form-control ipt_val input_with_ui " id="prd_fit" placeholder="Fit">
                           -->
                          
                          
                            </div>
            </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-4">

            

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="">
            <div class="form-group">

            <input type="text" class="form-control ipt_val input_with_ui " id="prd_shape" placeholder="">

            <label class="form-control-placeholder" for="prd_shape">Shape</label>

        </div>
                                <!-- <label for="subGroup" class="form-label"></label>
                                <input type="text" class="form-control ipt_val input_with_ui " id="prd_shape" placeholder="Shape"> -->


                            </div>
</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="">
            <div class="form-group">
            <input type="text" class="form-control ipt_val input_with_ui " id="prd_style" placeholder="">

            <label class="form-control-placeholder" for="prd_style">Style</label>

        </div>
                                <!-- <label for="subGroup" class="form-label"></label>

                                <input type="text" class="form-control ipt_val input_with_ui " id="prd_style" placeholder="Style">
                       -->

                            </div>
</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="">
            <div class="form-group">
            <input type="text" class="form-control ipt_val input_with_ui " id="prd_size" placeholder="">

            <label class="form-control-placeholder" for="prd_size">Size</label>

        </div>
                                <!-- <label for="subGroup" class="form-label"></label>

                                <input type="text" class="form-control ipt_val input_with_ui " id="prd_size" placeholder="Size"> -->


                            </div>
</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="">
            <div class="form-group">
            <input type="text" class="form-control ipt_val input_with_ui " id="prd_color" placeholder="">

            <label class="form-control-placeholder" for="prd_color">Color</label>

        </div>
                                <!-- <label for="subGroup" class="form-label"></label>

                                <input type="text" class="form-control ipt_val input_with_ui " id="prd_color" placeholder="Color"> -->


                            </div>
</div>


            </div>

<div class="col-lg-4 col-md-4 col-sm-4 col-4">

<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="">
<div class="form-group">
<input type="text" class="form-control ipt_val input_with_ui " id="prod_ean" placeholder="">

<label class="form-control-placeholder" for="prod_ean">EAN</label>

</div>
                                <!-- <label for="ean" class="form-label"></label>
                                <input type="text" class="form-control ipt_val input_with_ui " id="prod_ean" placeholder="EAN">
                             -->
                            
                            </div>

</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="">
<div class="form-group">
<input type="text" class="form-control ipt_val input_with_ui " id="prod_hsn" placeholder="">

<label class="form-control-placeholder" for="prod_hsn">HSN</label>
</div>

                                <!-- <label for="hsn" class="form-label"></label>
                                <input type="text" class="form-control ipt_val input_with_ui " id="prod_hsn" placeholder="HSN">
                            -->
                           
                           
                            </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-12">


<div class="">

<div class="form-group">
<input type="text" readonly class="form-control ipt_val input_with_ui " id="normalCode" placeholder="">

<label class="form-control-placeholder" for="normalCode">Batch</label>

</div>

                                <!-- <label for="batch" class="form-label"></label>
                                <input type="text" readonly class="form-control ipt_val input_with_ui " id="normalCode" placeholder="Batch">
                             -->
                            
                            </div>
</div>

</div>









            </div>
                            
                           <div class="row mt-2">
                     <div class="col-lg-4 col-md-4 col-sm-4 col-4 ">

                     <div class="form-group">
                     <input type="text" class="form-control ipt_val input_with_ui " id="prd_desc" placeholder="">

<label class="form-control-placeholder" for="prd_desc">Product Description</label>

</div>

<!-- <textarea name="" id="prd_desc" placeholder="Product Description" class="form-control ipt_val input_with_ui "></textarea> -->
<!-- <input type="text" class="form-control ipt_val input_with_ui " id="prd_desc" placeholder="Product Description"> -->

                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-4 ">


&nbsp;

                     </div>



<div class="col-lg-4 col-md-4 col-sm-4 col-4 ">


<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        <div class="form-group">
        <input type="text" class="form-control ipt_val input_with_ui  i_decimal clc_vl mndatory_fld"  id="prd_qty" placeholder="">
        <label class="form-control-placeholder" for="prd_qty">Qty<span class="text-danger">*</span></label>

        </div>
       
 

    <div class="text-danger error_txt" id="prd_qty_error"></div>

    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">


     <div class="form-group">
    <input type="text" class="form-control ipt_val input_with_ui  i_decimal clc_vl mndatory_fld" id="prd_rate" placeholder="">
    <label class="form-control-placeholder" for="prd_rate">Rate<span class="text-danger">*</span></label>
</div>

    <div class="text-danger error_txt" id="prd_rate_error"></div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
    <div class="form-group">
    <input type="text" class="form-control ipt_val input_with_ui " readonly id="prd_value" placeholder="">
    <label class="form-control-placeholder" for="prd_value">Value <span class="text-danger">*</span></label>


    </div>

    
    </div>
                           
                            </div>
</div>

                           </div>
                           <div class="row mt-1">

                           <div class="col-lg-6 col-md-6 col-dm-6 col-6">
                           <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
    <div class="form-group">

    <input type="text" class="form-control ipt_val input_with_ui  i_decimal " id="prd_cost" readonly placeholder="">
    <label class="form-control-placeholder" for="prd_cost">Cost</label>

    </div>
  

    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
    <div class="form-group">
    <input type="text" class="form-control ipt_val input_with_ui  i_decimal " id="cost_percent" placeholder="">
    <label class="form-control-placeholder" for="cost_percent">Cost %<span class="text-danger">*</span></label>

    </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
    <div class="form-group">

    <input type="text" class="form-control ipt_val input_with_ui mndatory_fld i_decimal " id="prd_mrp" placeholder="">
    <label class="form-control-placeholder" for="prd_mrp">Mrp <span class="text-danger">*</span></label>
    <div class="text-danger error_txt" id="prd_mrp_error"></div>
    </div>
    </div>
                           
                            </div>
                           
                           </div>
                           <div class="col-lg-6 col-md-6 col-dm-6 col-6">
                           <div class=" mt-1 text-right">

<div class="btn-group" role="group" aria-label="Basic example">


<button type="button" class="btn btn-sm btn-warning ml-1 input_with_ui " onclick="add_product_vld();">Add</button>

<button type="button" class="btn btn-sm btn-info ml-1" onclick="reset_product_form();">Reset</button>

</div>

</div>

                           </div>
                           </div>
                            
                         


                        
</div>
        </div>
        <div class="tab-pane fade" id="size_nd_qty" role="tabpanel" aria-labelledby="profile-tab">

        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody id="sizeColorTableBody">
                                <tr>
                                    <td><input type="text" class="form-control" placeholder=""></td>
                                    <td><input type="text" class="form-control" placeholder=""></td>
                                    <td><input type="number" class="form-control" placeholder=""></td>
                                </tr>
                            </tbody>
                        </table>
    </div>
        <div class="tab-pane fade" id="branch_split" role="tabpanel" aria-labelledby="branch_split-tab">
        <table class="table table-bordered" id="brnch_split_tbl">
                            <thead>
                                <tr>
                                    <th>Branch</th>
                                    <th style="width:70px;">Quantity</th>
                                    <th style="width:100px;">&nbsp;</th>
                                    <th style="width:100px;">&nbsp;</th>
                                    <th style="width:100px;">&nbsp;</th>
                                    <th style="width:100px;">&nbsp;</th>
                                    <th style="width:100px;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody id="branchSplitTableBody">
                             
                            </tbody>
                        </table>    
                        <div class="btn-group" role="group" aria-label="Basic example" style="float:right;">


<button type="button" class="btn btn-sm btn-warning ml-1 input_with_ui " onclick="save_branch_split_qty();">Save Split</button>

<button type="button" class="btn btn-sm btn-info ml-1" onclick="reset_branch_split();">Reset</button>

</div>
                    
                    
                    </div>
        
      </div>        
      </div>
  </div>
</div>     </div>
          
        </div>
    </div>
</div>
@include('common.batch_nd_sub_gp_mdl')
<script>
  

function open_add_prd_mdl() {
    $("#addProductModal").modal('show');
    $('#addProductModal').on('shown.bs.modal', function () {

   
         $("#product_Code").focus().click(); 
    });

  
//     $(".ipt_val").on('click focus', function() {

  
//         var allFieldsFilled = true;
//         $(".vldt_flds").each(function() {
//             if ($(this).val() == "" || $(this).val() == 0) {
//                 allFieldsFilled = false;
//                 return false; 
//             }
//         });


//         if (!allFieldsFilled) {
//             $(".ipt_val").not(".vldt_flds").prop('disabled', true);  
//             return false; 
//         } else {
//             $(".ipt_val").not(".vldt_flds").prop('disabled', false); 
//         }
//     });


// $(".vldt_flds").on('click focus', function() {

//     $(".ipt_val").not(".vldt_flds").prop('disabled', false); 
// })


$("#product_Code").on('keydown', function(e) {


if(e.keyCode==32 || e.keyCode==13){

    e.preventDefault();
if($("#product_Code").val().trim()!=""){

    load_product();
}else{

    $("#product_Code_error").text("Please Enter Product Code");
}
   
}

});


$(".i_decimal").on("input", function(evt) {
  var self = $(this);
  self.val(self.val().replace(/[^0-9.]/g, ''));
  if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
  {
    evt.preventDefault();
  }
});

}



$(document).on('keyup', '#pro_batch_gp', function(event) {
        var $this = $(this);

            $this.tableAutocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "/load_batch_group",
                        type: 'POST',
                        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                    
                        data: {
                            
                            
                            ser_val: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                columns: [{
                    field: 'Batch_CatCode',
                    title: 'Batch Code'
                }, {
                    field: 'Batch_CatName',
                    title: 'Batch Name'
                }],
                delay: 10,
                select: function (event, ui) {
                    if (ui.item != undefined) {
                        $this.val(ui.item.Batch_CatName);
                        $this.attr('Batch_CatID', ui.item.Batch_CatID);
                       
                        // add_acc_pst_grid();
                    }
                    return false;
                },
                change: function (event, ui) {
                  
                }
            });
        
    });
$(document).on('keyup', '#pro_batch_sub_sp', function(event) {
        var $this = $(this);

            $this.tableAutocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "/load_batch_sub_group",
                        type: 'POST',
                        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                    
                        data: {
                            
                          ser_val: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                columns: [{
                    field: 'Batch_SubCatCode',
                    title: 'Sub Code'
                }, {
                    field: 'Batch_SubCatName',
                    title: 'Sub Name'
                }],
                delay: 10,
                select: function (event, ui) {
                    if (ui.item != undefined) {
                        $this.val(ui.item.Batch_SubCatName);
                        $this.attr('Batch_subCatID', ui.item.Batch_SubCatID);
                       
                        // add_acc_pst_grid();
                    }
                    return false;
                },
                change: function (event, ui) {
                  
                }
            });
        
    });




function load_product(){


    $.ajax({
        url: "/fetch_product_details",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
          
          
            product_Code:$("#product_Code").val().trim(),
          
            
        
        },
        success:function(response){
        
        data=response;
        if(data.length>0){
            Product_Name=data[0]['Product_Name'];
        Prod_Code=data[0]['Prod_Code'];
        Tax_Code=data[0]['Tax_Code'];
        Tax_Per=data[0]['Tax_Per'];
        Prod_Key=data[0]['Prod_Key'];
        Dep_Name=data[0]['Dep_Name'];
        Cat_Name=data[0]['Cat_Name'];
        Prod_HSN=data[0]['Prod_HSN'];

        $("#productName").val(Product_Name);
        $("#prod_hsn").val(Prod_HSN);
        $("#prd_taxperc").val(Tax_Per);
        $("#prd_taxperc").attr('prd_tax_code',Tax_Code);
        $("#product_Code").attr('prod_id',Prod_Code);
        }else{
            $("#product_Code_error").text("Please Enter Product Code");
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



function reset_product_form(){
    $("#product_Code").val('');
    $("#product_Code").attr('prod_id',0);
    $("#productName").val('');
 

    if($("#batch_check").prop("checked")==false){
        $("#pro_batch_gp").val('');
        $("#pro_batch_gp").attr('batch_catid',0);
    }
  
    if($("#sub_batch_check").prop("checked")==false){
        $("#pro_batch_sub_sp").val('');
        $("#pro_batch_sub_sp").attr('Batch_subCatID',0);
    }
  

    $("#prd_brand").val('');
    $("#prd_fit").val('');
    $("#prd_desc").val('');
    $("#prd_shape").val('');
    $("#prd_style").val('');
    $("#prd_size").val('');
    $("#prd_color").val('');
    $("#prod_ean").val('');
    $("#prod_hsn").val('');
    $("#normalCode").val('');
    $("#prd_qty").val('');
    $("#prd_cost").val('');
    $("#prd_rate").val('');
    $("#prd_value").val('');
    $("#prd_mrp").val('');
    $("#pmdl_batch_code").val(0);
    $("#product_Code").focus();
    $("#pmdl_hidden_status").val(0);
    $("#pmdl_row_id").val(0);
    $("#prd_taxperc").val(0);
    $("#prd_taxperc").attr('prd_tax_code',0);

   

}





function add_product_vld(){
    status=0;

    if($("#product_Code").val().trim()==""){

        $("#product_Code_error").text("Please Enter Product Code");
        // $("#product_Code").focus().click();
        
        status=1;
        return false;


}
    if($("#product_Code").attr('prod_id')=="0"||$("#product_Code").attr('prod_id')==""){

        $("#product_Code_error").text("Please Enter Product Code");
        // $("#product_Code").focus().click();
        status=1;
        return false;


}


    if($("#pro_batch_gp").val().trim()==""){

        $("#pro_batch_gp_error").text("Please Enter Batch Group");
        // $("#pro_batch_gp").focus().click();
        status=1;
        return false;


}
    if($("#pro_batch_sub_sp").val().trim()==""){

        $("#pro_batch_sub_sp_error").text("Please Enter Sub Group");
        // $("#pro_batch_sub_sp").focus().click();
        status=1;
        return false;


}
    if($("#pro_batch_gp").attr('batch_catid')=="0"||$("#pro_batch_gp").attr('batch_catid')==""){

        $("#pro_batch_gp_error").text("Please Enter Batch Group");

        status=1;
        return false;


}
    if($("#pro_batch_sub_sp").attr('batch_subcatid')=="0"||$("#pro_batch_sub_sp").attr('batch_subcatid')==""){

        $("#pro_batch_sub_sp_error").text("Please Enter Sub Group");
            // $("#pro_batch_sub_sp").focus().click();
        status=1;
        return false;


}




if($("#prd_rate").val().trim()==""||$("#prd_rate").val().trim()=='0'){

$("#prd_rate_error").text("Please Enter Rate");
// $("#prd_rate").focus().click();
status=1;
return false;

}
if($("#prd_qty").val().trim()==""||$("#prd_qty").val().trim()=='0'){

$("#prd_qty_error").text("Please Enter Quantity");
// $("#prd_qty").focus().click();
status=1;
return false;


}
if($("#prd_mrp").val().trim()==""||$("#prd_mrp").val().trim()=='0'){

$("#prd_mrp_error").text("Please Enter Mrp");
// $("#prd_mrp").focus().click();
status=1;
return false;


}


    if(status==0){
        save_product_po(); 
    
    }
}


function save_product_po(){

    $(".btn").attr('disabled',true);
    row_id=$("#pmdl_row_id").val();
    hidden_status=$("#pmdl_hidden_status").val();

//     console.log({
//     po_code: $("#po_code").val(),
//     pro_code: $("#product_Code").attr('prod_id'),
//     pro_batch_sub_sp: $("#pro_batch_sub_sp").attr('Batch_subCatID'), 
//     pro_batch_gp: $("#pro_batch_gp").attr('batch_catid'),
//     prd_brand: $("#prd_brand").val() || 0,
//     prd_fit: $("#prd_fit").val() || '',
//     prd_desc: $("#prd_desc").val() || '',
//     prd_shape: $("#prd_shape").val() || '',
//     prd_style: $("#prd_style").val() || '',
//     prd_size: $("#prd_size").val() || '',
//     prd_color: $("#prd_color").val() || '',
//     prod_ean: $("#prod_ean").val() || '',
//     prod_hsn: $("#prod_hsn").val() || '',
//     prd_qty: $("#prd_qty").val() || '', 
//     prd_rate: $("#prd_rate").val() || '', 
//     prd_value: $("#prd_value").val() || ''
// });



    $.ajax({
        url: "/save_product_po",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
          
            row_id:row_id,
       po_code: $("#po_code").val(),
       pmdl_batch_code: $("#pmdl_batch_code").val(),
    pro_code: $("#product_Code").attr('prod_id'),
    pro_batch_sub_sp: $("#pro_batch_sub_sp").attr('Batch_subCatID')||0, 
    pro_batch_gp: $("#pro_batch_gp").attr('batch_catid')||0,
    prd_brand: $("#prd_brand").val() || 0,
    prd_fit: $("#prd_fit").val() || '',
    prd_desc: $("#prd_desc").val() || '',
    prd_shape: $("#prd_shape").val() || '',
    prd_style: $("#prd_style").val() || '',
    prd_size: $("#prd_size").val() || '',
    prd_color: $("#prd_color").val() || '',
    prod_ean: $("#prod_ean").val() || '',
    prod_hsn: $("#prod_hsn").val() || '',
    prd_qty: $("#prd_qty").val() || 0, 
    prd_rate: $("#prd_rate").val() || 0, 
    prd_value: $("#prd_value").val() || 0,
    prd_tax_code:$("#prd_taxperc").attr('prd_tax_code'),
    prd_taxperc:$("#prd_taxperc").val()||0,
    prd_mrp:$("#prd_mrp").val()||0,
    pmdl_hidden_status: $("#pmdl_hidden_status").val(),

          
  },
        success:function(response){
            $(".btn").attr('disabled',false);
        data=response;
     
        flag=data[0]['Result_Status'];
        msg=data[0]['Remarks'];
        if(flag==1){
            $("#pmdl_batch_code").val(data[0]['ID']);
            $("#pmdl_row_id").val(data[0]['RowNo']);
            if($("#brnch_split_check").prop("checked")==false){
                reset_product_form();

            }
            load_products_of_po();
        }

        custom_alert_txt(msg,flag);
     




        },
        error: function(xhr) {
            $(".btn").attr('disabled',false);

                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $('#_error').text(value[0]);                        });
                            }
                        }
        });






}


$("#prd_qty").on('input',function(){
    prd_rate=$("#prd_rate").val()||0;
    if(prd_rate>0){
        prd_value=parseFloat($("#prd_rate").val())*parseFloat($(this).val());
        $("#prd_value").val(prd_value)
    }
  
});
$("#prd_rate").on('input',function(){
    prd_qty=$("#prd_qty").val()||0;
    if(prd_qty>0){
        prd_value=parseFloat($("#prd_qty").val())*parseFloat($(this).val());
        $("#prd_value").val(prd_value);
        calculate_cost();
    }

});

function calculate_cost(){
    tax_perc=$("#prd_taxperc").val()||0;
    

    if(tax_perc>0){

 prd_cost_perc=parseFloat($("#prd_value").val())*parseFloat(tax_perc)/100;
        $("#prd_cost").val((parseFloat($("#prd_value").val())+prd_cost_perc));
        // CustomAlert((parseFloat($("#prd_value").val())+prd_cost_perc))
    }
}

$("#cost_percent").on('input',function(){
    prd_cost=$("#prd_cost").val()||0;
    this_val=$(this).val()||0;
    if(this_val>0){
        prd_mrp_perc=parseFloat($("#prd_cost").val())*parseFloat(this_val)/100;
        $("#prd_mrp").val((parseFloat($("#prd_cost").val())+prd_mrp_perc));
    }
})



$('.input-text,.form-control').on('keyup', function() {
    
    $(this).val($(this).val().toUpperCase());
});



function load_brnch_split(){

if($("#pmdl_row_id").val()==""||$("#pmdl_row_id").val()==0){
    CustomAlert("Select Product First..");
    return false;
    
}
if($("#pmdl_batch_code").val()==""||$("#pmdl_batch_code").val()==0){
    CustomAlert("Select Product First..");
    return false;
    
}

    $.ajax({
        url: "/load_brnch_split",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
            po_code: $("#po_code").val(),
            po_batch_code: $("#pmdl_batch_code").val(),
            po_row_id: $("#pmdl_row_id").val()
            
        
        },
        success:function(response){
        
        
       data=response;

       tr='';
       if(data.length>0){
$(data).each(function(key,val){
    qty=val['Qty'];
    if(qty>0){
        qty=parseFloat(qty).toFixed(2);
    }
    else{
        qty='0';

    }

tr+='<tr class="brnch_split_tr" branch_id="'+val['BranchID']+'">';
tr+='<td>'+val['Branch']+'</td>';

tr+='<td><input style="width: 75px;" type="number" value="'+qty+'" class="split_qty_td i_decimal" onkeypress="return isDecimalKey(event);"  min="0" placeholder=""></td>';
tr+='<td>&nbsp;</td>';
tr+='<td>&nbsp;</td>';
tr+='<td>&nbsp;</td>';
tr+='<td>&nbsp;</td>';
tr+='<td>&nbsp;</td>';
tr+='</tr>';

});
$("#branchSplitTableBody").html(tr);
        

       }else{
        CustomAlert("No Data Found");
        return false;
       }
   
        
        },
        error: function(xhr) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $('#_error').text(value[0]);                       
                                 });
                            }
                        }
        });

     
        

}



function tr_click_pdt(){

}




function reset_branch_split(){
    $(".split_qty_td").val('');
    $("#addProductModal").modal('hide');

}



function save_branch_split_qty(){


    $(".btn").attr('disabled',true);
    barr=[];

    prd_qty=parseFloat($("#prd_qty").val());
    spt_qty=0;
$(".brnch_split_tr").each(function(key,val){

if($(val).find('.split_qty_td').val()>0 && $(val).find('.split_qty_td').val().trim()!=''){
    thisarr={
        branchID:$(val).attr('branch_id'),
        b_qty:$(val).find('.split_qty_td').val()

}

barr.push(thisarr);
spt_qty+=parseFloat($(val).find('.split_qty_td').val());
}


});

if(prd_qty>0 && spt_qty>0 && spt_qty==prd_qty){
    if(barr.length>0){
    $.ajax({
        url: "/save_branch_split_qty",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
            po_code: $("#po_code").val(),
       pmdl_batch_code: $("#pmdl_batch_code").val(),
       pmdl_row_id: $("#pmdl_row_id").val(),


       barr:barr
            
        
        },
        success:function(response){
         data=response;
         $(".btn").attr('disabled',false);
        flag=data[0]['Result_Status'];
        msg=data[0]['Remarks'];
        if(flag==1){
            // reset_product_form();
            // load_products_of_po();
            reset_product_form();
            reset_branch_split();
        }
        custom_alert_txt(msg,flag);
        // CustomAlert(msg);
        
        },
        error: function(xhr) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $('#_error').text(value[0]);                        });
                            }
                        }
        });
}else{
    alert('Please Enter Split Quantity....');
    return false;
}
}else{

    alert('Split Quantity Mismatch....');
    $(".split_qty_td").addClass('border-danger');
    return false;

}





    

}





</script>