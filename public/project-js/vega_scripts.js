
(function ($) {
set_btn();

$(".form_div,.list_view").css('height',($(document).height()-($("#main-nav").height()+$(".page-foooter").height()))-60);

    })(jQuery);
function set_date(){
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth(); 
  var year = date.getFullYear();
  

  var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  
  if (day < 10) day = "0" + day;
  
  var today = day + "-" + months[month] + "-" + year;
  $('.date_fld_f,.date_fld_t').val(today);


}

        $(document).ready(function () {


$("#list_view").html('<div class="table_div"> <div class="col-lg-12"> <div class="row"> <div class="col-lg-2 dt_clsss"> <div class="form-group row"> <label for="d_frm_date" class="col-sm-2 col-lg-2 col-2 col-md-2 col-form-label dt_clsss">From</label> <div class="col-sm-10 col-lg-10 col-md-10 col-10 dt_clsss" > <input type="text" class="form-control date_fld_f" id="fromDate" > </div> </div> </div> <div class="col-lg-2 dt_clsss"> <div class="form-group row"> <label for="d_frm_date" class="col-sm-2 col-lg-2 col-2 col-md-2 col-form-label dt_clsss">To</label> <div class="col-sm-10 col-lg-10 col-md-10 col-10"> <input type="text" class="form-control date_fld_t dt_clsss" id="toDate" > </div> </div> </div> <div class="col-lg-3"> <div class="form-group row"> <label for="d_frm_date" class="col-sm-4 col-lg-4 col-4 col-md-4 col-form-label">Per Page</label> <div class="col-lg-8 col-md-8 col-sm-8"> <select name="" id="perpage" class="form-control"> <option value="20" selected>20</option> <option value="40" >40</option> <option value="60">60</option> </select> </div> </div> </div> <div class="col-lg-2"> <input type="button" class="btn btn-primary btn-sm" onclick="fetch_table_view();" value="Load Records"> </div> <div class="col-lg-2"> <input type="text" class="form-control" onkeyup="load_view_tbl_search(this);" placeholder="Common Search"> </div> </div> </div> </div> <div id="list_tbl"> </div> <div id="pagination" class="text-center"></div></div>');




          set_date();

        //   var t_cnt = function () {
        //     var tmp = null;
        //     $.ajax({
        //         'async': false,
        //         'type': "POST",
        //         'global': false,
              
        //         'url': "/fetch_table_view_pagination",
        //         'data':{
        //           '_token':$('meta[name="csrf-token"]').attr('content'),
        //           'page_id':$("#crnt_url").val()  ,        
        //           'perpage':$("#perpage").val() ,        
        //         },
        //         'success': function (data) {
      
        //           nd=JSON.parse(data);
        //             tmp = nd['t_cnt'];
        //         }
        //     });
        //     return tmp;
        // }();

        var t_cnt=0;
          $(".view_btn").html(t_cnt);
$(".list_view").hide();
$(".load_form_btn").hide();
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });








            $(function() {
        $( ".date_fld_f, .date_fld_t" ).datepicker({
           dateFormat: 'dd-M-yy' ,
            defaultDate: "+1w",
            changeYear: true,
            changeMonth: true, 
            onSelect: function( selectedDate ) {
                if(this.id == 'fromDate'){
                  var dateMin = $('.date_fld_f').datepicker("getDate");
                  var rMin = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 1); 
                  var rMax = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 30); 
                  $('.date_fld_f').datepicker("option","minDate",rMin);
                  $('.date_fld_t').datepicker("option","maxDate",rMax);                    
                }
                
            }
        });
   
    });




  
$("#list_view").height(($(document).height()-($("#main-nav").height()+$(".page-foooter").height()))-60);
$(".view_tab").height(($(document).height()-($("#main-nav").height()+$(".page-foooter").height()))-60);
	 

	 





        });



function load_list(){
  $("#list_tbl").html('');
  $(".form_div").hide();

  $(".list_view").fadeIn(200);
  fetch_table_view();
  $(".load_form_btn").show();
  $(".load_list_btn").hide();
  $(".submit-btn").hide();

}
function load_form(){
  $(".form_div").fadeIn(100);
  $(".list_view").hide();
  $(".all_option").remove();

  $(".load_form_btn").hide();
  $(".load_list_btn").show();
  $(".submit-btn").show();
  set_btn();
}



$('.date_mask').mask('00/00/0000');

function fetch_table_view(){
sp_name=$("#sp_name").val();

$.ajax({
  'async': false,
  'type': "POST",
  'global': false,
  'headers': {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},

  'url': "/fetch_table_view",
  'data':{
    'sp_name':sp_name,
    'param2': '',      
    'param1': ''     
  },
  'success': function (data) {

    grid=data;


    var keys = Object.keys(grid[0]);

    var htm = '';
    htm += '<tr>';
    for (var k = 0; k < keys.length; k++) {
      if(k!=0){
        htm += '<th scope="col">' + keys[k] + '</th>';

      }
    }
    htm += '<th>&nbsp;</th><th>&nbsp;</th></tr>';

    document.getElementById("thead_tbl_frm").innerHTML = htm;

    var new_data = [];
    html = '';

    for (var i = 0; i < grid.length; i++) {
        var x = i + 1;
        key_id=0;
        html += '<tr>';

        new_data = Object.values(grid[i]);

        for (var j = 0; j < new_data.length; j++) {
          key_id=new_data[0];
          if(j!=0){
            html += '<td>' + new_data[j] + '</td>';

          }
        }
        html += '<td><button type="button" onclick="edit_row('+key_id+',this);" class="addtnl_btn"><i class="fa fa-edit"></i></button></td><td><button type="button" onclick="delete_row('+key_id+',this);" class="addtnl_btn"><i class="fa fa-trash"></i></button></td></tr>';
    }

    document.getElementById("res_tbl_tbody_frm").innerHTML = html;

   
  }
});




}
function fetch_table_view_old(){
  totalPage=10;

    var totalPage = function () {
      var tmp = null;
      $.ajax({
          'async': false,
          'type': "POST",
          'global': false,
        
          'url': api_path+"api/fetch_table_view_pagination",
          'data':{
            'token':$("#token").val(),
            'page': 1,
          
            'page_id':$("#crnt_url").val(),
            'perpage':$("#perpage").val(),
            'from_date':$("#fromDate").val().split("-").reverse().join("-"),
            'to_date':$("#toDate").val().split("-").reverse().join("-")       
          },
          'success': function (data) {

            nd=JSON.parse(data);
              tmp = nd['page'];


              $("#perpage").append('<option value="'+nd['t_cnt']+'" class="all_option">All</option>');
          }
      });
      return tmp;
  }();


try{


    var pag = $('#pagination').simplePaginator({
        totalPages: parseInt(totalPage),
        maxButtonsVisible: 5,
        currentPage: 1,
        nextLabel: 'Next',
        prevLabel: 'Prev',
        firstLabel: 'First',
        lastLabel: 'Last',
        clickCurrentPage: true,
        pageChange: function(page) {      
       $.ajax({
                url:api_path+'api/fetch_table_view_json',
                method:"POST",
                dataType: "json",       
                data:{
                  'token':$("#token").val(),
                  'page': page,
                
                  'branch_id':$("#branch_id").val(),
                  'company_id':$("#company_id").val(),
                  'page_id':$("#crnt_url").val(),
                  'perpage':$("#perpage").val(),
                  'from_date':$("#fromDate").val().split("-").reverse().join("-"),
                  'to_date':$("#toDate").val().split("-").reverse().join("-")
                
                },
                success:function(data){
                  res='No Record Found..';
                
if(data['qr_result'].length>0){
  res=build_view_table(data['qr_result']);
}


$("#list_tbl").html(res);




                }
            });
        }
    });




  }catch(err) {  

    console.log(err);
    
}






}
function set_btn() {

    $('.edit_btn').hide();
    $('.save_btn').show();
}


function load_view_tbl_search(elm){
  var value = $(elm).val().toLowerCase();
  $("#rec_tbl tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
}



function set_delete_form(row_id){
  remove_grid_row(row_id);
}


function remove_grid_row(row_id)
{
    
$( '#hidden_status' ).val("2");
$( '#row_id' ).val(row_id);     
save_form();
    
}


$('.focusable').first().focus().click();



 $('.focusable').each(function(key,val){

    if($(val).attr('disabled')||$(val).attr('readonly')||$(val).attr('type')=='hidden' ){

$(val).removeClass('focusable');
    }



  })


  $('.input-text,.form-control').on('keyup', function() {
    
    $(this).val($(this).val().toUpperCase());
});

 $('.focusable').keydown(function (e) {
     if (e.which === 13) {

var index = $('.focusable').index(this) + 1;

         $('.focusable').eq(index).focus();

     }
 });


$(".focusable").keydown(function(e){
    if (e.keyCode == 13 && e.shiftKey)
    {
        
        var index = $('.focusable').index(this) - 1;


         $('.focusable').eq(index).focus();


    }
});

$(".reset_btn").on('click',function(){
  clear_form();
});

function clear_form(){

  $("#modal_p_hidden_status,#modal_p_row_id,.form-select").val(0);
  $(".input-text").val('');
  $(".form-check-input").prop('checked',false);
}

// $("#perpage").on('change',function(){
//   fetch_table_view();
// });

$(".i_decimal").on("input", function(evt) {
  var self = $(this);
  self.val(self.val().replace(/[^0-9.]/g, ''));
  if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
  {
    evt.preventDefault();
  }
});

$(".i_numeric").on("input", function(evt) {

  var self = $(this);
  self.val(self.val().replace(/[^0-9]/g, ''));
  if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
  {
    evt.preventDefault();
  }
});
$(document).on('keydown', '.input_with_ui', function (e) {

  if (e.which === 13 && $(".ui-autocomplete").is(":visible")==false ) {


var index = $('.input_with_ui').index(this) + 1;

      $('.input_with_ui').eq(index).focus();
     
  }
});


$(".input_with_ui").keydown(function(e){
  if (e.keyCode == 13 && e.shiftKey)
  {
      
      var index = $('.input_with_ui').index(this) - 1;


       $('.input_with_ui').eq(index).focus();


  }
});


function Conversion_ToBase(flag,ids,qty){ 

  unit_conversion=$('#'+ids).find('option:selected').attr('unit_conversion')||1;
  base_unit=$('#'+ids).find('option:selected').attr('base_unit')||1;
  //alert(unit_conversion+' '+qty);
  rqty=0;
  if (flag==1) {
  
      if (qty>0) {
          rqty=qty*unit_conversion;
      }
      $('#purchase_det_qty_to_base').val(rqty);
  }else   if (flag==2) {
    if (qty>0) {
      rqty=qty*unit_conversion;
  }
  $('#purchase_det_qty_to_base').val(rqty);
  }
  
  }




// $(document).on('keydown', '.focusable_t_row', function (e) {

//   if (e.which === 13 && $(".ui-autocomplete").is(":visible")==false ) {


// var index = $('.focusable_t_row').index(this) + 1;

//       $('.focusable_t_row').eq(index).focus();
     
//   }
// });

 
$('.date_class').datepicker({
  dateFormat: 'dd-M-yy', 
  changeMonth: true,     
  changeYear: true,
  yearRange: '1970:2100'   
});


function delete_row(row_id,elm){

$('#hidden_status').val(2);
$("#row_id").val(row_id);
save_form();

}





$(document).on('focus', 'input, select', function() {
  var inputId = $(this).attr('id');  // Get the id of the input or select
  $('#' + inputId + '_error').text('');  // Clear the error message
});



function build_view_table(data){



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


htm += '<div class="tbl_dv" style="border:1px solid ' + bg_arr_clr[0] + ';"><table class="table table-bordereds  responsive-utilities jambo_table" id="rec_tbl" ><thead style="color:#514a4a;background:#bdbd09e8;">';
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
  htm += '<tr class="dynmc_tr_tbl" >';
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




              last_val = last_val;

              if (col_typ.includes(j + 'T')) {
                  last_val = last_val;

              } else if (col_typ.includes(j + 'C')) {

                  last_val = parseFloat(last_val).toFixed(2);

              } else if (col_typ.includes(j + 'I')) {

                  last_val = Math.trunc(last_val);

              }



          }

          if(status_col.includes(j)){

            if(last_val==0){

              last_val='Zero';

            }else{

              last_val='One';
            }

  
          }


// fnctn=title+fn;
fnctn="tr_click(this,'"+new_data[0]+"');";
fnct2="tr_dbl_click(this,'"+new_data[0]+"');";



          htm += '<td style="text-align:' + txt_alg + ';"  ondblclick='+fnct2+' onclick='+fnctn+'>' + last_val + '</td>';
      }






      sts=0;

      if(status_col.includes(j)){

        sts=new_data[j];
      }


      
    if(btn_col.includes(j)){

     
   


$(".additional_btn").each(function(key,val){

  
r="'"+new_data[j]+"'";

      if($(val).attr('value')=='Edit'){
      
          btn_str+='<td sts='+sts+' class="add_btn_td"><button class="btn btn-sm '+$(this).attr('color')+'" onclick="'+$(this).attr('btn_clk')+'('+sts+','+r+')"><i class="fa fa-edit"></i></button></td>';
         
      }else if($(val).attr('value')=='Delete'){
          btn_str+='<td sts='+sts+' class="add_btn_td"><button class="btn btn-sm '+$(this).attr('color')+'" onclick="'+$(this).attr('btn_clk')+'('+sts+','+r+')"><i class="fa fa-trash"></i></button></td>';
         
  
      }else{
          btn_str+='<td sts='+sts+' class="add_btn_td" ><button class="btn btn-sm '+$(this).attr('color')+'">'+$(this).attr('value')+'</button></td>';
         
  
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

htm += '<tr style="background: #ca8757;color: #1c1818;font-weight: bold;'+dt+'">';

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