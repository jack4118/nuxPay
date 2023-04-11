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
                    <div class="row">
                        <!-- <div class="col-md-2" style="padding-bottom: 10px">
                            <button class="btn btn-default waves-effect waves-light" id="backBtn"> Back </button>
                        </div> -->
                        <div class="col-lg-12 col-md-12" style="padding-right:20px;padding-left:20px;">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Edit Landing Page
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-12 px-0">
                                                    <div id="blogDIV">
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-3" style="padding-top:7px;font-family: 'Montserrat';font-weight: 700">
                                                                    Landing Page Name:
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input id="landingPageName" type="text" class="form-control" autocomplete="off" onchange="changeLandingPageUrl();" oninput="this.onchange();">

                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-3" id="suggestion" style="padding-top:7px;font-family: 'Montserrat';font-weight: 500; display:none; color:#53c2da;">
                                                                    Suggestion:
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="row" id="buildLandingPageName" style="padding-top:7px;font-family: 'Montserrat';font-weight: 300; display:none; color:#53c2da; margin-left:10px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                    <div class="col-md-3" style="padding-top:7px;font-family: 'Montserrat';font-weight: 700">
                                                                        Landing Page URL:
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input id="landingPageUrl" type="text" class="form-control" value="" readonly style="cursor: default;">
                                                                    </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="panel panel-default bx-shadow-none" style="margin-top:50px;">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Content Section
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-12 px-0">

                                                        <div id="blogDIV">

                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">Title:</label>
                                                                </div>
                                                                <div class="col-md-8">   
                                                                    <input id="title" type="text" class="form-control" maxlength="30" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">Subtitle:</label>
                                                                </div>
                                                                <div class="col-md-8"> 
                                                                    <input id="subtitle" type="text" class="form-control" maxlength="50" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">Description:</label>
                                                                </div>
                                                                <div class="col-md-8"> 
                                                                    <textarea id="description" style="height:200px" type="text" class="form-control" maxlength="300" autocomplete="off"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">Media:</label>
                                                                </div>
                                                                <div class="col-md-9 form-group" style="margin-left:10px"> 
                                                                    <div class="row" id="buildImageList">
                                    
                                                                    </div>
                                                                    <div style="margin-top:10px" class="col-12">
                                                                        <div class ="row">
                                                                            <div class = "col-md-4" style="padding-left:0px">
                                                                                <form action="/action_page.php">
                                                                                    <div class="fileinputs" style="width:164px;height:34px">
                                                                                        <input type="file" class="file" id="imgFile" style="width:164px;height:34px" onchange="readURL(this);"/>
                                                                                        <div class="fakefile">
                                                                                            <button type="button" id="" class="btn btn-primary waves-effect waves-light">Upload Your Image</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                                
                                                                            </div>
                                                                            
                                                                            <div class = "col-md-6">
                                                                                <div class="row">
                                                                                    
                                                                                    <span style="font-size:11px">- Recommended dimension: 1240px X 400px<br>- Max files size 10MB.</span>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                                <div class="row">
                                                                                    <div class = "col-md-12" id = "upload_file_notification"></div>
                                                                                    <div class="col-md-3" style="margin-top:10px;">
                                                                                        <img id="upload_img" src="" style="height:70px;width:160px; display:none;">
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="panel panel-default bx-shadow-none" style="margin-top:50px;">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            Contact Us
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">

                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-12 px-0">

                                                        <div id="blogDIV">

                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">Mobile:</label>
                                                                </div>
                                                                <div class="col-md-4">   
                                                                    <input id="mobile" type="text" class="form-control" maxlength="30" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">Telegram:</label>
                                                                </div>
                                                                <div class="col-md-4"> 
                                                                    <input id="telegram" type="text" class="form-control" maxlength="50" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">WhatsApp:</label>
                                                                </div>
                                                                <div class="col-md-4"> 
                                                                    <input id="whatsapp" type="text" class="form-control" maxlength="300" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">Email:</label>
                                                                </div>
                                                                <div class="col-md-4"> 
                                                                    <input id="email" type="text" class="form-control" maxlength="300" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 form-group">
                                                                <div class="col-md-2">
                                                                    <label class="control-label" style="padding-top:7px;">Instagram:</label>
                                                                </div>
                                                                <div class="col-md-4"> 
                                                                    <input id="instagram" type="text" class="form-control" maxlength="300" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-sm-12 form-group">
                                                                <div>
                                                                    <button type="button" id="sendOTP" class="btn btn-primary waves-effect waves-light">Sends OTP</button>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12 my-4 px-0">
                                    <div class="row">
                                        <div class="col-xs-3" style="margin-top:7px">
                                            <a style="text-decoration: underline" id="previewLandingPage" href="#" target="_blank">Preview Landing Page</a>
                                        </div>
                                        <div class="col-xs-2">
                                            <button type="button" id="editLandingPage" class="btn btn-primary waves-effect waves-light">Confirm</button>
                                        </div>
                                    </div>
                                </div>
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
    <script>
        var resizefunc = [];

    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>


    <script>
        // Initialize the arguments for ajaxSend function
        var url = 'scripts/reqAdmin.php';
        var method = 'POST';
        var debug = 0;
        var bypassBlocking = 0;
        var bypassLoading = 0;
        var pageNumber = 1;
        var formData = "";
        var fCallback = "";
        var username       = "<?php echo $_SESSION['username']?>";
        var shortCode;
        var content_type;
        var size;
        var name;
        var userImage;
        var image_put_url;
        var result_data;
        var short_code;
        var upload_file_name = "";
        var domain = "<?php echo $config['memberSiteURL']; ?>";
        var landing_page_id = "<?php echo $_POST['pageData']['id']?>";
        var cur_name = "<?php echo $_POST['pageData']['name']?>";
        var cur_short_code = "<?php echo $_POST['pageData']['short_code']?>";
        var cur_title = "<?php echo $_POST['pageData']['title']?>";
        var cur_subtitle = "<?php echo $_POST['pageData']['subtitle']?>";
        var cur_description = "<?php echo $_POST['pageData']['description']?>";
        var cur_img_url = "<?php echo $_POST['pageData']['image_url']?>";
        var cur_mobile = "<?php echo $_POST['pageData']['mobile']?>";
        var cur_email = "<?php echo $_POST['pageData']['email']?>";
        var cur_telegram = "<?php echo $_POST['pageData']['telegram']?>";
        var cur_whatsapp = "<?php echo $_POST['pageData']['whatsapp']?>";
        var cur_instagram = "<?php echo $_POST['pageData']['instagram']?>";
        var e="";
        

        $(document).ready(function() {
            $('#landingPageName').val(cur_name);
            $('#title').val(cur_title);
            $('#subtitle').val(cur_subtitle);
            $('#description').val(cur_description);
            $('#mobile').val(cur_mobile);
            $('#email').val(cur_email);
            $('#telegram').val(cur_telegram);
            $('#whatsapp').val(cur_whatsapp);
            $('#instagram').val(cur_instagram);
            changeLandingPageUrl();
            userImage = cur_img_url;

            callDefaultImage();
        });
        
        $('#editLandingPage').click(function() {
            editLandingPage();
        });

        $('#previewLandingPage').click(function() {
            var landingPageName = $("#landingPageName").val();
            var landingPageUrl = $("#landingPageUrl").val();
            var title = $("#title").val();
            var subtitle = $("#subtitle").val();
            var description = $("#description").val();
            var mobile = $("#mobile").val();
            var telegram = $("#telegram").val();
            var whatsapp = $("#whatsapp").val();
            var email = $("#email").val();
            var instagram = $("#instagram").val();
            var media = userImage;
            var te = $("#landingPageName").val();
            var text2 = $("#landingPageUrl").val();
            var text3 = $("#title").val();
            var text4 = $("#subtitle").val();
            window.open("landingPagePreview.php?cal=" + landingPageName + "&text2=" + landingPageUrl +
            "&text3=" + title + "&text4=" + subtitle + "&text5=" + description + 
            "&text6=" + mobile + "&text7=" + telegram + "&text8=" + whatsapp + 
            "&text9=" + email + "&text10=" + instagram + "&text11=" + media);
            return false;

        });
        
        $('#landingPageName').change(function(){
            verifyLandingPageName();
        });

        function changeLandingPageUrl(){
            var short_code_name = $("#landingPageName").val();
            var shortCodeName = short_code_name.replaceAll(" ", "");
            var landingPageUrlPath = domain+"/"+username+"/"+shortCodeName;
            var landing_page_url = landingPageUrlPath.toLowerCase();
            $("#landingPageUrl").val(landing_page_url);
            // shortCode = "" + username + "-" + shortCodeName;
            shortCode = shortCodeName;
            shortCode2 = shortCode.toLowerCase();
            short_code = shortCode2.replaceAll(" ", "");
        }
        

        function verifyLandingPageName(){
            var formData = {
                command: "resellerVerifyLandingPageURL",
                short_code: short_code

            };
            // if (!fCallback)
            fCallback = loadVerifyLandingPageName;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadVerifyLandingPageName(data,message){
            var landingPageNameList = data;
            var buildList = '';
            if (landingPageNameList) {
                showMessage(message, 'warning', 'Error', '', '');

                $("#buildLandingPageName").show();
                $("#suggestion").show();

                buildList += '<div class="row">';
                $.each(landingPageNameList, function(k, v) {
                    buildList += '<div class="col-md-3">';
                    buildList += `<span onclick="setLandingPageName(this)" data-img="`+v+`">`+v+`</span>`;
                    buildList += '</div>';                   
                });
                buildList += `</div>`;
                $('#buildLandingPageName').empty().append(buildList); 
            } 
        }

        function setLandingPageName(ele){
            var landingPageNames = $(ele).attr('data-img');
            $("#landingPageName").val(landingPageNames);
            var short_code_name = $("#landingPageName").val();
            var shortCodeName = short_code_name.replaceAll(" ", "");
            var landingPageUrlPath = domain+"/"+username+"/"+shortCodeName;
            var landing_page_url = landingPageUrlPath.toLowerCase();
            $("#landingPageUrl").val(landing_page_url);
            shortCode = shortCodeName;
            shortCode2 = shortCode.toLowerCase();
            short_code = shortCode2.replaceAll(" ", "");
        }

        function readURL(input) {
            upload_file_name = "";
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    result_data = reader.result;
                    name = input.files[0].name;
                    size = input.files[0].size;
                    content_type = input.files[0].type;
                }
                reader.readAsDataURL(input.files[0]);
                
            }
            reader.onloadend = () => callPresignUrl();

        }

        function callDefaultImage(){
            
            var formData = {
                command: "resellerGetCreateLandingPageDetails"

            };

            if (!fCallback)
                fCallback = loadDefaultImage;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function loadDefaultImage(data, message){

        // if(data){
            var freezeList = data.default_image_data;
            var tableNo;
            var rebuildData = [];
            var buildImage = '';


            if (freezeList) {
                var newList = [];
                $('#buildImageList').show();

                buildImage += '<div class="row">';
                $.each(freezeList, function(k, v) {
                    buildImage += '<div class="col-md-3" style="margin-top:10px;">';
                    buildImage += `<img src="`+v+`" style="height:70px;width:160px;" onclick="imgUrl(this)" data-img="`+v+`">`;
                    buildImage += '</div>';
                    
                    $('.imgBtn').click(function() {
                        imgUrl($(this));
                    });
                    
                });
                buildImage += `</div>`;
                $('#buildImageList').empty().append(buildImage); 
            } 
        }

        function imgUrl(elem){
            $('#imgFile').val('');
            $('#upload_file_notification').hide();
            $('#upload_img').hide();
            if(e==""){
            elem.style.border = "4px solid #53c2da";
            e = elem;
            } else if(e!=elem){
                e.style.border ="0px solid #53c2da";
                elem.style.border = "4px solid #53c2da";
                e = elem;
            } 
            img_url = $(elem).attr('data-img');
            userImage = img_url;

        }

        function callPresignUrl() {
            upload_file_name = name;
            // Hide default image border
            e = "";
            $('[style*="border: 4px solid"]').css({"border" : "0px solid #53c2da"});
            
            $('#upload_file_notification').hide();
            $('#upload_img').hide();
            var content_size = size.toString();
            

            var formData = {
                command: "resellerLandingPagePresignURL",
                file_name: name,
                content_type: content_type,
                content_size: content_size
            };

            // if (!fCallback)
                fCallback = loadPresignURL;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        };

        function loadPresignURL(data,message){
            showMessage('Successfully Uploaded Image', '', 'Success', 'check-circle-o', '');
            $('#upload_file_notification').show();
            $('#upload_file_notification').html(upload_file_name);
            var image_url = data.get_url;
            image_put_url = data.put_url;
            userImage = image_url;
            
            uploadImageToAws(image_url);

        }
        //

        function makeblob(dataURL) {
            var BASE64_MARKER = ';base64,';
            if (dataURL.indexOf(BASE64_MARKER) == -1) {
                var parts = dataURL.split(',');
                var contentType = parts[0].split(':')[1];
                var raw = decodeURIComponent(parts[1]);
                return new Blob([raw], { type: contentType });
            }
            var parts = dataURL.split(BASE64_MARKER);
            var contentType = parts[0].split(':')[1];
            var raw = window.atob(parts[1]);
            var rawLength = raw.length;

            var uInt8Array = new Uint8Array(rawLength);

            for (var i = 0; i < rawLength; ++i) {
                uInt8Array[i] = raw.charCodeAt(i);
            }

            return new Blob([uInt8Array], { type: contentType });
        }

        function uploadImageToAws(image_url){

            $.ajax({
                type: 'PUT',
                url: image_put_url,
                // Content type must much with the parameter you signed your URL with
                contentType: content_type,
                // this flag is important, if not set, it will try to send data as a form
                processData: false,
                // the actual file is sent raw
                data: makeblob(result_data)
            })
            .success(function(result) {
                $('#upload_img').show();
                $('#upload_img').attr('src', image_url);
            })
            .error(function() {
                alert('File NOT uploaded');
            });
        };

        function editLandingPage(){
            var landingPageName = $("#landingPageName").val();
            var title = $("#title").val();
            var subtitle = $("#subtitle").val();
            var description = $("#description").val();
            var mobile = $("#mobile").val();
            var telegram = $("#telegram").val();
            var whatsapp = $("#whatsapp").val();
            var email = $("#email").val();
            var instagram = $("#instagram").val();
            var media = userImage;

            var formData = {
                command: "resellerEditLandingPage",
                landing_page_id : landing_page_id,
                name: landingPageName,
                short_code: short_code,
                title: title,
                subtitle: subtitle,
                description: description,
                image_url: media,
                mobile: mobile,
                email: email,
                whatsapp: whatsapp,
                instagram: instagram,
                telegram: telegram
            };

            fCallback = editPageCallback;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }

        function editPageCallback(data,message){
            showMessage(message, 'success', '<?php echo $translations["B00357"][$language]; /*Edit Landing Page Successful.*/ ?>', 'check-circle-o', 'landingPageListing.php');
        }

        $('#backBtn').click(function() {
        $.redirect("commissionWithdrawal.php", {
                wallet_type: walletType,
                balance: balance
            });
        });

</script>
<style>
input.file {
	position: relative;
	text-align: right;
	-moz-opacity:0 ;
	filter:alpha(opacity: 0);
	opacity: 0;
	z-index: 2;
}
div.fileinputs {
	position: relative;
}

div.fakefile {
	position: absolute;
	top: 0px;
	left: 0px;
	z-index: 1;
}
</style>