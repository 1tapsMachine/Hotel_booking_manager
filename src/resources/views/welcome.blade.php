<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Management Tool</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 50px 20px;
      text-align: center;
    }
    h1 {
      font-size: 36px;
      margin-bottom: 30px;
    }
    p {
      font-size: 18px;
      margin-bottom: 40px;
    }
    .login-btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    .login-btn:hover {
      background-color: #0056b3;
    }
    .feature {
      margin-bottom: 50px;
    }
    .feature img {
      width: 100%;
      max-width: 200px;
      border-radius: 10px;
    }
    .feature h3 {
      margin-top: 20px;
    }
    .footer {
      bottom: 0;
      width: 100%;
      background-color: #343a40;
      color: #fff;
      padding: 10px 0;
      text-align: center;
    }
    .container-nav{
      display: flex;
      justify-content: space-between; 
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 1">
    <div class="container-nav">
      <a class="navbar-brand" href="/">
      <img src="assets/images/logo-inverted.png" alt="" width="100px">
      </a>
    </div>
  </nav>
  <div class="container">
    <h1>Welcome to our Project Management Tool</h1>
    <p>Manage your projects efficiently with our powerful tool.</p>
    <div class="row">
      <div class="col-md-4 feature">
        <img src="https://miro.medium.com/v2/resize:fit:1000/1*ZyPefUo8k7rIw2o0QMnaIA.png" alt="Feature 1">
        <h3>Task Management</h3>
        <p>Effortlessly organize your tasks and stay on top of your projects.</p>
      </div>
      <div class="col-md-4 feature">
        <img src="https://www.processmaker.com/wp-content/uploads/2023/01/20944999-scaled.jpg" alt="Feature 2">
        <h3>Team Collaboration</h3>
        <p>Work together seamlessly with your team members, no matter where they are.</p>
      </div>
      <div class="col-md-4 feature">
        <img src="https://static.vecteezy.com/system/resources/previews/002/744/938/original/progress-report-illustration-vector.jpg" alt="Feature 3">
        <h3>Progress Tracking</h3>
        <p>Monitor the progress of your projects in real-time and make informed decisions.</p>
      </div>
    </div>
    <a href="/admin/login" class="btn btn-primary login-btn">Login to Your Account</a>
    
  </div>

  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 Project Management Tool. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
