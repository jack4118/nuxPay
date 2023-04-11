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
                     <a href="adminGetStoryListing.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20">
                        <i class="md md-add"></i>
                        Back
                    </a>
                </div><!-- end col -->
            </div>

            <div class="row">
                <?php include("storyListingSideBar.php"); ?>

                <div id="" class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div id="" class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Story Info
                                    <span id="activated" name="1" class="pull-right text-danger"></span>
                                </h4>
                            </div>

                            <div class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <div class="row">
                                        <div id="" class="col-sm-12">
                                            <div class="col-sm-12 form-group">
                                                <div class="mb-3">
                                                    <span>Title :</span>
                                                    <input id="inputTitle" type="text" class="form-control" value="">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 form-group">
                                                <div class="mb-3">
                                                    <span>Description :</span>
                                                    <textarea id="inputDescription" class="form-control storyInput1" rows="8"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 form-group">
                                                <div class="row" id="appendImage" style="display: flex; flex-wrap: wrap;justify-content: center;">
                                                    <div class="col-sm-3">
                                                        <div class="addLanguageImage" onclick="addImage()">
                                                            <b><i class="fa fa-plus-circle" style="font-size: 50px;"></i></b>
                                                            <span>Add Image / Video</span>
                                                        </div>
                                                    </div>
                                                    <div id="uploadError" class="invalid-feedback mt-3" style="color: red; text-align: center;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 my-3 px-0 mb-5 mt-4">
                        <button id="updated" type="submit" class="btn btn-primary waves-effect waves-light mt-1" style="min-width: 120px">Save Changes</button>
                    </div>

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
  
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqAdmin.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var businessID = "<?php echo $_POST['dataID']; ?>";  

    var parentLink = $('ul.breadcrumb').children();
    var total = $('ul.breadcrumb').children().length;

    $(parentLink).each(function(k,v){
      if (total>=4 && k==total-2) {
        var oldLink = $(this).children().attr("href");
        $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
      }else if(k==total-1){
        var oldLink = $(this).children().attr("href");
        $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
      }
    });

    function redirectBreadcrumb(link,data){
      if (data) {
        $.redirect(link, {id: businessID, name: data});
      }else{
        $.redirect(link, {id: businessID});
      }
    }

    $(document).ready(function() {

        if (!businessID) {
            window.ajaxEnabled = false;
            showMessage("Business Not Found, Please try again. ", 'danger', 'Some error occured', "", 'adminGetStoryListing.php');
        }

        $('.storyDetails').click(function() {
            $.redirect("storyListingDetails.php", {dataID: businessID});
        });
        $('.storyUpdate').click(function() {
            $.redirect("storyListingUpdate.php", {dataID: businessID});
        });
        $('.storyTransaction').click(function() {
            $.redirect("storyListingTransaction.php", {dataID: businessID});
        });
        $('.storyActivity').click(function() {
            $.redirect("storyListingActivity.php", {dataID: businessID});
        });
        $('.storyComment').click(function() {
            $.redirect("storyListingComment.php", {dataID: businessID});
        });

        fCallback = loadDefaultListing;
        formData  = {command: 'adminGetStoryDetails',
        dataID : businessID };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // $('#updated').click(function(){
        //     //insert input ID and value here
        //     var action = $('#action option:selected').val();
        //     var remark = $('textarea#remark').val();
            
        //     //callback function and send ajax
        //     fCallback = updatedDetails;
        //     formData  = {
        //         command      : 'adminGetStoryDetails',
        //         id           : businessID,
        //         action       : action,
        //         remark       : remark
        //     };
        //     // console.log(formData)
        //     ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        //     function updatedDetails(data,message){
        //         // console.log(data);
        //         showMessage(message, 'success', 'Success!', "", ['adminGetStoryListing.php', {id: businessID}]);
        //     }
        // });
        
    });


    function loadDefaultListing(data, message) {
        $('#inputTitle').val(data.title);
        $('#inputDescription').val(data.description);
    }

    function imgDataURL(id, input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#imgData"+id).val(reader["result"]);
                $("#imgName"+id).val(input.files[0]["name"]);
                $("#imgSize"+id).val(input.files[0]["size"]);
                $("#imgType"+id).val(input.files[0]["type"]);
                var file = URL.createObjectURL(input.files[0]);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function closeDiv(id) {
        $("#imgDIV"+id).remove();

        var wrapperLength = $(".popupMemoImageWrapper").length;
        $(".popupMemoImageWrapper").each(function(k,v){
            wrapperLength--
            $(v).attr("id", "imgDIV"+ wrapperLength);
            $(v).find(".closeBtn").attr("onclick", "closeDiv(" +wrapperLength+ ")");
            $(v).find(".uploadData").attr("id", "upload"+ wrapperLength);
            $(v).find(".uploadData").attr("onchange", "imgDataURL('" +wrapperLength+ "', this)");
            $(v).find(".imgData").attr("id", "imgData"+ wrapperLength);
            $(v).find(".imgName").attr("id", "imgName"+ wrapperLength);
            $(v).find(".imgSize").attr("id", "imgSize"+ wrapperLength);
            $(v).find(".imgType").attr("id", "imgType"+ wrapperLength);
        });
    }
    function addImage(){
        var wrapperLength = $(".popupMemoImageWrapper").length;
        var wrapper = `
            <div class="col-xl-3 col-lg-3 col-sm-6 popupMemoImageWrapper imageDIV" id="imgDIV${wrapperLength}" style="padding: 0 15px;">
                <div class="row">
                    <div class="col-12 form-group">
                        <a href="javascript:;" class="closeBtn" onclick="closeDiv(${wrapperLength})">&times;</a>
                        <input id="upload${wrapperLength}" type="file" class="dropify uploadData" data-show-remove="false" onchange="imgDataURL('${wrapperLength}', this)">
                        <input class="imgData" id="imgData${wrapperLength}" type="hidden">
                        <input class="imgName" id="imgName${wrapperLength}" type="hidden">
                        <input class="imgSize" id="imgSize${wrapperLength}" type="hidden">
                        <input class="imgType" id="imgType${wrapperLength}" type="hidden">
                    </div>
                </div>
            </div>
        `;

        $("#appendImage").prepend(wrapper);
            // wrapperLength++;
            $('.dropify').dropify();
    }

    function getImgObj() {
        var request_link_params = {};

        $(".popupMemoImageWrapper").each(function(i, obj) {
            // var imgData = $(obj).find('[id^="imgData"]').val();
            var file_name = $(obj).find('[id^="imgName"]').val();
            var content_type = $(obj).find('[id^="imgType"]').val();
            var content_size = $(obj).find('[id^="imgSize"]').val();
            var file_data = $(obj).find('[id^="imgData"]').val();

            if (file_name) {
                request_link_params[i] = {
                    // imgData: imgData,
                    file_name: file_name,
                    content_type: content_type,
                    content_size: content_size,
                    file_data: file_data
                };
            }
        });
        return request_link_params;
    }
    function uploadImageAws(data, message)
    {
         var imgUrl = data.data.presign_url;
         var count = imgUrl.length;

         $.each(imgUrl, function(key, val) {

            var fileType = imgData[key].content_type.split('/')[0];
            $.ajax({
                type: 'PUT',
                url: val['put_url'],
                // Content type must much with the parameter you signed your URL with
                contentType: imgData[key].content_type,
                // this flag is important, if not set, it will try to send data as a form
                processData: false,
                // the actual file is sent raw
                data: $('#upload'+key).get()[0].files[0],
                success : function(result) {
                    media[key] = {
                        // imgData: imgData,
                        media_url: imgUrl[key].get_url,
                        media_type: fileType
                    };
                    if (!--count) startCreate(media);
                },
                error   : function(result) {
                  // alert("Error!");
                }
            });
         });
    }

     // function startCreate(media)
     // {
     //    $.redirect("memberFundDetails.php", {
     //         title : title,
     //         categories : categories,
     //         country : country,
     //         storyDescription : storyDescription,
     //         media : media,
     //         imgData : imgData,
     //         selectedMethod : previousSelectedMethod,
     //         selectedCryto : previousCryptoMethod,
     //         amount : previousAmount,
     //         dateRange : previousDateRange,
     //         story_currency : previousStory_currency
     //     });
     // }



</script>
