<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <style>
      body {
         background-image: url(img/background.jpg);
      }
   </style>
</head>

<body>
   <div class="content">
      <div class="text">
         Masukkan NISN:
      </div>
      <form action="login_proses.php" method="post">
         <div class="field">
            <input required="" type="text" class="input" name="nisn">
            <span class="span"><svg class="" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 512 512" y="0" x="0" height="20" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                  <g>
                     <path class="" data-original="#000000" fill="#595959" d="M256 0c-74.439 0-135 60.561-135 135s60.561 135 135 135 135-60.561 135-135S330.439 0 256 0zM423.966 358.195C387.006 320.667 338.009 300 286 300h-60c-52.008 0-101.006 20.667-137.966 58.195C51.255 395.539 31 444.833 31 497c0 8.284 6.716 15 15 15h420c8.284 0 15-6.716 15-15 0-52.167-20.255-101.461-57.034-138.805z"></path>
                  </g>
               </svg></span>
            <label class="label">NISN</label>
         </div>
         <input type="submit" name="login" value="Lanjut" class="button" data-toggle='tooltip' data-placement='bottom' title='Login'>
      </form>
   </div>
   <!-- tooltip -->
   <script>
      $(function() {
         $(' [data-toggle="tooltip" ]').tooltip();
      });
   </script>
</body>

</html>