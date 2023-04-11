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
                       <a id="addBackBtn" href="audienceListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                   </div><!-- end col -->
               </div>

               <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Edit Audience
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <form id="customPrice" role="form">
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-6 px-0">

                                                <div id="newsDIV" style="display: none;">
                                                </div>

                                                <div class="col-sm-12 form-group">
                                                    <label class="control-label" for="" data-th="#">Name <span class="text-danger">*</span></label>
                                                    <input id="title" type="text" class="form-control" dataName="" dataType="text">
                                                </div>
                                                <div id="" class="alert alert-danger" style="display: none;"></div>

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-12 px-0">
                                                        <div class="col-sm-12 form-group">
                                                            <label class="control-label" for="" data-th="#">Description <span class="text-danger">*</span></label>
                                                            <textarea id="content" class="form-control"></textarea>
                                                        </div>
                                                    </div>
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
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqBlog.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1;
        var formData        = "";
        var fCallback       = "";  
        var businessID = "<?php echo $_POST['id']; ?>"; 
        var selectedType = "blog";
    // console.log(businessID)

    var parentLink = $('ul.breadcrumb').children();
    var total = $('ul.breadcrumb').children().length;

    $(parentLink).each(function(k,v){
        if (total>=4 && k==total-2) {
            var oldLink = $(this).children().attr("href");
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
            // console.log(oldLink);
        }else if(k==total-1){
            var oldLink = $(this).children().attr("href");
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
        }
    });

    function redirectBreadcrumb(link,data){
        if (data) {
            $.redirect(link, {id: businessID,name: data});
        }else{
            $.redirect(link, {id: businessID});
        }
    }

    $(document).ready(function() {

        // from a NodeList
        autosize(document.querySelectorAll('textarea'));

        // from a single Node
        autosize(document.querySelector('textarea'));

        // from a jQuery collection
        autosize($('textarea'));

        $('.dropify').dropify();

        $('input:radio[name="radioInline"]').change(function(){
            if ($(this).val() == 'blog') {
                typeDIV  ='<div class="col-sm-12 form-group">';
                typeDIV +='    <label class="control-label">URL Name <span class="text-danger">*</span></label>';
                typeDIV +='    <input id="url_name" type="text" class="form-control" placeholder="e.g https://www.thenux.com/blog/blog.php#yourURLName" value="">';
                typeDIV +='</div>';
                typeDIV +='<div class="col-sm-12 form-group">';
                typeDIV +='    <label class="control-label">Meta Title</label>';
                typeDIV +='    <input id="meta_title" type="text" class="form-control" value="">';
                typeDIV +='</div>';
                typeDIV +='<div class="col-sm-12 form-group">';
                typeDIV +='    <label class="control-label">Meta Description</label>';
                typeDIV +='    <input id="meta_description" type="text" class="form-control" value="">';
                typeDIV +='</div>';
                typeDIV +='<div class="col-sm-12 form-group">';
                typeDIV +='    <label>';
                typeDIV +='        Image Upload';
                typeDIV +='    </label>';
                typeDIV +='    <input id="upload" type="file" class="dropify" data-show-remove="false">';
                typeDIV +='    <!-- <input id="upload" type="file"> -->';
                typeDIV +='    <input id="imgData" type="hidden">';
                typeDIV +='    <input id="imgName" type="hidden">';
                typeDIV +='    <input id="imgSize" type="hidden">';
                typeDIV +='    <input id="imgType" type="hidden">';
                typeDIV +='    <input id="blah" type="hidden">';
                typeDIV +='</div>';
                $('#newsDIV').empty();
                $('#announcementDIV').empty().append(typeDIV);
                $('.dropify').dropify();
                $('#announcementDIV').show();
                $('#newsDIV').hide();
                action();
                selectedType = $(this).val();
            }
            else {
                typeDIV  ='<div class="col-sm-12 form-group">';
                typeDIV +='    <label class="control-label">Redirect URL <span class="text-danger">*</span></label>';
                typeDIV +='    <input id="redirect_url" type="text" class="form-control" placeholder="e.g https://www.thenux.com/blog/blog.php" value="">';
                typeDIV +='</div>';
                typeDIV +='<div class="col-sm-12 form-group">';
                typeDIV +='    <label class="control-label">Meta Title</label>';
                typeDIV +='    <input id="meta_title" type="text" class="form-control" value="">';
                typeDIV +='</div>';
                typeDIV +='<div class="col-sm-12 form-group">';
                typeDIV +='    <label class="control-label">Meta Description</label>';
                typeDIV +='    <input id="meta_description" type="text" class="form-control" value="">';
                typeDIV +='</div>';
                $('#announcementDIV').empty();
                $('#newsDIV').empty().append(typeDIV);
                $('#newsDIV').show();
                $('#announcementDIV').hide();
                selectedType = $(this).val();
            }
            // console.log(selectedType);
        });

        action();

        $('#addCategoriesBtn').click(function(){
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
                callAdd();
            }

        });
    });

  $('#buttonOption').change(function() {

        var buttonOption = $(this).find('option:selected').val();
        console.log(buttonOption);

        if(buttonOption == "hyperlink"){
            $('#hyperlinkURL').removeClass('hide');
            $('#walletPage').addClass('hide');
        }else if (buttonOption == "inAppChange"){
            $('#walletPage').removeClass('hide');
            $('#hyperlinkURL').addClass("hide");
        }else {
            $('#walletPage').addClass('hide');
            $('#hyperlinkURL').addClass("hide");
        }            
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

function action(){
    $("#upload").change(function(){
        readURL(this);
    });
}

function callAdd(get_url,put_url) {
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

    var formData  = {
        command: 'adminAddBlog',
        type: selectedType,
        url_name: url_name,
        redirect_url: redirect_url,
        source: source,
        image_url: get_url,
        title: title,
        meta_title: meta_title,
        meta_description: meta_description,
        content: content
    };

    var fCallback = loadAddBlog;
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

        function getPresignedUrl(data,message){
            var theImageFile = $('#upload').get()[0].files[0];
            fCallback = callAdd;

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

        function loadAddBlog(data,message){
            // console.log(data);
            showMessage(message, 'success', 'Added Blog','' , 'blog.php');
        };

    </script>