<?php
session_start();

    // Get current page name
$thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
<!-- Begin page -->
<div id="wrapper">

  <!-- Top Bar Start -->
  <?php include("topbar.php"); ?>
  <!-- Top Bar End -->

  <!-- ========== Left Sidebar Start ========== -->
  <?php include("sidebar.php"); ?>
  <!-- Left Sidebar End -->

  <!-- ============================================================== -->
  <!-- Start right Content here -->
  <!-- ============================================================== -->
  <div class="content-page">
    <!-- Start content -->
    <div class="content">
      <div class="container">

        <div class="row">
          <div class="col-sm-4">
           <a id="addBackBtn" href="blogVideo.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
         </div><!-- end col -->
       </div>

       <div class="row">


        <div class="col-lg-12 col-md-12">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default bx-shadow-none">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  New video
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                  <form id="customPrice" role="form">
                    <div class="col-sm-12 px-0">
                      <div class="col-sm-6 px-0">

                        <div class="col-sm-12 form-group">
                          <label class="control-label" for="" data-th="#">Title <span class="text-danger">*</span></label>
                          <input id="title" type="text" class="form-control" dataName="" dataType="text">
                        </div>
                        <div class="col-sm-12 form-group">
                          <label class="control-label" for="" data-th="#">Tag <span class="text-danger">*</span></label>
                          <input id="tag" type="text" class="form-control" dataName="" dataType="text" placeholder="e.g tag1,tag2">
                        </div>
                        <div class="col-sm-12 form-group">
                          <label class="control-label">Video URL <span class="text-danger">*</span></label>
                          <div class="row">
                            <div class="col-sm-10">
                              <input id="media_url" type="text" class="form-control" placeholder="e.g https://www.youtube.com/watch?v=*******" value="">
                            </div>
                            <div class="col-sm-2">
                              <button id="preview" type="button" class="btn btn-primary waves-effect waves-light">Preview</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 form-group" id="video">

                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 my-4 px-0">
            <button id="addVideoBtn" type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
          </div>
        </div>
      </div>
      <!-- End row -->

    </div> <!-- container -->

  </div> <!-- content -->

  <?php include("footer.php"); ?>

</div>
<!-- End content-page -->


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

<script>
  var resizefunc = [];
</script>



<!-- jQuery  -->
<?php include("shareJs.php"); ?>


</body>
</html>

<script>
  // Initialize the arguments for ajaxSend function
  var url             = 'scripts/reqBlog.php';
  var method          = 'POST';
  var debug           = 0;
  var bypassBlocking  = 0;
  var bypassLoading   = 0;
  var pageNumber      = 1;
  var formData        = "";
  var fCallback       = "";  
  var videoURL;

  $(document).ready(function(){

    $('#addVideoBtn').click(function(){
      var title = $('#title').val();
      var tag = $('#tag').val();
      var tagArray = tag.split(',');
      var video_url = $('#media_url').val();

      $('.error-danger').hide();


        if(title==''){
            $('input#title').after('<span class="error-danger">Please enter title.</span>');
            $('html, body').animate({
                scrollTop: $("#title").offset().top-160
            }, 500);
            $('input#title').focus();
        }else if(tag==''){
            $('input#tag').after('<span class="error-danger">Please enter tag.</span>');
            $('html, body').animate({
                scrollTop: $("#tag").offset().top-160
            }, 500);
            $('input#tag').focus();
        }else if(video_url==''){
            $('input#media_url').after('<span class="error-danger">Please enter video url.</span>');
            $('html, body').animate({
                scrollTop: $("#media_url").offset().top-160
            }, 500);
            $('input#media_url').focus();
        }
        else{

          var formData  = {
            command: 'adminAddVideo',
            title: title,
            tag: tagArray,
            video_url: video_url
          };

          var fCallback = loadAddBlog;

          ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }
    });

    $('#preview').click(function(){
      $("#video").empty()

      if ($('#media_url').val()=="") {
        $('input#media_url').after('<span class="error-danger">Please enter video url.</span>');
        $('html, body').animate({
            scrollTop: $("#media_url").offset().top-160
        }, 500);
        $('input#media_url').focus();
      }else{
        // console.log(1);
        videoURL = $("#media_url").val();
        var url = new URL(videoURL);
        var videoId = url.searchParams.get("v");
        // console.log(videoId);
        $("#video").show().append('<iframe width="100%" height="320"  src="https://www.youtube.com/embed/'+videoId+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
      }
    });
  });

  function loadAddBlog(data,message){
      // console.log(data);
      showMessage(message, 'success', 'Added Video','' , 'blogVideo.php');
  };
</script>
