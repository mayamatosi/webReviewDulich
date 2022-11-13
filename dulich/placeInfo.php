<?php
session_start();
$id_d = $_GET['id'];

$dbo = new PDO('mysql:host=localhost;dbname=dia_diem', 'root');
$count = $dbo->prepare("select * from diadiem dd join mota mt on dd.id_dd = mt.id_dd where dd.id_dd=:id_d and mt.id_dd=:id_d ");
$count->bindParam(":id_d", $id_d, PDO::PARAM_INT, 3);

if ($count->execute()) {
  $row = $count->fetch(PDO::FETCH_OBJ);
}
?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>placeInfo</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="placeInfo.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 4.21.12, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">


  <script src="jquery.min.js"></script>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
    }
  </script>
  <script>
    var map, directionsManager;

    function GetMap()
    {
        map = new Microsoft.Maps.Map('#myMap', {});

        //Load the directions module.
        Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
            //Create an instance of the directions manager.
            directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);

            //Specify where to display the route instructions.
            directionsManager.setRenderOptions({ itineraryContainer: '#directionsItinerary' });

            //Specify the where to display the input panel
            directionsManager.showInputPanel('directionsPanel');
        });
    }

    function GetDirections() {
        //Clear any previously calculated directions.
        directionsManager.clearAll();
        directionsManager.clearDisplay();
        
        //Create waypoints to route between.
        var start = new Microsoft.Maps.Directions.Waypoint({ address: document.getElementById('fromTbx').value });
        directionsManager.addWaypoint(start);

        var end = new Microsoft.Maps.Directions.Waypoint({ address: document.getElementById('toTbx').value });
        directionsManager.addWaypoint(end);

        //Calculate directions.
        directionsManager.calculateDirections();
    }
    </script>
    
    <script type="text/javascript">
    jQuery(document).ready(function($){
          $('.button').on('click', function(e){
              e.preventDefault();
              var user_id = $(this).attr('user_id'); // Get the parameter user_id from the button
              var id_dd = $(this).attr('id_dd'); // Get the parameter id_dd from the button
              var method = $(this).attr('method');  // Get the parameter method from the button
              if (method == "Like") {
                $(this).attr('method', 'Unlike') // Change the div method attribute to Unlike
                $('#' + id_dd).replaceWith('<img class="favicon" id="' + id_dd + '" src="like.png">') // Replace the image with the liked button
              } else {
               $(this).attr('method', 'Like')
               $('#' + id_dd).replaceWith('<img class="favicon" id="' + id_dd + '" src="unlike.png">')
              }
              $.ajax({
                  url: 'favs.php', // Call favorite.php to update the database
                  type: 'GET',
                  data: {user_id: user_id, id_dd: id_dd, method: method},
                  cache: false,
                  success: function(data){
                  }
              });
          });
      });
    </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="placeInfo">
  <meta property="og:type" content="website">
</head>

<body class="u-body u-xl-mode" data-lang="en">
  <header class="u-clearfix u-header" id="sec-a4ab" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-group-elements u-group-elements-1">
        <div class="u-clearfix u-group-elements u-group-elements-2">
          <img class="u-hidden-md u-hidden-sm u-hidden-xs u-image u-image-1" src="https://pixabay.com/get/g17e703f3a46b04ff0ccf65f608090c0ec2657b7a3f5bae529206172e3312bc2cd5098ecba6008f617b59df5b2bdbf54180f5d66c90cc30df59312deb8d687e36_1280.png" data-image-width="1280" data-image-height="1280">
          <nav class="u-dropdown-icon u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="MD">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 500;">
              <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-decoration u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                <svg class="u-svg-link" viewBox="0 0 24 24">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e04e"></use>
                </svg>
                <svg class="u-svg-content" version="1.1" id="svg-e04e" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <rect y="1" width="16" height="2"></rect>
                    <rect y="7" width="16" height="2"></rect>
                    <rect y="13" width="16" height="2"></rect>
                  </g>
                </svg>
              </a>
            </div>
            <div class="u-custom-menu u-nav-container">
              <ul class="u-nav u-spacing-26 u-unstyled u-nav-1">
                <li class="u-nav-item"><a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white" href="home.php" style="padding: 12px 36px;">Trang chủ</a>
                </li>
                <li class="u-nav-item"><a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white" href="trong_nuoc.php" style="padding: 12px 36px;">Trong nước</a>
                  <div class="u-nav-popup">
                    <ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                      <li class="u-nav-item"><a class="u-button-style u-grey-5 u-nav-link" href="mien.php">Miền Bắc</a>
                      </li>
                      <li class="u-nav-item"><a class="u-button-style u-grey-5 u-nav-link">Miền Trung</a>
                      </li>
                      <li class="u-nav-item"><a class="u-button-style u-grey-5 u-nav-link">Miền Nam</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="u-nav-item"><a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white" href="ngoai_nuoc.php" style="padding: 12px 36px;">Ngoài nước</a>
                </li>
                <li class="u-nav-item"><a class="u-active-palette-1-light-2 u-border-active-palette-1-base u-border-hover-palette-1-light-1 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-white u-text-grey-90 u-text-hover-white u-white" href="Contact.php" style="padding: 12px 36px;">Liên hệ</a>
                </li>
              </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
              <div class="u-black u-container-style u-expanded-width u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                <div class="u-inner-container-layout u-sidenav-overflow">
                  <div class="u-expanded u-menu-close"></div>
                  <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-3">
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="home.php">Trang chủ</a>
                    </li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="trong_nuoc.php">Trong nước</a>
                      <div class="u-nav-popup">
                        <ul class="u-border-1 u-border-grey-30 u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                          <li class="u-nav-item"><a class="u-button-style u-nav-link" href="mien.php">Miền Bắc</a>
                          </li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link">Miền Trung</a>
                          </li>
                          <li class="u-nav-item"><a class="u-button-style u-nav-link">Miền Nam</a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="ngoai_nuoc.php">Ngoài nước</a>
                    </li>
                    <li class="u-nav-item"><a class="u-button-style u-nav-link" href="Contact.php">Liên hệ</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
          </nav>
        </div>
        <img class="u-hidden-md u-hidden-sm u-hidden-xs u-image u-image-contain u-image-2" src="images/pngegg1.png" data-image-width="1000" data-image-height="685">
      </div>
      <nav class="u-hidden-xs u-menu u-menu-dropdown u-offcanvas u-menu-2" data-responsive-from="XS">
        <div class="menu-collapse">
          <a class="u-button-style u-nav-link" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-83c8"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="svg-83c8" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>
        <?php
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
              echo '
              <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" style="margin-top: 20px;" href="login_page.php">Đăng nhập</a>
                  </li>
                </ul>
              </div>';
            } else {
            echo '
            <div class="u-custom-menu u-nav-container">
              <ul class="u-nav u-spacing-1 u-unstyled u-nav-1">
                <li class="u-nav-item"><p class="u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" style="margin-top: 20px; margin-bottom: 0px;" >Xin chào, '.htmlspecialchars($_SESSION["username"]).'</p>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-38 u-nav u-unstyled u-v-spacing-16 u-nav-2">';
            if($_SESSION["user_type"] == 2) {
              echo '
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="booking.php">Thông tin các tài khoản</a>
                      </li>
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="logout.php">Đăng xuất</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>'; 
            }else {
              echo '
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="userInfo.php">Thông tin tài khoản</a>
                      </li>
                      <li class="u-nav-item"><a class="u-button-style u-nav-link u-white" href="logout.php">Đăng xuất</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            ';
            }
          }
      ?>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
          
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
      <nav class="u-hidden-xs u-menu u-menu-one-level u-offcanvas u-menu-3" data-responsive-from="XS">
        <div class="menu-collapse">
          <a class="u-button-style u-nav-link" href="#">
            <svg class="u-svg-link" viewBox="0 0 24 24">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-67fb"></use>
            </svg>
            <svg class="u-svg-content" version="1.1" id="svg-67fb" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
              <g>
                <rect y="1" width="16" height="2"></rect>
                <rect y="7" width="16" height="2"></rect>
                <rect y="13" width="16" height="2"></rect>
              </g>
            </svg>
          </a>
        </div>
        <div class="u-custom-menu u-nav-container">
          
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </div>
  </header>
  <section class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1" id="sec-55b8">
    
  <div class="u-clearfix u-sheet u-sheet-1">
      <div class="fr-view u-clearfix u-rich-text u-text u-text-1">
        <h2 style="text-align: left;"><?php echo $row->ten ?></h2>
        <h5 style="text-align: left;"><?php echo $row->title ?></h5>
        <p style="text-align: left;">
          <span style="line-height: 2.0;"><?php echo $row->cont ?>
          </span>
        </p>
      </div>
      <a href="#sec-b7fb" class="u-btn u-button-style u-dialog-link u-btn-1">Xem bản đồ</a>
      
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "dia_diem";
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      function checkFavorite($user_id, $id_dd, $conn) {
        $result = $conn->query("SELECT * FROM favorite WHERE user_id = '". $user_id."' AND id_dd = '". $id_dd."'");
        $numrows =  $result->num_rows;
        if ($numrows == 0) {
         echo "<div class = 'button' method = 'Like'  user_id = ".$user_id." id_dd = ".$id_dd."> <img id=".$id_dd." src='unlike.png'> </div>";
        }
        else {
          echo  "<div class = 'button' method = 'Unlike'  user_id = ".$user_id." id_dd = ".$id_dd."> <img id=".$id_dd." src='like.png'> </div>";
        }
      }
      
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        echo '<p>Bạn thích địa điểm này? <a href="login_page.php"> Đăng nhập </a> ngay để lưu vào yêu thích. </p>';
      } else {
      $username = $_SESSION["username"];
      // Query to get the user_id
      $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
      $row_fv = $result->fetch_assoc();
      $user_id = $row_fv['user_id'];

      // Query to Get the Director ID
      $result = $conn->query("SELECT * FROM diadiem WHERE id_dd = '$id_d'");
      $row_fv = $result->fetch_assoc();
      $id_dd = $row_fv['id_dd'];

      echo "<p>Thích thú với địa điểm này? Thêm vào danh sách yêu thích nào...</p> ";
      $fav_image = checkFavorite($user_id, $id_dd, $conn);
      }
    ?>
    </div>
  </section>



  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-568d">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/website-mockup" target="_blank">
      <span>Website Mockup</span>
    </a>
    <p class="u-text">
      <span>created with</span>
    </p>
    <a class="u-link" href="" target="_blank">
      <span>Offline Website Builder</span>
    </a>.
  </section>
  <section class="u-align-center u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-dialog-section-4" id="sec-b7fb">
    <div class="u-align-center-lg u-align-center-md u-align-center-xl u-border-2 u-border-palette-2-base u-container-style u-dialog u-grey-10 u-radius-4 u-shape-round u-dialog-1">
      <div class="u-container-layout u-container-layout-1">
        <div class="u-clearfix u-custom-html u-custom-html-1">
          <style></style>
          

    <div style="margin-top:10px;">
    <?php
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
              echo '
        Từ: <input id="fromTbx" type="text" value=""/>';
            }else {echo '
              Từ: <input id="fromTbx" type="text" value="'.$_SESSION['dia_chi'].'"/>';
              }?>
        Đến: <input id="toTbx" type="text" value="<?php echo $row->vi_tri ?>"/>
        <input type="button" onclick="GetDirections()" value="XEM" />
    </div> <fieldset style="width:800px;margin-top:10px;">
        <legend>Nên <a href="login_page">đăng nhập</a> hoặc <a href="register_page">đăng kí</a> để tiện hơn.</legend>
        Khi đã có địa điểm cần xem, hãy nhấp vào nút XEM, có thể kéo các điểm trắng để thay đổi tuyến đường.
    </fieldset>   
<div id="myMap" style="position:relative;width:100%;min-width:290px;height:600px;background-color:gray"></div>
    

    <script>
        // Dynamic load the Bing Maps Key and Script
        // Get your own Bing Maps key at https://www.microsoft.com/maps
        (async () => {
            let script = document.createElement("script");
            
            script.setAttribute("src", `https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Ao_khQfnhjsgCQPM4aTv6acAI6EJQX404a-TXPaVLOFBRLBAz_Jlx3wThsuw86Vf`);
            document.body.appendChild(script);
        })();
    </script>
        </div>
      </div><button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 329.26933 329" style="">
          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-ea5c"></use>
        </svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 329.26933 329" id="svg-ea5c">
          <path d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"></path>
        </svg></button>
    </div>
  </section>
  <style>
    .u-dialog-section-4 {
      min-height: 826px;
    }

    .u-dialog-section-4 .u-dialog-1 {
      width: 1140px;
      min-height: 733px;
      box-shadow: 0 0 14px 0 rgba(0, 0, 0, 0.3);
      height: auto;
      margin: 39px auto 60px;
    }

    .u-dialog-section-4 .u-container-layout-1 {
      padding: 16px 30px;
    }

    .u-dialog-section-4 .u-custom-html-1 {
      height: auto;
      min-height: 696px;
      width: 1076px;
      margin: 1px 0 0;
    }

    .u-dialog-section-4 .u-icon-1 {
      width: 16px;
      height: 16px;
      left: auto;
      top: 17px;
      position: absolute;
      right: 16px;
    }

    @media (max-width: 1199px) {
      .u-dialog-section-4 .u-dialog-1 {
        width: 940px;
      }

      .u-dialog-section-4 .u-custom-html-1 {
        width: 880px;
        margin-left: 0;
        margin-right: 0;
      }
    }

    @media (max-width: 991px) {
      .u-dialog-section-4 .u-dialog-1 {
        width: 720px;
      }

      .u-dialog-section-4 .u-custom-html-1 {
        width: 660px;
      }
    }

    @media (max-width: 767px) {
      .u-dialog-section-4 .u-dialog-1 {
        width: 540px;
      }

      .u-dialog-section-4 .u-custom-html-1 {
        width: 520px;
      }
    }

    @media (max-width: 575px) {
      .u-dialog-section-4 .u-dialog-1 {
        width: 340px;
      }

      .u-dialog-section-4 .u-container-layout-1 {
        padding-left: 20px;
        padding-right: 20px;
      }

      .u-dialog-section-4 .u-custom-html-1 {
        width: 320px;
      }
    }
  </style>
</body>

</html>