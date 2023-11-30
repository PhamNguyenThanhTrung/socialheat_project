




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
      background-image: url("/assets/img/image 3.svg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 100vh; /* Đảm bảo nền chiếm toàn bộ chiều cao của trình duyệt */
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("/assets/img/login.svg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      opacity: 1; /* Điều chỉnh độ trong suốt của hình ảnh overlay */
    }

    .form-container {
      background-color: rgba(255, 255, 255, 0.8); /* Độ mờ để hiển thị hình nền */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      width: 300px;
      z-index: 1; /* Đảm bảo form hiển thị trên overlay */
    }
    .custom-checkbox {
  transform: scale(1.5); /* Chỉnh kích thước lớn hơn */
  border: none; /* Loại bỏ đường viền */
}

  </style>
  <title>Your Website</title>
</head>
<body>

  <!-- Image overlay -->
  <div class="overlay"></div>

  <!-- Form container -->
  <div class="form-container" style="min-width: 26%;">
    
  <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ikea@gmail.com">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="***********">
      </div>
      
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input custom-checkbox" id="rememberMe">
    <label class="form-check-label" for="rememberMe">Remember me</label>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
  <p class="pt-2 text-center">Don't have an account? <a href="#" class="text-primary">Sign Up</a></p>
</form>



  </div>

  <!-- Bootstrap Scripts (jQuery and Popper.js required for Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
