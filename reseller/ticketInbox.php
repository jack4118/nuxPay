<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="pageLogin.php";</script>';
    $_SESSION['lastVisited'] = $thisPage;
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
                            <a id="backButton" class="btn btn-primary btn-md waves-effect waves-light m-b-20"><i class="md md-add"></i>
                                Back
                            </a>
                        </div><!-- end col -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default bx-shadow-none">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapse">
                                                Menu
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        
                                            <div class="col-sm-12 m-t-rem1">
                    <a href="javascript:void(0);">
                        <div class="ticketInfo mb-3 col-sm-3 col-md-2 text-center menuActive">
                            <span>
                                Ticket Info
                            </span>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                        <div class="ticketInbox mb-3 col-sm-3 col-md-2 text-center menuActive active">
                            <span>
                                Inbox
                            </span>
                        </div>
                    </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                    <form method="post" class="card-box formInbox">
                        <ul class="nav nav-tabs">
                            <li role="presentation" class="active">
                                <a href="#reply" role="tab" data-toggle="tab" aria-expanded="true">
                                    Reply                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#note" role="tab" data-toggle="tab" aria-expanded="false">
                                    Note                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="reply">
                                <span class="input-icon icon-right">
                                    <textarea id="content" rows="5" class="form-control" placeholder="Write your message here"></textarea>
                                </span>

                                <div class="col-sm-12 form-group" style="margin-top: 20px;">
                                                        <label>
                                                            Upload
                                                        </label>
                                                        <input id="attachment" type="file" />
                                                    </div>

                                <div class="p-t-10" align="right">
                                    <a id="replyBtn" class="btn btn-sm btn-primary waves-effect waves-light">
                                        Send Reply                                    </a>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="note">
                                <span class="input-icon icon-right">
                                    <textarea id="contentNote" rows="5" class="form-control" placeholder="Write your message here"></textarea>
                                </span>

                                <div class="p-t-10" align="right">
                                    <a id="noteBtn" class="btn btn-sm btn-primary waves-effect waves-light">
                                        Add Note                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="ticketItem" style="" class="card-box">
                </div> <!--end div ticket-->

                </div>
                    </div><!-- End row -->

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

    <script>
   
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqTicket.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var iframeCounter   = 1;

    var ticketID = "<?php echo $_POST['id']; ?>";
    var previousPage = "<?php echo $_POST['previousPage']; ?>";
    // console.log(ticketID);
    $(document).ready(function() {

        var formData  = {command: 'getTicketDetails', ticketID: ticketID};
        var fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        $('.ticketInfo').click(function() {
            $.redirect("ticketInfo.php", {id: ticketID, previousPage: previousPage});
        });

        $('#backButton').click(function() {
            $.redirect(previousPage);
        });
        
        $('#replyBtn').click(function() {

            var form = new FormData();
            form.append('command', "updateTicket");
            form.append('ticketID', ticketID);
            form.append('content', $('#content').val());
            form.append('updateType', "ticketItem");
            form.append('ticketAction', "replied");

            form.append('attachment', $('#attachment')[0].files[0]);

            fCallback = replyCallback;
            ajaxSend(url, form, method, fCallback, debug, bypassBlocking, bypassLoading, 1);
            //alert($('#attachment')[0].files[0]);
        });

        $('#noteBtn').click(function() {

            var form = new FormData();
            form.append('command', "updateTicket");
            form.append('ticketID', ticketID);
            form.append('content', $('#contentNote').val());
            form.append('updateType', "ticketItem");
            form.append('ticketAction', "note");

            fCallback = noteCallback;
            ajaxSend(url, form, method, fCallback, debug, bypassBlocking, bypassLoading, 1);
        });
    });

    function loadDefaultListing(data, message) {
        // console.log(data);
        if(data.ticketItem) {
            $.each(data.ticketItem, function(key, value) {

                if(value['isAttachment'] == 0){
                    var ticketItem = '<div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><b>'+value['item_status']+'</b></div><div class="comment-header"><a href="#" title="">'+value['name']+'</a><span>'+value['time']+'</span></div><br><iframe id="iframeID'+iframeCounter+'" style="border:unset;width:100%;"></iframe></div></div></div>';

                    $('#ticketItem').append(ticketItem);
                    var doc = document.getElementById('iframeID'+iframeCounter).contentWindow.document;
                    doc.open();
                    doc.write(value['content']);
                    var doc1 = document.getElementById('iframeID'+iframeCounter);
                    if(doc1) {
                        doc1.height = "";
                        doc1.height = doc1.contentWindow.document.body.scrollHeight + "px";
                    }  
                    doc.close(); 
                    iframeCounter++;

                }else if(value['isAttachment'] == 1){

                    var extension = value['extension'];
                    switch(extension){
                        case 'doc':
                        case 'docx':
                            extension = "doc";
                            break;
                        case 'xls':
                        case 'xlsx':
                        case 'xlsm':
                            extension = "xls";
                            break;
                        case 'ppt':
                        case 'pptx':
                            extension ="ppt";
                            break;
                        case 'mpeg':
                        case 'wmv':
                        case 'mp4': 
                            extension = "mpeg";
                            break;
                        case 'pdf':
                        case 'txt':
                        case 'mp3':
                        case 'html':
                        case 'jpg':
                        case 'png':
                        case 'zip':
                            extension = extension;
                            break;
                        default:
                            extension = "default";
                            break;
                    }

                    var ticketItem = '<div class="comment"><div class="comment-body"><div class="comment-text"><div class="comment-header"><b>'+value['item_status']+'</b></div><div class="comment-header"><a href="#" title="">'+value['name']+'</a><span>'+value['time']+'</span></div><br><iframe id="iframeID'+iframeCounter+'" style="border:unset;width:100%;"></iframe><div onClick="attachmentDownload('+value['attachmentUploadID']+')"><img src="images/extension/'+extension+'.png" width="30px" height="30px">'+value['fileName']+'</div></div></div></div>';

                    $('#ticketItem').append(ticketItem);
                    var doc = document.getElementById('iframeID'+iframeCounter).contentWindow.document;
                    doc.open();
                    doc.write(value['content']);
                    var doc1 = document.getElementById('iframeID'+iframeCounter);
                    if(doc1) {
                        doc1.height = "";
                        doc1.height = doc1.contentWindow.document.body.scrollHeight + "px";
                    }  
                    doc.close(); 
                    iframeCounter++;
                }
                    
            });
        }
    }

    function replyCallback(data, message) {
        showMessage('Successfully replied.', 'success', 'Reply Ticket', 'envelope', ['ticketInbox.php', {id: ticketID, previousPage : previousPage}]);
    }

    function noteCallback(data, message) {
        showMessage('Successfully added note.', 'success', 'Add Note', 'sticky-note', ['ticketInbox.php', {id: ticketID, previousPage : previousPage}]);
    }

    function attachmentDownloadCallback(data, message){
        //do nothing
    }

    function attachmentDownload(uploadID){
         var data = {
                "uploadID" : uploadID,
            }
        $.redirect("attachDownload.php", data);
    }


</script>

</body>
</html>
