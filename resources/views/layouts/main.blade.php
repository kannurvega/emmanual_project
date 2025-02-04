<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('pageTitle')</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}?v=3.5.0">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">


    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('table_autocomplete/tautocomplete.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('table_autocomplete/alertify.min.css')}}" />
  
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">


    

    <!-- Font Awesome JS -->
    <script defer src="{{ asset('js/fontawesome-solid.js') }}" ></script>
    <script defer src="{{ asset('js/fontawesome.js') }}" ></script>
    <script defer src="{{ asset('js/simple-bootstrap-paginator.min.js') }}" ></script>
    <script defer src="{{ asset('js/tableSortable.js') }}" ></script>









<style>

  /* .form_div{padding-top: 20px}; */
    .sidebar2 {
    position: fixed;
    top: 0;
    right: -300px; 
    width: 300px;
    height: 100%;
    background-color: #f1f1f1;
    transition: right 0.3s ease;
  }

.nav-side-menu {
  overflow: auto;
  font-family: verdana;
  font-size: 12px;
  font-weight: 200;
  background-color: #2e353d;
  position: fixed;
  top: 0px;
  width: 250px;
  height: 100%;
  color: #e1ffff;
}
.nav-side-menu .brand {
  background-color: #23282e;
  line-height: 50px;
  display: block;
  text-align: center;
  font-size: 14px;
}
.nav-side-menu .toggle-btn {
  display: none;
}

.nav-side-menu ul,
.nav-side-menu li {
  list-style: none;
  padding: 0px;
  margin: 0px;
  line-height: 35px;
  cursor: pointer;
  /*    
    .collapsed{
       .arrow:before{
                 font-family: FontAwesome;
                 content: "\f053";
                 display: inline-block;
                 padding-left:10px;
                 padding-right: 10px;
                 vertical-align: middle;
                 float:right;
            }
     }
*/
}
.nav-side-menu ul :not(collapsed) .arrow:before,
.nav-side-menu li :not(collapsed) .arrow:before {
  font-family: FontAwesome;
  content: "\f078";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
  float: right;
}
.nav-side-menu ul .active,
.nav-side-menu li .active {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
}
.nav-side-menu ul .sub-menu li.active,
.nav-side-menu li .sub-menu li.active {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li.active a,
.nav-side-menu li .sub-menu li.active a {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li,
.nav-side-menu li .sub-menu li {
  background-color: #181c20;
  border: none;
  line-height: 28px;
  border-bottom: 1px solid #23282e;
  margin-left: 0px;
}
.nav-side-menu ul .sub-menu li:hover,
.nav-side-menu li .sub-menu li:hover {
  background-color: #020203;
}
.nav-side-menu ul .sub-menu li:before,
.nav-side-menu li .sub-menu li:before {
  font-family: FontAwesome;
  content: "\f105";
  display: inline-block;
  padding-left: 10px;
  padding-right: 10px;
  vertical-align: middle;
}
.nav-side-menu li {
  padding-left: 0px;
  border-left: 3px solid #2e353d;
  border-bottom: 1px solid #23282e;
}
.nav-side-menu li a {
  text-decoration: none;
  color: #e1ffff;
}
.nav-side-menu li a i {
  padding-left: 10px;
  width: 20px;
  padding-right: 20px;
}
.nav-side-menu li:hover {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
  -webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  -ms-transition: all 1s ease;
  transition: all 1s ease;
}
@media (max-width: 767px) {
  .nav-side-menu {
    position: relative;
    width: 100%;
    margin-bottom: 10px;
  }
  .nav-side-menu .toggle-btn {
    display: block;
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10 !important;
    padding: 3px;
    background-color: #ffffff;
    color: #000;
    width: 40px;
    text-align: center;
  }
  .brand {
    text-align: left !important;
    font-size: 22px;
    padding-left: 20px;
    line-height: 50px !important;
  }
}
@media (min-width: 767px) {
  .nav-side-menu .menu-list .menu-content {
    display: block;
  }
}
body {
  margin: 0px;
  padding: 0px;
}

.table_sortable thead th.desc:after {
	  content: '↑';

	}

	 

	.table_sortable thead th.asc:after {

	  content: '↓';

	}


#list_view{
  overflow:scroll;
  scrollbar-width: thin;
}

.row{
  margin-left: 0px !important;
  margin-right: 0px !important;
}
#rec_tbl{
  line-height:0.8;
}
#rec_tbl tr td{
  padding:0px;
  vertical-align:middle;
}
.tbl_dv{
  padding-left: 8px;
}

#hdr_company{
  font: italic small-caps bold 30px/1.2 "Helvetica Neue", Helvetica, Arial,
        sans-serif;
        color: darkcyan;
}
.view_tab{
  /* overflow-y:scroll; */
}
.alertify-notifier.ajs-bottom{
    bottom:0px !important;

    top:10px;
}

.ui-datepicker {
            font-size: 12px; 
        }
        .ui-datepicker-header {
            font-size: 14px; 
            height: 30px; 
        }
        .ui-datepicker-calendar {
            width: 160px; 
        }
        .ui-datepicker-calendar td {
            height: 24px; 
            width: 24px;  
        }
        .ui-datepicker-title select {
            font-size: 12px; 
        }
</style>







</head>

<body>




<input type="hidden" value="{{ Request::path() }}" id="crnt_url">

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="">
     
            <div class="nav-side-menu">
    <div class="brand">Inventory </div>

    <div id="dismiss" >
                <i class="fas fa-arrow-left"></i>
            </div>

    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
         
            <ul id="menu-content" class="menu-content collapse out">
              @include('menu.index')
               
            </ul>
     </div>
</div>
            
        </nav>

        <!-- Page Content  -->
     
     
    
        <div id="content">
          
        <nav class="navbar navbar-expand-lg navbar-light " id="main-nav">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-plus"></i>
                        
                       <!--  <span>Toggle Sidebar</span> -->
                    </button>
                    <div class="col-lg-8 col-md-8 col-sm-8 ">

<h3 class="page-title">@yield('pageName')</h3>

</div>
                    <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button> -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <div class="row col-lg-12 col-md-12 col-sm-12">

                   
                      
<div class="col-lg-2 col-sm-2 col-md-2 text-right">
<ul class="nav navbar-nav " style="float:right">
                            <li class="nav-item active">
                                <a class="nav-link" >{{Session::get('Staff_Name')}}</a>
                                
                            </li>
                              </ul>

</div>

                      </div>
                       
                    </div>
                   
                </div>
        
               
            </nav>
       

<div>


<input type="hidden" id="Staff_ID" value="{{ Session::get('Staff_ID')}}">
<input type="hidden" id="Staff_Type" value="{{ Session::get('Staff_Type')}}">
<input type="hidden" id="Staff_Name" value="{{ Session::get('Staff_Name')}}">
<input type="hidden" id="Branch_ID" value="{{ Session::get('Branch_ID')}}">
<input type="hidden" id="Branch_Name" value="{{ Session::get('Branch_Name')}}">
<input type="hidden" id="Staff_Menu" value="{{ Session::get('Staff_Menu')}}">
<input type="hidden" id="Sys_CompanyName" value="{{ Session::get('Sys_CompanyName')}}">
<input type="hidden" id="Sys_CompanyID" value="{{ Session::get('Sys_CompanyID')}}">



<input type="text" id="decimal_place" value="{{ Session::get('decimal_place')}}">


</div>


            <div class="form-title">&nbsp;</div>

<!-- 
            <div class="sidebar2" id="sidebar2">

    <p>This is the sidebar content.</p>
  </div> -->

  <div class="view_tab">
  @yield('page-content')

  </div>

            </div>
        


    </div>

<!--Bottom Footer-->
    <div class="bottom section-padding text-center">
<span class="text-white" style="float:left;">Vega Business Software</span>
<span id="uid"></span>
<span id="alt_text"></span>

    </div>
<!--Bottom Footer-->

    <div class="overlay"></div>
   

    <div id="customAlertOverlay">
  <div id="customAlert">
    <h2 id="customAlertMessage">This is a custom alert!</h2>
    <button id="customAlertButton">OK</button>
  </div>
</div>


    <!-- <script src="{{ asset('js/jquery-3.3.1.slim.min.js')}}" ></script> -->
     
    <script src="{{ asset('js/jquery.min.js') }}" ></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" ></script>
    <script src="{{ asset('js/select2.min.js')}}"></script>
  
    <script  src="{{ asset('js/jquery.mask.min.js') }}" ></script>


    <script src="{{ asset('js/popper.min.js')}}" ></script>

<script src="{{ asset('js/bootstrap.min.js')}}" ></script>
 <script src="{{ asset('project-js/fetch_view_table.js')}}"></script>

 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script> -->
         
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
   

    <script  src="{{ asset('js/UUID.js') }}" ></script>
    <script  src="{{ asset('js/client.min.js') }}" ></script>
    <script  src="{{ asset('js/dataTables.min.js') }}" ></script>
    <script  src="{{ asset('js/dataTables.buttons.js') }}" ></script>
    <script  src="{{ asset('js/pdfmake.min.js') }}" ></script>
    <script  src="{{ asset('js/vfs_fonts.js') }}" ></script>
    <script  src="{{ asset('js/buttons.html5.min.js') }}" ></script>
    <script  src="{{ asset('js/buttons.print.min.js') }}" ></script>

    <script src="{{ asset('project-js/vega_scripts.js')}}?v=2.8.0"></script>
    
    @include('common.db_mdl')
<script type="text/javascript">
  
  function updateInternetStatus() {
   
        let statusDiv = document.getElementById("alt_text");

        if (!navigator.onLine) {
            statusDiv.innerHTML = "🔴 offline!";
            statusDiv.style.color = "red";
        } else {
          
            statusDiv.innerHTML = "🟢 online!";
            statusDiv.style.color = "green";
            setTimeout(() => {
            statusDiv.innerHTML = "";
        }, 3000);
        }

   
     
    }



    window.addEventListener("offline", updateInternetStatus);


    window.addEventListener("online", updateInternetStatus);

    
   //  document.addEventListener("DOMContentLoaded", updateInternetStatus);

$( document ).ready(function() {



  var client = new ClientJS(); 
	
	var W=client.getScreenPrint();
	var E=client.isLocalStorage();
	var R=client.isSessionStorage();
	var T=client.getLanguage();
	var Y=client.getSystemLanguage();
	var U=client.isCookie();
	var I=client.getCanvasPrint();
	var O = client.getBrowser();
	var P = client.getOS();
	var A = client.getOSVersion(); 
	var S = client.getDevice();
	var D = client.getDeviceType();
	var F = client.getDeviceVendor(); 
	var G = client.getCPU(); 
	

var uuid = client.getCustomFingerprint(W, E, R, T, Y, U, I, O, P, A, S, D, F, G);

$("#uid").html('Instance:'+uuid);

$("#uuid").val(uuid);


$(".edit_btn").hide();

  $('.input-text').focus(function() {
            var inputId = $(this).attr('id');
            $('#' + inputId + '_error').text('');
        });

api_path=$("#api_path").val();
token=$("#token").val();
branch_id=$("#branch_id").val();
company_id=$("#company_id").val();
user_session=$("#session_id").val();
log_user_id=$("#user_id").val();
branch_validate_id=$("#branch_validate_id").val();
company_state=$("#company_state").val();
company_name=$("#company_name").val();
company_GSTIN=$("#company_GSTIN").val();
uuid=$("#uuid").val();
decimal_place=$("#decimal_place").val();
// token=getCookie('inv_id');


$('#customAlertButton').on('click', function () {
    $('#customAlertOverlay').fadeOut();
  });


});










$.widget('custom.tableAutocomplete', $.ui.autocomplete, {
    options: {
        open: function (event, ui) {
            // Hack to prevent a 'menufocus' error when doing sequential searches using only the keyboard
            $('.ui-autocomplete .ui-menu-item:first').trigger('mouseover');
        },
        focus: function (event, ui) {
            event.preventDefault();
        }
    },
    _create: function () {
        this._super();
        // Using a table makes the autocomplete forget how to menu.
        // With this we can skip the header row and navigate again via keyboard.
        this.widget().menu("option", "items", ".ui-menu-item");
    },
    _renderMenu: function (ul, items) {
        var self = this;
        var $table = $('<table class="table-autocomplete">'),
            $thead = $('<thead>'),
            $headerRow = $('<tr>'),
            $tbody = $('<tbody>');

        $.each(self.options.columns, function (index, columnMapping) {
            $('<th>').text(columnMapping.title).appendTo($headerRow);
        });

        $thead.append($headerRow);
        $table.append($thead);
        $table.append($tbody);

        ul.html($table);

        $.each(items, function (index, item) {
            self._renderItemData(ul, ul.find("table tbody"), item);
        });
    },
    _renderItemData: function (ul, table, item) {
        return this._renderItem(table, item).data("ui-autocomplete-item", item);
    },
    _renderItem: function (table, item) {
        var self = this;
        var $tr = $('<tr class="ui-menu-item" role="presentation">');

        $.each(self.options.columns, function (index, columnMapping) {
            var cellContent = !item[columnMapping.field] ? '' : item[columnMapping.field];
            $('<td>').text(cellContent).appendTo($tr);
        });

        return $tr.appendTo(table);
    }
});






function custom_alert_txt(msg,flag) {

  bg_clr='';
  if(flag==1){
    bg_clr='text-success';
}
  else{
    bg_clr='text-danger';
  }

  $("#alt_text").html('<span class="'+bg_clr+'" style="font-weight: bold;letter-spacing: 1px;font-style: italic;">'+msg+'</span>');


  setTimeout(function(){

 $("#alt_text").html('');
  },3000);
  
}

  // custom_alert_txt('Saved Succesfully',1);




function getCookie(name) {
  let cookieValue = null;
  if (document.cookie && document.cookie !== '') {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
      const cookie = cookies[i].trim();

      if (cookie.startsWith(name + '=')) {
        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
        break;
      }
    }
  }
  return cookieValue;
}

function CustomAlert(message) {
    $('#customAlertMessage').text(message);
    $('#customAlertOverlay').fadeIn();
  }

  


</script>
    @yield('page-script')
</body>

</html>