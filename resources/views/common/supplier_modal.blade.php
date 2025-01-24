
<style>
.modal-body{
    font-size:13px;
    padding:0rem !important;
}
.modal-body label{
   margin-bottom:0px !important;
   -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none;
}
.modal-body select{
    font-size: 13px;
  height: 25px !important;
  padding: 0px;
}
.form-check-input{
    height: 20px;
  width: 20px;
  margin-top: 0.1rem !important;
}
.ui-widget-content{

    z-index:9999;
}
.selected_mdl{
  background:red;
  color:white;
}


/* .sup_detls,.up_btn{
  display:none;

} */

 #sup_lst{
  height:50vh;
  overflow-y:scroll;
 }
 #supplier_modal{
  margin-top:50px;
 }

#sup_mdl_tbdy tr:hover{
  background:red;
  color:white;
  cursor:pointer;
}

</style>
<div class="modal fade" id="supplier_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document" style="margin-top:120px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supplier</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="close_supplier_modal_modal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div   class="sup_detls">
      <input type="hidden" id="modal_sp_row_id" value="0">
      <input type="hidden" id="modal_sp_hidden_status" value="0">

      <div class="container-fluid">

      <div class="row">

<div  class="col-lg-12" style="border:1px solid #7eeaa3;padding:5px;background:#b8e7f2;" id="myForm">

<div class="row">


<div class="col-lg-4 col-md-4 col-sm-4">
 <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                <label for="acc_name"> Name</label>
                <input class="input-text p-text sp_mdl_txt js-input" validation="0" type="text" id="acc_name" name="acc_name" autocomplete="off">
                <div class="text-danger" id="acc_name_error"></div>
            </div>
            <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                <label for="acc_short"> Short Name</label>
                <input class="input-text p-text sp_mdl_txt js-input" validation="0" type="text" id="acc_short" name="acc_short" autocomplete="off">
                <div class="text-danger" id="acc_short_error"></div>
            </div>
            <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                <label for="acc_group"> Account Group</label>
                <input class="input-text p-text sp_mdl_txt js-input" validation="0" type="text" id="acc_group" name="acc_group" autocomplete="off">
                <div class="text-danger" id="acc_group_error"></div>
            </div>
            <div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
                <label for="acc_ext_gstin" > GSTIN</label>
                <input     type="text"     id="acc_ext_gstin" name="acc_ext_gstin" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" >
                <div class="text-danger" id="acc_ext_gstin_error"> </div>
              </div>

</div>
<div class="col-lg-4 col-md-4 col-sm-4">
<div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
                <label for="acc_ext_phone1" > Phone </label>
                <input     type="text"     id="acc_ext_phone1" name="acc_ext_phone1" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" >
                <div class="text-danger" id="acc_ext_phone1_error"> </div>
              </div>

              <div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
                <label for="acc_ext_phone2" > Phone 2 </label>
                <input     type="text"     id="acc_ext_phone2" name="acc_ext_phone2" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" >
                <div class="text-danger" id="acc_ext_phone2_error"> </div>
              </div> 

              <div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
            <label for="acc_ext_email" > Email </label>
            <input     type="text"     id="acc_ext_email" name="acc_ext_email" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" >
            <div class="text-danger" id="acc_ext_email_error"> </div>
          </div>
          <div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
              <label for="acc_ext_state" > State </label>
              <!-- <input     type="text"     id="acc_ext_state" name="acc_ext_state" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" > -->

<select name="" class="input-text" id="acc_ext_state"></select>


              <div class="text-danger" id="acc_ext_state_error"> </div>
            </div> 

</div>
<div class="col-lg-4 col-md-4 col-sm-4">


              <div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
                <label for="acc_ext_add1" > Address1 </label>
                <input     type="text"     id="acc_ext_add1" name="acc_ext_add1" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" >
                <div class="text-danger" id="acc_ext_add1_error"> </div>
              </div> 

              <div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
                <label for="acc_ext_add2" > Address2 </label>
                <input     type="text"     id="acc_ext_add2" name="acc_ext_add2" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" >
                <div class="text-danger" id="acc_ext_add2_error"> </div>
              </div>
              <div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
                <label for="acc_ext_add3" > Address3 </label>
                <input     type="text"     id="acc_ext_add3" name="acc_ext_add3" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" >
                <div class="text-danger" id="acc_ext_add3_error"> </div>
              </div> 

              <div class=" col-lg-12 col-md-12 col-sm-12 col-12" >
            <label for="acc_ext_pin" > PIN </label>
            <input     type="text"     id="acc_ext_pin" name="acc_ext_pin" autocomplete="off" class="input-text p-text sp_mdl_txt js-input" value="" >
            <div class="text-danger" id="acc_ext_pin_error"> </div>
          </div> 
</div>

</div>



</div>



      </div>
      
      </div>
      <div class="modal-footer" style="padding:0px;">
      <div class="row">

 
<input class="btn btn-sm  btn-primary" type="submit" value="Save" onclick="save_submit_form_sp_mdl();">

<input class="btn btn-sm  ml-3" type="reset" value="Reset" onclick="clear_form();">
</div>
   
      </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12" style="border:1px solid red;">
<button class="btn btn-sm ml-4 up_btn" type="button"style="float:right;"  onclick="close_sup_hdr();"><i class="fa fa-angle-double-up"></i></button>
<button class="btn btn-sm ml-4 dwn_btn" type="button" style="float:right;" onclick="open_sup_hdr();"><i class="fa fa-angle-double-down"></i></button>
<div class="col-lg-4 col-md-4 col-sm-4">

<input type="text" class="form-control" id="ser_sup" placeholder="Search Supplier...">
</div>

<div class="col-lg-12 col-md-12 col-sm-12" id="sup_lst">

<table class="table table-sm">
  <thead>

<tr>
<th>Sl No</th>
<th>Supplier</th>
<th>Place</th>
<th>GST No</th>
<th>State</th>



</tr>

  </thead>

  <tbody id="sup_mdl_tbdy">



  </tbody>





</table>



</div>

</div>




    </div>
  </div>
</div>

<script>

    function open_new_supplier_modal(){

        $("#supplier_modal").show();
        $("#ser_sup").focus().click();

        
    }

    function close_supplier_modal_modal(){
    $("#supplier_modal").hide();
}



function clear_form(){

    $("#modal_sp_row_id,#modal_sp_hidden_status").val(0);

}

function save_submit_form_sp_mdl(){
status=0;



if(status==0){
   save_form_sup_mdl();


}




}



function save_form_sup_mdl(){
ser_sup='';
$.ajax({
url: api_path+"api/AccMSave",
type: "POST",
data:JSON.stringify({
    row_id:0,
    hidden_status:0,
    acc_name:$.trim($("#acc_name").val()),
    acc_short:$.trim($("#acc_short").val()),
    acc_group:$.trim($("#acc_group").attr('acc_group_code')),
    acc_master_type:'SU',
    acc_ext_gstin:$.trim($("#acc_ext_gstin").val()),
                acc_ext_phone1:$.trim($("#acc_ext_phone1").val()),
                acc_ext_phone2:$.trim($("#acc_ext_phone2").val()),
                acc_ext_email:$.trim($("#acc_ext_email").val()),
                acc_ext_state:$.trim($("#acc_ext_state").val()),
                acc_ext_place:$.trim($("#acc_ext_place").val()),
                acc_ext_pin:$.trim($("#acc_ext_pin").val()),
                acc_ext_add1:$.trim($("#acc_ext_add1").val()),
                acc_ext_add2:$.trim($("#acc_ext_add2").val()),
                acc_ext_add3:$.trim($("#acc_ext_add3").val()),
    acc_type:1,
  token:token,
  branch_id:branch_id,
  company_id:company_id,
  user_session:user_session,
  branch_validate_id:branch_validate_id,
  status:0,
  lock_status:0,
  log_user_id:log_user_id

}),
success:function(response){
  ser_sup=$.trim($("#acc_name").val());
//console.log(response.errors);
    flag=response[0].flag;
msg=response[0].msg;
alert('Supplier Master'+' '+msg);

if(flag==0){
$(".sp_mdl_txt").val('');
// $("#row_id").val(0);
// $("#hidden_status").val(0)
$("#ser_sup").val(ser_sup);
$("#ser_sup").trigger('change');
// close_supplier_modal_modal();
}


},
error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#'+key+'_error').text(value[0]);
                        });
                    }
                }
});
   



}



$(function () {

$('input#acc_group').tableAutocomplete({
        source: function (request, response) {
            $.ajax({
              url :api_path+"api/get_acc_grp",
              type : 'POST',
                dataType: 'json',
                data: JSON.stringify({
                    term: request.term,
                    token:token,
                    menu_prefix:'SU',
  branch_id:branch_id,
  company_id:company_id
                }),
                success: function (data) {
                    response(data);
                }
            });
        },
        columns: [{
            field: 'acc_group_name',
            title: 'Accout Group'
        }, {
            field: 'acc_group_book',
            title: 'Group Book'
        }],
        delay: 100,
        select: function (event, ui) {
            if (ui.item != undefined) {
                $(this).val(ui.item.acc_group_name);
                 $(this).attr('acc_group_code',ui.item.acc_group_code);
            }
            return false;
        },
        change: function (event, ui) {
            if (ui.item == undefined) {
                $(this).val('');
                $(this).attr('state_id','');
            }
           
        }
    });


// $('input#acc_ext_state').tableAutocomplete({
//         source: function (request, response) {
//             $.ajax({
//               url :api_path+"api/get_state",
//               type : 'POST',
//                 dataType: 'json',
//                 data: JSON.stringify({
//                     term: request.term,
//                     token:token,
//   branch_id:branch_id,
//   company_id:company_id
//                 }),
//                 success: function (data) {
//                     response(data);
//                 }
//             });
//         },
//         columns: [{
//             field: 'state_name',
//             title: 'State Name'
//         }, {
//             field: 'state_code_number',
//             title: 'State Code'
//         }],
//         delay: 100,
//         select: function (event, ui) {
//             if (ui.item != undefined) {
//                 $(this).val(ui.item.state_name);
//                 $(this).attr('state_id',ui.item.state_id);
//             }
//             return false;
//         },
//         change: function (event, ui) {
//             if (ui.item == undefined) {
//                 $(this).val('');
//                 $(this).attr('state_id','');
//             }
           
//         }
//     });




//  get_acc_state();






});


function  get_acc_state(){

  $.ajax({

url :api_path+"api/get_state_list",
type : 'POST',
data : JSON.stringify({
    token:token,
  branch_id:branch_id,
  company_id:company_id
}),
success : function(data) { 
      
op='<option value="0" selected>-Select-</option>';
for(i=0;i<data.length;i++){

op+='<option value="'+data[i]['state_id']+'">'+data[i]['state_name']+'</option>';
}
$("#acc_ext_state").html(op);
},
error : function(request,error)
{
    alert("Request: "+JSON.stringify(request));
}
});

  
}


$(".sp_mdl_txt").on('keyup',function(){
  $("#sup_mdl_tbdy").html('');

});

$("#ser_sup").on('keyup',function(){



  var key = event.which || event.keyCode; 

if (key !== 38 && key !== 40) {
  $.ajax({
                  url :"/get_supplier_det",
                  type : 'POST',
                    dataType: 'json',
                    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
                    data: {
                        term: $(this).val().trim(),
                        
      branch_id:branch_id,
      company_id:company_id
                    },
                    success: function (data) {


                      md_sup_tr='';
                       for(i=0;i<data.length;i++){


                        acc_name="'"+data[i]['Supplier']+"'";
                acc_ext_place="'"+1+"'";
                acc_ext_state="'"+1+"'";
                acc_ext_gstin="'"+data[i]['GSTIN']+"'";
                acc_code="'"+data[i]['Supp_Code']+"'";
                acc_ext_add1="'"+data[i]['Acc_Add1']+"'";
                acc_ext_add2="'"+data[i]['Acc_Add2']+"'";
                acc_ext_add3="'"+data[i]['Acc_Add3']+"'";
                acc_ext_pin="'"+1+"'";
        
                attr_str_sup='acc_name='+acc_name;
                attr_str_sup+='acc_ext_place='+acc_ext_place;
                attr_str_sup+='acc_ext_state='+acc_ext_state;
                attr_str_sup+='acc_ext_place='+acc_ext_place;
                attr_str_sup+='acc_ext_gstin='+acc_ext_gstin;
                attr_str_sup+='acc_code='+acc_code;
                attr_str_sup+='acc_ext_add1='+acc_ext_add1;
                attr_str_sup+='acc_ext_add2='+acc_ext_add2;
                attr_str_sup+='acc_ext_add3='+acc_ext_add3;
                attr_str_sup+='acc_ext_pin='+acc_ext_pin;

                        md_sup_tr+='<tr '+attr_str_sup+' onclick="set_supplier(this);">';
                        md_sup_tr+='<td>'+(i + 1)+'</td>';
                        md_sup_tr+='<td>'+data[i]['Supplier']+'</td>';
                        md_sup_tr+='<td>'+data[i]['Acc_Add1']+'</td>';
                        md_sup_tr+='<td>'+data[i]['GSTIN']+'</td>';
                        md_sup_tr+='<td>&nbsp;</td>';

                        

                        md_sup_tr+='</tr>';


                       }


$("#sup_mdl_tbdy").html(md_sup_tr);


                    }
                });
} else {
    event.preventDefault(); 
}

  


});


$("#supplier_modal").on('keydown', function(e) { 
    const sp_vsbl = $('#supplier_modal').is(':visible');

    if (sp_vsbl) {
        if (e.keyCode === 38 || e.keyCode === 40) {
            e.preventDefault(); 

            const rows = $('#sup_mdl_tbdy tr');
            let index = rows.index($('.selected_mdl'));

            if (e.keyCode === 40) {
                index = Math.min(index + 1, rows.length - 1);
            } else if (e.keyCode === 38) {
                index = Math.max(index - 1, 0);
            }

            rows.removeClass('selected_mdl');
            rows.eq(index).addClass('selected_mdl');
            const selectedRow = rows.eq(index);
            const container = $('#sup_lst');
            const rowTop = selectedRow.position().top;
            const rowBottom = rowTop + selectedRow.outerHeight();
            const containerTop = container.scrollTop();
            const containerBottom = containerTop + container.height();

           
            const buffer = 10;

           
            if (rowTop < containerTop + buffer) {
                container.scrollTop(containerTop + rowTop - buffer);
            }
           
            else if (rowBottom > containerBottom - buffer) {
                container.scrollTop(containerTop + rowBottom - containerBottom + buffer);
            }
        }
    }
});


// $("#supplier_modal").on('keydown', function(e) { 

// sp_vsbl=$('#supplier_modal').is(':visible');

// if(sp_vsbl==true){
//     if (e.keyCode === 38 || e.keyCode === 40 ) {
//         e.preventDefault(); 
    
//         const rows = $('#sup_mdl_tbdy tr');
//         let index = rows.index($('.selected_mdl'));

//         if (e.keyCode === 40) {
//             index = Math.min(index + 1, rows.length - 1);
//         } else if (e.keyCode === 38) {
//             index = Math.max(index - 1, 0);
//         }

//         rows.removeClass('selected_mdl');
//         rows.eq(index).addClass('selected_mdl');
//         const selectedRow = rows.eq(index);
//         const container = $('#sup_lst');
//         const rowTop = selectedRow.position().top;
      
//         const rowBottom = rowTop + selectedRow.outerHeight();
        
//         const containerTop = container.scrollTop();
//         const containerBottom = containerTop + container.height();
//         const buffer = 4;
//         if (rowTop < containerTop + buffer) {
//           container.scrollTop(containerTop + rowTop - containerTop - buffer * selectedRow.outerHeight());
//         } else if (rowBottom > containerBottom - buffer) {
//           container.scrollTop(containerTop + rowBottom - containerBottom + buffer * selectedRow.outerHeight());
        
//         }
//     }
// }

// });


$("#supplier_modal").on('keydown', function(e) { 
sp_vsbl=$('#supplier_modal').is(':visible');
if(sp_vsbl==true){
if (e.keyCode === 13) {
    const rows = $('#sup_mdl_tbdy tr');
    let index = rows.index($('.selected_mdl'));
    rows.eq(index).trigger('click'); 
}
}
});



function set_supplier(elm){


  acc_name=$(elm).attr('acc_name');
                acc_ext_place=$(elm).attr('acc_ext_place');
                acc_ext_state=$(elm).attr('acc_ext_state');
                acc_ext_gstin=$(elm).attr('acc_ext_gstin');
                acc_code=$(elm).attr('acc_code');
                acc_ext_add1=$(elm).attr('acc_ext_add1');
                acc_ext_add2=$(elm).attr('acc_ext_add2');
                acc_ext_add3=$(elm).attr('acc_ext_add3');
                acc_ext_pin=$(elm).attr('acc_ext_pin');


if(acc_code!=''){

  $("#sup_name").val(acc_name);
                    $("#sup_name").attr('sup_id',acc_code);
                    $("#sup_place").val(acc_ext_place);
                    $("#sup_gst").val(acc_ext_gstin);
                    $("#sup_state").val(acc_ext_state);
                    $("#sup_pin").val(acc_ext_pin);
                    $("#sup_add1").val(acc_ext_add1);
                    $("#sup_add2").val(acc_ext_add2);
                    $("#sup_add3").val(acc_ext_add3);


                     $("#notes").focus();
                     close_supplier_modal_modal();
                     filter_sup_list();
}







}

function open_sup_hdr(){

$(".sup_detls").slideDown();
$(".dwn_btn").hide();
$(".up_btn").show();
}
function close_sup_hdr(){

  $(".sup_detls").slideUp();
$(".dwn_btn").show();
$(".up_btn").hide();
}
close_sup_hdr();

</script>