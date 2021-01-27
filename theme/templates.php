 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Janobe / <?php echo $title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="<?php echo web_root; ?>plugins/home-plugins/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo web_root; ?>plugins/home-plugins/css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
<link href="<?php echo web_root; ?>plugins/home-plugins/css/flexslider.css" rel="stylesheet" /> 
<link href="<?php echo web_root; ?>plugins/home-plugins/css/style.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/dataTables.bootstrap.css">  --> 
<link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css"> 

<link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/jquery.dataTables_themeroller.css"> 
<!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" media="screen">
 
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style type="text/css">
 
  #content {
    min-height: 400px;
    color: #000;
  }
  
  .contentbody p {
    font-weight: bold;
  }
  .login a:hover{ 
    color: #00bcd4;
    text-decoration: none;

  }
  .login a:focus{ 
    color: #00bcd4;
    text-decoration: none;

  }
  .login a { 
     font-size: 14px;
    color: #fff;
    padding:0px;
  }
</style>

</head>
<body>
<div id="wrapper" class="home-page">
 
  <!-- start header -->
  <header>
        <div class="topbar navbar-fixed-top">
          <div class="container">
            <div class="row">
              <div class="col-md-12">      
                <p class="pull-left hidden-xs"><i class="fa fa-phone"></i>Tel No. (+001) 123-456-789</p>
                 <div class="pull-right login">
                <?php

                if (isset($_SESSION['gcCart'])) {
                  # code...
                   $count_cart = count($_SESSION['gcCart']); 
                }else{ 
                    $count_cart=0;
                }


                 echo '<a title="View Notification(s)" href="'.web_root.'index.php?q=cart"> <i class="fa fa-shopping-cart"></i> <span class="loadnotif label label-success">'.$count_cart.'</span></a> | ';



                 if (isset($_SESSION['CustomerID'])) { 
 

                    $customer = new Customer();
                    $cus  = $customer->single_customer($_SESSION['CustomerID']);

                    $sql ="SELECT count(*) as 'COUNT' FROM `tblstockout` WHERE `HView`=1 AND `CustomerID`='{$_SESSION['CustomerID']}'";
                    $mydb->setQuery($sql);
                    $showMsg = $mydb->loadSingleResult();
                    $msg =isset($showMsg->COUNT) ? $showMsg->COUNT : 0; 

                    echo '<a title="View Message(s)" href="'.web_root.'customer/index.php?view=notification"> <i class="fa fa-bell-o"></i> <span class="label label-success">'.$msg.'</span></a> | <a title="View Profile" href="'.web_root.'customer/"> <i class="fa fa-user"></i> Howdy, '. $cus->CustomerName .' </a> | <a href="'.web_root.'logout.php">  <i class="fa fa-sign-out"> </i>Logout</a> ';

                    }else{ ?> 
                      <p   class="login"><a href="index.php?q=register/store"> <i class="fa fa-building-o"></i> Register Store </a></p> |
                      <p   class="login"><a href="index.php?q=register/customer"> <i class="fa fa-users"></i> Register Customer </a></p>
                      |
                      <p   class="login"><a data-target="#myModal" data-toggle="modal" href=""> <i class="fa fa-lock"></i> Login </a></p>
                  
                <?php } ?>
              </div>
              </div>
            </div>
          </div>
        </div> 
        <div style="min-height: 30px;"></div>
        <div class="navbar navbar-default navbar-static-top" > 
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo web_root; ?>index.php">Janobe<!-- <img src="<?php echo web_root; ?>plugins/home-plugins/img/logo.png" alt="logo"/> --></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo !isset($_GET['q'])? 'active' :''?>"><a href="<?php echo web_root; ?>index.php">Home</a></li> 
                        <li class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Search <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='advancesearch'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=advancesearch">Advance Search</a></li>
                              <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='search/store'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=search/store">Filter By Store</a></li>
                              <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='search/category'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=search/category">Filter By Category</a></li>  
                          </ul>
                       </li> 
                      <li class="dropdown <?php  if(isset($_GET['q'])) { if($_GET['q']=='category'){ echo 'active'; }else{ echo ''; }}  ?>">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Product Categories<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <?php 
                            $sql = "SELECT * FROM `tblcategory` LIMIT 10";
                            $mydb->setQuery($sql);
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              # code...

                                if (isset($_GET['search'])) {
                                  # code...
                                   if ($result->CategoryID==$_GET['search']) {
                                     # code...
                                    $viewresult = '<li class="active"><a href="'.web_root.'index.php?q=category&search='.$result->CategoryID.'">'.$result->Categories.'</a></li>';
                                   }else{
                                    $viewresult = '<li><a href="'.web_root.'index.php?q=category&search='.$result->CategoryID.'">'.$result->Categories.'</a></li>';
                                   }
                                }else{
                                    $viewresult = '<li><a href="'.web_root.'index.php?q=category&search='.$result->CategoryID.'">'.$result->Categories.'</a></li>';
                                } 

                                echo $viewresult;

                              }

                            ?> 
                          </ul>
                       </li> 
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='company'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=company">Store</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='map'){ echo 'active'; }else{ echo ''; }} ?>"><a href="<?php echo web_root; ?>index.php?q=map">Map</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='About'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=About">About Us</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Contact'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="<?php echo web_root; ?>index.php?q=Contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
  </header>
  <!-- end header -->  

  <?php
    if (!isset($_SESSION['CustomerID'])) { 
      include("login.php");
    }
  ?>
      <?php

      if (isset($_GET['q'])) {
        # code...
        echo '<section id="inner-headline" style="background: #cf7d7d">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">'.$title.'</h2>
                    </div>
                </div>
            </div>
            </section>';
      }


       require_once $content;

        ?>   
 

  <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Our Contact</h5>
          <address>
          <strong>Our Company</strong><br>
          JC Main Road, Near Silnile tower<br>
           Pin-21542 NewYork US.</address>
          <p>
            <i class="icon-phone"></i> (123) 456-789 - 1255-12584 <br>
            <i class="icon-envelope-alt"></i> jannopalacios@gmail.com
          </p>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Quick Links</h5>
          <ul class="link-list">
            <li><a href="<?php echo web_root; ?>index.php?q=company">Store</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=map">Map</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=About">About Us</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=Contact">Contact</a></li>
          </ul>
        </div>
      </div>
<!--       <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Latest posts</h5>
          <ul class="link-list">
            <?php 
                  $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID`   ORDER BY DATEPOSTED DESC LIMIT 3" ;
                  $mydb->setQuery($sql);
                  $cur = $mydb->loadResultList();


                  foreach ($cur as $result) {
                    echo ' <li><a href="'.web_root.'index.php?q=viewjob&search='.$result->JOBID.'">'.$result->COMPANYNAME . '/ '. $result->OCCUPATIONTITLE .'</a></li>';
                  } 
              ?> 
          </ul>
        </div>
      </div> -->
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Search</h5>
          <ul class="link-list">
            <li><a href="<?php echo web_root; ?>index.php?q=advancesearch">Advance Search</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=search/store">Filter By Store</a></li>
            <li><a href="<?php echo web_root; ?>index.php?q=search/category">Filter By Category</a></li>  
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            <p>
              <span>&copy; Janno Palacios 2018 All right reserved.  
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="social-network">
            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script> -->
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.easing.1.3.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/bootstrap.min.js"></script>
 

<script type="text/javascript" src="<?php echo web_root; ?>plugins/dataTables/dataTables.bootstrap.min.js" ></script>  
<script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script> 

<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> 

<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox-media.js"></script>  
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.flexslider.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>


<!-- Vendor Scripts -->
<script src="<?php echo web_root; ?>plugins/home-plugins/js/modernizr.custom.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.isotope.min.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/custom.js"></script> 
<!-- <script src="<?php echo web_root; ?>plugins/paralax/paralax.js"></script>  -->

 <script type="text/javascript">


   
     $(function () {
    $("#dash-table").DataTable();
    $('#dash-table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


     $("#btnlogin").click(function(){
        var username = document.getElementById("user_email");
        var pass = document.getElementById("user_pass");

        // alert(username.value)
        // alert(pass.value)
        if(username.value=="" && pass.value==""){   
          $('#loginerrormessage').fadeOut(); 
                $('#loginerrormessage').fadeIn();  
                $('#loginerrormessage').css({ 
                        "background" :"red",
                        "color"      : "#fff",
                        "padding"    : "5px;"
                    }); 
          $("#loginerrormessage").html("Invalid Username and Password!");
          //  $("#loginerrormessage").css(function(){ 
          //   "background-color" : "red";
          // });
        }else{

          $.ajax({    //create an ajax request to load_page.php
              type:"POST",  
              url: "process.php?action=login",    
              dataType: "text",  //expect html to be returned  
              data:{USERNAME:username.value,PASS:pass.value},               
              success: function(data){   
                // alert(data);
                $('#loginerrormessage').fadeOut(); 
                $('#loginerrormessage').fadeIn();  
                $('#loginerrormessage').css({ 
                        "background" :"red",
                        "color"      : "#fff",
                        "padding"    : "5px;"
                    }); 
               $('#loginerrormessage').html(data);   
              } 
            }); 
          }
        });


$('input[data-mask]').each(function() {
  var input = $(this);
  input.setMask(input.data('mask'));
});


$('#BIRTHDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});
$('#HIREDDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});

$('.date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
  startDate : '01/01/1950', 
  language:  'en',
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1, 
  startView: 2,
  minView: 2,
  forceParse: 0 

});

$(function(){  
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET", "loadcart.php", false);
      xmlhttp.send(null);
      // $('#loaddata').hide();   
      // $('#loaddata').fadeIn(); 
      $('#loaddata').html(xmlhttp.responseText);   
  });




// setInterval(function()
// {
//       var xmlhttp = new XMLHttpRequest();
//       xmlhttp.open("GET", <?php echo web_root?>"loadnotif.php", false);
//       xmlhttp.send(null);
//       // $('#loaddata').hide();   
//       // $('#loaddata').fadeIn(); 
//       $('.loadnotif').html(xmlhttp.responseText);  
// },1000);

 </script>


 
</body>
</html>
 