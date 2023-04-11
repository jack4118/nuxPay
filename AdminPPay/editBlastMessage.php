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
                     <a id="addBackBtn" href="scheduleBlastMessage.php" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>Back</a>
                 </div><!-- end col -->
             </div>

             <div class="row">


                <div class="col-lg-12 col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default bx-shadow-none">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                 Edit Blast Message
                             </h4>
                         </div>
                         <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="col-sm-12 px-0">
                                    <div class="col-sm-6 px-0">

                                     <div class="col-sm-12 form-group">
                                        <label class="control-label" for="">
                                            Schedule Date
                                        </label>
                                        <div class="input-group datetimepicker">
                                            <input type="text" class="form-control" readonly="" style="background-color: transparent;">
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

                                    <div id="" class="alert alert-danger" style="display: none;"></div>

                                    <div class="col-sm-12 px-0">
                                        <div class="col-sm-12 px-0">
                                            <div class="col-sm-12 form-group">
                                                <label class="control-label" for="" data-th="#">Message <span class="text-danger">*</span></label>
                                                <textarea id="content" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 form-group">
                                        <label class="control-label">
                                            Audience Phone Number
                                        </label>
                                        <div class="input-group">
                                            <input id="phoneNumber" type="text" class="form-control" dataName="" dataType="text" placeholder="Please insert phone number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                            <span class="input-group-btn">
                                                <button id="addPhoneNumber" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                            </span>
                                        </div>
                                        <div id="audiencePhoneNumber" class="audienceList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow-y: scroll;">
                                        </div>
                                    </div> 

                                    <div class="col-sm-12 form-group">
                                        <label class="control-label">
                                            Audience Group
                                        </label>
                                        <select id="audienceDropdown" class="form-control">
                                            <option value="" audienceName="">Please Select Audience</option>
                                            <option value="" audienceName="Group A">Group A</option>
                                            <option value="" audienceName="Group B">Group B</option>
                                            <option value="" audienceName="Group C">Group C</option>
                                            <option value="" audienceName="Group D">Group D</option>
                                        </select>
                                        <div id="editAudienceList" class="audienceList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow-y: scroll;">
                                            <!-- <span style="background-color: #c5efc2; padding: 5px 10px; border-radius: 5px;">jijij <i class="fa fa-times" aria-hidden="true" style="margin-left: 10px;"></i></span> -->
                                        </div>
                                    </div> 
                                </div>
                            </div>
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
         option.value = timeZone;
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

$('#date').daterangepicker({
    singleDatePicker: true,
    timePicker: false,
    locale: {
        format: 'DD/MM/YYYY'
    }
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


$(document).on('change', '#audienceDropdown', function(){ 

    var audienceName = $("#audienceDropdown option:selected").attr("audienceName");
    var audienceNameText = $("#audienceDropdown option:selected").text();
    console.log(audienceName);

    if (audienceName != ""){ 
        $("#editAudienceList").append('<div id="'+audienceName+'" class="audienceTag" style="background-color: #f2f2f2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+audienceNameText+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>');
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
   $('#audiencePhoneNumber').append('<div id="" class="phoneNumberTag" style="background-color: #f2f2f2; padding: 5px 10px; border-radius: 5px; margin-left: 10px; margin-right: 10px; margin-top: 10px;">'+phoneNumber+' <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>');
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