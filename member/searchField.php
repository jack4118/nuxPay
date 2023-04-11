<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="d-flex border-bottom justify-content-between align-items-center">
                            <div class="mr-3 txtGrey">
                                <img src="images/search.png" class="headerIconSize" style="height: 15px">
                            </div>
                            <div class="searchPageInp">
                                <input type="text" id="searchInp" placeholder="Search by name, email, mobile number, or wallet address">
                            </div>
                            <div>
                                <a id="closeBtn" href="#" class="btn btnSearch mx-2 my-2" style="" role="button">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </div>

					<!-- <div class="mr-auto">
						<div class="col-12">
							<div class="row">
								<div class="dashboardTitleWidth">
									<img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" />
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											Withdrawal Listing
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can view all the withdrawal history here
										</div>
									</div>
								</div>
							</div>      
						</div>
					</div>  --> 
				</div>
			</div>



			

			</div>

		</div>
	<?php include 'footerDashboard.php'; ?>
</div>


<?php include 'sharejsDashboard.php'; ?>

</body>
</html>

<script>

    $(document).ready(function(){ 

    });

    $("#searchInp").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            var searchTxt = $("#searchInp").val();
            
            $.redirect("<?php echo $_POST['url'] ?>", {
                searchData: '<?php echo $_POST['searchData'] ?>',
                newSearchVal: searchTxt,
				searchTab: '<?php echo $_POST['searchTab']?>'
            });
        }
    });

    $("#closeBtn").click(function(){
        $.redirect("<?php echo $_POST['url'] ?>", {
            searchData: '<?php echo $_POST['searchData'] ?>'
        });
    });

</script>