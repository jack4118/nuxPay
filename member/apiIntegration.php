<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<!-- <div class="m-subheader marginTopHeader">
				<div class="d-flex align-items-center">
					<div class="mr-auto">
						<div class="col-12">
							<div class="row">
								<div class="dashboardTitleWidth">
									<img src="images/dashboard/transactionIcon.svg" style="width: 30px; margin-top: 5px;" />
								</div>
								<div class="dashboardTitleWidth2">
									<div class="row">
										<div class="col-12 dashboardTitle">
											Invoice Listing
										</div>
										<div class="col-12 dashboardTitleDesc">
											You can view all the invoices here for request fund
										</div>
									</div>
								</div>
							</div>      
						</div>
					</div>  
				</div>
			</div> -->



			<div class="m-content marginTopHeader">

				<div class="col-12 pageHeader mb-3 px-0">				    
					<?php echo $translations["M00532"][$language]; /* Settings */ ?>
				</div>
				
				<div class="d-flex align-items-center">
                    <div class="col-12 pl-0 pb-5">
                        <div class="d-flex border-bottom justify-content-between">
                            <nav class="nav">
                              <a class="nav-link" id="profileBtn" href="settings.php"><?php echo $translations["M01876"][$language]; /* Profile */ ?></a>
                              <!-- <a class="nav-link" id="walletBtn" href="paymentWallet.php"> <?php echo $translations["M01702"][$language]; /* Withdrawal Wallets */ ?> </a> -->
                              <a class="nav-link" id="securityBtn" href="settingsChangePassword.php"><?php echo $translations["M01703"][$language]; /* Security */ ?></a>
                              <a class="nav-link" id="coinBtn" href="settingsAddWallet.php"><?php echo $translations["M01704"][$language]; /* Acceptable Currency */ ?></a>
							  <a class="nav-link" id="coinBtn1" href="settingsAddWalletCurrency.php"><?php echo $translations["M02016"][$language]; /* Wallet Coin Currency */ ?></a>
							  <!-- <a class="nav-link active" id="apiBtn" href="javascript:void(0)"><?php echo $translations["M01597"][$language]; /* API Integration */ ?></a> -->
							  <a class="nav-link" id="whitelistBtn" href="whitelistAddresses.php"><?php echo $translations["M01713"][$language]; /* Whitelist Addresses */ ?></a>
							  <!-- <a class="nav-link" id="fundOutBtn" href="transferWallet.php"><?php echo $translations["M01600"][$language]; /* Fund Out */ ?></a> -->
								
                            </nav>
                        </div>
                    </div>
				</div>

                <div class="col-xl-12 px-0">

                	<div class="row">

                		<div class="col-12 mb-3">
                			<div class="row">
                				<div class="col-12 bigText">                					
									<?php echo $translations["M01877"][$language]; /* Account ID */ ?>
                				</div>
                				<div class="col-12 smallTxt">                					 
									<?php echo $translations["M01878"][$language]; /* Your account ID is */ ?>
									<span id="" style="font-weight: bold"><?php echo $_SESSION["business"]["uuid"] ?></span>
                				</div>
                				<div class="col-12 smallTxt">                					
									<?php echo $translations["M01879"][$language]; /* Account ID is required for API Integration to access your  */ ?>
									<?php echo $sys['companyName']?> <?php echo $translations["M01692"][$language]; /* account */ ?>.
                				</div>
                			</div>
                		</div>

                		<div class="col-12 mt-4 mt-md-4">
                			<div class="row">
                				<div class="col-12 bigText">                					
									<?php echo $translations["M00139"][$language]; /* API Keys */ ?>.
                				</div>
                				<div class="col-12 smallTxt">                					 
                					<?php echo $translations["M01658"][$language]; /* Add new or revoke */ ?>. <?php echo $sys['companyName']?> <?php echo $translations["M01659"][$language]; /* API access key */ ?>.
                				</div>
                				<div class="col-12 smallTxt">                					
									<?php echo $translations["M01693"][$language]; /* The key is required for API integration to generate wallet address and read notifications of your transactions */ ?>.
                				</div>

                				<div class="col-12 mt-3" id="showErrorMsg" style="display: block">
                					<div class="m-portlet">
                						<div class="m-portlet__body">
		                					<div class="row">
		                						<div class="col-12">
		                							<div class="row m-form">
		                								<div class="col-12">
		                									<div class="row">
		                										<div class="col-4 text-right">
		                											<img src="<?php echo $sys['source'] == 'FTAG' ?  'images/whitelabel/ftag/withdrawal-confirm.png' :  'images/nuxPay/apiKeyIcon.png'?>">
						                						</div>
						                						<div class="col-md-8">
						                							<div class="row">
						                								<div class="col-12" style="font-weight: 500; color: #000">						                									
						                									<?php echo $translations["M01694"][$language]; /* No API Key */ ?>!
						                								</div>
						                								<div class="col-12">						                									 
						                									<?php echo $translations["M01695"][$language]; /* Get started via creating an API key to integrate with */ ?> <?php echo $sys['companyName']?> <?php echo strtolower($translations["M00130"][$language]); /* payment gateway */ ?>.
						                								</div>
						                								<div class="col-12 mt-3">
						                									<button onclick="" id="generateNewApiKey1" class="btn searchBtn" type="button">+ <?php echo $translations["M01664"][$language]; /* New API Key */ ?> </button>
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

    							<div class="col-12 mt-3" id="showresultListing" style="display: block;">
    								<div class="m-portlet m-portlet--tab">
    				                    <div class="m-portlet__body">
    				                        <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
    				                            <div class="table-responsive" id="apiKeysDivList"></div>
    				                        </div>     
    				                    </div>
    								</div>
    								<div class="col-3 px-0">
    									<button onclick="" id="generateNewApiKey" data-toggle="modal" data-target="#generateApiModal" class="btn searchBtn" type="button" style="min-width: 100px; margin-top: -10px">+ <?php echo $translations["M01664"][$language]; /* New API Key */ ?></button>
    								</div>
    							</div>

    							
                			</div>
                		</div>

                		<div class="col-12 mt-5 mt-md-5">
                			<div class="row">
                				<div class="col-12 bigText">                					
									<?php echo $translations["M01269"][$language]; /* Callback URL */ ?>
                				</div>
                				<div class="col-12 smallTxt">                					
									<?php echo $translations["M01696"][$language]; /* Get notify when there are transaction done on your payment gateway */ ?>.
                				</div>
                				<div class="col-12 col-md-10 col-lg-8 mt-3">
                					<div class="m-portlet">
                						<div class="m-portlet__body">
		                					<div class="row">
		                						<div class="col-12" style="font-weight: 500; color: #000">		                							
													<?php echo $translations["M01697"][$language]; /* URL */ ?>
		                						</div>
		                						<div class="col-12 mt-3">
		                							<div class="row">
		                								<div class="col-12 col-md-9">
    														<div class="d-flex urlBox">
    									        			    <input id="urlInput" type="text" class="form-control requestInput rounded-0" placeholder="Example:https//yourdomain.com/callbackurl">
    									        			    <span id="inputTick" style="margin-top: 20px;line-height: 37px;color: green; display: none">
    									        			        <i class="fa fa-check"></i>
    									        			    </span>
    									        			</div>
		                								</div>
		                								<div class="col-12 col-md-3 mt-3 mt-md-0">
		                									<button onclick="" id="saveBtn" class="btn searchBtn" type="button" style="min-width: 100px"><?php echo $translations["M00291"][$language]; /* Save */ ?> </button>
		                								</div>
		                							</div>
		                						</div>
		                					</div>
                						</div>
	                				</div>
                				</div>
                			</div>
                		</div>

                		<!-- YF1 -->
						<div class="col-12 mt-5 mt-md-5">
							<div class="row">
								<div class="col-12 bigText">
									<?php echo "White List API Key<br>"?>
									<?php echo"<br>" ?>
									<?php echo $translations["M00139"][$language]; /* API Keys */?>
								</div>
								<div class="col-12 smallTxt">
			
									<?php echo $translations["M01658"][$language]; /* Add new or revoke  */?>
									<?php echo $sys['companyName']?> 
									<?php echo $translations["M01659"][$language]; /* API access key  */?>.									
				
								</div>
								<div class="col-12 smallTxt">
									<?php echo $translations["M01660"][$language]; /* The key is required for API integration to whitelisting wallet address. Read our API documentation  */?>.
									 <a href="paymentGateway.php#whitelistSection">
									 <?php echo $translations["M01661"][$language]; /* here  */?>.
									 </a>

								</div>

								<div class="col-12 mt-3" id="showErrorMsgWL" style="display: none">
									<div class="m-portlet">
										<div class="m-portlet__body">
											<div class="row">
												<div class="col-12">
													<div class="row m-form">
														<div class="col-12">
															<div class="row">
																<div class="col-4 text-right">
																	<img src="images/nuxPay/apiKeyIcon.png">
																</div>
																<div class="col-md-8">
																	<div class="row">
																		<div class="col-12" style="font-weight: 500; color: #000">
														
																			<?php echo $translations["M01694"][$language]; /* No API Key  */?>!
																		</div>
																		<div class="col-12">
														
																			<?php echo $translations["M01662"][$language]; /* Get started via creating an API key to integrate with   */?>
																			<?php echo $sys['companyName']?> 
																			<?php echo $translations["M01663"][$language]; /* whitelisting wallet address system*/?>.
														
																		</div>
																		<div class="col-12 mt-3">
																			<button onclick="" id="generateNewApiKeyWL1" class="btn searchBtn" type="button">+ <?php echo $translations["M01664"][$language]; /* New API Key */?>
															
																			</button>
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

								<div class="col-12 mt-3" id="showresultListingWL" style="display: none;">
									<div class="m-portlet m-portlet--tab">
										<div class="m-portlet__body">
											<div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
												<div class="table-responsive" id="apiKeysDivListWL"></div>
													<div class="m-datatable__pager m-datatable--paging-loaded clearfix m-t-rem3">
												<ul class="m-datatable__pager-nav" id="apiKeysPager"></ul>
												<div class="m-datatable__pager-info">
												<span class="m-datatable__pager-detail"></span>
												</div>
											</div>  
										</div>     
									</div>
								</div>
								<div class="col-3 px-0">
									<button onclick="" id="generateNewApiKeyWL" data-toggle="modal" data-target="#generateApiModalWL" class="btn searchBtn" type="button" style="min-width: 100px; margin-top: -10px">+ New API Key</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			</div>						<!-- YF1.1  -->
       
	<div>
	<?php include 'footerDashboard.php'; ?>
</div>
</div>

<div class="modal fade" id="generateApiModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b">
                <div class="modal-title f-16"><?php echo $translations["M00138"][$language]; /* Generate API Key */ ?></div>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div id="errorMsgAuto" class="alert alert-danger" style="display: none;"></div>
                <div class="form-group m-form__group">
					<label for="reference" style="padding-top: 10px;">Reference Name</label>
					<input class="form-control col-md-12" name="apiReference" id="reference" maxlength="50" autocomplete="off">
                    <!-- <label for="expiryDate" style="padding-top: 10px;"><?php echo $translations["M00141"][$language]; /* Expiry Date */ ?><span class="text-danger">*</span></label> -->
					<label for="expiryDate" style="padding-top: 10px;"><?php echo $translations["M00141"][$language]; /* Expiry Date */ ?><span> (<?php echo $translations["M01666"][$language]; /* optional */ ?>)</span></label>
                     <input class="form-control col-md-12" type="datepicker" name="apiExpiry" id="expiryDate" data-date-format="YYYY MMMM DD" autocomplete="off" placeholder ="YYYY-MM-DD">
                </div>                          

            </div>

            <div class="modal-footer bg-w">
                <a href="javascript:void(0)" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button"  style="color: black;"  data-dismiss="modal" role="button"><?php echo $translations["M00142"][$language]; /* Cancel */ ?></a>
                <a href="javascript:void(0)" id="generateBtn" class="btn btn btn m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-green-button"  style=""><?php echo $translations["M00143"][$language]; /* Generate */ ?></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="apiKeyRedirectUpgradeModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b" style="border-bottom: 0px solid black">                
                <div class="modal-title f-16"><?php echo $translations["M01698"][$language]; /* Upgrade to Premium Account to unlock this feature */ ?>!</div>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <!-- <span>Click <a href="upgradeToPremium.php">here<a> to upgrade account!</span> -->
				<a href="upgradeToPremium.php"><button class="searchBtn btn" ><?php echo $translations["M01699"][$language]; /* Upgrade */ ?></button><a>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="saveRedirectUpgradeModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b" style="border-bottom: 0px solid black">                
                <div class="modal-title f-16"><?php echo $translations["M01698"][$language]; /* Upgrade to Premium Account to unlock this feature */ ?>!</div>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <!-- <span>Click <a href="upgradeToPremium.php">here<a> to upgrade account!</span> -->
				<a href="upgradeToPremium.php"><button class="searchBtn btn" ><?php echo $translations["M01699"][$language]; /* Upgrade */ ?> </button><a>

            </div>

        </div>
    </div>
</div>
<!-- YF5 -->

<div class="modal fade" id="generateApiModalWL" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b">
                <div class="modal-title f-16"><?php echo $translations["M00138"][$language]; /* Generate API Key */ ?></div>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div id="errorMsgAuto" class="alert alert-danger" style="display: none;"></div>
                <div class="form-group m-form__group">
					<label for="referenceWL" style="padding-top: 10px;">
						<?php echo $translations["M01665"][$language]; /* Reference Name */?>
					</label>
					<input class="form-control col-md-12" name="apiReferenceWL" id="referenceWL" maxlength="50" autocomplete="off">
                    <!-- <label for="expiryDate" style="padding-top: 10px;"><?php echo $translations["M00141"][$language]; /* Expiry Date */ ?><span class="text-danger">*</span></label> -->
					<label for="expiryDateWL" style="padding-top: 10px;"><?php echo $translations["M00141"][$language]; /* Expiry Date */ ?><span> 
						(<?php echo $translations["M01666"][$language]; /* optional */?>)
					</span></label>
                     <input class="form-control col-md-12" type="datepicker" name="apiExpiryWL" id="expiryDateWL" data-date-format="YYYY MMMM DD" autocomplete="off" placeholder ="YYYY-MM-DD">
                </div>                          

            </div>

            <div class="modal-footer bg-w">
                <a href="javascript:void(0)" class="btn btn btn m-btn--pill m-btn--air  btn-outline-secondary btn-sm m-btn m-btn--custom theme-button"  style="color: black;"  data-dismiss="modal" role="button"><?php echo $translations["M00142"][$language]; /* Cancel */ ?></a>
                <a href="javascript:void(0)" id="generateWLBtn" class="btn btn btn m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-green-button"  style=""><?php echo $translations["M00143"][$language]; /* Generate */ ?></a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="showApiDetailModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b">
                <div class="modal-title f-16">
				
					<?php echo $translations["M01667"][$language]; /* API key details */?>
				</div>
               
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div id="errorMsgAuto" class="alert alert-danger" style="display: none;"></div>
                <div class="form-group m-form__group">
                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;"> 
							<?php echo $translations["M01668"][$language]; /* API Key */?>:
						</label>
                		<label id="modalApiKey" style="margin-left: 10px;"></label>
                		<span>
                            <img src="images/dashboard/newCopyIcon.png" style="width: 25px; padding-left:5px" id="modalCopyTxId">
                        </span>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;"> 
						<?php echo $translations["M01669"][$language]; /* Reference */?>:
						</label>
                		<label id="modalReference" style="margin-left: 10px;"></label>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;">
						<?php echo $translations["M01026"][$language]; /* Status */?>:
						</label>
                		<label id="modalStatus" style="margin-left: 10px;"></label>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;">
							<?php echo $translations["M01670"][$language]; /* Created At */?>:
						</label>
                		<label id="modalCreatedAt" style="margin-left: 10px;"></label>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;">
							<?php echo $translations["M01671"][$language]; /* Expired At */?>:
						</label>
                		<label id="modalExpiredAt" style="margin-left: 10px;"></label>
                	</div>

                	<div class="row">
                		<label class="f-14" style="margin-left: 14px;"> 
							<?php echo $translations["M01672"][$language]; /* Last Updated At */?>:
						</label>
                		<label id="modalLastUpdatedAt" style="margin-left: 10px;"></label>
                	</div>

                </div>                          

            </div>

            
        </div>
    </div>
</div>

<!-- YF5.1 -->
<!-- YF4 -->

<!-- 2FA START -->
<div class="modal fade" id="twoFactorModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5>
						<?php echo $translations["M01673"][$language]; /* Enable 2-Factor Authentication */?>
					</h5>
                    <p class="my-0 enableStep1">
					
					<?php echo $translations["M01674"][$language]; /* The OTP code has been sent to your verified contact method */?>:					
					<br><span id="mobileAvailable"><?php echo $translations["M00459"][$language]; /* Mobile Number */?>: <?php echo $_SESSION['mobile']?><br>

					</span><span id="emailAvailable"> <?php echo $translations["M00958"][$language]; /* Email */?>: <?php echo $_SESSION['email']?>
					</span></p>

                    <div class="enableStep2" style="display: none;">
<!--                        <img id="authenticatorQR" src="images/qrcode.jpg" width="150px" class="my-3">-->
                        <div id="qrcode" class=""></div>
                        <ul class="text-left pl-3">
                            <li>
							<?php echo $translations["M01646"][$language]; /* Install Google Authenticator app on your mobile device. */?>
							</li>
                            <li>
								<?php echo $translations["M01647"][$language]; /* Scan QR code with the authenticator. */?>
							</li>
                            <li>
								<?php echo $translations["M01648"][$language]; /* Enter 6-digits codes from authenticator. */?>
							</li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p class="enableStep1">
						<?php echo $translations["M01649"][$language]; /* Enter your OTP code */?>
					</p>
                    <p class="enableStep2" style="display: none;">
					<?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */?>
					</p>
                    <div class="d-inline-flex authenticationBox align-items-center">
                        <div class="mr-2">
                            <img src="images/OTP.png" width="30px">
                        </div>
                        <input class="form-control authenticator" type="" name="" id ="otpCodeID">
                        <span id="timer" name="timer" style="padding-left: 20px"></span>
                    </div>
                    <p id ="didNotReceiveSms" >
					<?php echo $translations["M01651"][$language]; /* Didn't receive the OTP */?>?
					<a href="javascript:;" onclick="requestOTP()">
						<?php echo $translations["M01652"][$language]; /* Re-send OTP */?>
					</a></p>

                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmBtn" class="btn primaryBtn enableStep1" style="">
						<?php echo $translations["M00217"][$language]; /* Confirm */?>
					</a>
                    <a href="javascript:void(0)" id="enableModalBtn" class="btn primaryBtn enableStep2" style=" display: none;">
						<?php echo $translations["M01031"][$language]; /* Enable */?>
					</a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unableModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="modal-title hasSub">
                    <h5>
						<?php echo $translations["M01653"][$language]; /* 2-Factor Authentication */?>
					</h5>
                    <p class="my-0 enableStep1">
						<?php echo $translations["M01654"][$language]; /* Enter authenticator codes to make sure it's really you trying to change settings */?>
					</p>
                </div>
            </div>
            <div class="modal-body border-b" style="line-height: 25px;">
                <div class="col-12 text-center">
                    <p>
						<?php echo $translations["M01650"][$language]; /* Enter your 2-factor authenticator code */?>
					</p>
                    <div class="d-inline-flex authenticationBox">
                        <img src="images/ga2.svg" width="40px" class="mr-2">
                        <input class="form-control authenticator" type="" name="" id="authCodeID">
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-w">
                <div class="col-12 text-center">
                    <a href="javascript:void(0)" id="confirmUnableBtn" class="btn primaryBtn" style="">
						<?php echo $translations["M00981"][$language]; /* Confirm */?>
					</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
					</div>
					</div>
<!-- 2FA END -->

<!-- YF4.1 -->

<?php include 'sharejsDashboard.php'; ?>
<script src="js/jquery.qrcode.js" type="text/javascript"></script>

					</div>
					</div>
</body>
</html>

<script>
    $("#expiryDate").datepicker({
        format: 'yyyy-mm-dd',
        orientation:"bottom",
        todayHighlight:!0,
        templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    });

	$("#expiryDateWL").datepicker({
        format: 'yyyy-mm-dd',
        orientation:"bottom",
        todayHighlight:!0,
        templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}
    });
   
    var divId    = 'apiKeysDivList';
	var WLdivId	 = 'apiKeysDivListWL'
    var tableId  = 'apiKeysListTable';
    var WLtableId  = 'apiKeysListTableWL';
    var pagerId  = 'apiKeysPager';
    var btnArray = {};
    var thArray  = Array(    		
    		'<?php echo $translations["M00139"][$language]; /* API Keys */ ?>',   			
   			'<?php echo $translations["M01665"][$language]; /* Reference Name */ ?>',			
			'<?php echo $translations["M00212"][$language]; /* Status */ ?>',			
			'<?php echo $translations["M01610"][$language]; /* Created On */ ?>',			
			'<?php echo $translations["M01700"][$language]; /* Expired On */ ?>',
    		''
        );




    var url             = 'scripts/reqPaymentGateway.php';
    var WLurl           = 'scripts/reqWhitelist.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
	var getToken 		= "<?php echo $_POST['token']?>";
	var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';
	var accountType = "<?php echo $_SESSION['account_type']; ?>";
	// var accountType = "basic";

	// YF6
	var twoFaStatus = false;
	var mobileAva = '<?php echo $_SESSION['mobile']?>';
    var emailAva = '<?php echo $_SESSION['email']?>';
    var submitType = "";
    var submitExpiryDate = "";
    var submitExpiryDateWL = "";
    var submitReference = "";
    var submitReferenceWL = "";
    var submitViewId = "";
    var submitRevokeId = "";
    var submitRevokeIDWL = "";
	//YF6.1

	if (hasChangedPassword == 0){
		$.redirect('firstTimeLogin.php');
	}


	$(document).ready(function() {
		
		//YF7
//2FA START
formData = {
            command : 'get2FAStatus',

        };
        fCallback = loadGet2FAStatus;

        ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        if (mobileAva==""){
        	$('#mobileAvailable').hide();
        }
        if (emailAva==""){
            $('#emailAvailable').hide();
        }

        $("#confirmBtn").click(function(){
            formData = {
                command : 'verify2FASMSOTP',
                otp_code : $('#otpCodeID').val()

            };
            fCallback = loadVerifySMSOTP;
            ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
           
        });

        $("#enableModalBtn").click(function(){
        
            formData = {
                command : 'register2FA',
                code : $('#otpCodeID').val()

            };
            fCallback = loadRegister2FA;
            ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        });

        $("#confirmUnableBtn").click(function(){
        
            var otpCode = $('#authCodeID').val();
            if(otpCode=="") {
                otpCode = $('#otpCodeID').val();;
            }
            
           	callApiAfter2FA(otpCode);

        });
        //2FA End
		//YF7.1


		fCallback = loadApiKeyListingWL;
		formData  = {
		    command : 'getApiList',
		    pageNumber: pageNumber
		};
		ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



		$('#generateNewApiKeyWL').click(function(){
		    $('#generateApiModalWL').toggle();
		});
		
		$('#generateNewApiKeyWL1').click(function(){
		     $('#generateApiModalWL').modal('show');
		});
		
		$('#generateWLBtn').click(function(){    
	    
			$('#authCodeID').val('');
            $('#otpCodeID').val('');
        
	    	submitType = "generateAPI";
	    	submitExpiryDateWL = sanitize($('input#expiryDateWL').val());
			submitReferenceWL = sanitize($('#referenceWL').val());
		 	console.log('here generate');

	    	if(twoFaStatus) {
	            twoFaOtpView();
	        } else {
	            twoFaRegister();
	        }

	        $('#generateApiModalWL').modal('hide');

		});


		$('#modalCopyTxId').click(function(){
			var apiKeyTxt = $("#modalApiKey").text();
	    	copyToClipboard(apiKeyTxt)
	    });

	
	
	
		fCallback = getCallbackData;
        formData  = {
            command: 'getCallbackURL'
        };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		fCallback = loadApiKeyListing;
		formData  = {
		    command : 'getApiKeyListing',
		    page: pageNumber
		};
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



		 $('#generateNewApiKey').click(function(){
		     $('#generateApiModal').toggle();
		 });
		
		$('#generateNewApiKey1').click(function(){
			if(accountType == "basic"){
				$('#apiKeyRedirectUpgradeModal').modal('show');
			}else{
				$('#generateApiModal').modal('show');
			}
		 });
			$('#generateBtn').click(function(){    
		    // if( $('input#expiryDate').val() == ''){
		    //      $('.text-danger').hide();
		    //      $('input#expiryDate').after('<span class="text-danger"><?php echo $translations["M00145"][$language]; /*Please enter expiry date */ ?></span>');
		    //      $('html, body').animate({
		    //          scrollTop: $("#expiryDate").offset().top-120
		    //      }, 500);
		    //      $('input#expiryDate').focus();
		    //  }else{
		         var expiryDate = $('input#expiryDate').val();
				 var referenceName = sanitize($('#reference').val());

		         fCallback = addNewApi;
		         formData  = {
		             command: 'generateApiKeys',
		             page: pageNumber,
		             expiry_date : expiryDate,
					 reference : referenceName,
		         };
		         ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		         $('#generateApiModal').modal('hide');

		         function addNewApi(data,message){
		             
		             showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", 'apiIntegration.php');
		         };
		    //  }
		 });

		});

	
	  function getCallbackData(data,message){
        $('#urlInput').val(data.result.callback_url);
    }
	
	
	function copyToClipboard(val){
        // console.log(val);
        var dummy = document.createElement("input");
        document.body.appendChild(dummy);
        // $(dummy).css('display','none');
        dummy.setAttribute("id", "dummy_id");
        document.getElementById("dummy_id").value=val;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
            showConfirmButton:!1,
            timer:1000
        })
    }
	
	$('#saveBtn').click(function(){
		if(accountType == "basic"){
			$('#saveRedirectUpgradeModal').modal('show');
		}else{
			if ($('#urlInput').val() != ''){
			fCallback = loadSetCallbackUrl;
			formData  = {
				command : 'setCallbackURL',
				callbackURL : $('#urlInput').val()
			};
			ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
			} else {
				showMessage('Callback URL cannot be empty', 'warning', 'Error', "warning", '');
			}
		}
		
	});
	
	function loadSetCallbackUrl(data, message){
		if (data.code == 1){
			showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", 'apiIntegration.php');
		}
		
	}
	
	    function loadApiKeyListing(data, message) {
			var tableNo;
	        var apiKeysList = data.result.apikeys;

	        if(apiKeysList) {
	        	$('#showErrorMsg').hide();
	        	$('#showresultListing').show();

	            var newList = [];
	            var workingHours;
	            $.each(apiKeysList, function(k, v) {

	            	var status = v['status'];

	            	if (status == "1") {
	            		var addClassColor = "success";
	            		var statusTxt = "Active";
	            	} else {
	            		var addClassColor = "danger";
	            		var statusTxt = "Expired";
	            	}

	                var rebuildData = {
	                    ID               : '<span style="white-space: nowrap">'+v['apikey']+'<img src="images/dashboard/newCopyIcon.png" style="width: 18px; cursor: pointer; margin-left: 20px;" class="copyImgClick"/></span>',
	                    reference        : sanitize(v['reference']),
	                    status 			 : statusTxt,
	                    createdAt        : moment(v['created_at']).format('DD/MM/YYYY'),
	                    expiredAt        : sanitize(v['expired_at']) != '' ? moment(sanitize(v['expired_at'])).format('DD/MM/YYYY') : '-',
	                    deleteApi        : '<div class="deleteApiId mt-1"><button class="btn revokeBtn"><?php echo $translations["M01701"][$language]; /* Revoke */ ?></button></div>'
	                };

	                newList.push(rebuildData);
	            });
	        }
	        else
	        {
	        	$('#showErrorMsg').show();
	        	$('#showresultListing').hide();
	        }

	        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
	        // console.log(data);
	        pagination(pagerId, data.result.pageNumber, data.result.totalPage, data.result.totalRecord, data.result.numRecord);

	       	$('#'+tableId).find('tbody tr').each(function(){
	            $(this).addClass("removeBackgorundColor");
	        })
	        $('#'+tableId).find('tbody tr').each(function(){
	            $(this).find("td:eq(1)").addClass("walletAddressTextEscplise");
	            $(this).find("td:eq(2)").addClass("montserratRegularFont");
	            $(this).find("td:eq(3)").addClass("montserratRegularFont");
	            $(this).find("td:eq(4)").addClass("montserratRegularFont");
	        })
	       	if(apiKeysList) {
	        	$.each(apiKeysList, function(k, v) {
	          		$('#'+tableId+' tr#'+k).find('.copyImgClick').attr('data-id', v['id']);
	          		$('#'+tableId+' tr#'+k).find('.deleteApiId').attr('data-id', v['id']);
	        	});
	      	}

	       	$('.copyImgClick').click(function()
	       	{
	       		var getCopyDataId = $(this).attr('data-id');

	       		if(apiKeysList) {
		        	$.each(apiKeysList, function(k, v) {
		          		if(getCopyDataId == v['id'])
		          			copyToClipboard(v['apikey']);
		        	});
		      	}
	       	});
	       	$('.deleteApiId').click(function()
	       	{
	       		var getDeleteId = $(this).attr('data-id');	

	       		var canvasBtnArray = Array('Delete');
	            var message = '<?php echo $translations["M00147"][$language]; /* Are ypu sure you want to delete this API Key? */ ?>';
	            showMessage(message, 'warning', '<?php echo $translations["M00148"][$language]; /* Delete API Key */ ?>', 'warning', '', canvasBtnArray);
	            $('#canvasDeleteBtn').click(function() {
					console.log('delete');
					console.log(getDeleteId);
	                var formData = {
	                    command  : 'deleteApiKey',
	                    apikey_id : getDeleteId
	                };
	                console.log(formData);
	                fCallback = loadDelete;
	                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	            });
	       	});
	    }

		function loadDelete(data, message){
			console.log(data);
			
			if(data.code ==1){
				 showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", 'apiIntegration.php');
			}
		}


	    function loadSearch(data, message) {
	        loadApiKeyListing(data, message);
	        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations["M00334"][$language]; /* Search Successful */ ?>.</span>').show();
	        setTimeout(function() {
	            $('#searchMsg').removeClass('alert-success').html('').hide(); 
	        }, 3000);
	    }

	    function pagingCallBack(pageNumber, fCallback){

	        var searchId   = 'searchTransaction';
	        var searchData = buildSearchDataByType(searchId);
	        var status = $("#status").val();
	        var fromDateTime, toDateTime;

	        if ($("#firstDate").val()) {
	            fromDateTime = dateToTimestamp($("#firstDate").val() + " 00:00:00");
	        }else{
	            fromDateTime="";
	        }
	        if ($("#lastDate").val()) {
	            toDateTime = dateToTimestamp($("#lastDate").val() + " 23:59:59");
	        }else{
	            toDateTime="";
	        }

	        // console.log(fromDateTime);
	        // console.log(toDateTime);

	        if(pageNumber > 1) bypassLoading = 1;

	        var formData = {
	            command       : 'getApiKeyListing',
	            page          : pageNumber,
	            status        : status,
	            from_datetime : fromDateTime,
	            to_datetime   : toDateTime
	        };

	        if(!fCallback)
	            fCallback = loadApiKeyListing;

	        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
	    }
		// YF3
		//2FA Start
		function loadGet2FAStatus(data, message){
        twoFaStatus = data.data.status
    }

    function twoFaOtpView() {

    	$(".enableStep1").show();
        $(".enableStep2").hide();

        console.log("twoFaOtpView");

        $("#unableModal").modal('show');
    }

    function twoFaRegister() {

        console.log("twoFaRegister");

        formData = {
            command : 'request2FASMSOTP'

        };
        fCallback = loadSendSMSOTP;
        ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    }

    function loadSendSMSOTP(data,message){
        $("#otpCodeID").val('');
        if(data.code == 1){

            if(data.data) {
                document.getElementById("timer").innerHTML = data.data.countdown_second;
                $("#didNotReceiveSms").hide();
                $("#timer").show();
                startTimer();
                $(".enableStep1").show();
                $(".enableStep2").hide();

                $("#twoFactorModal").modal('show');
            
            } else {

                showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');
            }
        }
    }

    function requestOTP(){

        formData = {
            command : 'request2FASMSOTP'

        };
        fCallback = loadRequestOTP;
        ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadRequestOTP(data, message){
        if(data.code == 1){

            if(data.data) {
                document.getElementById("timer").innerHTML = data.data.countdown_second;
                $("#didNotReceiveSms").hide();
                $("#timer").show();
                startTimer();
            } else {
                showMessage(message, 'danger', '', 'times-circle-o', 'settings.php');
            }
            
        }
    }

    function startTimer() {
        $('#timerDiv').show();
        $('#timer').show();
        $('#didNotReceiveSms').hide();

        var presentTime = document.getElementById('timer').innerHTML;

        var s = checkSecond((presentTime - 1));

        if(s <= "00" && check == "false"){

            $('#timerDiv').hide();
            $('#timer').hide();
            $('#didNotReceiveSms').show();

        } else if (s <= "00" && check == "true"){
            $('#timerDiv').hide();
			$('#timer').hide();
            $('#didNotReceiveSms').hide();
        }
        else {
            document.getElementById('timer').innerHTML = s;
            setTimeout(startTimer, 1000);
        }
    }

    function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
        if (sec < 0) {sec = "59"};
        return sec;
    }

    function loadVerifySMSOTP(data, message){
        if(data.code == 1){         
            var qr_data = data.data.qr_param;
            $('#qrcode').empty();
            $('#qrcode').qrcode({
                render: "canvas", 
                text: qr_data,
                width: 200,
                height: 200,
                background: "#ffffff",
                foreground: "#000000",
	          //src: 'images/qrcode.jpg',
                imgWidth: 20,
                imgHeight: 20,
            });

            $('#otpCodeID').val('');
            $("#timerDiv").hide();
            $("#timer").hide();
            $("#didNotReceiveSms").hide();
            $(".enableStep1").hide();
            $(".enableStep2").show();
            check = "true";
            twoFaStatus = true;
            document.getElementById('timer').innerHTML = "1";		
            
        } else{
            $("#twoFactorModal").modal('hide');
        }
    }

    function loadRegister2FA(data, message){
        var obj = data;
        $("#twoFactorModal").modal('hide');

        var otpCode = $('#authCodeID').val();
        if(otpCode=="") {
            otpCode = $('#otpCodeID').val();;
        }

        callApiAfter2FA(otpCode);

    }

    function callApiAfter2FA(code) {

    	if(submitType=="generateAPI") {

    		fCallback = responseGenerateApiKey;
			formData  = {
			    command : 'generateApiKey',
			    code: code,
			    reference: submitReferenceWL,
			    expired_at: submitExpiryDateWL
			};

			console.log(formData);
			ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);


    	} else if(submitType=="viewAPI") {

    		fCallback = responseViewAPI;
			formData  = {
			    command : 'getApiDetail',
			    code: code,
			    apiId: submitViewId
			};

			console.log(formData);
			ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    	} else if(submitType=="revokeAPI") {

    		fCallback = responseRevokeAPI;
			formData  = {
			    command : 'revokeApiKey',
			    code: code,
			    apiId: submitRevokeId
			};

			console.log(formData);
			ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    	} else {
    		$("#twoFactorModal").modal('hide');
    		$("#unableModal").modal('hide');

    		showMessage('<?php echo $translations["E00527"][$language]; /* Something went wrong, please try again later. */ ?>', 'warning', 'Failed', "warning", '');
    	}
    	
    }

    function responseGenerateApiKey(data,message){
		
		$("#twoFactorModal").modal('hide');
    	$("#unableModal").modal('hide');  

		pagingCallBackWL(pageNumber, loadApiKeyListingWL); 

	    showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", '');
	};

	function responseRevokeAPI(data,message){

		$("#twoFactorModal").modal('hide');
    	$("#unableModal").modal('hide');  

		pagingCallBackWL(pageNumber, loadApiKeyListingWL); 

	    showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", '');
	};

	function responseViewAPI(data,message){
		
		$("#twoFactorModal").modal('hide');
    	$("#unableModal").modal('hide');  

    	var responseViewAPIKey = data.data.apiKey;
    	var responseViewCreatedAt = dateTimeToDateFormat(data.data.created_at);
    	var responseViewExpiredAt = data.data.expired_at=="-" ? "-" : dateTimeToDateFormat(data.data.expired_at);
    	var responseViewReference = data.data.reference;
    	var responseViewStatus = (data.data.status==1 ? "Active" : "Expired");
    	var responseViewUpdatedAt = dateTimeToDateFormat(data.data.updated_at);

    	$("#modalApiKey").text(responseViewAPIKey);
		$("#modalReference").text(responseViewReference);
		$("#modalStatus").text(responseViewStatus);
		$("#modalCreatedAt").text(responseViewCreatedAt);
		$("#modalExpiredAt").text(responseViewExpiredAt);
		$("#modalLastUpdatedAt").text(responseViewUpdatedAt);
    	$('#showApiDetailModal').modal('show');

	};
    //2FA End



	function pagingCallBackWL(pageNumber, fCallback){

		fCallback = loadApiKeyListingWL;
		formData  = {
		    command : 'getApiList',
		    pageNumber: pageNumber
		};
		ajaxSend(WLurl, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

	}
		// YF3.3
// YF2
function loadApiKeyListingWL(data, message) {


if(data.data) {

	var tableNo;
	var apiKeysListWL = data.data.listing;

	if(apiKeysListWL) {
		$('#showErrorMsgWL').hide();
		$('#showresultListingWL').show();

		var newList = [];
		var workingHours;
		$.each(apiKeysListWL, function(k, v) {

			var status = v['status'];

			if (status == "1") {
				var statusTxt = "Active";
			} else {
				var statusTxt = "Expired";
			}

			var rebuildDataWL = {
				ID               : `<span style="white-space: nowrap">${v['apikey']}</span>`,
				reference        : sanitize(v['reference']),
				status 			 : statusTxt,
				createdAt        : moment(v['createdAt']).format('DD/MM/YYYY'),
				expiredAt        : sanitize(v['expiredAt']) != '-' ? moment(sanitize(v['expiredAt'])).format('DD/MM/YYYY') : '-',
				viewApi        : '<div class="viewApiId mt-1"><button class="btn viewBtn">View</button></div>',
				deleteApiWL        : '<div class="deleteApiWLId mt-1"><button class="btn revokeBtn" '+(statusTxt=='Expired' ? 'disabled':'')+' >Revoke</button></div>'
			};

			newList.push(rebuildDataWL);
		});
	}

	if(newList.length == 0) {
		$('#showErrorMsgWL').show();
		$('#showresultListingWL').hide();
	}

	buildTable(newList, WLtableId, WLdivId, thArray, btnArray, message, tableNo);
	// console.log(data);
	pagination(pagerId, data.data.pageNumber, data.data.totalPage, data.data.totalRecord, data.data.numRecord);

	   $('#'+WLtableId).find('tbody tr').each(function(){
		$(this).addClass("removeBackgorundColor");
	})
	$('#'+WLtableId).find('tbody tr').each(function(){
		$(this).find("td:eq(1)").addClass("walletAddressTextEscplise");
		$(this).find("td:eq(2)").addClass("montserratRegularFont");
		$(this).find("td:eq(3)").addClass("montserratRegularFont");
		$(this).find("td:eq(4)").addClass("montserratRegularFont");
	})
	   if(apiKeysListWL) {
		$.each(apiKeysListWL, function(k, v) {
			  $('#'+WLtableId+' tr#'+k).find('.deleteApiWLId').attr('data-id', v['id']);
			  $('#'+WLtableId+' tr#'+k).find('.viewApiId').attr('data-id', v['id']);
		});
	  }

	   $('.deleteApiWLId').click(function() {

		   $('#authCodeID').val('');
		$('#otpCodeID').val('');

		   submitType = "revokeAPI";
		   submitRevokeId = $(this).attr('data-id');
		 console.log('Revoke Id: ' + submitRevokeId);

		if(twoFaStatus) {
			twoFaOtpView();
		} else {
			twoFaRegister();
		}


	   });
	   $('.viewApiId').click(function() {

		   $('#authCodeID').val('');
		$('#otpCodeID').val('');

		   submitType = "viewAPI";
		   submitViewId = $(this).attr('data-id');
		 console.log('View Id: ' + submitViewId);

		if(twoFaStatus) {
			twoFaOtpView();
		} else {
			twoFaRegister();
		}

	   });

} else {
	showMessage(message, 'danger', '<?php echo $translations["M01597"][$language]; /* API Integration */?>', 'times-circle-o', 'settingsChangePassword.php');
}

}
// YF2.2
	        function dateTimeToDateFormat(dateTimeValue)
	        {
	        	// Set variable to current date and time
	    		// const now = new Date(dateTimeValue);
	    		return moment(dateTimeValue).format('LLL');
	        }


	
</script>
<style>
@media only screen and (max-width: 1200px){
  .m-portlet .m-portlet__body {
    padding-top: 5px;
	padding-left: 5px;
	/* padding-right: 5px; */
  }
}
</style>
