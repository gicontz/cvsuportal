<link rel="stylesheet" type="text/css" href="css/cropit.css">
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="col-md-3 col-xs-3">
  <div class="row">
   <div class="navbar-header">
    <button type="button" id="sidebarCollapse" class="navbar-btn">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</div>
</div>

<div class="col-md-9 col-xs-9"><br>
<li class="dropdown pull-right" style="list-style: none">
  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account&nbsp;&nbsp;
    <span class="fa fa-angle-down"></span></a>
    <ul class="dropdown-menu">
     <li><a href="#" class="nav-text"><span class="fa fa-gear"></span> Settings</a></li>
     <li><a href="lib/logout" class="nav-text"><span class="fa fa-sign-out"></span> Logout</a></li>
   </ul>
 </li>
 </div>
</div>
<br>
<br>
<br>
<center>
  <div class="image-editor">
    <input type="file" class="cropit-image-input"><br>
    <div class="cropit-preview"></div>
    <div class="image-size-label">
      Resize image
    </div>
    <input type="range" class="cropit-image-zoom-input" style="width: 50%">
    <button class="rotate-ccw fa fa-undo btn btn-success"></button>
    <button class="rotate-cw fa fa-repeat btn btn-success"></button>

    <button class="export btn btn-info">Update Profile Picture</button>
  </div>
</center>
<br>
<br>
<br>
</nav>

<script>
  $(function() {
    $('.image-editor').cropit({
      exportZoom: 1.25,
      imageBackground: true,
      imageBackgroundBorderWidth: 20,
      imageState: {
        src: 'http://lorempixel.com/500/400/',
      },
    });

    $('.rotate-cw').click(function() {
      $('.image-editor').cropit('rotateCW');
    });
    $('.rotate-ccw').click(function() {
      $('.image-editor').cropit('rotateCCW');
    });

    $('.export').click(function() {
      var imageData = $('.image-editor').cropit('export');
      var data = new Object();
      data["request_type"] = "update-profile-picture";
      data["imageData"] = imageData;

      $.post("lib/login.php", {data: data}, function(callback){
        location.reload(true);
        window.history.forward(1);
      });

    });
  });

  $('#image-cropper').cropit({ imageBackground: true });
</script>
