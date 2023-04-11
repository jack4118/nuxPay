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
                     <a id="addBackBtn" href="scheduleAnnouncement.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                    </div><!-- end col -->
             </div>

             <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    Edit Announcement
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="col-sm-12 px-0">
                                        <div class="col-sm-6 px-0">
                                        <!--     
                                            <div class="col-sm-12 form-group">
                                                <label class="control-label" for="">
                                                    Schedule Date
                                                </label>
                                                <input id="date" type="text" class="form-control" dataName="" dataType="singleDate">
                                            </div> -->


                                            <div class="col-sm-12 form-group">
                                                <label class="control-label" for="">
                                                    Schedule Date
                                                </label>
                                                <div class="input-group datetimepicker">
                                                    <input id="scheduleDate" type="text" class="form-control" readonly="" style="background-color: transparent;">
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                        +
                                                        <span class="fa fa-clock-o"></span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 form-group">
                                                <label class="control-label" for="">
                                                    Time Zone
                                                </label>
                                                <select id="dropdownTimeZone" class="form-control select2 select2-multiple"></select>
                                            </div>

                                            <div id="announcementDIV">

                                                <div class="col-sm-12 form-group">
                                                    <label>
                                                        Image Upload
                                                    </label>
                                                    <input id="upload1" type="file" class="dropify" data-show-remove="false" style="display: none;">
                                                    <input id="upload" type="file" class="dropify" data-show-remove="false" style="display: none;">
                                                    <!-- <input id="upload" type="file"> -->
                                                    <input id="imgData" type="hidden">
                                                    <input id="imgName" type="hidden">
                                                    <input id="imgSize" type="hidden">
                                                    <input id="imgType" type="hidden">
                                                    <input id="blah" type="hidden">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 form-group">
                                                <label class="control-label" for="" data-th="#">Title <span class="text-danger">*</span></label>
                                                <input id="title" type="text" class="form-control" dataName="" dataType="text">
                                            </div>
                                            <div id="telcoError" class="alert alert-danger" style="display: none;"></div>

                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-12 px-0">
                                                    <div class="col-sm-12 form-group">
                                                        <label class="control-label" for="" data-th="#">Description <span class="text-danger">*</span></label>
                                                        <textarea id="description" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 form-group">
                                                <label class="control-label">
                                                    Audience Phone Number
                                                </label>
                                                <div class="input-group">
                                                    <input id="phoneNumber" type="text" class="form-control" dataName="" dataType="text" placeholder="e.g +60123456789" oninput="this.value = this.value.replace(/[^0-9.+]/g, '').replace(/(\..*)\./g, '$1');" />
                                                    <span class="input-group-btn">
                                                        <button id="addPhoneNumber" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                                    </span>
                                                </div>
                                                <div id="audiencePhoneNumber" class="audienceList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow-y: scroll;">
                                                    <!-- <span style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px;">jijij <i class="fa fa-times" aria-hidden="true" style="margin-left: 10px;"></i></span> -->
                                                </div>
                                            </div>

                                            <div class="col-sm-12 form-group">
                                                <label class="control-label">
                                                    Audience Group
                                                </label>
                                                <select id="audienceDropdown" class="form-control">
                                                    <option value="" audienceName="">Please Select Audience</option>
                                                </select>
                                                <div id="editAudienceList" class="audienceList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow-y: scroll;">
                                                    <!-- <span style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px;">jijij <i class="fa fa-times" aria-hidden="true" style="margin-left: 10px;"></i></span> -->
                                                </div>
                                            </div>

                                             <div class="col-sm-12 form-group">
                                                <label class="control-label" for="" data-th="#">Valid Days <span class="text-danger">*</span></label>
                                                <input id="validDays" type="text" class="form-control" dataName="" dataType="text">
                                            </div>

                                            <div class="col-sm-12 form-group">
                                                <label class="control-label">
                                                    Button Type
                                                </label>
                                                <select id="buttonOption" class="form-control">
                                                    <option value="">Please Select Type</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Action">Action</option>
                                                </select>
                                            </div>

                                            <div id="buttonName" class="col-sm-12 form-group hide">
                                                <label class="control-label">Button Name <span class="text-danger">*</span></label>
                                                <input id="buttonNameBtn" type="text" class="form-control" placeholder="Please insert button name" value="">
                                            </div>

                                                <div id="hyperlinkURL" class="col-sm-12 form-group hide">
                                                        <label class="control-label">URL Name <span class="text-danger">*</span></label>
                                                        <input id="buttonUrl" type="text" class="form-control" placeholder="e.g https://www.thenux.com/" value="">
                                                </div>

                                                <!--  <div id="walletPage" class="col-sm-12 form-group hide">
                                                    <label class="control-label">
                                                        Page
                                                    </label>
                                                    <select id="buttonOption" class="form-control" dataName="assigneeID" dataType="select">
                                                        <option value="exchangePage">Exchange Page</option>
                                                    </select>
                                                </div>  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 my-4 px-0">
                            <button id="editAnnouncementBtn" type="submit" class="btn btn-primary waves-effect waves-light">Edit</button>
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
<!-- //timezone script here -->
 <script>
 
 $('#dropdownTimeZone').select2();
   function loadTimeZoneList(){   
    let select = document.getElementById("dropdownTimeZone");
    select.innerHTML = ""; 
    let browserTimeZone = moment.tz.guess();
    let timeZones = moment.tz.names();
       timeZones.forEach((timeZone) =>{
       option = document.createElement("option");      
         option.textContent = `${timeZone} (GMT${moment.tz(timeZone).format('Z')})`; 
         option.value = `${timeZone} (GMT${moment.tz(timeZone).format('Z')})`; 
         // console.log(timeZones);
         if (timeZone == browserTimeZone){
             option.selected = true;
         }
         select.appendChild(option);
       });
    
  }

  function init(){
        loadTimeZoneList();  
    }
 
    init();
</script>
<!-- timezone script end -->

<script>
    var defaults = {
        calendarWeeks: true,
        showClear: true,
        showClose: true,
        allowInputToggle: true,
        useCurrent: false,
        ignoreReadonly: true,
        minDate: new Date(),
        toolbarPlacement: 'top',
        locale: 'en',
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down',
            previous: 'fa fa-angle-left',
            next: 'fa fa-angle-right',
            today: 'fa fa-dot-circle-o',
            clear: 'fa fa-trash',
            close: 'fa fa-times'
        }
    };

    $(function() {
        var optionsDatetime = $.extend({}, defaults, {format:'DD-MM-YYYY HH:mm'});
        var optionsDate = $.extend({}, defaults, {format:'DD-MM-YYYY'});
        var optionsTime = $.extend({}, defaults, {format:'HH:mm'});

        $('.datepicker').datetimepicker(optionsDate);
        $('.timepicker').datetimepicker(optionsTime);
        $('.datetimepicker').datetimepicker(optionsDatetime);
    });
</script>

<script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqAnnoucement.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var pageNumber      = 1;
        var formData        = "";
        var fCallback       = "";  
        var businessID = "<?php echo $_POST['id']; ?>"; 
        var selectedType = "blog";
        var imageURL;
        var announcementID = "<?php echo $_POST['announcementID'] ?>";
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
        $('#upload1').show();
        $('#upload1').dropify();

        var fCallback = loadDefaultListing;
        formData  = {
            command: 'adminAnnouncementDetails',
            announcement_id : announcementID
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        // from a NodeList
        autosize(document.querySelectorAll('textarea'));

        // from a single Node
        autosize(document.querySelector('textarea'));

        // from a jQuery collection
        autosize($('textarea'));

        // $('.dropify').dropify();

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
        buildAudience();
    });


function loadDefaultListing(data, message){
    // console.log(data);
    $('#upload1').parent().hide();
    $('#upload').show();
    $('#upload').dropify({
        defaultFile: data.image_url
    });
    imageURL = data.image_url;
    $("#imgData").val(data.image_url);

    var testDate = moment(data.start_date).format('DD-MM-YYYY HH:mm');

    $("#scheduleDate").val(testDate);
    // $("#dropdownTimeZone").val(data.);
    $("#title").val(data.title);
    $("#description").val(data.description);
    $('#dropdownTimeZone').val(data.timezone).trigger('change');
    $("#validDays").val(data.days_active);
    $("#buttonOption").val(data.button_type);

    if(data.button_type == "Action"){
        $('#buttonName').removeClass('hide');
        $('#hyperlinkURL').removeClass('hide');
        $("#buttonNameBtn").val(data.button_name);
        $("#buttonUrl").val(data.button_link);
    }else if (data.button_type == "Normal" || buttonOption == ""){
        $('#buttonName').addClass("hide");
        $('#hyperlinkURL').addClass("hide");
    }       

    if(data.phone_number){
        $.each(data.phone_number, function(key, value){
            $('#audiencePhoneNumber').append('<div id="'+value+'" class="phoneNumberTag" style="background-color: #f2f2f2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+value+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>');
        })
    }

    if(data.audience_group){
        $.each(data.audience_group, function(key, value){
            $("#editAudienceList").append('<div id="'+value["id"]+'" class="audienceTag" style="background-color: #f2f2f2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+value["name"]+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>');
        })
    }
    
    // console.log(imageURL);
}

$('#date').daterangepicker({
    singleDatePicker: true,
    timePicker: false,
    locale: {
        format: 'DD/MM/YYYY'
    }
});

$('#buttonOption').change(function() {
    var buttonOption = $(this).find('option:selected').val();
    // console.log(buttonOption);

    if(buttonOption == "Action"){
        $('#buttonName').removeClass('hide');
        $('#hyperlinkURL').removeClass('hide');
    }else if (buttonOption == "Normal" || buttonOption == ""){
        $('#buttonName').addClass("hide");
        $('#hyperlinkURL').addClass("hide");
    }       
});

$(document).on('change', '#audienceDropdown', function(){ 

    var audienceName = $("#audienceDropdown option:selected").attr("audienceName");
    var audienceID = $("#audienceDropdown option:selected").attr("id");
    var audienceNameText = $("#audienceDropdown option:selected").text();
    // console.log(audienceName);

    if (audienceName != ""){ 
        $("#editAudienceList").append('<div id="'+audienceID+'" class="audienceTag" style="background-color: #f2f2f2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+audienceNameText+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>');
    }
    var duplicateName = {};
    $('.audienceTag').each(function() {
        var txt = $(this).text();
        if (duplicateName[txt])
            $(this).remove();
        else
            duplicateName[txt] = true;
    });

});

$('#addPhoneNumber').click(function() {
 var phoneNumber = $('input[id=phoneNumber]').val();
 if (phoneNumber != ""){
     $('#audiencePhoneNumber').append('<div id="'+phoneNumber+'" class="phoneNumberTag" style="background-color: #f2f2f2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+phoneNumber+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>');
 }
});

$(document).on("click",".audienceTag, .phoneNumberTag",function() {
    $(this).remove();
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

function callEdit(get_url,put_url) {
    // console.log(put_url);
    var url_name = $('#buttonUrl').val();
    if (url_name) {
        url_name = url_name.replace(/ /g, '-');
    }

    
    var title = $('#title').val();
    // console.log($("#scheduleDate").val());
    var scheduleDate = dateToTimestamp($("#scheduleDate").val());
    var timeZone = $("#dropdownTimeZone option:selected").val();
    if(get_url){
        var s3Link = get_url;
    }else{
        var s3Link = $("#imgData").val();
    }
    
    var description = $("#description").val();
    var audienceNumber = [];

    $('.phoneNumberTag').each(function (index, value) { 
        // console.log(value.id);
        
        audienceNumber.push(value.id);

    });

    var audienceId = [];

    $('.audienceTag').each(function (index, value) { 
        // console.log(value.id);
        
        audienceId.push(value.id);

    });

    // console.log(audienceId);

    var validDays = $("#validDays").val();
    var buttonType = $("#buttonOption option:selected").val();

    if(buttonType == "Normal"){
        var buttonName = "";
        var buttonLink = "";
    }else{
        var buttonName = $("#buttonNameBtn").val();
        var buttonLink = $("#buttonUrl").val();
    }
    
    // alert(timeZone);

    var formData  = {
        command: 'adminAnnouncementEdit',
        announcementID : announcementID,
        scheduled_date: scheduleDate,
        time_zone: timeZone,
        s3_link: s3Link,
        title: title,
        description: description,
        audience_number: audienceNumber,
        audience_id: audienceId,
        valid_days: validDays,
        button_type: buttonType,
        button_name: buttonName,
        button_link: buttonLink
    };

    var fCallback = loadEditAnnoucement;
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
            // console.log(data);
            var theImageFile = $('#upload').get()[0].files[0];
            fCallback = callEdit;
            // console.log(theImageFile);
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

        function loadEditAnnoucement(data,message){
            // console.log(data);
            showMessage(message, 'success', 'Edit Annoucement','' , 'scheduleAnnouncement.php');
        };


        $('#editAnnouncementBtn').click(function(){
            var fileName = $('#imgName').val();
            var fileSize = $('#imgSize').val();
            var fileType = $('#imgType').val();

            if (fileName) {
                // console.log(1);
                fCallback = getPresignedUrl;
                formData  = {
                    command: 'adminAnnouncementS3UrlGet',
                    file_name: fileName,
                    content_type: fileType,
                    content_size: fileSize
                };
                // console.log(formData)
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }else{
                // console.log(2);
                callEdit();
            }

        });

        function buildAudience(){
            formData  = {
                command: 'adminAnnouncementAudienceGet'
            };
            // console.log(formData)
            fCallback = getAudienceList;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        }


        function getAudienceList(data, message){
            // console.log(data);

            $.each(data, function(k,v){
                $("#audienceDropdown").append('<option id="'+v["id"]+'" audienceName="'+v["name"]+'">'+v["name"]+'</option>');
            })
            
        }

    </script>