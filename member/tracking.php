<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<body class="">
	<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<section class="nuxPayTrackerBG">
					<div class="kt-container">
						<div class="row justify-content-center">
							
							<div class="col-12">
								<div class="row">
									<div class="col-12 text-center fundRaisingLogo">
										<img onclick="window.location='homepage.php'" src="<?php echo $sys['newHomepageLogo'] ?>" style="height: 100px;cursor: pointer;">
									</div>
								</div>
							</div>

							<div class="col-12 nuxPayTrackerTitle text-center">
								Transaction Tracker
							</div>

							<div class="col-lg-12 col-md-8 col-12 text-center nuxPayTrackerDesc">
								Get Up-To Date Transaction Status Anytime, Anywhere 
							</div>

							<div class="col-12" style="margin-top: 40px;">
								<div class="row justify-content-center">
									<div class="col-md-6 col-12">
										<label class="nuxPayTrackerLabel">Enter your transaction ID  :</label>
										<input type="text" class="form-control nuxPayTrackerForm" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="col-12 text-center" style="margin-top: 20px;">
								<button type="button" class="btn nuxPayTrackResetBtn">Reset</button>
								<button id="trackClick" type="button" class="btn nuxPayTrackBtn">Track</button>
							</div>

							<div id="dispalyTrack" class="col-12" style="margin-top: 50px; display: none;">
								<div class="row">

									<div class="col-12">
										<div class="row">
											<div class="trackingBox text-right trackerText">
												Dec, 19 2019 08:45
											</div>
											<div class="trackingBox2 text-center">
												<div class="trackingCircle"></div>
											</div>
											<div class="trackingBox trackerText">
												Created
											</div>
										</div>
									</div>

									<div class="col-12 text-center">
										<div class="trackerLine"></div>
									</div>

									<div class="col-12">
										<div class="row">
											<div class="trackingBox text-right trackerText">
												Dec, 20 2019 10:08
											</div>
											<div class="trackingBox2 text-center">
												<div class="trackingCircle"></div>
											</div>
											<div class="trackingBox trackerText">
												Validation
											</div>
										</div>
									</div>

									<div class="col-12 text-center">
										<div class="trackerLine"></div>
									</div>

									<div class="col-12">
										<div class="row">
											<div class="trackingBox text-right trackerText">
												Dec, 20 2019 11:37
											</div>
											<div class="trackingBox2 text-center">
												<div class="trackingCircle"></div>
											</div>
											<div class="trackingBox trackerText">
												Received Hash
											</div>
										</div>
									</div>

									<div class="col-12 text-center">
										<div class="trackerLine"></div>
									</div>

									<div class="col-12">
										<div class="row">
											<div class="trackingBox text-right trackerText">
												Dec, 21 2019 09:12
											</div>
											<div class="trackingBox2 text-center">
												<div class="trackingCircle"></div>
											</div>
											<div class="trackingBox trackerText">
												Pending
											</div>
										</div>
									</div>

									<div class="col-12 text-center">
										<div class="trackerLine"></div>
									</div>

									<div class="col-12">
										<div class="row">
											<div class="trackingBox text-right trackerText">
												Dec, 22 2019 10:39
											</div>
											<div class="trackingBox2 text-center">
												<div class="trackingCircle"></div>
											</div>
											<div class="trackingBox trackerText">
												Confirmatioms
											</div>
										</div>
									</div>

									<div class="col-12 text-center">
										<div class="trackerLine"></div>
									</div>

									<div class="col-12">
										<div class="row">
											<div class="trackingBox text-right trackerText active">
												Now
											</div>
											<div class="trackingBox2 text-center ">
												<div class="trackingCircle active"></div>
											</div>
											<div class="trackingBox trackerText active">
												Confirmed
											</div>
										</div>
									</div>

									<div class="col-12" style="margin-top: 30px;">
										<div class="row">
											<div class="col-12 trackerRequest">
												REQUEST ID
											</div>
											<div class="col-12 trackerID">
												QUYE24915719
											</div>
										</div>
									</div>


								</div>
							</div>

							

						</div>
					</div>
				</section>

			</div>
		</div>
	</div>
	<?php include 'footerHomepage.php';?>
</div>
</div>
</div>
</body>
</html>

<?php include 'sharejsHomepage.php'; ?>

<script>
	$(document).ready(function(){

		$('#trackClick').click(function() {
			$('#dispalyTrack').show();
		});

	});
</script>
