$(document).ready(function() {

    // $(".vldt_splr").on('click focus', function() {
    //     var sel_sup_id = $("#sel_sup_id").val();

    //     if (sel_sup_id == 0) {
    //         $(this).prop('disabled', true);
    //         return false;
    //     }
    // });

   
    // $("#sel_sup_id").on('change', function() {
    //     var sel_sup_id = $(this).val();  

    //     if (sel_sup_id > 0) {
    //         $(".vldt_splr").prop('disabled', false);  
    //     } else {
    //         $(".vldt_splr").prop('disabled', true);  
    //     }
    // });

    $("#pu_ord_detl").css('height',($(document).height()-($("#main-nav").height()+$(".page-foooter").height()))-120);

$("#pu_ord_lst").css('height',($(document).height()-($("#main-nav").height()+$("#pu_ord_hdr").height()+$(".page-foooter").height()))-130);



// $(document).on('keydown', function(e) { 
//     p_vsbl = $('#pu_ord_lst').is(':visible');

//     if (p_vsbl == true) {
//         if (e.keyCode === 38 || e.keyCode === 40) {
//             e.preventDefault();  

//             const rows = $('#pu_ord_lst_tbl tbody tr');
//             let index = rows.index($('.selected'));

//             if (e.keyCode === 40) {
//                 index = Math.min(index + 1, rows.length - 1);
//             } else if (e.keyCode === 38) {
//                 index = Math.max(index - 1, 0);
//             }

//             rows.removeClass('selected');
//             rows.eq(index).addClass('selected');

//             const selectedRow = rows.eq(index);
//             const container = $('#pu_ord_lst');
//             const rowTop = selectedRow.position().top;
//             const rowBottom = rowTop + selectedRow.outerHeight();
//             const containerTop = container.scrollTop();
//             const containerBottom = containerTop + container.height();

//             const buffer = 4;

//             if (rowTop < containerTop + buffer) {
//                 container.scrollTop(containerTop + rowTop - containerTop - buffer * selectedRow.outerHeight());
//             } else if (rowBottom > containerBottom - buffer) {
//                 container.scrollTop(containerTop + rowBottom - containerBottom + buffer * selectedRow.outerHeight());
//             }
//         }
//     }
// });

$("#pu_ord_lst").html('<img src="../../images/loading.gif" alt="" style="margin-left:45%;">');

load_purchase_order_list();
});


function filter_sup_list(){
  
    load_purchase_order_list();
}

function load_purchase_order_list(){
    $("#pu_ord_lst").html('<img src="../../images/loading.gif" alt="" style="margin-left:45%;">');
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
    $("#pu_ord_lst").html('<img src="../../images/no_data.gif" alt="" style="margin-left:45%;">');

            }
            else{
                tbl= build_view_table(response);
                $("#pu_ord_lst").html(tbl);
             
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

function load_product_detls(){
    // $("#pu_ord_hdr_section").fadeOut(100);
    // $("#pu_ord_detl").fadeIn(100);
    po_code=$("#po_code").val();
    if(po_code==''){


        CustomAlert("Select Any Order...");
        return false;
    }
    else{
        $("#p2").click();
        open_add_prd_mdl();
        // load_products_of_po();
    }
   
}


 function load_products_of_po(){
    $("#po_product_list_dv").html('<img src="../../images/no_data.gif" alt="" style="margin-left:45%;">');

    po_code=$("#po_code").val();
    if(po_code==''){
        CustomAlert("Select Any Order...");
        return false;
    }


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
    $("#po_product_list_dv").html('<img src="../../images/no_data.gif" alt="" style="margin-left:45%;">');

            }
            else{
                tbl_pdt= build_view_table_pdt(response);
                $("#po_product_list_dv").html(tbl_pdt);
             
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



function show_pu_hdr(){
    $("#pu_ord_detl").fadeOut(100);
    $("#pu_ord_hdr_section").fadeIn(100);
}

function set_edit_pu_hdr(){

}

function save_pu_header_vld(){

    status=0;
if($("#sup_name").val().trim()==''){
    status=1;
    $("#sup_name_error").text('Supplier Name is required');
    return false;
}
if($("#sup_name").attr('sup_id')==''||$("#sup_name").attr('sup_id')==0){
    status=1;
    $("#sup_name_error").text('Select Supplier');
    return false;
}

if($("#t_date").val().trim()==''||$("#t_date").val().trim()=='00/00/0000'){

    status=1;
    $("#t_date_error").text('Invalid Date');
    return false;
}


    if(status==0){
        save_form();

    }
}


function save_form(){
    $(".btn").attr('disabled',true);
    $.ajax({
        url: "/save_pu_header",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
          
            row_id:$("#row_id").val(),
            hidden_status:$("#hidden_status").val(),
            sup_id:$("#sup_name").attr('sup_id').trim(),
            notes:$("#notes").val().trim()||0,
            t_date:$("#t_date").val().trim(),
            po_code:$("#row_id").val().trim()||'',
            po_status:0
          
            
        
        },
        success:function(response){
            $(".btn").attr('disabled',false);
        
       
        flag=response[0]['Result_Status'];
        msg=response[0]['Remarks'];
        
        
        if(flag==1){
        $(".input_text").val('');
        $("#row_id").val(0);
        $("#hidden_status").val(0);
        $("#sup_name").attr('sup_id',0);
        
        load_purchase_order_list();
        // alertify.notify($(".page-title").text()+' '+msg, 'success', 5);
        }else{
        //    alertify.notify($(".page-title").text()+' '+msg, 'error', 5);
        }
        custom_alert_txt(msg,flag);
        
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


function tr_dbl_click(elm,key){

click_id=key;
$("#row_id").val(key);
$("#po_code").val(key);
$("#po_no_txt").text(key);
$(".dynmc_tr_tbl_pdt").removeClass('tr_selected_pdt');
$(elm).closest('tr').addClass('tr_selected_pdt');
$("#hidden_status").val(1);
load_po_header_det();
}

function clear_pu_hdr(){
    $("#sup_name").attr('sup_id',0);
    $("#sup_name").val('');
    $("#po_no_txt,#po_no_series").text('');
    $("#row_id").val(0);
    $("#notes").val('');
    $("#po_code").val('');
    $("#hidden_status").val(0);
    load_purchase_order_list();
}



function set_edit_form(sts,key){
    $("#row_id").val(key);
    $("#po_code").val(key);
$("#po_no_txt").text(key);
$("#hidden_status").val(1);


load_po_header_det();



}

function load_po_header_det(){

    po_code=$("#po_code").val();
    $.ajax({
        url: "/load_po_header_det",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
          
            po_code:$("#row_id").val()
            
          
            
        
        },
        success:function(response){
        
            
        
       data=response;
       $("#sup_name").attr('sup_id',data[0]['PO_SupCode']);
       $("#sup_name").val(data[0]['Acc_Name']);
       $("#notes").val(data[0]['PO_Notes']);
       var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
       po_dt=data[0]['PO_Dt'].split("-");
       $("#t_date").val(po_dt[2] + "-" + months[po_dt[1] - 1] + "-" + po_dt[0]);


       $("#po_code").val(data[0]['PO_Code']);
       $("#po_no_txt").text(data[0]['PO_Code']);
       $("#po_no_series").text(data[0]['PO_PONo']);

       $(".error_txt").text('');
        
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

  function tr_click(elm,key){}

  function build_view_table_pdt(data){



    key_to_remove = 'title';
  
  title = '';
  data = $.map(data, function (obj) {
  
    if ("title" in obj) {
        title =  obj['title'] ;
        var newObj = Object.assign({}, obj);
        delete newObj.title;
        return newObj;
    }
  
    return obj;
  });
  
  
  Stat_Key='';
  header = '';
  
  var allElements = $('.additional_btn');
        var ad_cnt = allElements.length;
  
    
  
  var col_pos_val = [];
  var col_alg = [];
  var disp_colum = [];
  var btn_col = [];
  show_last_total=false;
  var col_typ = [];
  var status_col=[];
  var bg_arr_tr=[];
  fn='';
  htm = '';
  var screenWidth = $(window).width();
  wdth = 'width:370px;';
  f_size = 'font-size: 16px;';
  f_size_thead = '';
  if (screenWidth < 500) {
    // wdth='width:200px;';
    //   f_size='font-size: 12px;';
    //   f_size_thead='font-size: 9px;';
  }
  
  bg_arr = ['red', 'green', 'blue', 'grey', 'black', 'violet', 'purple', 'cyan', 'magenta'];
  
  bg_arr_clr = bg_arr[0];
  
  
  
  htm += '<div><div class="table_header" ><h4 style="font-weight:bold;letter-spacing: 2px;' + f_size + '">' + header + '</h4></div>';
  
  tbl_data = data;
  
  keys = Object.keys(tbl_data[0]);
//   console.log(keys);
  
  htm += '<div class="tbl_dv" style="border:1px solid ' + bg_arr_clr[0] + ';"><table class="table table-bordereds  responsive-utilities jambo_table" id="rec_tbl" ><thead style="color:#514a4a;background:#f1f1e0e8;">';
  htm += '<tr >';
  // htm+='<th style="width:1%;">Sl</th>';
  var col_totals = Array(keys.length).fill(0);
  var subtotals = Array(keys.length).fill(0); 
  
  for (k = 0; k < keys.length; k++) {
  
   
  
  
    var splitKey = keys[k].split('_');
    fst = splitKey[0][0];
    scd = splitKey[0][1];
    trd = splitKey[0][2];
  
    var td_width = parseFloat(splitKey[0].substring(3));
    if (fst == 'T') {
  
        col_typ.push(k + 'T');
  
    } else if (fst == 'C') {
  
  
        col_typ.push(k + 'C');


    } else if (fst == 'I') {
        col_typ.push(k + 'I');
  
    }
  
  
    var rightSide = splitKey[splitKey.length - 1];
    txt_alg = 'center';
  
    if (scd == 'R') {
        txt_alg = 'right';
  
        col_alg.push(k + 'R');
  
  
    } else if (scd == "L") {
        txt_alg = 'left';
        col_alg.push(k + 'L');
    } else {
        txt_alg = 'center';
        col_alg.push(k + 'C');
    }
  
    if (trd == 'Y') {
        col_pos_val.push(k);
    }
  
    if (td_width > 0 ) {
        htm += '<th scope="col" style="text-align:' + txt_alg + ';width:' + td_width + '%">' + rightSide + '</th>';
        disp_colum.push(k);
    }else{
  
      if(keys[k]!='Status'){
        // btn_col.push(k);
  
      }
    }
  
    if(k==0){
      btn_col.push(k);
    }
  
  
  
  
    if(keys[k]=='Status'){
      status_col.push(k);
      disp_colum.push(k);
    }
    if(keys[k]=='bg_clr')
        {
    
          bg_arr_tr.push(k);
    
      }
  
  }

  for(k=0;k<=ad_cnt;k++){
    htm+='<th style="width:3%;">&nbsp;</th>';
  }
  
  htm += '</tr></thead>';
  new_data = [];
  narration='';
  row_cnt=0;
  gp_name = '';
  last_gp_name = '';
  sub_total = Array(keys.length).fill(0);
  k=1;
  st='';
  dt='';
  
  for (i = 0; i < tbl_data.length; i++) {
  
    gp_name = tbl_data[i]['GPNAME'];
  
  
  if(title!=''){
  
  fn='("'+tbl_data[i]['title_id']+'")';
  
  }
  
  
  
  if (last_gp_name != tbl_data[i]['GPNAME']) {
   
        if (last_gp_name !== '') {
  
        if(row_cnt==1){
            st='';
        }
            htm += '<tr style="background: #93eaa4;color: #422626;font-weight: bold;">';
  
  
  
            for (k = 0; k < keys.length; k++) {
                if(k==0 && Stat_Key=='DB'){
                        narration='Balance';
                }else{
                      narration='';
                }
                if (disp_colum.includes(k)) {
                    if (col_typ.includes(k + 'C')) {
                        htm += col_pos_val.includes(k) ? '<td style="text-align:right;" font-weight:bold;">' + subtotals[k].toFixed(2) + '</td>' : '<td>'+narration+'</td>';
                    } else {
                        htm += col_pos_val.includes(k) ? '<td style="text-align:right;" font-weight:bold;">' + subtotals[k] + '</td>' : '<td>'+narration+'</td>';
                    }
                }
            }
  
            htm += '</tr>';
            if(Stat_Key!='DB'){
                   subtotals = Array(keys.length).fill(0); 
            }
         
        }
  
  
        if(tbl_data[i]['GPNAME']){
  
          k=1;
          cspan=keys.length-1;
                  htm += '<tr><td colspan="'+cspan+'" style="background:#182339;color:white;font-weight:bold;">' + tbl_data[i]['GPNAME'] + '</td></tr>';
                  row_cnt=0;
        }
  
    }
  
  
  
  
  btn_str='';
  
    var x =k;
    // if(new_data[status_col[0]]==1){
    //     tr_hg_cls=new_data[bg_arr_tr[0]];
    //    }else{
      
      
    //    }
       tr_hg_cls=new_data[bg_arr_tr[0]];
       htm += '<tr class="dynmc_tr_tbl_pdt" style="background: '+tr_hg_cls+';" >';
    // htm += '<tr class="dynmc_tr_tbl_pdt" >';
    txt_alg = 'center';
    // htm+='<td>'+x+'</td>';
    new_data = Object.values(tbl_data[i]);
  
  
    for (j = 0; j < new_data.length; j++) {
  
  
        if (disp_colum.includes(j)) {
  
  
  
  
            if (col_alg.includes(j + 'L')) {
                txt_alg = 'left';
            } else if (col_alg.includes(j + 'R')) {
                txt_alg = 'right';
            } else {
                txt_alg = 'center';
            }
  
            last_val = new_data[j];
  
  
  
            if (col_pos_val.includes(j)) {
  
  
  
                col_totals[j] += parseFloat(last_val) || 0;
                subtotals[j] += parseFloat(last_val) || 0;
  
  
            }
  
                last_val = last_val;
  
                if (col_typ.includes(j + 'T')) {
                    last_val = last_val;
  
                } else if (col_typ.includes(j + 'C')) {
  
                    last_val = parseFloat(last_val).toFixed(2);
                
  
                } else if (col_typ.includes(j + 'I')) {
  
                    last_val = Math.trunc(last_val);
  
                }
  
  
  
         
 
            if(status_col.includes(j)){
  
              if(last_val==0){
  
                last_val='&nbsp;';
        
  
              }else{
               
                last_val='<i class="fa fa-check" style="color:green;"></i>';
            
              }
  
    
            }
  
  
  // fnctn=title+fn;
  fnctn="tr_click_pdt(this,'"+new_data[0]+"');";
  fnct2="tr_dbl_click_pdt(this,'"+new_data[0]+"');";
  
  sts=0;
  
            htm += '<td   sts="'+sts+'" style="text-align:' + txt_alg + ';"  ondblclick='+fnct2+' onclick='+fnctn+'>' + last_val + '</td>';
        }
  
      



      if(btn_col.includes(j)){
  
       
     
  
  
  $(".additional_btn").each(function(key,val){

    
  r="'"+new_data[j]+"'";
  r1="'"+new_data[1]+"'";

 
  


        if($(val).attr('value')=='Edit'){
        
            btn_str+='<td><button class="btn btn-sm '+$(this).attr('color')+'" onclick="edit_pdt('+sts+','+r+','+r1+')"><i class="fa fa-edit"></i></button></td>';
           
        }else if($(val).attr('value')=='Delete'){
            btn_str+='<td><button class="btn btn-sm '+$(this).attr('color')+'" onclick="del_pdt('+sts+','+r+','+r1+')"><i class="fa fa-trash"></i></button></td>';
           
    
        }else{
            btn_str+='<td><button class="btn btn-sm '+$(this).attr('color')+'">'+$(this).attr('value')+'</button></td>';
           
    
        }
       
    
    
    });
  
  
  
  
      }
  
      
  
    }
  
    htm+= btn_str;
   
   
  
    htm += '</tr>';
  
    
    gp_name = tbl_data[i]['GPNAME'];
    $("#thead_tbl").html(htm)
    if (last_gp_name != gp_name) {
  
        sub_total = Array(keys.length).fill(0);
    }
    last_gp_name = gp_name;
  
  k++;
  
  row_cnt++;
  }
  
  
  
  
  if (last_gp_name ) {
  
  
  if(row_cnt==1){
                st='';
                show_last_total=true;
            }
  
    htm += '<tr style="background: #93eaa4;color: #422626;font-weight: bold;">';
  
    for (k = 0; k < keys.length; k++) {
        if(k==0 && Stat_Key=='DB'){
                        narration='Balance';
                }else{
                      narration='';
                }
        if (disp_colum.includes(k)) {
            if (col_typ.includes(k + 'C')) {
                htm += col_pos_val.includes(k) ? '<td style="text-align:right;" font-weight:bold;">' + subtotals[k].toFixed(2) + '</td>' : '<td>'+narration+'</td>';
            } else {
                htm += col_pos_val.includes(k) ? '<td style="text-align:right;" font-weight:bold;">' + subtotals[k] + '</td>' : '<td>'+narration+'</td>';
            }
        }
    }
  
    htm += '</tr>';
  
  
  
  }
     row_cnt=0;
    if(Stat_Key!='DB'){
  
  if(show_last_total==false){
  
  }
  
  htm += '<tr style="background: #f1f1e0e8;color: #1c1818;font-weight: bold;'+dt+'">';
  
  for (k = 0; k < keys.length; k++) {
    if (disp_colum.includes(k)) {
        if (col_typ.includes(k + 'C')) {
            htm += col_pos_val.includes(k) ? '<td style="text-align:right; font-weight:bold;padding:5px;">' + col_totals[k].toFixed(2) + '</td>' : '<td></td>';
        } else {
            htm += col_pos_val.includes(k) ? '<td style="text-align:right; font-weight:bold;padding:5px;">' + col_totals[k] + '</td>' : '<td></td>';
        }
    }
  }
  }
  htm += '</tr></tbody></table></div></div>';
  
  return htm;
  
  
  }

  function edit_pdt(id,key,row_num){

    $.ajax({
        url: "/load_product_det",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
            prd_code:key,
            po_code:$("#row_id").val(),
            po_row:row_num
            
          
            
        
        },
        success:function(response){
        
        
       data=response;

       if(data.length>0){
        open_add_prd_mdl();
       
         $("#product_Code").attr('prod_id',data[0].Prod_Code);
         $("#product_Code").val(data[0].Prod_Key);
         $("#pro_batch_sub_sp").attr('Batch_subCatID',data[0].Batch_SubCatID); 
         $("#pro_batch_sub_sp").val(data[0].Batch_SubCatName);
         $("#pro_batch_gp").attr('batch_catid',data[0].Batch_CatID);
         $("#pro_batch_gp").val(data[0].Batch_CatName);
         $("#prd_brand").val(data[0].Po_BatchBrand);
         $("#productName").val(data[0].Product_Name);
         $("#prd_fit").val(data[0].Po_BatchFit);
         $("#prd_desc").val(data[0].Po_BatchDescription);
         $("#prd_shape").val(data[0].Po_BatchShape);
         $("#prd_style").val(data[0].Po_BatchStyle);
         $("#prd_size").val(data[0].Po_BatchSize);
         $("#prd_color").val(data[0].Po_BatchColour);
         $("#prod_ean").val(data[0].Po_BatchEAN);
         $("#prod_hsn").val(data[0].Po_BatchHsn);
         $("#prd_qty").val(data[0].Po_DetQty);
         $("#prd_rate").val(data[0].Po_DetRate);
         $("#prd_value").val(data[0].Po_DetValue);
         $("#prd_taxperc").attr('prd_tax_code',data[0].Po_BatchTaxCode);
         $("#prd_taxperc").val(data[0].Po_DetTaxPer);
         $("#prd_mrp").val(data[0].Po_DetMRP);
         $("#prd_cost").val(data[0].Po_DetCost||0);
         $("#prd_margin").val(data[0].Po_DetMargin||0);
         $("#pmdl_batch_code").val(data[0].Po_BatchCode);
         $("#pmdl_row_id").val(data[0].Po_DetRw);
         $("#pmdl_hidden_status").val(1);

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

  function del_pdt(sts,key,row_num){
    $("#pmdl_batch_code").val(key);
    // $("#pmdl_hidden_status").val(2);


    $.ajax({
        url: "/load_product_det",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
            prd_code:key,
            po_code:$("#row_id").val(),
            po_row:row_num

            
          
            
        
        },
        success:function(response){
        
        
       data=response;

       if(data.length>0){
       
       
        //  $("#pmdl_batch_code").val(data[0].Po_BatchCode);
         $("#pmdl_row_id").val(data[0].Po_DetRw);
         $("#pmdl_hidden_status").val(2);
         save_product_po();

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


  function filter_po_list(){
    load_purchase_order_list();

//     sel_sts=$("#sel_sts").val();
// $(".dynmc_tr_tbl_pdt").hide();
// if(sel_sts==1){
// $(".add_btn_td").each(function(){

//     if($(this).attr('sts')==1){
// $(this).closest('tr').show();
//     }
    

// });

// }
// else{

// $(".add_btn_td").each(function(){

//     if($(this).attr('sts')==0){
// $(this).closest('tr').show();
//     }
    

// });
// }

  }
function validate_po_order(){

if(confirm('Are you sure want to validate PO ?...Once validated it cannot be edited.')){

validate_andconfim_po_order();

}



}
  function validate_andconfim_po_order() {
    $(".btn").attr('disabled',true);
    const button = document.getElementById('confirmButton');

    
    button.classList.add('loading');

    
    const spinner = document.createElement('div');
    spinner.classList.add('spinner');
    button.appendChild(spinner);




    $.ajax({
        url: "/validate_po_order",
        type: "POST",
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        
                
        data:{
    
            po_code:$("#row_id").val(),
            t_date:$("#t_date").val(),
            sup_id:$("#sup_name").attr('sup_id')

       
        },
        success:function(response){
        
            $(".btn").attr('disabled',false);
       data=response;
       flag=data[0]['Result_Status'];
       msg=data[0]['Remarks'];
       button.classList.remove('loading');
       spinner.remove(); 
       custom_alert_txt(msg,flag);
       setTimeout(() => {
        location.reload();
    }, 3000);
 
        
        },
        error: function(xhr) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function(key, value) {
                                    $('#_error').text(value[0]);                        });
                            }
                        }
        });



    
    // setTimeout(() => {
    //   button.classList.remove('loading');
    //   spinner.remove(); 
    // }, 3000);
  }