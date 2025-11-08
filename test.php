<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sticky Right Div Example</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    body {
      height: 2000px; /* for demo scrolling */
    }
    .left-content {
      background: #f8f9fa;
      padding: 20px;
      height: 1800px; /* simulate tall content */
    }
    .right-content {
      position: sticky;
      top: 20px; /* distance from top of viewport when stuck */
      background: #e0f7ff;
      padding: 20px;
      height: 50vh; /* half the screen height */
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <div class="row">
      <div class="col-8">
        <div class="left-content">
          <h1>Left Div</h1>
          <p>Scroll down to see the right div stay fixed...</p>
          <p>Lots of content below 👇</p>
          <p style="margin-top: 1600px;">End of Left Div</p>
        </div>
      </div>
      <div class="col-4">
        <div class="right-content">
          <h1>Right Div</h1>
          <p>I stay sticky until the left div ends!</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
