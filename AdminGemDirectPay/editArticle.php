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
                     <a id="addBackBtn" href="blogArticle.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                 </div><!-- end col -->
             </div>

             <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Edit article
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <form id="customPrice" role="form">
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-6 px-0">

                                              <div class="col-sm-12 form-group">
                                                  <label class="control-label">Meta Title</label>
                                                  <input id="meta_title" type="text" class="form-control" value="">
                                              </div>
                                              <div class="col-sm-12 form-group">
                                                  <label class="control-label">Meta Description</label>
                                                  <input id="meta_description" type="text" class="form-control" value="">
                                              </div>
                                              <div class="col-sm-12 form-group">
                                                  <label class="control-label" for="" data-th="#">Title <span class="text-danger">*</span></label>
                                                  <input id="title" type="text" class="form-control" dataName="" dataType="text">
                                              </div>
                                              <div class="col-sm-12 form-group">
                                                  <label class="control-label" for="" data-th="#">Tag <span class="text-danger">*</span></label>
                                                  <input id="tag" type="text" class="form-control" dataName="" dataType="text" placeholder="e.g tag1,tag2">
                                              </div>
                                              <div class="col-sm-12 form-group">
                                                  <label>
                                                      Image Upload
                                                  </label>
                                                  <input id="upload" type="file" class="dropify" data-show-remove="false">
                                                  <!-- <input id="upload" type="file"> -->
                                                  <input id="imgData" type="hidden">
                                                  <input id="imgName" type="hidden">
                                                  <input id="imgSize" type="hidden">
                                                  <input id="imgType" type="hidden">
                                                  <input id="blah" type="hidden">
                                              </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-12 form-group">
                                                    <label class="control-label" for="" data-th="#">Content <span class="text-danger">*</span></label>
                                                    <textarea id="content" class="form-control"></textarea>
                                                    <button type="button" class="btn btn-icon btn-default m-b-5" onmousedown="surroundWithLink('h1'); return false" title="h1">
                                                        &lt;h1&gt;
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-default m-b-5" onmousedown="surroundWithLink('h2'); return false" title="h2">
                                                        &lt;h2&gt;
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-default m-b-5" onmousedown="surroundWithLink('h3'); return false" title="h3">
                                                        &lt;h3&gt;
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-default m-b-5" onmousedown="surroundWithLink('br'); return false" title="line break">
                                                        &lt;br&gt;
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-default m-b-5" onmousedown="surroundWithLink('a'); return false" title="hyperlink">
                                                        &lt;a&gt;
                                                    </button>
                                                    <button type="button" class="btn btn-icon btn-default m-b-5" onmousedown="surroundWithLink('b'); return false" title="bold">
                                                        &lt;b&gt;
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 my-4 px-0">
                        <button id="editBtn" type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
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
    var url             = 'scripts/reqBlog.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = ""; 
    var blogID = "<?php echo $_POST['blogID']; ?>";
    var blogType = "<?php echo $_POST['blogType']; ?>";
    var imageURL;

    $(document).ready(function(){
        $('#upload1').show();
        $('#upload1').dropify();

        autosize(document.querySelectorAll('textarea'));

        // from a single Node
        autosize(document.querySelector('textarea'));

        // from a jQuery collection
        autosize($('textarea'));

        var formData = {
            command  : "adminGetArticleDetails",
            blogID : blogID
        };
        var fCallback = loadBlogDetails;
        // console.log(formData);

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $("#upload").change(function(){
            readURL(this);
        });

        $('#editBtn').click(function(){
            var fileName = $('#imgName').val();
            var fileSize = $('#imgSize').val();
            var fileType = $('#imgType').val();

            if (fileName) {
                fCallback = getPresignedUrl;
                formData  = {
                    command: 'adminGetBlogImagePresignedUrl',
                    file_name: fileName,
                    content_type: fileType,
                    content_size: fileSize
                };
                // console.log(formData)
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }else{
                callEdit(imageURL);
            }
        });
    });

    function getInputSelection(el) {
      return {
        start: el.selectionStart,
        end: el.selectionEnd
      };
    }

    function setInputSelection(el, start, end) {
      el.setSelectionRange(start, end);
    }

    function offsetToRangeCharacterMove(el, offset) {
        return offset - (el.value.slice(0, offset).split("\r\n").length - 1);
    }

    function surroundSelectedText(el, before, after) {
      var val = el.value;
      var sel = getInputSelection(el);
      el.value = val.slice(0, sel.start) +
                 before +
                 val.slice(sel.start, sel.end) +
                 after +
                 val.slice(sel.end);
      var newCaretPosition = sel.end + before.length + after.length;
      setInputSelection(el, newCaretPosition, newCaretPosition);
    }

    function surroundWithLink(type) {
        if (type=='h1') {
            surroundSelectedText(
                document.getElementById("content"),
                '<h1>',
                '</h1>'
            );
        }else if (type=='h2') {
            surroundSelectedText(
                document.getElementById("content"),
                '<h2>',
                '</h2>'
            );
        }else if (type=='h3') {
            surroundSelectedText(
                document.getElementById("content"),
                '<h3>',
                '</h3>'
            );
        }else if (type=='br') {
            surroundSelectedText(
                document.getElementById("content"),
                '',
                '<br>'
            );
        }else if (type=='a') {
            surroundSelectedText(
                document.getElementById("content"),
                '<a href="#">',
                '</a>'
            );
        }else if (type=='b') {
            surroundSelectedText(
                document.getElementById("content"),
                '<b>',
                '</b>'
            );
        }
      
    }

    function getPresignedUrl(data,message){
        var theImageFile = $('#upload').get()[0].files[0];
        fCallback = callEdit;

        $.ajax({
          type: 'PUT',
          url: data.put_url,
          // Content type must much with the parameter you signed your URL with
          contentType: 'image/jpeg',
          // this flag is important, if not set, it will try to send data as a form
          processData: false,
          // the actual file is sent raw
          data: theImageFile
        })
        .success(function(result) {
          if (typeof(fCallback) == 'function')
                fCallback(data.get_url, data.put_url, data);
        })
        .error(function() {
          alert('File NOT uploaded');
          console.log( arguments);
        });
        // showMessage(message, 'success', 'Congratulations!', '', ['businessesCategories.php', {id: businessID}]);
    };

    function callEdit(get_url,put_url) {
        var url_name = $('#url_name').val();
        if (url_name) {
            url_name = url_name.replace(/ /g, '-');
        }
        var redirect_url = $('#redirect_url').val();
        var source = $('#source').val();
        var title = $('#title').val();
        var meta_title = $('#meta_title').val();
        var meta_description = $('#meta_description').val();
        var content = $('#content').val();
        var tag = $('#tag').val();
        var tagArray = tag.split(',');

        var formData  = {
            command: 'adminEditArticle',
            id: blogID,
            url_name: url_name,
            redirect_url: redirect_url,
            source: source,
            image_url: get_url,
            title: title,
            tag: tagArray,
            meta_title: meta_title,
            meta_description: meta_description,
            content: content
        };

        var fCallback = loadEditBlog;
        // console.log(formData);

        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $("#imgData").empty().val(reader["result"]);
                $("#imgName").empty().val(input.files[0]["name"]);
                $("#imgSize").empty().val(input.files[0]["size"]);
                $("#imgType").empty().val(input.files[0]["type"]);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function loadBlogDetails(data,message){
        // console.log(data);
        $.each(data.article_details, function(key, val) {
            if (key=="media_url") {
                // $("#upload").attr("data-default-file", val);
                $('#upload1').parent().hide();
                $('#upload').show();
                $('#upload').dropify({
                    defaultFile: val
                });
                imageURL = val;
            }else if (key=="content") {
                // $("#upload").attr("data-default-file", val);
                $('#'+key).val(val);
                var ta = document.querySelector('textarea');
                autosize(ta);
                ta.value = val;
                // Dispatch a 'autosize:update' event to trigger a resize:
                var evt = document.createEvent('Event');
                evt.initEvent('autosize:update', true, false);
                ta.dispatchEvent(evt);
            }else{
                $('#'+key).val(val);
            }
            
        });
    }

    function loadEditBlog(data,message){
        // console.log(data);
        showMessage(message, 'success', 'Update Blog','' , 'blogArticle.php');
    }

</script>