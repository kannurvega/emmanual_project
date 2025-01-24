
function prependValues(arr1, arr2) {
    if (arr1.length !== arr2.length) {
      throw new Error("Both arrays must have the same length.");
    }
  
    let result = ['aid'];
    for (let i = 0; i < arr1.length; i++) {
      result.push(arr2[i] +'_'+ arr1[i]);
    }
  
    return result;
  }
  



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

htm += '<div class="tbl_dv" style="border:1px solid ' + bg_arr_clr[0] + ';"><table class="table table-bordered  responsive-utilities jambo_table" id="rec_tbl" ><thead style="color:#514a4a;background:#bdbd09e8;">';
htm += '<tr>';
 htm+='<th style="width:1%;">Sl</th>';
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

    if (td_width > 0) {
        htm += '<th scope="col" style="text-align:' + txt_alg + ';width:' + td_width + '%">' + rightSide + '</th>';
        disp_colum.push(k);
    }else{
        btn_col.push(k);
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
    htm += '<tr>';
    txt_alg = 'center';
    htm+='<td>'+x+'</td>';
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


fnctn=title+fn;
            htm += '<td style="text-align:' + txt_alg + ';"  onclick='+fnctn+'>' + last_val + '</td>';
        }



      if(btn_col.includes(j)){

        
     


 $(".additional_btn").each(function(key,val){

    
r="'"+new_data[j]+"'";
        if($(val).attr('value')=='Edit'){
        
            btn_str+='<td><button class="btn btn-sm '+$(this).attr('color')+'" onclick="'+$(this).attr('btn_clk')+'('+r+')"><i class="fa fa-edit"></i></button></td>';
           
        }else if($(val).attr('value')=='Delete'){
            btn_str+='<td><button class="btn btn-sm '+$(this).attr('color')+'" onclick="'+$(this).attr('btn_clk')+'('+r+')"><i class="fa fa-trash"></i></button></td>';
           
    
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

htm += '<tr style="background: #ca8757;color: #1c1818;font-weight: bold;'+dt+'">';

for (k = 0; k < keys.length; k++) {
    if (disp_colum.includes(k)) {
        if (col_typ.includes(k + 'C')) {
            htm += col_pos_val.includes(k) ? '<td style="text-align:right;" font-weight:bold;">' + col_totals[k].toFixed(2) + '</td>' : '<td></td>';
        } else {
            htm += col_pos_val.includes(k) ? '<td style="text-align:right;" font-weight:bold;">' + col_totals[k] + '</td>' : '<td></td>';
        }
    }
}
}
htm += '</tr></tbody></table></div></div>';

return htm;







}

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