<?php include 'include/config.php'; ?>
<?php include 'headHomepage.php'; ?>

<?php
if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
		$_SESSION["access_token"] = $_POST['access_token'];
		$_SESSION["business"]["uuid"] = $_POST['businessID'];
}
 ?>

<body class="">
	<div class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--left kt-aside--fixed kt-page--loading">

		<?php include 'headerHomapage.php'; ?>

		<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<section class="nuxPaySection001BG">
					<div class="kt-container">
						<div class="row justify-content-center nuxPaySection001Row" >
							<div class="col-11">
								<div class="row">

									<div class="col-12 row">

										<div id="" class="col-sm-12 col-md-12 col-lg-7" style="padding-left: 24px;">

											<div class="col-12" style="margin-top: 10px;">
												<span class="nuxPaySection001Title_2"><?php echo $translations["M02019"][$language]; /* Accepting */ ?></span> <span class="nuxPaySection001Title_1"><?php echo $translations["M02020"][$language]; /* Credit Card, DuitNow, BTC and USDT */ ?> </span><span class="nuxPaySection001Title_2"><?php echo $translations["M02021"][$language]; /* today for your business. */ ?></span>
											</div>

											<div class="col-12" style="margin-top: 25px; display: flex;" >
												<div class="nuxPaySection001IconDiv" >
													<img src="images/landing/sec01/visa.png" class="nuxPaySection001Icon" >
												</div>
												<div class="nuxPaySection001IconDiv" >
													<img src="images/landing/sec01/master.png" class="nuxPaySection001Icon" >
												</div>
												<div class="nuxPaySection001IconDiv" >
													<img src="images/landing/sec01/duit.png" class="nuxPaySection001Icon2">
												</div>
												<div class="nuxPaySection001IconDiv" >
													<img src="images/landing/sec01/btc.png" class="nuxPaySection001Icon" >
												</div>
												<div class="nuxPaySection001IconDiv" >
													<img src="images/landing/sec01/usdt.png" class="nuxPaySection001Icon" >
												</div>
											</div>
											


										</div>

										<div class="col-sm-12 col-md-12 col-lg-5" id="nuxPaySection001ImgDiv">

											<div id="nuxPaySection001ImgDiv" class="col-12" >
												<img src="images/landing/sec01/wallet.png" class="nuxPaySection001Img" style="float: right;">
											</div>

										</div>

									</div>
									

								</div>
							</div>

						</div>
					</div>
				</section>

				<!-- <section class="nuxPaySection01BG">
					<div class="kt-container">
						<div class="row justify-content-center" style="padding-top:70px">
							<div class="col-11">
								<div class="row">

									<div class="col-12 row">

										<div id="nuxPaySection01Content01" class="col-sm-12 col-md-12 col-lg-6" style="margin-top: 80px;">

											<div class="col-12 nuxPaySection01Title_1" style="margin-top: 10px;">
											<img src='images/nuxPay/tick.png' class="nuxPaySection01Tick" ><?php echo $translations["M01989"][$language]; /* Send & Receive BTC/USDT like Paypal*/ ?>
											</div>

											
											<div class="col-12 nuxPaySection01Title_1" style="margin-top: 10px;">
												<img src='images/nuxPay/tick.png' class="nuxPaySection01Tick" ><?php echo $translations["M01981"][$language]; /*  Buy with Credit Card */ ?>
											</div>
											<div class="col-12 nuxPaySection01Title_1" style="margin-top: 10px;">
												<img src='images/nuxPay/tick.png' class="nuxPaySection01Tick" ><?php echo $translations["M01595"][$language]; /*  Auto Swap */ ?>
											</div>
											<div class="col-12 nuxPaySection01Title_1" style="margin-top: 10px;">
												<img src='images/nuxPay/tick.png' class="nuxPaySection01Tick" ><?php echo $translations["M01493"][$language]; /*  Cash Out Easily */ ?>
											</div>

											
											<div class="col-12 " style="margin-top: 70px; ">
																								
												<h6 class='' style='display: inline-block' >
												<?php echo $translations["M01804"][$language]; /*  I want to  */ ?>
												</h6>
												<span  style="margin-left: 25px" class="customButtonBorder">
													<a>
														<div class='d-inline'>
															<h3 id='receiveButton' class='d-inline  customButtonOnClick' style='display: inline-block; padding-right: 15px'>
															<?php echo $translations["M01792"][$language]; /*  Receive  */ ?>
															</h3>
														</div>
													</a>
													<a>
														<div class='d-inline'>
															<h3 id='sendButton' class='d-inline customButtonOffClick' style='display: inline-block; padding-left: 15px'>
															<?php echo $translations["M01791"][$language]; /*  Send  */ ?>
															</h3>
														</div>
													</a>
													
												</span>												
											</div>

											<div class="col-12" style="margin-top: 20px; margin-left: 30px; padding: 0;">

												<div style="display: none;" class="nuxPaySection01Part01" id="country_code">
													<select id="countryCode" class="form-control nuxPaySection01Dropdown">
														<?php include 'phoneList.php'; ?>
													</select>
												</div>

												<div class="row" style="width: 100%;">

														<div class="row" id="mobileSection" style="width:100%;">
															

															<div class="row" id="phoneOption">

																<div class="phoneNumberPrefix" style="margin-top: 10px;"></div>
																<div class="nuxPaySection01Part02">
																	<input id="phoneNumber" type="text" class="form-control nuxPaySection01Input" placeholder="        <?php echo $translations["M01513"][$language]; /*  Your Mobile Number  */ ?>">
																</div>

															</div>

															<div class="nuxPaySection01Part03" >
																<button id="sendPhoneNumber" type="button" class="btn homepageRequestFundBtn"> <?php echo $translations["M01792"][$language]; /*  Receive */ ?> </button>
															</div>
															
															
															<div class= "col-12 mt-2 form-group" style="display:flex; text-decoration: underline; margin-left: -10px;">
																<a style="background: transparent;" id="switchEmail" href="#"><?php echo $translations["M01495"][$language]; /*  Switch to email */ ?></a>
		                                                		
		                                            		</div>
														</div>

														<div class="row" id="emailSection" style="width:100%; display: none;">

															<div class="row" id="emailOption" style="display: none;">
																<div class="nuxPaySection01Part02email">
																	<input id="emailInput" type="text" class="form-control nuxPaySection01Input2" placeholder="<?php echo $translations["M01512"][$language]; /*  Your Email Address" */ ?>">
																</div>
																
															</div>

															<div class="nuxPaySection01Part03" >
																<button id="sendEmail" type="button" class="btn homepageRequestFundBtn"> <?php echo $translations["M01792"][$language]; /*  Receive */ ?>  </button>
																
															</div>
															<div class= "col-12 mt-2 form-group" style="display:flex; text-decoration: underline; margin-left: -10px;">
																<a style="background: transparent;" id="switchMobile" href="#"><?php echo $translations["M01496"][$language]; /*  Switch to mobile */ ?></a>
			                                            		
															</div>

														</div>
													
												</div>
											</div>



										</div>

										<div class="col-sm-12 col-md-12 col-lg-6" id="nuxPaySection01ImgDiv2">

											<div id="nuxPaySection01ImgDiv" class="col-12" >
												<img src="images/nuxPay/item1.gif" class="nuxPaySection01Img">
											</div>

										</div>

									</div>
									

								</div>
							</div>

						</div>
					</div>
				</section> -->

				<!-- swap coin cash out section -->
				<section class="nuxPayGraphSection" style="">
					
					<div class="kt-container">
						<div class="row justify-content-between">			
							
							<div class="col-xl-1 col-12 p-0">
								<div class="row">
									<ul class="list-group list-group-flush" id="iconListul" style="background-color:transparent">
										<a id="btnBTC" href=""> <li class="list-group-item customListIcon"> <img class="customListIconSelected p-1" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/bitcoin.png"></li> </a>
										<a id="btnETH" href=""> <li class="list-group-item customListIcon"> <img class="customListIcon p-1" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/ethereum.png"></li> </a>
										<a id="btnLTC" href=""> <li class="list-group-item customListIcon"> <img class="customListIcon p-1" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/litecoin.png"></li> </a>
										<a id="btnBCH" href=""> <li class="list-group-item customListIcon"> <img class="customListIcon p-1" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/bitcoincash.png"></li> </a>
									</ul>

								</div>
							</div>
						
							<div class="col-xl-11 col-12 graphCustomBG px-5 pb-5 pt-4 shadow bg-white rounded">																
																
								<div class="row justify-content-between pb-2">
									<!-- <div id="symbolRow" class="col-md-5 col-12">  -->
									<div id="symbolRow" class="col-auto mr-0 pl-sm-4 pl-0"> 
										<div class="row">
											<div class="col-auto mr-auto pl-0">
												<img id="symbol_image" class="customListIconSelected2 p-1" src="https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/bitcoin.png">
											</div>
											<div class="col align-self-center"> 
												<div class="row">
													 <span class="customBoldGraph" style="font-size:20px">  $ <span id="last_price"> 0.00  </span> </span>
												</div>
												<div class="row">
													<span id="symbol"> BTC </span>
												</div>
											</div>
										</div>
									</div>
																		
									<div class="col-md-7 col-12 align-self-center pl-4"> 
										<div class="row pl-md-0 pl-sm-5 pl-0"> 
											<div class="col mr-xl-5 mr-1" style="border-right: 1px solid grey">
												<div class="row"> <span class="customBoldGraph"><?php echo $translations["M01922"][$language]; /* 24H Change */ ?></span> </div>
												<div class="row" id="changerow"> <span id="change_percent"> 0.00 %</span> </div>
											</div>
											<div class="col mr-xl-5 ml-xl-0 ml-4" style="border-right: 1px solid grey">
												<div class="row"> <span class="customBoldGraph"><?php echo $translations["M01923"][$language]; /*  24H High */ ?></span> </div>
												<div class="row"> $ &nbsp <span id="high"> 0.00</span> </div>
											</div>
											<div class="col ml-xl-0 ml-4">
												<div class="row"> <span class="customBoldGraph"><?php echo $translations["M01924"][$language]; /*  24H Low */ ?></span> </div>
												<div class="row"> $ &nbsp <span id="low"> 0.00</span> </div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div id="chartdivETH" class="col-12" style="width: 100%; height: 500px; display:none">
										
									</div>
									<div id="chartdivBTC" class="col-12" style="width: 100%; height: 500px; ">
                                    
									</div>
									<div id="chartdivLTC" class="col-12" style="width: 100%; height: 500px; display:none">
										
									</div>
									<div id="chartdivBCH" class="col-12" style="width: 100%; height: 500px; display:none ">
                                    
									</div>
								</div>																
							</div>
							
						</div>

					</div>
				</section>
				<!-- END swap coin cash out section -->

						<!-- buy crypto section -->
				<section class="nuxPayBuyCryptoSection" style="background-color:#d6f5fc">
					
					<div class="kt-container">

						<div class="row align-items-center justify-content-center py-5">
							<div class="col-lg-6 col-md-6 col-12 pl-4" style="text-align: left;padding: 20px;">
								<div><h1><?php echo $translations["M01981"][$language]; /*  Buy with credit card */ ?></h1></div>
								<br>
								<div>
									<?php echo $translations["M01982"][$language]; /* >Buy Bitcoin and other cryptocurrencies using a wide range of
									payment options, including credit or debit card, and swap.
									Our trusted partners give you a secure and seamless crypto-buying
									experience. */ ?>
								</div>
								<br>
								<div>
									<?php $translation_message = $translations["M01983"][$language]; /*We will deposit your new crypto directly into your %%companyName%% wallet and you can start to enjoy different services on the %%companyName%% Platform. Buy & Sell Crypto now!*/
										$return_message = str_replace("%%companyName%%", $sys['companyName'], $translation_message);
										echo $return_message;
									
									?>
								</div>


							</div>
							<div class="col-xl-5 col-lg-5 col-md-5 px-4">
								<img src="images/nuxPay/phoneCc.png" width="100%">
							</div>
						</div>
						
					</div>
				</section>
				<!-- buy crypto section -->

				<section class="nuxPaySection05BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-11">

								<div class="row">

									<div class="col-12 nuxPaySection01Desc_2" style="margin-top: 100px;">
										<?php echo $translations["M01501"][$language]; /*  Global scale */ ?>
									</div>

									<div class="col-12 nuxPaySection01Title_2" style="margin-top: 30px;">
										<?php echo $translations["M01502"][$language]; /*  The backbone for every businesses */ ?>
									</div>

									<div class="col-12 nuxPaySection01Desc_3" style="margin-top: 5px;">
										<?php echo $translations["M01503"][$language]; /*  Offer your customer and start using NuxPay as a payment option! It helps your business to stand out against competitors with our service. */ ?>
									</div>


									<div class="col-12 " style="margin-top: 60px;">
										<div class="row justify-content-center">
											
											<div class="col-12" >
												<div class="row">

													<div class="col-sm-12 col-md-6 col-lg-3 nuxPaySection05Margin">
														<div class="row">
															
															<div class="col-12 nuxPaySection01Title_3">
																20M+
															</div>
															<div class="col-12 nuxPaySection01Desc_3">
																<?php echo $translations["M01504"][$language]; /*  Transactions completely processed */ ?>
															</div>
														</div>
													</div>

													<div class="col-sm-12 col-md-6 col-lg-3 nuxPaySection05Margin">
														<div class="row">
															
															<div class="col-12 nuxPaySection01Title_3">
																150+
															</div>
															<div class="col-12 nuxPaySection01Desc_3">
																<?php echo $translations["M01505"][$language]; /*  Countries availability from all around the world */ ?>
															</div>
														</div>
													</div>

													<div class="col-sm-12 col-md-6 col-lg-3 nuxPaySection05Margin">
														<div class="row">
															
															<div class="col-12 nuxPaySection01Title_3">
																20+
															</div>
															<div class="col-12 nuxPaySection01Desc_3">
																<?php echo $translations["M01506"][$language]; /*  Cryptocurrencies supported */ ?>
															</div>
														</div>
													</div>

													<div class="col-sm-12 col-md-6 col-lg-3 nuxPaySection05Margin">
														<div class="row">
															
															<div class="col-12 nuxPaySection01Title_3">
																80%
															</div>
															<div class="col-12 nuxPaySection01Desc_3">
																<?php echo $translations["M01507"][$language]; /*  Of users have bought from business using NuxPay */ ?>
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
				</section>





				<!-- <section id="homepageSection02" class="nuxPaySection02BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-11">
								<div class="row">
									<div class="col-12 nuxPaySection02Title">
										Latest Transaction by <span class="nuxPaySection02Title2">NuxPay</span>
									</div>
									<div class="col-12" style="margin-top: 50px;">

										<table class="table table-responsive nuxPaySection02TableBox">
											<tbody id="addHomeTable">
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> -->

				<!-- <section class="nuxPaySection03BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-10">
								<div class="row">

									<div class="col-lg-4 col-md-6 col-12 nuxPaySection03Totalspacing nuxPaySection03MobileSpace">
										<img src="images/nuxPay/nuxPaySection03Icon01.png" class="nuxPaySection03Icon">
										<div class="row">
											<div class="col-12 nuxPaySection03Text">
												Total
											</div>
											<div class="col-12 nuxPaySection03spacing">
												<span class="nuxPaySection03Number">20,000,000+ </span>
											</div>
											<div class="col-12 nuxPaySection03spacing3">
												<span class="nuxPaySection03Text">transactions</span>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-md-6 col-12 nuxPaySection03Totalspacing nuxPaySection03MobileSpace">
										<img src="images/nuxPay/nuxPaySection03Icon02.png" class="nuxPaySection03Icon2">
										<div class="row">
											<div class="col-12 nuxPaySection03Text">
												We’ve processed over
											</div>
											<div class="col-12 nuxPaySection03spacing">
												<span class="nuxPaySection03Number">$ 50 million</span>
											</div>
											<div class="col-12 nuxPaySection03spacing2">
												<span class="nuxPaySection03Text">yearly</span>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-md-6 col-12 nuxPaySection03Totalspacing nuxPaySection03IpadSpace nuxPaySection03MobileSpace">
										<img src="images/nuxPay/nuxPaySection03Icon03.png" class="nuxPaySection03Icon3">
										<div class="row">
											<div class="col-12 nuxPaySection03Text">
												Available in more than
											</div>
											<div class="col-12">
												<span class="nuxPaySection03Number">153</span>
											</div>
											<div class="col-12" style="margin-top: -5px;">
												<span class="nuxPaySection03Text">countries</span>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</section> -->

				<!-- <section class="nuxPaySection04BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-11">
								<div class="row justify-content-end">
									<div class="col-xl-5 col-lg-7 col-md-7">
										<div class="row">
											<div class="col-12 nuxPaySection04Title">
												How We Deliver?
											</div>
											<div class="col-12 nuxPaySection04Desc" style="margin-top: 40px;">
												<span class="nuxPaySection04TextColor">NuxPay</span> is expert in FinTech by providing professional service to help company to reach their potential markets around the world by using the perfect payment solution for their business.
											</div>
											<div class="col-12 nuxPaySection04Desc" style="margin-top: 20px">
												Excellent communication between <span class="nuxPaySection04TextColor">NuxPay</span> and clients are the key to our success. If you’re interested in high level of reliable payment solution, you have come to the right place. <span class="nuxPaySection04TextColor">NuxPay</span> is the right payment solution for you.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> -->
		
				<!-- <section class="nuxPaySection05BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-12">
								<div class="row">
									<div class="col-lg-6 col-md-8 col-12">
										<div class="row">
											<div class="col-12">
												<img src="/images/nuxPay/nuxPaySection05Title.png" class="nuxPaySection05Title">
											</div>
											<div class="col-12 nuxPaySection05Desc">
												Offer your customers and start using NuxPay as a payment option! It helps your business to stand out against competitors with our service.
											</div>

											<div class="col-12 nuxPaySection05Desc">
												<img src="/images/nuxPay/nuxPaySection05Tick.png" class="nuxPaySection05Tick">
												No Hidden Charges
											</div>

											<div class="col-12 nuxPaySection05Desc">
												<img src="/images/nuxPay/nuxPaySection05Tick.png" class="nuxPaySection05Tick">
												0.5% processing fees
											</div>

											<div class="col-12 nuxPaySection05Desc">
												<img src="/images/nuxPay/nuxPaySection05Tick.png" class="nuxPaySection05Tick">
												Real Time Transaction Balance & History
											</div>
										</div>
									</div>

									<div class="col-12 visible-lg" style="margin-top: 150px; padding: 0 30px;">


											<div class="nuxPaySection05Box1">
												<div class="col-12">
													<div class="row">
														<div class="nuxPaySection05BoxTextWidth">
															<div class="row">
																<div class="col-12 nuxPaySection05Title2">
																	World Wide
																</div>
																<div class="col-12 nuxPaySection05Desc2" style="margin-top: 15px;">
																	NuxPay allow your business to get access by worldwide customer base with no boundaries.
																</div>
															</div>
														</div>
														<div class="nuxPaySection05BoxTextWidth2">
															<img src="/images/nuxPay/nuxPaySection05Icon1.png" class="nuxPaySection05ImageSize">
														</div>
													</div>
												</div>
											</div>

											<div class="nuxPaySection05Box2">
												<div class="col-12">
													<div class="row">
														<div class="nuxPaySection05BoxTextWidth">
															<div class="row">
																<div class="col-12 nuxPaySection05Title2">
																	Easy Implemetation
																</div>
																<div class="col-12 nuxPaySection05Desc2" style="margin-top: 15px;">
																	Fast setup and get your business ready in matter of minutes by following few easy steps with our easy API Documentation.
																</div>
															</div>
														</div>
														<div class="nuxPaySection05BoxTextWidth2">
															<img src="/images/nuxPay/nuxPaySection05Icon2.png" class="nuxPaySection05ImageSize">
														</div>
													</div>
												</div>
											</div>

											<div class="nuxPaySection05Box3">
												<div class="col-12">
													<div class="row">
														<div class="nuxPaySection05BoxTextWidth">
															<div class="row">
																<div class="col-12 nuxPaySection05Title2">
																	Access Anytime, Anywhere
																</div>
																<div class="col-12 nuxPaySection05Desc2" style="margin-top: 15px;">
																	Mobile Accessible & get instant notification with NuxPay App no matter where you go and what time it is.
																</div>
															</div>
														</div>
														<div class="nuxPaySection05BoxTextWidth2">
															<img src="/images/nuxPay/nuxPaySection05Icon3.png" class="nuxPaySection05ImageSize">
														</div>
													</div>
												</div>
											</div>


											<div class="nuxPaySection05Box4">
												<div class="col-12">
													<div class="row">
														<div class="nuxPaySection05BoxTextWidth2">
															<img src="/images/nuxPay/nuxPaySection05Icon4.png" class="nuxPaySection05ImageSize">
														</div>
														<div class="nuxPaySection05BoxTextWidth">
															<div class="row">
																<div class="col-12 nuxPaySection05Title2">
																	FinTech Expert
																</div>
																<div class="col-12 nuxPaySection05Desc2" style="margin-top: 15px;">
																	With more than 10 years’ experience in FinTech, NuxPay Payment Solution is suitable for all business type.
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="nuxPaySection05Box5">
												<div class="col-12">
													<div class="row">
														<div class="nuxPaySection05BoxTextWidth2">
															<img src="/images/nuxPay/nuxPaySection05Icon5.png" class="nuxPaySection05ImageSize">
														</div>
														<div class="nuxPaySection05BoxTextWidth">
															<div class="row">
																<div class="col-12 nuxPaySection05Title2">
																	Accept All Business Type
																</div>
																<div class="col-12 nuxPaySection05Desc2" style="margin-top: 15px;">
																	There’s no restriction on what type of business it is, grab this opportunity and let others know more about your business.
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="nuxPaySection05Box6">
												<div class="col-12">
													<div class="row">
														<div class="nuxPaySection05BoxTextWidth2">
															<img src="/images/nuxPay/nuxPaySection05Icon6.png" class="nuxPaySection05ImageSize">
														</div>
														<div class="nuxPaySection05BoxTextWidth">
															<div class="row">
																<div class="col-12 nuxPaySection05Title2">
																	One Reconciliation
																</div>
																<div class="col-12 nuxPaySection05Desc2" style="margin-top: 15px;">
																	Receive one report for all your settlements, transactions and markets.
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="nuxPaySection05Title3 nuxPaySection05BoxCenter col-12">
												Why NuxPay?
											</div>

											<img class="section05Line1" src="images/nuxPay/section05Line1.png">
											<img class="section05Line2" src="images/nuxPay/section05Line2.png">
											<img class="section05Line3" src="images/nuxPay/section05Line3.png">

											<img class="section05Line4" src="images/nuxPay/section05Line1.png">
											<img class="section05Line5" src="images/nuxPay/section05Line2.png">
											<img class="section05Line6" src="images/nuxPay/section05Line3.png">




									</div>


									<div class="col-12 hidden-lg" style="margin-top: 100px;">
										<div class="row justify-content-center">
											<div class="col-12 nuxPaySection05Title3">
												Why NuxPay?
											</div>
											<div class="col-lg-9 col-md-10 col-12" style="margin-top: 50px;">
												<div class="row">

													<div class="col-md-6 col-12 nuxPaySection05Margin">
														<div class="row">
															<div class="col-12 text-center">
																<img src="/images/nuxPay/nuxPaySection05Icon1.png" class="nuxPaySection05IconSize">
															</div>
															<div class="col-12 nuxPaySection05Title2">
																World Wide
															</div>
															<div class="col-12 nuxPaySection05Desc2">
																NuxPay allow your business to get access by worldwide customer base with no boundaries.
															</div>
														</div>
													</div>

													<div class="col-md-6 col-12 nuxPaySection05Margin">
														<div class="row">
															<div class="col-12 text-center">
																<img src="/images/nuxPay/nuxPaySection05Icon2.png" class="nuxPaySection05IconSize">
															</div>
															<div class="col-12 nuxPaySection05Title2">
																Easy Implemetation
															</div>
															<div class="col-12 nuxPaySection05Desc2">
																Fast setup and get your business ready in matter of minutes by following few easy steps with our easy API Documentation.
															</div>
														</div>
													</div>

													<div class="col-md-6 col-12" style="margin-top: 20px;">
														<div class="row">
															<div class="col-12 text-center">
																<img src="/images/nuxPay/nuxPaySection05Icon3.png" class="nuxPaySection05IconSize">
															</div>
															<div class="col-12 nuxPaySection05Title2">
																Access Anytime, Anywhere
															</div>
															<div class="col-12 nuxPaySection05Desc2">
																Mobile Accessible & get instant notification with NuxPay App no matter where you go and what time it is.
															</div>
														</div>
													</div>

													<div class="col-md-6 col-12" style="margin-top: 20px">
														<div class="row">
															<div class="col-12 text-center">
																<img src="/images/nuxPay/nuxPaySection05Icon4.png" class="nuxPaySection05IconSize">
															</div>
															<div class="col-12 nuxPaySection05Title2">
																FinTech Expert
															</div>
															<div class="col-12 nuxPaySection05Desc2">
																With more than 10 years’ experience in FinTech, NuxPay Payment Solution is suitable for all business type.
															</div>
														</div>
													</div>

													<div class="col-md-6 col-12" style="margin-top: 20px;">
														<div class="row">
															<div class="col-12 text-center">
																<img src="/images/nuxPay/nuxPaySection05Icon5.png" class="nuxPaySection05IconSize">
															</div>
															<div class="col-12 nuxPaySection05Title2">
																Accept All Business Type
															</div>
															<div class="col-12 nuxPaySection05Desc2">
																There’s no restriction on what type of business it is, grab this opportunity and let others know more about your business.
															</div>
														</div>
													</div>

													<div class="col-md-6 col-12" style="margin-top: 20px;">
														<div class="row">
															<div class="col-12 text-center">
																<img src="/images/nuxPay/nuxPaySection05Icon6.png" class="nuxPaySection05IconSize">
															</div>
															<div class="col-12 nuxPaySection05Title2">
																One Reconciliation
															</div>
															<div class="col-12 nuxPaySection05Desc2">
																Receive one report for all your settlements, transactions and markets.
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
				</section> -->
		
				<!-- <section class="nuxPaySwapCoinSection" style="">
					
					<div class="kt-container">
						<div class="row">
							<div class="col-12">
								<div class="row align-items-center">
									<div class="col-lg-5 col-md-6 col-12 pl-4" style="text-align: left;padding-bottom: 20px;">
										<img src="images/nuxPay/swap-gif.gif" class="resellerSectionImg">
									</div>
									<div class="col-xl-7 col-lg-7 col-md-5 px-4">
										<div class="row">
											<div class="col-12 nuxPaySection04Title" style="text-align: left;">
											<?php echo $translations["M01935"][$language]; /*  Swap Coins with NuxPay */ ?>
											</div>
											<div class="col-lg-8 col-md-12 col-12 nuxPaySection04Desc" style="margin-top: 30px;text-align: left;">
											<?php echo $translations["M01936"][$language]; /*  Swap Coins instantly,ranging from the most popular cryptocurrency like Bitcoin(BTC),USDT,Ethereum(ETH) etc. */ ?><br><br>
											<?php echo $translations["M01937"][$language]; /*  You will get best exchange rate with NuxPay. */ ?>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</section> -->
				<!-- END swap coin cash out section -->
				<!-- swap coin cash out section -->
				<!-- <section class="nuxPayCashOutSection" style="">
					
					<div class="kt-container">
						<div class="row">
							<div class="col-12">
								<div class="row align-items-center">
									<div class="col-12" style="text-align: center;">
										<img src="images/nuxPay/cash.png" class="">
									</div>
									<div class="col-12 nuxPaySection04Title" style="color:white;text-align: center;margin-top: 20px;">
									<?php echo $translations["M01938"][$language]; /*  Want to cash out?*/ ?>	<br><br>
									</div>
									<div class="col-12" style="color:white;text-align: center;">
											
									<?php echo $translations["M01939"][$language]; /*  Turn your cryptocurrency into cash has never been easier with NuxPay.*/ ?><br>
									<?php echo $translations["M01940"][$language]; /*  Contact our customer support now!*/ ?>
									</div>
									<div class="col-12" style="color:white;text-align: center;margin-top: 20px;">
											
										<button type="button" class="btn primaryBtn" onclick="window.location.href='#nuxPaySection06BG'" style="width:200px;">
										<?php echo $translations["M00008"][$language]; /*  Contact Us*/ ?>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> -->
				<!-- END swap coin cash out section -->
				
				<!-- trade section -->
				<!-- <section class="nuxPayTradeSection" style="">
					
					<div class="kt-container">
						<div class="row">
							<div class="col-12">
								<div class="row align-items-center">
								
									<div class="col-12 nuxPaySection04Title" style="text-align: center;margin-top: 20px;">
										<?php $trade_at_nux = '%%Trade at Nux%%<span class="txtLightBlue" style="color: #53c2d4">%%Pay%%</span> %%Market%%';
											$trade_at_nux =  $translations["M01944"][$language] /* Trade at NuxPay Marketplace */;
										
											  $trade_at_nux1 = str_replace('Pay', '<span class="txtLightBlue">Pay</span>', $trade_at_nux);
											 
											  echo $trade_at_nux1; /* Trade at Nux Pay Market */
										//echo $tradeAtNux1 = str_replace("%%Trade at Nux%%", $translations["M01944"][$language] /*  Trade at Nux  */, '%%Trade at Nux%%<span class="txtLightBlue">Pay</span> Market'); 
										?>
										<br><br>
									</div>

									<div class="col-12" style="text-align: center;">
											
	

										<div class="container-fluid">
											<div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
												<div class="carousel-inner row w-10 mxauto mt-4" role="listbox" id="buySellCarousel">
													
												</div>

											
											</div>
										</div>


								
									</div>
									<div class="col-12" style="color:white;text-align: center;margin-top: 20px;">
											
											<?php if(isset($_SESSION['access_token'])) { ?>
												<button type="button" class="btn primaryBtn" onclick="window.location.href='buyOrder.php'" style="width:200px;"><?php echo $translations["M01942"][$language]; /*  Discover More Orders  */ ?></button>
											<?php } else { ?>
												<button type="button" class="btn primaryBtn" onclick="window.location.href='login.php'" style="width:200px;"><?php echo $translations["M01942"][$language]; /*  Discover More Orders  */ ?></button>
											<?php } ?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> -->
				<!-- END trade section -->

				<section class="nuxPayResellerSection" style="">
					
					<div class="kt-container">
						<div class="row">
							<div class="col-12">
								<div class="row align-items-center">
									<div class="col-lg-5 col-md-6 col-12 pl-4">
										<img src="images/nuxPay/resellerSectionImg.png" class="resellerSectionImg">
									</div>
									<div class="col-xl-7 col-lg-7 col-md-5 px-4">
										<div class="row">
											<div class="col-12 nuxPaySection04Title">
												<?php echo $translations["M01508"][$language]; /* Earn passive income as our reseller */ ?>
											</div>
											<div class="col-lg-8 col-md-12 col-12 nuxPaySection04Desc" style="margin-top: 30px;">
												<?php echo $translations["M01509"][$language]; /* Introduce merchant or businesses to NuxPay and enjoy lifetime rewards! Earn passive income no matter what solution a new merchant prefers. */ ?>
												
											</div>
											<div class="col-12" style="margin-top: 30px">
												<button type="button" class="btn resellerBtn" onclick="window.location.href='resellerSignup.php'">
													<?php echo $translations["M01510"][$language]; /* Become a Reseller */ ?>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section id="nuxPaySection06BG"></section>
				<section class="nuxPaySection06BG">
					<div class="kt-container">
						<div class="row justify-content-center">
							<div class="col-11">
								<div class="row justify-content-center">
									<div class="col-12 nuxPaySection06Title">
										<?php echo $translations["M01519"][$language]; /* Please contact us for any inquiries */ ?>
									</div>
									<div class="col-12 nuxPaySection06Title">
										<?php echo $translations["M01520"][$language]; /*We’re happy to hear from you. */ ?>
									</div>
									<div class="col-12 nuxPaySection06ImagePosition">
										<img src="/images/nuxPay/nuxPaySection06Image.png" class="nuxPaySection06Image">
									</div>

									<div id="goToContactUsSec"></div>
									<div class="col-xl-8 col-lg-10 col-12" style="margin-top: 50px;">
										<div class="row">
											<div class="col-md-6 col-12 form-group">
												<input placeholder="<?php echo $translations["M01511"][$language]; /* Your Name */ ?>*" type="text" class="form-control contactInput" id="name" name="Name" autocomplete="off">
											</div>
											<div class="col-md-6 col-12 form-group">
												<input placeholder="<?php echo $translations["M01512"][$language]; /* Your Email Address */ ?>*" type="text" class="form-control contactInput" id="email" name="Email" autocomplete="off">
											</div>
										</div>
									</div>

									<div class="col-xl-8 col-lg-10 col-12 nuxPaySection06Margin">
										<div class="row">
											<!--<div class="col-md-6 col-12 form-group">
												<select id="country" class="form-control homepageContactUsFormInput">
													<?php include 'countryList.php'; ?>
												</select>
											</div>-->
											<div class="col-md-6 col-12 form-group ">
												<input placeholder="<?php echo $translations["M01513"][$language]; /* Your Mobile Number */ ?>" type="text" class="form-control contactInput" id="mobileNo" name="Email" autocomplete="off">
											</div>
										</div>
									</div>

									<div class="col-xl-8 col-lg-10 col-12 nuxPaySection06Margin">
										<div class="row">
											<div class="col-12 form-group">
												<textarea placeholder="<?php echo $translations["M01514"][$language]; /* Message */ ?>*" id="message" class="contactInput form-control" rows="5" name="<?php echo $translations["M01514"][$language]; /* Message */ ?>"></textarea>
											</div>
										</div>
									</div>

									<div class="col-xl-8 col-lg-10 col-12 text-center" style="margin-top: 10px;">
										<button type="button" id="sendContactUs" class="homeSubmitBtn d-inline-block"><?php echo $translations["M01515"][$language]; /* Send Message */ ?></button>
									</div>

								</div>
							</div>
						</div>
					</div>
				</section>

			</div>
		</div>
	</div>
</div>
</div>
</div>
</body>

</html>
<?php include 'footerHomepage.php'; ?>
<?php include 'sharejsHomepage.php'; ?>

    <!-- Resources -->
    <script src="https://cdn.socket.io/socket.io-3.0.1.min.js"></script>
	<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<script>
	AOS.init({
		once: true
	});
</script>

<script>

	window.ajaxEnabled = true;

	var url             = 'scripts/reqHomepage.php';
	var method          = 'POST';
	var debug           = 0;
	var bypassBlocking  = 0;
	var bypassLoading   = 1;
	var pageNumber      = 1;
	var formData        = "";
	var fCallback       = "";
	var countryCode 	= "<?php echo $countryCode; ?>";
	var checkUser;
	var defaultCountryCode = "";
	var senderType = 'mobile';
	var socket = io.connect('<?php echo $sys['socketURL'];?>');  
	var common_symbol	= "";
	var event_name		= "";
	var ethGraphData = [];
	var btcGraphData = [];
	var maxLength = 17;
	var original = 17;

	socket.on('connection', function(socket) {    		
	});

	socket.on('btcusdt@ticker', function(data) {            
		graphData = data.message;     						

		if(btcGraphData.length>maxLength){
			btcGraphData.pop();
		} else {                			
		}
		btcGraphData.push({
			date: new Date(graphData.time) ,
			value: parseFloat(graphData.last_price) 
		})		
	});  

	socket.on('ethusdt@ticker', function(data) {            
		graphData = data.message;     						

		if(ethGraphData.length>maxLength){
			ethGraphData.pop();
		} else {                			
		}
		ethGraphData.push({
			date: new Date(graphData.time) ,
			value: parseFloat(graphData.last_price) 
		})		
	});  


	if (!countryCode) {
		countryCode = "US";
	}

	$('#navLargeLogo').attr("src", "<?php echo $sys['loginLogo']; ?>");
    $('#navSmallLogo').attr("src", "<?php echo $sys['loginLogo']; ?>");

	$(document).ready(function() {
		
		// formData  = {
  //           command     : 'nuxpaybuyselllistingget', 
  //           type        : 'all',
  //           page        : pageNumber
  //       };

  //       fCallback = loadAdvertisementListing;
  //       ajaxSend('scripts/reqAdvertisement.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
		// build graph
		buildGraphBTC();
		buildGraphETH();
		buildGraphLTC();
		buildGraphBCH();
		
		socket.off('ethusdt@kline_1d');
		socket.off('btcusdt@kline_1d');
		socket.on('btcusdt@kline_1d', function(data) {            
			graphData = data.message;     											
			var change = (graphData.close - graphData.open) / graphData.close * 100;
			$('#last_price').text( thousands_separators(parseFloat(graphData.close).toFixed(2)) )   
			$('#change_percent').text(thousands_separators(change.toFixed(2))+"%")   
			$('#high').text( thousands_separators(parseFloat(graphData.high).toFixed(2)) )   
			$('#low').text( thousands_separators(parseFloat(graphData.low).toFixed(2)) )   			
			var color;
				if(change > 0) {
					color = 'green'
				} else if (change < 0){
					color = 'red'
				} else {
					color = 'black'
				}

				$('#changerow').css("color", color);     
		});
		
		utmTracking('','','','Homepage');

		formData = {
			command : 'homepageTable'
		};
		fCallback = loadDefaultListing;
		ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

		$('#emailOption').hide();
        $('#switchMobile').hide();
		$('#sendEmail').hide();
		$('#emailInput').hide();
		$('#emailSection').hide();

		$('#receiveButton').click(function() {			
			var $this = $(this);
			var $other = $('#sendButton')
			if ($this.hasClass('customButtonOffClick')) {
				$this.removeClass('customButtonOffClick');
				$this.addClass('customButtonOnClick');
				
				$other.removeClass('customButtonOnClick');
				$other.addClass('customButtonOffClick');
			} 

			// $('#sendPhoneNumber').text('Request');
			// $('#sendEmail').text('Request');
			$('#sendPhoneNumber').text('Receive');
			$('#sendEmail').text('Receive');
		});

		$('#sendButton').click(function() {			
			var $this = $(this);
			var $other = $('#receiveButton')
			if ($this.hasClass('customButtonOffClick')) {
				$this.removeClass('customButtonOffClick');
				$this.addClass('customButtonOnClick');
				
				$other.removeClass('customButtonOnClick');
				$other.addClass('customButtonOffClick');
			} 
			$('#sendPhoneNumber').text('Send');
			$('#sendEmail').text('Send');
		});
		
		// $('#buyBtn').click(function() {			
		// 	var $this = $(this);
		// 	var $other = $('#sellBtn')
		// 	if ($this.hasClass('customButtonOffClick1')) {
		// 		$this.removeClass('customButtonOffClick1');
		// 		$this.addClass('customButtonOnClick1');
				
		// 		$other.removeClass('customButtonOnClick1');
		// 		$other.addClass('customButtonOffClick1');
		// 	} 
			
		// 	formData  = {
		// 		command     : 'nuxpayadvestimentlistingget',
		// 		type        : 'all',
		// 		page        : pageNumber
		// 	};

		// 	fCallback = loadAdvertisementListing;
		// 	ajaxSend('scripts/reqAdvertisement.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
		// });

		// $('#sellBtn').click(function() {			
		// 	var $this = $(this);
		// 	var $other = $('#buyBtn')
		// 	if ($this.hasClass('customButtonOffClick1')) {
		// 		$this.removeClass('customButtonOffClick1');
		// 		$this.addClass('customButtonOnClick1');
				
		// 		$other.removeClass('customButtonOnClick1');
		// 		$other.addClass('customButtonOffClick1');
		// 	} 
			
			
		// 	formData  = {
		// 		command     : 'nuxpayadvestimentlistingget',
		// 		type        : 'all',
		// 		page        : pageNumber
		// 	};

		// 	fCallback = loadAdvertisementListing;
		// 	ajaxSend('scripts/reqAdvertisement.php', formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
		
	
		// });		

		$('#btnBCH').click(function (event) {
			event.preventDefault();

			$('#symbol').text("BCH");
			$('#symbol_image').attr("src", "https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/bitcoincash.png");

			$('.customListIconSelected').removeClass("customListIconSelected")
			$('#btnBCH li img').addClass("customListIconSelected");
			

			socket.off('ltcusdt@kline_1d');
			socket.off('bchusdt@kline_1d');
			socket.off('ethusdt@kline_1d');
			socket.off('btcusdt@kline_1d');
			socket.on('bchusdt@kline_1d', function(data) {            
				graphData = data.message;     												
				var change = (graphData.close - graphData.open) / graphData.close * 100;
				$('#last_price').text( thousands_separators(parseFloat(graphData.close).toFixed(2)) )   
            	$('#change_percent').text(thousands_separators(change.toFixed(2))+"%")   
				$('#high').text( thousands_separators(parseFloat(graphData.high).toFixed(2)) )   
				$('#low').text( thousands_separators(parseFloat(graphData.low).toFixed(2)) )   			

				var color;
				if(change > 0) {
					color = 'green'
				} else if (change < 0){
					color = 'red'
				} else {
					color = 'black'
				}

				$('#changerow').css("color", color);     
			});         
			
			$('#chartdivETH').hide();
			$('#chartdivBTC').hide();
			$('#chartdivLTC').hide();
			$('#chartdivBCH').show();
		})

		$('#btnLTC').click(function (event) {
			event.preventDefault();

			$('#symbol').text("LTC");
			$('#symbol_image').attr("src", "https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/litecoin.png");

			$('.customListIconSelected').removeClass("customListIconSelected")
			$('#btnLTC li img').addClass("customListIconSelected");
			

			socket.off('ltcusdt@kline_1d');
			socket.off('bchusdt@kline_1d');
			socket.off('ethusdt@kline_1d');
			socket.off('btcusdt@kline_1d');
			socket.on('ltcusdt@kline_1d', function(data) {            
				graphData = data.message;     												
				var change = (graphData.close - graphData.open) / graphData.close * 100;
				$('#last_price').text( thousands_separators(parseFloat(graphData.close).toFixed(2)) )   
            	$('#change_percent').text(thousands_separators(change.toFixed(2))+"%")   
				$('#high').text( thousands_separators(parseFloat(graphData.high).toFixed(2)) )   
				$('#low').text( thousands_separators(parseFloat(graphData.low).toFixed(2)) )   			

				var color;
				if(change > 0) {
					color = 'green'
				} else if (change < 0){
					color = 'red'
				} else {
					color = 'black'
				}

				$('#changerow').css("color", color);     
			});         
			
			$('#chartdivETH').hide();
			$('#chartdivBTC').hide();
			$('#chartdivLTC').show();
			$('#chartdivBCH').hide();

		})
		
		$('#btnETH').click(function (event) {
			
			$('#symbol').text("ETH");
			$('#symbol_image').attr("src", "https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/ethereum.png");
			
			$('.customListIconSelected').removeClass("customListIconSelected")
			$('#btnETH li img').addClass("customListIconSelected");

			socket.off('ltcusdt@kline_1d');
			socket.off('bchusdt@kline_1d');
			socket.off('ethusdt@kline_1d');
			socket.off('btcusdt@kline_1d');
			socket.on('ethusdt@kline_1d', function(data) {            
				graphData = data.message;     												
				var change = (graphData.close - graphData.open) / graphData.close * 100;
				$('#last_price').text( thousands_separators(parseFloat(graphData.close).toFixed(2)) )   
            	$('#change_percent').text(thousands_separators(change.toFixed(2))+"%")   
				$('#high').text( thousands_separators(parseFloat(graphData.high).toFixed(2)) )   
				$('#low').text( thousands_separators(parseFloat(graphData.low).toFixed(2)) )   			

				var color;
				if(change > 0) {
					color = 'green'
				} else if (change < 0){
					color = 'red'
				} else {
					color = 'black'
				}

				$('#changerow').css("color", color);     
			});         

			event.preventDefault();
			$('#chartdivETH').show();
			$('#chartdivBTC').hide();
			$('#chartdivLTC').hide();
			$('#chartdivBCH').hide();
			// $('.customBtnLiveActive2').removeClass('customBtnLiveActive2');
			// $('#btnETH').addClass('customBtnLiveActive2');
		
		})

		$('#btnBTC').click(function (event) {
			$('#symbol').text("BTC");
			$('#symbol_image').attr("src", "https://s3-ap-southeast-1.amazonaws.com/com.thenux.image/assets/xchange/currency/cryptocurrency/bitcoin.png");

			$('.customListIconSelected').removeClass("customListIconSelected")
			$('#btnBTC li img').addClass("customListIconSelected");

			socket.off('ltcusdt@kline_1d');
			socket.off('bchusdt@kline_1d');
			socket.off('ethusdt@kline_1d');
			socket.off('btcusdt@kline_1d');
			socket.on('btcusdt@kline_1d', function(data) {            
				graphData = data.message;     												
				var change = (graphData.close - graphData.open) / graphData.close * 100;
				$('#last_price').text( thousands_separators(parseFloat(graphData.close).toFixed(2)) )   
            	$('#change_percent').text(thousands_separators(change.toFixed(2))+"%")   
				$('#high').text( thousands_separators(parseFloat(graphData.high).toFixed(2)) )   
				$('#low').text( thousands_separators(parseFloat(graphData.low).toFixed(2)) )   			
				
				var color;
				if(change > 0) {
					color = 'green'
				} else if (change < 0){
					color = 'red'
				} else {
					color = 'black'
				}

				$('#changerow').css("color", color);     
			});       

			event.preventDefault();
			$('#chartdivBTC').show();
			$('#chartdivETH').hide();
			$('#chartdivLTC').hide();
			$('#chartdivBCH').hide();
			// $('.customBtnLiveActive2').removeClass('customBtnLiveActive2');
			// $('#btnBTC').addClass('customBtnLiveActive2');
		
		})

		function thousands_separators(num)
		{
			var num_parts = num.toString().split(".");
			num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return num_parts.join(".");
		}

        $('#switchEmail').click(function () {
			$('#phoneOption').hide();			
			$('#phoneNumber').hide();
            // $('#country_code').hide();
            $('#switchEmail').hide();
			$('#sendPhoneNumber').hide();
			$('#sendEmail').show();
            $('#switchMobile').show();
            $('#emailOption').show();
			$('#emailInput').show();
			$('#emailSection').show();
            $('#mobileSection').hide();
			senderType = 'email';
		});

		$('#switchMobile').click(function () {
			$('#phoneOption').show();			
			$('#phoneNumber').show();
            // $('#country_code').show();
            $('#switchEmail').show();
			$('#sendPhoneNumber').show();
			$('#sendEmail').hide();
            $('#switchMobile').hide();
			$('#emailOption').hide();
            $('#emailInput').hide();
            $('#emailSection').hide();
            $('#mobileSection').show();
			senderType = 'mobile';
		});

		$('#phoneNumber').on('input', function (event) {
			this.value = this.value.replace(/[^0-9]/g, '');
		});

		$('#phoneNumber').on('keypress',function(e) {
		    if(e.which == 13) {
		        $('#sendPhoneNumber').click();
		    }
		});

		$('#emailInput').on('keypress',function(e) {
		    if(e.which == 13) {
		        $('#sendEmail').click();
		    }
		});
		

		$('#sendPhoneNumber').click(function(){
			var phoneNumber = sanitize($('#phoneNumber').val());
			// var countryNumber = $('#countryCode').val();

			if($('#receiveButton').hasClass('customButtonOnClick')) {
				// payee_mobile = countryNumber+phoneNumber;
				payee_mobile = "+"+phoneNumber;

				var url     =   'scripts/reqHomepage.php';

				var formData        = {
					command: 'requestfundcheckuserexist',
					payee_mobile: payee_mobile,
					
				};

				var method  =   'POST';
				var debug   =   0;
				var bypassBlocking  = 0;
				var bypassLoading   = 0;

				$.ajax({
						type: method, // define the type of HTTP verb we want to use (POST for our form)
						url: url, // the url where we want to POST
						data: formData, // our data object
						dataType: 'text', // what type of data do we expect back from the server
						encode: true,
						})
						.done(function(data) {

							var obj = JSON.parse(data);
							var detCountryCode = obj.mobileData.countryCode;
							var detMobileNumber = obj.mobileData.mobileNumber;
							var detMobileValid = obj.mobileData.validMobile;

							if(detMobileValid) {

								checkUser = obj.code;

								if (obj.code == 1){
									
									var phoneNumber = sanitize($('#phoneNumber').val());
									// var countryNumber = $('#countryCode').val();
									// utmTracking('',countryNumber+phoneNumber,'','Home Get Started button');
									utmTracking('',"+"+phoneNumber,'','Home Get Started button');
									
									$.redirect("receiveFund.php", {
										countryNumber : detCountryCode,
										phoneNumber : detMobileNumber,
										code : checkUser

									});
								}else {
									var nickname = obj.data.nickname;
									var phoneNumber = sanitize($('#phoneNumber').val());
									// var countryNumber = $('#countryCode').val();
									// utmTracking('',countryNumber+phoneNumber,'','Home Get Started button');
									utmTracking('',"+"+phoneNumber,'','Home Get Started button');
									
									// $.redirect("requestFund.php", {
									$.redirect("receiveFund.php", {
										countryNumber : detCountryCode,
										phoneNumber : phoneNumber,
										payeeNickname: nickname
									});
								}

							} else {
								// var message = "Invalid mobile number.";
								// errorOutput(message);

								var phoneNumber = sanitize($('#phoneNumber').val());
								utmTracking('',"+"+phoneNumber,'','Home Get Started button');

								// $.redirect("requestFund.php", {
								$.redirect("receiveFund.php", {
									countryNumber : '',
									phoneNumber : phoneNumber,
									payeeNickname: '',
									code: 1
								});
							}
							
						})
			}

			if($('#sendButton').hasClass('customButtonOnClick')) {								
				$.redirect('sendFund.php', {'phoneNumber': phoneNumber, 'sender_type': senderType });
			}		
			
			$('#carouselExample').on('slide.bs.carousel', function (e) {

				var $e = $(e.relatedTarget);

				var idx = $e.index();
				console.log("IDX :  " + idx);

				var itemsPerSlide = 8;
				var totalItems = $('.carousel-item').length;

				if (idx >= totalItems-(itemsPerSlide-1)) {
					var it = itemsPerSlide - (totalItems - idx);
					for (var i=0; i<it; i++) {
						// append slides to end
						if (e.direction=="left") {
							$('.carousel-item').eq(i).appendTo('.carousel-inner');
						}
						else {
							$('.carousel-item').eq(0).appendTo('.carousel-inner');
						}
					}
				}
			});

		});

		$('#sendEmail').click(function(){
			var payeeEmail = sanitize($('#emailInput').val());
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			
			if(!emailReg.test(payeeEmail)) {

				if($('#receiveButton').hasClass('customButtonOnClick')) {

					utmTracking('',payeeEmail,'','Home Get Started button');	
	
					$.redirect("receiveFund.php", {
						payeeEmail : payeeEmail,
						payeeNickname: '',
						code: 1
					});
				} else {
					$.redirect("sendFund.php", {'payeeEmail':payeeEmail, 'sender_type': senderType});
				}

				// var message = "Please enter a valid email.";
				// errorOutput(message);
				// return false;
			}else if(payeeEmail=='') {

				if($('#receiveButton').hasClass('customButtonOnClick')) {
					utmTracking('',payeeEmail,'','Home Get Started button');	
	
					$.redirect("receiveFund.php", {
						payeeEmail : payeeEmail,
						payeeNickname: '',
						code: 1
					}); 
				} else {
					$.redirect("sendFund.php", {});
				}


				// var message = "Email address cannot be empty.";
				// errorOutput(message);
				// return false;
			} else {
				

				if($('#receiveButton').hasClass('customButtonOnClick')) {
					var url     =   'scripts/reqHomepage.php';
					
					var formData        = {
						command: 'requestfundcheckuserexist',
						payee_email: payeeEmail,
						
					};
	
					var method  =   'POST';
					var debug   =   0;
					var bypassBlocking  = 0;
					var bypassLoading   = 0;
	
					$.ajax({
							type: method, // define the type of HTTP verb we want to use (POST for our form)
							url: url, // the url where we want to POST
							data: formData, // our data object
							dataType: 'text', // what type of data do we expect back from the server
							encode: true,
							})
							.done(function(data) {
	
								var obj = JSON.parse(data);
								
								checkUser = obj.code;
	
								if (obj.code == 1){
									// var phoneNumber = $('#phoneNumber').val();
									// var countryNumber = $('#countryCode').val();
									utmTracking('',payeeEmail,'','Home Get Started button');
	
									$.redirect("receiveFund.php", {
										payeeEmail : payeeEmail,
										code : checkUser,
									});
	
								}else {
									var nickname = obj.data.nickname;
									var phoneNumber = sanitize($('#phoneNumber').val());
									// var countryNumber = $('#countryCode').val();
									utmTracking('',payeeEmail,'','Home Get Started button');	
	
									$.redirect("receiveFund.php", {
										payeeEmail : payeeEmail,
										payeeNickname: nickname
									});
	
								}
							})
				} else {
					$.redirect('sendFund.php', {'payeeEmail': payeeEmail, 'sender_type': senderType});					
				}

			}
			

	
				
						
		// var payeeEmail = $('#emailInput').val();
		// var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		// if(!emailReg.test(payeeEmail)) {
		// 	var message = "Please enter a valid email.";
		// 	errorOutput(message);
		// 	return false;
		// }else {

		// 	utmTracking('',payeeEmail,'','Home Get Started button');
		// 	$.redirect("requestFund.php", {
		// 		payeeEmail : payeeEmail
		// 	});
		// }
		});
		
		function errorOutput(message){
			showMessage(message, 'warning', '', 'warning', '');
		}
		
		function format(val) {
			return val.id;
		}

		$('#countryCode').select2({
			dropdownAutoWidth : true,
			templateSelection: format
		});

		$('#countryCode').find('option').each(function(){
            if (countryCode && countryCode != "ZZ") {
                if ($(this).attr("data-countrycode") == countryCode) {
                	$(this).parent().val(this.value).trigger('change');
                }
            }else{
                if ($(this).attr("data-countrycode") == "US") {
                	$(this).parent().val(this.value).trigger('change');
                }
            }
        });

		defaultCountryCode = $('#countryCode').val();
		$('.phoneNumberPrefix').text(defaultCountryCode);


		$('#phoneNumber').on('focus', function(e) {

			var tmpPhoneNumber = sanitize($('#phoneNumber').val());
			
			if(tmpPhoneNumber=="") {
				$('#phoneNumber').val(defaultCountryCode.substring(1));
			}

			$('#phoneNumber').attr("placeholder", "");
			$('.phoneNumberPrefix').text('+');

			$('#phoneNumber').caretToEnd();
		});

		$('#phoneNumber').on('blur', function(e) {

			var tmpPhoneNumber = sanitize($('#phoneNumber').val());

			if(tmpPhoneNumber=="" || "+"+tmpPhoneNumber==defaultCountryCode) {
				$('#phoneNumber').val('');
				$('.phoneNumberPrefix').text(defaultCountryCode);
			}
			
			$('#phoneNumber').attr("placeholder", "         <?php echo $translations["M01513"][$language]; /*  Your Mobile Number  */ ?>");
		});



		tracking();

		$('.headerLink').click(function(){
			utmTracking('','','','Home headerLink ('+$(this).attr('data-name')+')');
		});

		$('.footerLink').click(function(){
			utmTracking('','','','Home footerLink ('+$(this).attr('data-name')+')');
		});

		$('#sendContactUs').click(function(){

			$('.error-danger').remove();

			if( $('input#name').val() == ''){
				$('input#name').after('<span class="error-danger"><?php echo $translations["M01258"][$language]; /* Please enter your name. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#name").offset().top-120
				}, 500);
				$('input#name').focus();
			}else if( $('input#email').val() == ''){
				$('input#email').after('<span class="error-danger"><?php echo $translations["M01259"][$language]; /* Please enter your email. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#email").offset().top-120
				}, 500);
				$('input#email').focus();
			}else if(!validateEmail($("#email").val())){
				$('input#email').after('<span class="error-danger"><?php echo $translations["M01260"][$language]; /* Your email address is invalid. Please enter a valid email address. */ ?></span>');
				$('input#email').focus();
			}else if( $('input#subject').val() == ''){
				$('input#subject').after('<span class="error-danger"><?php echo $translations["M01264"][$language]; /* Please enter your subject. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#subject").offset().top-120
				}, 500);
				$('input#subject').focus();
			}else if(!$('textarea#message').val()){
				$('textarea#message').after('<span class="error-danger"><?php echo $translations["M01265"][$language]; /* Please enter your message. */ ?></span>');
				$('html, body').animate({
					scrollTop: $("#message").offset().top-120
				}, 500);
				$('textarea#message').focus();
			}else{

				var name = sanitize($("#name").val());
				var email = sanitize($("#email").val());
				var country = "MY";//$("#country").val();
				var mobileNo = sanitize($("#mobileNo").val());
				var companyName = "";//$("#companyName").val();
				var subject = sanitize($("#subject").val());
				var message = sanitize($("#message").val());
				var keyword = window.location.search;

				formData        = {
					command : 'contactUs',
					name : name,
					email : email,
					country : country,
					mobileNo : mobileNo,
					companyName : companyName,
					subject : 'Nuxpay Homepage Contact Us',
					message : message,
					keyword : keyword
				};
console.log(formData);
				fCallback = sendContactSuccess;
console.log(url);
				ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

			}

		});

		// $('html,body').animate({
		// 	scrollTop: $(window.location.hash).offset().top + 300
		// }, 800);
        if (typeof(window.location.hash) !== 'undefined' && window.location.hash.length > 0) {
            $('html,body').animate({
                scrollTop: $(window.location.hash).offset().top + 300
            }, 800);
        }

	});
	

	function buildGraphETH() {
        interval = "1m"		        
        
        // socket.emit('request', {table: 'graph_data_'+interval, common_symbol: common_symbol.toLowerCase()});

        am4core.ready(function() {			
			// Themes begin
			am4core.useTheme(am4themes_animated);
			// Themes end

			var chart = am4core.create("chartdivETH", am4charts.XYChart);
			chart.hiddenState.properties.opacity = 0;

			chart.padding(0, 0, 0, 0);

			chart.zoomOutButton.disabled = true;
			     			
			chart.data = []; 

			var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			dateAxis.renderer.grid.template.location = 0;
			dateAxis.renderer.minGridDistance = 30;
			dateAxis.dateFormats.setKey("second", "hh:mm:ss");
			dateAxis.periodChangeDateFormats.setKey("second", "[bold]h:mm a");
			dateAxis.periodChangeDateFormats.setKey("minute", "[bold]h:mm a");
			dateAxis.periodChangeDateFormats.setKey("hour", "[bold]h:mm a");
			dateAxis.renderer.inside = true;
			dateAxis.renderer.axisFills.template.disabled = true;
			dateAxis.renderer.ticks.template.disabled = true;
			dateAxis.gridIntervals.setAll([
				{ timeUnit: "second", count: 1 },				
				]);

			var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			valueAxis.tooltip.disabled = true;
			valueAxis.interpolationDuration = 500;
			valueAxis.rangeChangeDuration = 500;
			valueAxis.renderer.inside = true;
			valueAxis.renderer.minLabelPosition = 0.05;
			valueAxis.renderer.maxLabelPosition = 0.95;
			valueAxis.renderer.axisFills.template.disabled = true;
			valueAxis.renderer.ticks.template.disabled = true;

			var series = chart.series.push(new am4charts.LineSeries());
			series.dataFields.dateX = "date";
			series.dataFields.valueY = "value";
			series.interpolationDuration = 1000;
			series.defaultState.transitionDuration = 0;
			series.tensionX = 0.8;        

			chart.events.on("datavalidated", function () {
				dateAxis.zoom({ start: 1 / 15, end: 1.2 }, false, true);
			});

			dateAxis.interpolationDuration = 500;
			dateAxis.rangeChangeDuration = 500;    
			
			socket.on('ethusdt@ticker', function(data) {            
				graphData = data.message;   
				  								
				maxLength = original;				
				if($(window).width() <= 1220 && $(window).width() > 1000){
					maxLength = 15;
				} else if($(window).width() <= 1000  && $(window).width() > 690){
					maxLength = 13;
				} else if ($(window).width() <= 690 && $(window).width() > 490) {
					maxLength = 8;
				} else if ($(window).width() <= 490) {
					maxLength = 5;
				}
				
				graphData = data.message;     								

				if(chart.data.length>maxLength){
					var numberToDelete = chart.data.length - maxLength;
					chart.addData(
						{ date: new Date(graphData.time) , value: parseFloat(graphData.last_price) },
						numberToDelete
					);
				} else {                
					chart.addData(
						{ date: new Date(graphData.time) , value: parseFloat(graphData.last_price) }
					);
				}
								
			});         

			// all the below is optional, makes some fancy effects
			// gradient fill of the series
			series.fillOpacity = 1;
			var gradient = new am4core.LinearGradient();
			gradient.addColor(chart.colors.getIndex(0), 0.2);
			gradient.addColor(chart.colors.getIndex(0), 0);
			series.fill = gradient;

			// this makes date axis labels to fade out
			dateAxis.renderer.labels.template.adapter.add("fillOpacity", function (fillOpacity, target) {
				var dataItem = target.dataItem;
				return dataItem.position;
			})

			// need to set this, otherwise fillOpacity is not changed and not set
			dateAxis.events.on("validated", function () {
				am4core.iter.each(dateAxis.renderer.labels.iterator(), function (label) {
					label.fillOpacity = label.fillOpacity;
				})
			})

			// this makes date axis labels which are at equal minutes to be rotated
			dateAxis.renderer.labels.template.adapter.add("rotation", function (rotation, target) {
				var dataItem = target.dataItem;
				if (dataItem.date && dataItem.date.getTime() == am4core.time.round(new Date(dataItem.date.getTime()), "minute").getTime()) {
					target.verticalCenter = "middle";
					target.horizontalCenter = "left";
					return -90;
				}
				else {
					target.verticalCenter = "bottom";
					target.horizontalCenter = "middle";
					return 0;
				}
			})

			// bullet at the front of the line
			var bullet = series.createChild(am4charts.CircleBullet);
			bullet.circle.radius = 5;
			bullet.fillOpacity = 1;
			bullet.fill = chart.colors.getIndex(0);
			bullet.isMeasured = false;

            series.events.on("validated", function(){  
                if(series.dataItems.last != undefined){
                    bullet.moveTo(series.dataItems.last.point);
                    bullet.validatePosition();
                }
            }); 		

        }); // end am4core.ready()
	}
	
	function buildGraphBCH() {
        interval = "1m"		        
        
        // socket.emit('request', {table: 'graph_data_'+interval, common_symbol: common_symbol.toLowerCase()});

        am4core.ready(function() {			
			// Themes begin
			am4core.useTheme(am4themes_animated);
			// Themes end

			var chart = am4core.create("chartdivBCH", am4charts.XYChart);

			chart.hiddenState.properties.opacity = 0;

			chart.padding(0, 0, 0, 0);

			chart.zoomOutButton.disabled = true;
			     			
			chart.data = []; 

			var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			dateAxis.renderer.grid.template.location = 0;
			dateAxis.renderer.minGridDistance = 30;
			dateAxis.dateFormats.setKey("second", "hh:mm:ss");
			dateAxis.periodChangeDateFormats.setKey("second", "[bold]h:mm a");
			dateAxis.periodChangeDateFormats.setKey("minute", "[bold]h:mm a");
			dateAxis.periodChangeDateFormats.setKey("hour", "[bold]h:mm a");
			dateAxis.renderer.inside = true;
			dateAxis.renderer.axisFills.template.disabled = true;
			dateAxis.renderer.ticks.template.disabled = true;
			dateAxis.gridIntervals.setAll([
				{ timeUnit: "second", count: 1 },				
				]);

			var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			valueAxis.tooltip.disabled = true;
			valueAxis.interpolationDuration = 500;
			valueAxis.rangeChangeDuration = 500;
			valueAxis.renderer.inside = true;
			valueAxis.renderer.minLabelPosition = 0.05;
			valueAxis.renderer.maxLabelPosition = 0.95;
			valueAxis.renderer.axisFills.template.disabled = true;
			valueAxis.renderer.ticks.template.disabled = true;

			var series = chart.series.push(new am4charts.LineSeries());
			series.dataFields.dateX = "date";
			series.dataFields.valueY = "value";
			series.interpolationDuration = 1000;
			series.defaultState.transitionDuration = 0;
			series.tensionX = 0.8;        

			chart.events.on("datavalidated", function () {
				dateAxis.zoom({ start: 1 / 15, end: 1.2 }, false, true);
			});

			dateAxis.interpolationDuration = 500;
			dateAxis.rangeChangeDuration = 500;    
			
			socket.on('bchusdt@ticker', function(data) {     
				
				maxLength = original;				
				if($(window).width() <= 1220 && $(window).width() > 1000){
					maxLength = 15;
				} else if($(window).width() <= 1000  && $(window).width() > 690){
					maxLength = 13;
				} else if ($(window).width() <= 690 && $(window).width() > 490) {
					maxLength = 8;
				} else if ($(window).width() <= 490) {
					maxLength = 5;
				}
				
				graphData = data.message;     								

				if(chart.data.length>maxLength){
					var numberToDelete = chart.data.length - maxLength;
					chart.addData(
						{ date: new Date(graphData.time) , value: parseFloat(graphData.last_price) },
						numberToDelete
					);
				} else {                
					chart.addData(
						{ date: new Date(graphData.time) , value: parseFloat(graphData.last_price) }
					);
				}
								
			});         

			// all the below is optional, makes some fancy effects
			// gradient fill of the series
			series.fillOpacity = 1;
			var gradient = new am4core.LinearGradient();
			gradient.addColor(chart.colors.getIndex(0), 0.2);
			gradient.addColor(chart.colors.getIndex(0), 0);
			series.fill = gradient;

			// this makes date axis labels to fade out
			dateAxis.renderer.labels.template.adapter.add("fillOpacity", function (fillOpacity, target) {
				var dataItem = target.dataItem;
				return dataItem.position;
			})

			// need to set this, otherwise fillOpacity is not changed and not set
			dateAxis.events.on("validated", function () {
				am4core.iter.each(dateAxis.renderer.labels.iterator(), function (label) {
					label.fillOpacity = label.fillOpacity;
				})
			})

			// this makes date axis labels which are at equal minutes to be rotated
			dateAxis.renderer.labels.template.adapter.add("rotation", function (rotation, target) {
				var dataItem = target.dataItem;
				if (dataItem.date && dataItem.date.getTime() == am4core.time.round(new Date(dataItem.date.getTime()), "minute").getTime()) {
					target.verticalCenter = "middle";
					target.horizontalCenter = "left";
					return -90;
				}
				else {
					target.verticalCenter = "bottom";
					target.horizontalCenter = "middle";
					return 0;
				}
			})

			// bullet at the front of the line
			var bullet = series.createChild(am4charts.CircleBullet);
			bullet.circle.radius = 5;
			bullet.fillOpacity = 1;
			bullet.fill = chart.colors.getIndex(0);
			bullet.isMeasured = false;

            series.events.on("validated", function(){  
                if(series.dataItems.last != undefined){
                    bullet.moveTo(series.dataItems.last.point);
                    bullet.validatePosition();
                }
            }); 					

        }); // end am4core.ready()
	}

	function buildGraphLTC() {
        interval = "1m"		        
        
        // socket.emit('request', {table: 'graph_data_'+interval, common_symbol: common_symbol.toLowerCase()});

        am4core.ready(function() {			
			// Themes begin
			am4core.useTheme(am4themes_animated);
			// Themes end

			var chart = am4core.create("chartdivLTC", am4charts.XYChart);

			chart.hiddenState.properties.opacity = 0;

			chart.padding(0, 0, 0, 0);

			chart.zoomOutButton.disabled = true;
			     			
			chart.data = []; 

			var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			dateAxis.renderer.grid.template.location = 0;
			dateAxis.renderer.minGridDistance = 30;
			dateAxis.dateFormats.setKey("second", "hh:mm:ss");
			dateAxis.periodChangeDateFormats.setKey("second", "[bold]h:mm a");
			dateAxis.periodChangeDateFormats.setKey("minute", "[bold]h:mm a");
			dateAxis.periodChangeDateFormats.setKey("hour", "[bold]h:mm a");
			dateAxis.renderer.inside = true;
			dateAxis.renderer.axisFills.template.disabled = true;
			dateAxis.renderer.ticks.template.disabled = true;
			dateAxis.gridIntervals.setAll([
				{ timeUnit: "second", count: 1 },				
				]);

			var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			valueAxis.tooltip.disabled = true;
			valueAxis.interpolationDuration = 500;
			valueAxis.rangeChangeDuration = 500;
			valueAxis.renderer.inside = true;
			valueAxis.renderer.minLabelPosition = 0.05;
			valueAxis.renderer.maxLabelPosition = 0.95;
			valueAxis.renderer.axisFills.template.disabled = true;
			valueAxis.renderer.ticks.template.disabled = true;

			var series = chart.series.push(new am4charts.LineSeries());
			series.dataFields.dateX = "date";
			series.dataFields.valueY = "value";
			series.interpolationDuration = 1000;
			series.defaultState.transitionDuration = 0;
			series.tensionX = 0.8;        

			chart.events.on("datavalidated", function () {
				dateAxis.zoom({ start: 1 / 15, end: 1.2 }, false, true);
			});

			dateAxis.interpolationDuration = 500;
			dateAxis.rangeChangeDuration = 500;    
			
			socket.on('ltcusdt@ticker', function(data) {     
				
				maxLength = original;				
				if($(window).width() <= 1220 && $(window).width() > 1000){
					maxLength = 15;
				} else if($(window).width() <= 1000  && $(window).width() > 690){
					maxLength = 13;
				} else if ($(window).width() <= 690 && $(window).width() > 490) {
					maxLength = 8;
				} else if ($(window).width() <= 490) {
					maxLength = 5;
				}
				
				graphData = data.message;     								

				if(chart.data.length>maxLength){
					var numberToDelete = chart.data.length - maxLength;
					chart.addData(
						{ date: new Date(graphData.time) , value: parseFloat(graphData.last_price) },
						numberToDelete
					);
				} else {                
					chart.addData(
						{ date: new Date(graphData.time) , value: parseFloat(graphData.last_price) }
					);
				}
								
			});         

			// all the below is optional, makes some fancy effects
			// gradient fill of the series
			series.fillOpacity = 1;
			var gradient = new am4core.LinearGradient();
			gradient.addColor(chart.colors.getIndex(0), 0.2);
			gradient.addColor(chart.colors.getIndex(0), 0);
			series.fill = gradient;

			// this makes date axis labels to fade out
			dateAxis.renderer.labels.template.adapter.add("fillOpacity", function (fillOpacity, target) {
				var dataItem = target.dataItem;
				return dataItem.position;
			})

			// need to set this, otherwise fillOpacity is not changed and not set
			dateAxis.events.on("validated", function () {
				am4core.iter.each(dateAxis.renderer.labels.iterator(), function (label) {
					label.fillOpacity = label.fillOpacity;
				})
			})

			// this makes date axis labels which are at equal minutes to be rotated
			dateAxis.renderer.labels.template.adapter.add("rotation", function (rotation, target) {
				var dataItem = target.dataItem;
				if (dataItem.date && dataItem.date.getTime() == am4core.time.round(new Date(dataItem.date.getTime()), "minute").getTime()) {
					target.verticalCenter = "middle";
					target.horizontalCenter = "left";
					return -90;
				}
				else {
					target.verticalCenter = "bottom";
					target.horizontalCenter = "middle";
					return 0;
				}
			})

			// bullet at the front of the line
			var bullet = series.createChild(am4charts.CircleBullet);
			bullet.circle.radius = 5;
			bullet.fillOpacity = 1;
			bullet.fill = chart.colors.getIndex(0);
			bullet.isMeasured = false;

            series.events.on("validated", function(){  
                if(series.dataItems.last != undefined){
                    bullet.moveTo(series.dataItems.last.point);
                    bullet.validatePosition();
                }
            }); 				

        }); // end am4core.ready()
	}
	
	function buildGraphBTC() {
        interval = "1m"		        
        
        // socket.emit('request', {table: 'graph_data_'+interval, common_symbol: common_symbol.toLowerCase()});

        am4core.ready(function() {			
			// Themes begin
			am4core.useTheme(am4themes_animated);
			// Themes end

			var chart = am4core.create("chartdivBTC", am4charts.XYChart);

			chart.hiddenState.properties.opacity = 0;

			chart.padding(0, 0, 0, 0);

			chart.zoomOutButton.disabled = true;
			     			
			chart.data = []; 

			var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			dateAxis.renderer.grid.template.location = 0;
			dateAxis.renderer.minGridDistance = 30;
			dateAxis.dateFormats.setKey("second", "hh:mm:ss");
			dateAxis.periodChangeDateFormats.setKey("second", "[bold]h:mm a");
			dateAxis.periodChangeDateFormats.setKey("minute", "[bold]h:mm a");
			dateAxis.periodChangeDateFormats.setKey("hour", "[bold]h:mm a");
			dateAxis.renderer.inside = true;
			dateAxis.renderer.axisFills.template.disabled = true;
			dateAxis.renderer.ticks.template.disabled = true;
			dateAxis.gridIntervals.setAll([
				{ timeUnit: "second", count: 1 },				
				]);

			var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
			valueAxis.tooltip.disabled = true;
			valueAxis.interpolationDuration = 500;
			valueAxis.rangeChangeDuration = 500;
			valueAxis.renderer.inside = true;
			valueAxis.renderer.minLabelPosition = 0.05;
			valueAxis.renderer.maxLabelPosition = 0.95;
			valueAxis.renderer.axisFills.template.disabled = true;
			valueAxis.renderer.ticks.template.disabled = true;

			var series = chart.series.push(new am4charts.LineSeries());
			series.dataFields.dateX = "date";
			series.dataFields.valueY = "value";
			series.interpolationDuration = 1000;
			series.defaultState.transitionDuration = 0;
			series.tensionX = 0.8;        

			chart.events.on("datavalidated", function () {
				dateAxis.zoom({ start: 1 / 15, end: 1.2 }, false, true);
			});

			dateAxis.interpolationDuration = 500;
			dateAxis.rangeChangeDuration = 500;    
			
			socket.on('btcusdt@ticker', function(data) {     
				
				maxLength = original;				
				if($(window).width() <= 1220 && $(window).width() > 1000){
					maxLength = 15;
				} else if($(window).width() <= 1000  && $(window).width() > 690){
					maxLength = 13;
				} else if ($(window).width() <= 690 && $(window).width() > 490) {
					maxLength = 8;
				} else if ($(window).width() <= 490) {
					maxLength = 5;
				}
				
				graphData = data.message;     								

				if(chart.data.length>maxLength){
					var numberToDelete = chart.data.length - maxLength;
					chart.addData(
						{ date: new Date(graphData.time) , value: parseFloat(graphData.last_price) },
						numberToDelete
					);
				} else {                
					chart.addData(
						{ date: new Date(graphData.time) , value: parseFloat(graphData.last_price) }
					);
				}
								
			});         

			// all the below is optional, makes some fancy effects
			// gradient fill of the series
			series.fillOpacity = 1;
			var gradient = new am4core.LinearGradient();
			gradient.addColor(chart.colors.getIndex(0), 0.2);
			gradient.addColor(chart.colors.getIndex(0), 0);
			series.fill = gradient;

			// this makes date axis labels to fade out
			dateAxis.renderer.labels.template.adapter.add("fillOpacity", function (fillOpacity, target) {
				var dataItem = target.dataItem;
				return dataItem.position;
			})

			// need to set this, otherwise fillOpacity is not changed and not set
			dateAxis.events.on("validated", function () {
				am4core.iter.each(dateAxis.renderer.labels.iterator(), function (label) {
					label.fillOpacity = label.fillOpacity;
				})
			})

			// this makes date axis labels which are at equal minutes to be rotated
			dateAxis.renderer.labels.template.adapter.add("rotation", function (rotation, target) {
				var dataItem = target.dataItem;
				if (dataItem.date && dataItem.date.getTime() == am4core.time.round(new Date(dataItem.date.getTime()), "minute").getTime()) {
					target.verticalCenter = "middle";
					target.horizontalCenter = "left";
					return -90;
				}
				else {
					target.verticalCenter = "bottom";
					target.horizontalCenter = "middle";
					return 0;
				}
			})

			// bullet at the front of the line
			var bullet = series.createChild(am4charts.CircleBullet);
			bullet.circle.radius = 5;
			bullet.fillOpacity = 1;
			bullet.fill = chart.colors.getIndex(0);
			bullet.isMeasured = false;

            series.events.on("validated", function(){  
                if(series.dataItems.last != undefined){
                    bullet.moveTo(series.dataItems.last.point);
                    bullet.validatePosition();
                }
            }); 				

        }); // end am4core.ready()
    }

function loadDefaultListing(data,message){

	// if (dataHasReturnNumber) {
	// 	var numAddComma = numberWithCommas(21222238);
	// 	var num = numAddComma;
	// 	var digits = num.toString().split('');
	// 	var realDigits = digits;
	// 	var numberAddComal = 0;
	// 	var totalTransaction = "";

	// 	$.each(realDigits,function(k,v){

	// 		if (v == ",") {
	// 			totalTransaction = '<div class="nuxPaySection02NumberBox">';
	// 			totalTransaction += '<div class="nuxPaySection02NumberBoxNoColor">';
	// 			totalTransaction += ''+ v +'';
	// 			totalTransaction += '</div>';
	// 			totalTransaction += '</div>';

	// 		} else {
	// 			totalTransaction = '<div class="nuxPaySection02NumberBox">';
	// 			totalTransaction += '<div class="nuxPaySection02NumberBox2">';
	// 			totalTransaction += ''+ v +'';
	// 			totalTransaction += '</div>';
	// 			totalTransaction += '</div>';
	// 		}

	// 		$('#totalTransaction').append(totalTransaction);
	// 	});
	// }

	if (data.data.transaction_listing) {

		$.each(data.data.transaction_listing,function(k,v){
			runTimer(v['created_at'], k);
			var buildHomeTable = "";
			var transactionID = v['transaction_id'];
			var createDateTime = dateTimeToTimestamp(v['created_at']);

			buildHomeTable = '<tr>';

			if (v['transaction_type'] == "external") {

				buildHomeTable += '<td onclick="goNewPage(this)" name="'+transactionID+'" class="nuxPaySection02TableText" style="cursor:pointer">';
				buildHomeTable += ''+ transactionID +'';
				buildHomeTable += '</td>';
			} else {
				buildHomeTable += '<td class="nuxPaySection02TableText">';
				buildHomeTable += ''+ v['transaction_id'] +'';
				buildHomeTable += '</td>';
			}

			buildHomeTable += '<td class="nuxPaySection02TableText2">';
			buildHomeTable += ''+ v['wallet_type'] +'';
			buildHomeTable += '</td>';

			buildHomeTable += '<td class="nuxPaySection02TableText2" id="'+k+'">';
			// buildHomeTable += ''+ createDateTime +'';
			buildHomeTable += '</td>';
			buildHomeTable += '<td class="nuxPaySection02TableText2">';
			buildHomeTable += ''+ v['amount'] +'';
			buildHomeTable += '</td>';
			buildHomeTable += '</tr>';

			$('#addHomeTable').append(buildHomeTable);
		});
	}
}

function goNewPage (n) {
	var domainName = '<?php echo $sys['txDomain']; ?>';
	var domainTransaction = $(n).attr('name');

	$.redirect(domainName+domainTransaction);
}


function sendContactSuccess(data, message) {
	showMessage(data.statusMsg, 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', "check-circle-o", 'homepage.php');
}

function validateEmail(sEmail) {
	var sEmail = sEmail.trim();
	var filter = /^([\w-\.]+)@/;
	if (filter.test(sEmail)) {
		return true;
	}
	else {
		return false;
	}
}

function dateTimeToTimestamp(dateTimeValue) {
	const now = new Date(dateTimeValue);
	const getTimeStamp = now.getTime() / 1000;

	return moment.unix(getTimeStamp).fromNow();
}


function numberWithCommas(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function runTimer(sendTimeHere, k) {

	// var dateConvert = new Date(Date.parse(sendTimeHere)).getTime() / 1000;
	// var nowTime = moment().unix();
	// var dateCalculation = nowTime - dateConvert;

	var calcNewYear = setInterval(function(){
		date_future = new Date();
		date_now = new Date(sendTimeHere);


		seconds = Math.floor((date_future - (date_now))/1000);
		minutes = Math.floor(seconds/60);
		hours = Math.floor(minutes/60);
		days = Math.floor(hours/24);

		hours = hours-(days*24);
		minutes = minutes-(days*24*60)-(hours*60);
		seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

		if (days <= 0 && hours <= 0) {
			$("#"+k).text(minutes + " min, " + seconds + " secs " + " ago ");
		} else if (days <= 0) {
			$("#"+k).text(hours + " hour, " + minutes + " mins " + " ago ");
		} else {
			$("#"+k).text(days + " day, " + hours + " hours " + " ago ");
		}


	},1000);

}
	
	function loadAdvertisementListing(data, message) {

        var listing = data.data.listing;
		var totalRecord = data.data.totalRecord;

        if(listing && listing.length > 0) {
            var newList = [];
			$("#buySellCarousel").empty();
            $.each(listing, function(k, v) {
                
				if(k==0){
					var rebuildData = '<div class="carousel-item col-md-4 active">';
				}
				else{
					var rebuildData = '<div class="carousel-item col-md-4 ">';
					
				}
				rebuildData += '<div class="p-4 border" style="background-color:#f8fafb; box-shadow:3px 3px #e8e8e8;  border-radius: 10px;">';
//				rebuildData += `<div>`;	
//				rebuildData += `<img src="${v['image']}" style="height:40px">`;
//				rebuildData += `</div>`;
//				rebuildData += `<div class="py-3">`;
//				if(v['amount'] == 0){
//					rebuildData += `<span><b>Any Amount</b></span>`;	
//				}
//				else{
//					rebuildData += `<span ><b>${v['amount']} ${v['symbol'].toUpperCase()}</b></span>`;	
//				}
//				rebuildData += `</div>`;
				rebuildData += '<span class="align-items-center justify-content-center" style="min-height:60px; overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3; -webkit-box-orient: vertical; -webkit-box-align: center;">'+sanitize(v['content'])+'</span>';
				rebuildData += '<div class="pt-4"><b >'+sanitize(v['name'])+'</b></div>';
				rebuildData += '</div>';
				rebuildData += '</div>';
           
				$('#buySellCarousel').append(rebuildData);
				
				if(k == totalRecord - 1 && totalRecord >3 ){
					var leftRightButton = '<a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">';
					leftRightButton += '<i class="fa fa-chevron-left fa-lg text-muted"></i>';
					leftRightButton += '<span class="sr-only">Previous</span>';
					leftRightButton += '</a>';
					leftRightButton += '<a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">';
					leftRightButton += '<i class="fa fa-chevron-right fa-lg text-muted"></i>';
					leftRightButton += '<span class="sr-only">Next</span>';
					leftRightButton += '</a>';
					
					$('#buySellCarousel').append(leftRightButton);
					
				}
            });

        } else {
//            $('#showErrorMsg').show();
//            $('#showresultListing').hide();
        }
       

    }

$('meta[name="viewport"]').prop('content', 'width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no');

if ($(window).width()<320) {
	$('meta[name="viewport"]').prop('content', 'width=320');
}

$( window ).resize(function() {
    if ($(window).width()<320) {
		$('meta[name="viewport"]').prop('content', 'width=320');
	}
});

</script>
