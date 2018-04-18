<link rel="stylesheet" type="text/css" href="css/cropit.css">
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
