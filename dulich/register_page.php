<?php
require_once "config.php";
$username = $password = $confirm_password = $dia_chi = "";
$username_err = $password_err = $confirm_password_err = $dia_chi_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
    $username_err = "Username can only contain letters, numbers, and underscores.";
  } else {
    $sql = "SELECT user_id FROM users WHERE username = :username";

    if ($stmt = $pdo->prepare($sql)) {
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $param_username = trim($_POST["username"]);
      if ($stmt->execute()) {
        if ($stmt->rowCount() == 1) {
          $username_err = "Tài khoản này đã tồn tại.";
        } else {
          $username = trim($_POST["username"]);
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
      unset($stmt);
    }
  }
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "Mật khẩu phải nhiều hơn 6 ký tự.";
  } else {
    $password = trim($_POST["password"]);
  }
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Hãy nhập lại mật khẩu.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Mật khẩu không khớp.";
    }
  }
  if (empty(trim($_POST["dia_chi"]))) {
    $dia_chi_err = "Điền Địa chỉ của bạn.";
  } elseif (strlen(trim($_POST["dia_chi"])) < 10) {
    $dia_chi_err = "Địa chỉ phải trên 10 kí tự.";
  } else {
    $dia_chi = trim($_POST["dia_chi"]);
  }
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err && empty($dia_chi_err))) {

    $sql = "INSERT INTO users (username, password, dia_chi) VALUES (:username, :password, :dia_chi)";

    if ($stmt = $pdo->prepare($sql)) {
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
      $stmt->bindParam(":dia_chi", $param_dia_chi, PDO::PARAM_STR);
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT);
      $param_dia_chi = $dia_chi;
      if ($stmt->execute()) {
        header("location: login_page.php");
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
      unset($stmt);
    }
  }
  unset($pdo);
}
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>register_page</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="register_page.css" media="screen">
  <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 4.21.12, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">



  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": ""
    }
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="register_page">
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
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-unstyled">
            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="login_page.php" style="padding: 14px 61px 14px 60px;">abc</a>
              <div class="u-nav-popup">
                <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                  <li class="u-nav-item"><a class="u-button-style u-nav-link u-white">Thông tin tài khoản</a>
                  </li>
                  <li class="u-nav-item"><a class="u-button-style u-nav-link u-white">Đăng xuất</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-7">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="login_page.php">abc</a>
                  <div class="u-nav-popup">
                    <ul class="u-h-spacing-20 u-nav u-unstyled u-v-spacing-10">
                      <li class="u-nav-item"><a class="u-button-style u-nav-link">Thông tin tài khoản</a>
                      </li>
                      <li class="u-nav-item"><a class="u-button-style u-nav-link">Đăng xuất</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </div>
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
          <ul class="u-nav u-unstyled">
            <li class="u-nav-item"><a class="u-button-style u-nav-link" href="login_page.php" style="padding: 14px 61px 14px 60px;">Đăng nhập</a>
            </li>
          </ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-10">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="login_page.php">Đăng nhập</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav>
    </div>
  </header>
  <section class="u-border-2 u-border-black u-border-no-bottom u-border-no-left u-border-no-right u-clearfix u-section-1" id="sec-15cd"></section>
  <section class="w-100 p-4 d-flex justify-content-center pb-4">  
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-outline mb-4">
        <label>Tài khoản</label>
        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
        <span class="invalid-feedback"><?php echo $username_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Mật khẩu</label>
        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
        <span class="invalid-feedback"><?php echo $password_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Nhập lại mật khẩu</label>
        <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <label>Địa chỉ (ví dụ: Tỉnh Bạc Liêu, Việt Nam)</label>
        <input type="dia_chi" name="dia_chi" class="form-control <?php echo (!empty($dia_chi_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dia_chi; ?>">
        <span class="invalid-feedback"><?php echo $dia_chi_err; ?></span>
      </div>
      <div class="form-outline mb-4">
        <input type="submit" class="btn btn-primary" value="Đăng ký">
        <input type="reset" class="btn btn-secondary ml-2" value="Xóa">
      </div>
      <p>Đã có tài khoản? <a href="login_page.php">Đăng nhập tại đây</a>.</p>
    </form>
  </section>



  <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-568d">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the Text Element.</p>
    </div>
  </footer>
  <section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/css-templates" target="_blank">
      <span>Free CSS Templates</span>
    </a>
    <p class="u-text">
      <span>created with</span>
    </p>
    <a class="u-link" href="https://nicepage.com/website-builder" target="_blank">
      <span>Website Builder</span>
    </a>.
  </section>

</body>

</html>