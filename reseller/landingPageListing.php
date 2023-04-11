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
					<div class="col-xs-12 page-title">
						My Landing Page
					</div>
                </div>

				<!-- Table -->
				<div class="row" style="margin-top: 10px;">
					<div class="col-md-12">
						<div class="p-b-0">
							<form>
								<div id="basicwizard" class="pull-in">
									<div class="tab-content b-0 m-b-0 p-t-0">
										<div id="alertMsg" class="alert" style="display: none;"></div>
										<div id="landingPageListDiv" class="table-responsive"></div>
										<span id="paginateText"></span>
										<div class="text-center" style="">
											<ul class="pagination pagination-md" id="landingPageListPager">
											</ul>
										</div>
									</div>
								</div>
							</form>

						</div>

					</div>
				</div>



			</div>
		</div>
		<?php include("footer.php"); ?>
	</div>

</div>

<script>
	var resizefunc = [];

</script>
<?php include("shareJs.php"); ?>

</html>

<script>
    var divId    = 'landingPageListDiv';
    var tableId  = 'landingPageListTable';
    var pagerId  = 'landingPageListPager';
    var btnArray = Array('View', 'Edit');
    var thArray  = Array(
         'Reference Name',
         'Landing Page URL',
         'Created On',
    )

    // Initialize the arguments for ajaxSend function
    var username       = "<?php echo $_SESSION['username']?>";
    var domain = "<?php echo $config['memberSiteURL']; ?>";
	var url = 'scripts/reqAdmin.php';
	var method = 'POST';
	var debug = 0;
	var bypassBlocking = 0;
	var bypassLoading = 0;
	var pageNumber = 1;
	var formData = "";
	var fCallback = "";
    var tableNo;
    var landingPageList = {};

    $(document).ready(function(){      
        formData  = {
            command     : 'resellerGetLandingPageListing',
            page        : pageNumber
        }
        fCallback = loadPageListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0)
    });

    function loadPageListing(data, message){
        var tableNo;
        var landingPageArr = data.pageListing;
        var pageData = data;

        if(landingPageArr && landingPageArr.length > 0) {
         	$('#alertMsg').hide();
            $('#landingPageListDiv').show()
            var buildList = [];
            $.each(landingPageArr, function(k, v){
                landingPageList[k] = v; 
                var rebuildData = {
                    name: v['name'],
                    page_url: v['page_url'],
                    created_at: v['created_at'],
                }
                buildList.push(rebuildData);
            });

        } else {
            $('#alertMsg').show();
            $('#landingPageListDiv').hide();
        } 

        buildTable(buildList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, pageData.pageNumber, pageData.totalPage, pageData.totalRecord, pageData.numRecord);

        $('[data-original-title="View"]').html('View');
        $('[data-original-title="Edit"]').html('Edit');

        $('#'+tableId).find('tbody tr').each(function(){
                $(this).addClass("removeBackgorundColor");
                $(this).css("font-size", "14px");
        });
    }

    function tableBtnClick(btnId) {
        var btnName = $('#' + btnId).attr('id').replace(/\d+/g, '');
        var row_id = btnId.match(/\d+/g)[0];
        var rowData = landingPageList[row_id];

        if (btnName == 'View') {
            openPreviewPage(rowData);
        } else if (btnName == 'Edit') {
            $.redirect("editLandingPage.php", {
                pageData: rowData
            });
        }
    }

    function openPreviewPage(rowData){
        var landingPageUrlPath = domain+"/"+username+"/"+rowData['short_code'];

        var landingPageName = rowData['name'];
        var landingPageUrl = landingPageUrlPath;
        var title = rowData['title'];
        var subtitle = rowData['subtitle'];
        var description = rowData['description'];
        var mobile = rowData['mobile'];
        var telegram = rowData['telegram'];
        var whatsapp = rowData['whatsapp'];
        var email = rowData['email'];
        var instagram = rowData['instagram'];
        var media = rowData['image_url'];

        window.open("landingPagePreview.php?cal=" + landingPageName + "&text2=" + landingPageUrl +
        "&text3=" + title + "&text4=" + subtitle + "&text5=" + description + 
        "&text6=" + mobile + "&text7=" + telegram + "&text8=" + whatsapp + 
        "&text9=" + email + "&text10=" + instagram + "&text11=" + media);
        return false;
    }

</script>
