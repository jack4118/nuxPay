<script>
    var language = "<?php echo $language; ?>";
    var translations = <?php echo json_encode($translations); ?>;
</script>

<!--begin::Base Scripts -->
<script src="<?php echo $sys['domain']?>/js/vendors.js" type="text/javascript"></script>
<script src="<?php echo $sys['domain']?>/js/main.js?vs=<?php echo $version; ?>" type="text/javascript"></script>
<!-- <script src="js/general.js" type="text/javascript"></script> -->
<script src="<?php echo $sys['domain']?>/js/select2.full.js" type="text/javascript"></script>

<!--end::Base Scripts -->



<!-- Validation js (Parsleyjs) -->
<!-- <script type="text/javascript" src="js/parsley.js-2.8.0/dist/parsley.min.js"></script>
<script type="text/javascript" src="js/parsley.js-2.8.0/src/extra/validator/comparison.js"></script>
<script type="text/javascript" src="js/parsley.js-2.8.0/dist/i18n/en.js"></script>
<script type="text/javascript">window.Parsley.setLocale('en');</script> -->

<script src="<?php echo $sys['domain']?>/js/jquery.redirect.js"></script>
<?php echo '<script src="'.$sys['domain'].'/js/general.js?ts='.$sys['version'].'"></script>'; ?>

<!-- T2ii custom standard js -->
<script src="<?php echo $sys['domain']?>/js/logout.js"></script>
<script src="<?php echo $sys['domain']?>/js/search.js"></script>
<?php echo '<script src="'.$sys['domain'].'/js/table.js?ts='.$sys['version'].'"></script>'; ?>

<script src="<?php echo $sys['domain']?>/js/livechat/perfectScrollbar.js"></script>
<!--<script src="js/livechat/main.js?version=4.0.0"></script>-->
 <?php if ($currentPage!= "qrPayment.php" && $sys['isWhitelabel'] != 1) {
   echo '<script src="https://www.thenux.com/js/liveChatWidget.js?id=11607" id="liveChatWidgetScript"></script>';
} ?>

<script src="<?php echo $sys['domain']?>/js/aos.js"></script>
<script src="<?php echo $sys['domain']?>/js/waves.js"></script>
<script src="<?php echo $sys['domain']?>/js/moment.js"></script>
<script src="<?php echo $sys['domain']?>/js/moment-timezone.js"></script>
<script src="<?php echo $sys['domain']?>/js/moment-timezone-with-data.js"></script>
<script src="<?php echo $sys['domain']?>/js/bootstrap-switch.js" type="text/javascript"></script>
<!-- <script src="js/session-timeout.js"></script> -->

<!-- Data Table -->
<script src="<?php echo $sys['domain']?>/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $sys['domain']?>/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="<?php echo $sys['domain']?>/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo $sys['domain']?>/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $sys['domain']?>/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="<?php echo $sys['domain']?>/plugins/datatables-responsive/js/lodash.min.js"></script>
<!-- <script src="<?php echo $sys['domain']?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script> -->
<script src="<?php echo $sys['domain']?>/js/datatables.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $sys['domain']?>/plugins/datatable/datatables.js"></script>
<script type="text/javascript" src="<?php echo $sys['domain']?>/plugins/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $sys['domain']?>/plugins/datatable/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $sys['domain']?>/plugins/datatable/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo $sys['domain']?>/plugins/datatable/responsive.bootstrap.min.js"></script>
<!-- Data Table -->

<script>

    // var header = document.getElementsByClassName("m_header");
    // var headerMenu = document.getElementsByClassName("m_header_menu");
    var header = $(".homepage #m_header");
    var headerMenu = $(".homepage #m_header_menu");
    var stickyLogo = $(".stickyLogo");
    var logoWhite = $(".logoWhite");
    var thisPage = "<?php echo $thisPage;?>";
    var isDevice = "<?php echo $dlLink; ?>";

    // if (header.length!=0 && thisPage!="contactUsWeb.php") {
    //     var sticky = header.offset();
    //     window.onscroll = function() {headerCustom()};
    // }

    // function headerCustom() {
    //   if (window.pageYOffset > sticky.top) {
    //     header.addClass("sticky");
    //     headerMenu.addClass("scrollMenuCss");
    //     stickyLogo.addClass("show");
    //     logoWhite.addClass("hide");
    //   } else {
    //     // alert(321);
    //     header.removeClass("sticky");
    //     headerMenu.removeClass("scrollMenuCss");
    //     stickyLogo.removeClass("show");
    //     logoWhite.removeClass("hide");
    //   }
    // }

     // table drag

     var mx = 0;

     $(".table-responsive").on({
      mousemove: function(e) {
        var mx2 = e.pageX - this.offsetLeft;
        if(mx) this.scrollLeft = this.sx + mx - mx2;
    },
    mousedown: function(e) {
        this.sx = this.scrollLeft;
        mx = e.pageX - this.offsetLeft;
    }
});

     $(document).on("mouseup", function(){
      mx = 0;
  });


        $('li.m-menu__item.dashboardBtn').on('mouseover', function() {
          $(this).children().find('img').attr('src', 'images/header/headerDashboardHover.svg');
        });

        $('li.m-menu__item.dashboardBtn').on('mouseleave', function() {
          $(this).children().find('img').attr('src', 'images/header/headerDashboard.svg');
        });

        $('li.m-menu__item.transactionBtn').on('mouseover', function() {
          $(this).children().find('img').attr('src', 'images/header/headerTransactionHistoryHover.svg');
        });

        $('li.m-menu__item.transactionBtn').on('mouseleave', function() {
          $(this).children().find('img').attr('src', 'images/header/headerTransactionHistory.svg');
        });




//button link
$('.upGrade').click(function(){
    window.location.href='liveChatWidget.php';
});
$('#newBusinessBtn').click(function(){
    window.location.href='createNewBusiness.php';
});

        function linkDownload(){
            // console.log(1);
            // if (isDevice=="IOS") {
            //     window.location.href="https://itunes.apple.com/us/app/thenux/id1294230820?mt=8";
            // }else if (isDevice=="Android") {
            //     window.location.href="https://play.google.com/store/apps/details?id=com.xun";
            // }else{
                window.location.href="dl.php";
            // }
        }

    $(document).ready(function () {

        $('[data-toggle="tooltip"]').tooltip();

        //==================
        //-----------------------dashboard select2 width to follow window width-----------------------
        //==================
        function checkSelect2Width(){
            if($(window).width() >= 768){
                $(".js-example-placeholder-multiple").select2({
                    width:'50%'
                });
            }else if($(window).width() < 768){
                $(".js-example-placeholder-multiple").select2({
                    width:'100%'
                });
            }
        }

        checkSelect2Width();

        $(window).resize(checkSelect2Width);
        //==================
        ////-----------------------dashboard select2 width to follow window width-----------------------
        //==================

        $(".changeLanguage").click(function(){
            changeLanguage($(this).attr("language"),$(this).attr("languageISO"));
        });

//    console.log('test');
    // <?php
    // if(isset($_SESSION["business"]["uuid"]) && $_SESSION["business"]["uuid"] != ""){
    //     //echo "console.log('tested');";
    //     echo "getbusiness('".$_POST["business_email"]."');";
    // }
    // ?>

    // $(document).ready(function () {
        // if (true) {
        $(".headHomepage #m_header_menu a").each(function() {
            // console.log(this)
            if (this.href == window.location.href && $(this).hasClass("m-menu__link") && $(this).hasClass("headerLink")) {
                // console.log(1);
                $(this).closest('li').addClass("navActive");
                $(this).closest('li').parents('li').addClass("navActiveDiv");
                $(this).closest('li').parents('li').addClass("m-menu__item--open");
                $(this).parents('.m-menu__submenu--classic').removeAttr("style");;
            }else if (this.href == window.location.href){
                $(this).closest('li').addClass("navActive");
            }
        });

        // var url = window.location;
        // $('.headHomepage #m_header_menu a[href="'+ url +'"]').parent().addClass('navActive');
        // $('.headHomepage #m_header_menu a').filter(function() {
        //  return this.href == url;
        // }).parent().addClass('navActive');
        // }
    // });
    })

    function changeLanguage(language,isoCode) {
          var url = '<?php echo $sys['domain']?>/scripts/reqLogin.php';
          var method = 'POST';
          var debug = 0;
          var bypassBlocking = 0;
          var bypassLoading = 0;
          var fCallback = reloadPage;
          var formData = {command: 'setLanguage', language : language, isoCode : isoCode};

          $.ajax({
            type: 'POST',
            url: '<?php echo $sys['domain']?>/scripts/reqLogin.php',
            data: formData,
            success : function(result) {
                location.reload();
            //   reloadPage();
            },
            error   : function(result) {
            }
          });
      }

      function reloadPage() {
          location.reload();
      }


</script>

<script type="text/javascript">
    $(document).ready(function() {
        <?php
        $accessToken = isset($_SESSION["access_token"])?:'';
        ?>
        var accessToken = "<?php echo $accessToken;?>";
        // if(accessToken == '') {
        //     // alert(0);
        //     $(".noLogin").show();
        //     $(".afterLogin").hide();
        // }else{
        //     // alert(1);
        //     $(".noLogin").hide();
        //     $(".afterLogin").show();
        // }

        window.ajaxEnabled = true;

        var pageName = "<?php echo basename($_SERVER['PHP_SELF']);?>";
        // console.log(pageName);
        // Pages before login won't be affected by the accessToken checking
        if((pageName == 'messenger.php') || (pageName == 'login.php') || (pageName == 'signUp.php') || (pageName == 'signUpSuccessActivated.php') || (pageName == 'signInActivateEmail.php') || (pageName == 'contactUsWeb.php') || (pageName == 'pricing.php') || (pageName == 'dl.php') || (pageName == 'download.php') || (pageName == 'signUpCheckEmail.php') || (pageName == 'signUpFailActivated.php') || (pageName == 'signUpActivateExpired.php') || (pageName == 'tnc.php') || (pageName == 'forgotPassword.php') || (pageName == 'pricing.php') || (pageName == 'verification.php') || (pageName == 'redirectApp.php') || (pageName == 'documentation.php') || (pageName == 'landingPage.php') || (pageName == 'landingCreateAccount.php')|| (pageName == 'liveChatPage.php')|| (pageName == 'messenger.php')|| (pageName == 'paymentGateway.php') || (pageName == 'paymentButton.php') || (pageName == 'walletLanding.php') || (pageName == 'wallet.php') || (pageName == 'blogTheNuxWallet.php') || (pageName == 'blogCryptocurrencyWallet.php') || (pageName == 'livePrice.php') || (pageName == 'blogLiveChat.php') || (pageName == 'blogList.php') || (pageName == 'blog.php')|| (pageName == 'aboutUs.php')|| (pageName == 'createCoin.php')  || (pageName == 'referralProgram.php') || (pageName == 'xChangeTutorial.php') || (pageName == 'masterDealer.php') || (pageName == 'myQrCode.php') || (pageName == 'myQr.php') || (pageName == 'blogArticle.php') || (pageName == 'docs.php') || (pageName == 'newsList.php') || (pageName == 'news.php') || (pageName == 'thenuxListCoin.php') || (pageName == 'newDocs.php') || (pageName == 'newBlog.php') || (pageName == 'story.php') || (pageName == 'qrPayment.php') || (pageName == 'signInRegisterPhone.php') || (pageName == 'signUpVerfifyPhone.php') || (pageName == 'qrPaymentSummary.php') || (pageName == 'requestFund.php') || (pageName == 'requestFundConfirmation.php') || (pageName == 'requestFundInvoice.php') || (pageName == 'payment.php') || (pageName == 'resellerLogin.php') || (pageName == 'resellerSignup.php') ||(pageName == 'indexPPay.php') || (pageName == 'indexGem.php') || (pageName == 'landingPageMember.php') || (pageName == 'landingPageReseller.php') || (pageName == 'kolLandingPage.php') || (pageName == 'kolLandingPage1.php') || (pageName == 'kolLandingPage2.php') || (pageName == 'kolLandingPage3.php') || (pageName == 'kolLandingPage4.php') || (pageName == 'newsignup.php') || (pageName == 'newlogin.php') || (pageName == 'newForgotPassword.php') || (pageName == 'newResetPassword.php') || (pageName == 'newSignupOtpVerify.php') || (pageName == 'newForgotPasswordOtpVerify.php') || (pageName == 'buyCryptoConfirmation.php') || (pageName == 'buyCryptoRequest.php') || (pageName == 'buyCryptoHistory.php') || (pageName == 'sellCryptoRequest.php') || (pageName == 'affiliate.php'))
            return true;

        if(accessToken == '') {
            // No access token, thus don't allow to call backend
            window.ajaxEnabled = false;
            showMessage('<?php echo $translations["M01176"][$language]; /* You don’t have permission to access. */ ?>', 'danger', '<?php echo $translations["M01177"][$language]; /* Access Denied */ ?>', 'times-circle-o', 'login.php');
            return true;
        }

        // === following js will activate the menu in left side bar based on url ====
        $("#m_aside_left a").each(function() {
            if (this.href == window.location.href && $(this).hasClass("m-submenu")) {
                $(this).addClass("activeNav");
                $(this).closest('li').parents('li').addClass("m-menu__item--open");
                $(this).parent().parent().parent().removeAttr("style");
            }else if (this.href == window.location.href){
                $(this).addClass("activeNav");
            }
        });

        if(accessToken != '' || accessToken != null) {
            var leftMsg = "<?php echo $_SESSION["credit_balance"]; ?>";
            $("#balanceMsg").text(leftMsg).digits();

            var currentTime = "<?php echo time();?>";
            var sessionLoginTime = "<?php echo $_SESSION["sessionLoginTime"]; ?>";
            // var sessionExpireTime = "<?php echo $_SESSION["sessionExpireTime"]; ?>";
            var sessionExpireTime = 1800;

            setTimeout(function(){
                showMessage('<?php echo $translations["M01178"][$language]; /* Your session had timed out due to inactivity. */ ?>', 'danger', '<?php echo $translations["M01179"][$language]; /* Session Expired */ ?>', 'la la-clock-o', 'login.php');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $sys['domain']?>/scripts/reqLogin.php',
                    data: {command : "logout"},
                    success : function(result) {
                    },
                    error   : function(result) {
                    }
                });
                window.ajaxEnabled = false;
            }, sessionExpireTime*1000);

            // console.log("currentTime: "+currentTime);
            // console.log("sessionLoginTime: "+sessionLoginTime);
            // console.log("leftTime: "+(currentTime - sessionLoginTime));
            // console.log("sessionExpireTime: "+sessionExpireTime);

            if((currentTime - sessionLoginTime) > sessionExpireTime) {
                showMessage('<?php echo $translations["M01178"][$language]; /* Your session had timed out due to inactivity. */ ?>', 'danger', '<?php echo $translations["M01179"][$language]; /* Session Expired */ ?>', 'la la-clock-o', 'login.php');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $sys['domain']?>/scripts/reqLogin.php',
                    data: {command : "logout"},
                    success : function(result) {
                    },
                    error   : function(result) {
                    }
                });
                window.ajaxEnabled = false;
            }

        }
    });

    function utmTracking(businessName,mobileNumber,email,action,status){
        // var x = document.cookie;
        // console.log(x);
        var formData = {
            command     : "utm_tracking",
            "business_name" :businessName,
            "mobile_number" : mobileNumber,
            "email_address" : email,
            "device_id"   : getCookie('deviceToken'),
            "utm_campaign": getCookie('utm_campaign'),
            "utm_source": getCookie('utm_source'),
            "utm_medium": getCookie('utm_medium'),
            "utm_term": getCookie('utm_term'),
            "device": "<?php echo $type; ?>",
            "ip": "<?php echo $ip; ?>",
            "country": "<?php echo $country; ?>",
            "user_agent": "<?php echo $userAgent; ?>",
            "url": "<?php echo $userUrl; ?>",
            "content": "<?php echo $parameter; ?>",
            "action_type" : action,
            "status_msg" : status
        };
         console.log(formData);
        $.ajax({
            type: 'POST',
            url: '<?php echo $sys['domain']?>/scripts/reqTracking.php',
            data: formData,
            async: false,
            success : function(result) {
            },
            error   : function(result) {
                // alert("Error!");
            }
        });
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                c = c.replace(/[+]/g, ' ');
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function tracking(ip, Device, os, url, tontent, country, time){

      var todayDate = getTodayDate();


        var formData = {
            command     : "download_link_tracking",
            "ip_address": "<?php echo $ip; ?>",
            "device": "<?php echo $type; ?>",
            "os": "<?php echo $userAgent; ?>",
            "links": "<?php echo $userUrl; ?>",
            "content": "<?php echo $parameter; ?>",
            "country": "<?php echo $country; ?>",
            "date": todayDate
        };

        var content = "<?php echo $parameter; ?>";

        if (content !== "") {
          $.ajax({
              type: 'POST',
              url: '<?php echo $sys['domain']?>/scripts/reqTracking.php',
              data: formData,
              success : function(result) {
                console.log(result)
              },
              error   : function(result) {
                  // alert("Error!");
              }
          });
        }

    }

</script>

<script>
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 1;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var accountType = "<?php echo $_SESSION['account_type']; ?>";
    var checkWalletStatus = 1;
    var balanceCopy;
    var accessToken = "<?php echo $_SESSION['access_token']; ?>";

    if(accessToken){
    $(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
        
//        if(accountType == "basic"){
//			$('#basicAccDiv').show();
//			$('#premiumAccDiv').hide();
//
//		}else if(accountType == "premium"){
//			$('#basicAccDiv').hide();
//			$('#premiumAccDiv').show();
//        }
//        
        formData = {
            command: 'getWalletBalance',
            wallet_status: checkWalletStatus,
            setting_type: 'nuxpay_wallet'
        };
        fCallback = getHeaderBalance;
        ajaxSend('<?php echo $sys['domain']?>/scripts/reqPaymentGateway.php', formData, method, fCallback, debug, bypassBlocking, 1, 0);
    });
    }
    function getHeaderBalance(data, message){
        var balance = data.data.wallet_list;
        balanceCopy = balance;        
        var headerBalance = '';
        var buildList = '';
		var refund_fee_balance = data.data.refund_credit_balance;
		
		$('.refundCreditBalance').text(refund_fee_balance + ' USD');
		
	

        if(balance){
            $.each(balance, function(k,v){
                var symbol = v['symbol'];
                var display_symbol = v['display_symbol'];
                var image = v['image'];
                var balance = v['balance'];
                
                // buildBalance = '<a href="javascript:;" class="dropdown-toggle text-white d-inline-flex align-items-center" data-toggle="dropdown">';
                headerBalance = '<img src="'+image+'" width="15px" class="mr-2">'+balance+' '+display_symbol;
                // buildBalance += '</a>';
                if(k == 0){
                    $('#balanceTitle').empty().append(headerBalance);
                }
            
            });

            $.each(balance, function(k,v){
                var name = v['name'];
                var currency_id = v['currency_id'];
                var symbol = v['symbol'];
                var display_symbol = v['display_symbol'];
                var image = v['image'];
                var balance = v['balance'];
                if (symbol == 'USDT') {
                    buildList = '<span class="dropdown-item">';
                    buildList += '<img src="'+image+'" width="15px" class="mr-2">'+balance+' '+display_symbol;
                    buildList += '</span>';

                    $('#balanceList').append(buildList);
                }
                
            })

            $.each(balance, function(k,v){
                var symbol = v['symbol'];
                var display_symbol = v['display_symbol'];
                var image = v['image'];
                var balance = v['balance'];
                
                // buildBalance = '<a href="javascript:;" class="dropdown-toggle text-white d-inline-flex align-items-center" data-toggle="dropdown">';
                headerBalance = '<img src="'+image+'" width="15px" class="mr-2">'+balance+' '+display_symbol;
                // buildBalance += '</a>';
                if(symbol == 'USDT'){
                    $('#balanceTitle1').empty().append(headerBalance);
                }
            
            });

            $.each(balance, function(k,v){
                var name = v['name'];
                var currency_id = v['currency_id'];
                var symbol = v['symbol'];
                var display_symbol = v['display_symbol'];
                var image = v['image'];
                var balance = v['balance'];
                //if (symbol == 'BTC' || symbol == 'ETH') {
                    buildList = '<span class="dropdown-item">';
                    buildList += '<img src="'+image+'" width="15px" class="mr-2">'+balance+' '+display_symbol;
                    buildList += '</span>';

                    $('#balanceList1').append(buildList);
                //}
            })
        }
        
    }
</script>


<!-- fund in qr modal --> 
<div class="modal fade systemMsg" id="fundInQrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog modal-md" role="document" >
        <div class="modal-content" >
            <div class="modal-header text-center pb-3" style="margin-left: 10px;margin-right: 10px;">
                <div style="width: 100%;" class="text-center">
                    <h5><?php echo $translations["M01976"][$language]; /* Fund In */?></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        
            <div class="col-12" style="padding-bottom:20px; padding-top:5px;">
                <div class="row" style="background: white;">

                    <div class="col-12" style="text-align: center; margin-bottom: 10px;">
                        <select class="searchDesign" id="fundInQRWalletType" style="width: 150px;"></select>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div id="fundInQrCode" class=""></div>
                        </div>
                    </div>

                    <div class="col-12" style="padding-top: 15px; padding-bottom: 30px; text-align: center;">
                        <?php echo $translations["M02084"][$language]; /* Scan QR code to fund in */?>.
                    </div>

                    <div class="col-12" style="text-align: center; margin-bottom: 20px;">
                        <div class="input-group" style="width: 100%; padding-left: 30px; padding-right: 30px;">
                            <input style="background-color: white;" id="myReceiveLink" type="text" class="form-control" placeholder="" aria-describedby="basic-addon2" readonly>
                            <div class="input-group-append">
                                <span style="background: #51C2DB; color: #FFF; cursor: pointer;" id="modalCopyFundInAddressBtn" class="input-group-text copyBtnDesign" id="basic-addon2"><img src="images/qrImg/copyIcon.svg" width="16px" style="margin-right: 6px" /> <?php echo $translations["M01590"][$language]; /* Copy */?></span>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
     

        </div>
    </div>
</div>

<script src="js/jquery.qrcode.js" type="text/javascript"></script>

<script type="text/javascript">

    var profile_picture_url = "<?php echo $sys['qrLogoIcon']?>";
    var fund_in_address_list = JSON.parse('<?php echo $_SESSION['fund_in_address_list'] ?  $_SESSION['fund_in_address_list'] : '{}'; ?>');
    var fund_in_currency_list = "";
    var fund_in_selected_currency = "";
    var fund_in_selected_currency_address = "";

    $(document).ready(function(){
        var formData  = {
            command: 'getWalletType'
            // walletTypeListing : 'nuxpaywallet'
        };  

        ajaxSend('scripts/reqPaymentGateway.php', formData, 'POST', getFundInQRWalletType, 0, 0, 0, 0);
        
        $("#navFundInBtn").click(function(){

            $('#fundInQRWalletType').empty();
            fund_in_selected_currency = "";
            fund_in_selected_currency_address = "";
            var sortedBuffer = [];
            if(fund_in_currency_list) {
                // sort priority
                $.each(fund_in_currency_list, function(key, val) {
                    if (val['symbol'] == 'USDT') {
                        // sortedBuffer.push()
                        fund_in_currency_list[key]['priority'] = 1;
                    } else if (val['symbol'] == 'BTC'){
                        fund_in_currency_list[key]['priority'] = 2;
                    } else if (val['symbol'] == 'ETH') {
                        fund_in_currency_list[key]['priority'] = 3;
                    } else {
                        fund_in_currency_list[key]['priority'] = 4;
                    }
                });

                fund_in_currency_list.sort(function(a, b) { return a.priority-b.priority });

                $.each(fund_in_currency_list, function(key, val) {
                    if(fund_in_address_list[val['wallet_type']]!=undefined) {
                        $('#fundInQRWalletType').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>');

                        if(fund_in_selected_currency=="") {
                            fund_in_selected_currency = val['wallet_type'];
                            fund_in_selected_currency_address = fund_in_address_list[val['wallet_type']];
                        }
                    }
                });

            }
            
            showFundInModal();
        });

        $("#navFundInBtn1").click(function(){

        $('#fundInQRWalletType').empty();
        fund_in_selected_currency = "";
        fund_in_selected_currency_address = "";
        if(fund_in_currency_list) {

          $.each(fund_in_currency_list, function(key, val) {
             if(fund_in_address_list[val['wallet_type']]!=undefined) {
                    $('#fundInQRWalletType').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['display_symbol'] +'</option>');

            if(fund_in_selected_currency=="") {
                fund_in_selected_currency = val['wallet_type'];
                fund_in_selected_currency_address = fund_in_address_list[val['wallet_type']];
            }
        }
    });

}

showFundInModal();
});

        $('#fundInQRWalletType').change(function(){
            fund_in_selected_currency = $('select#fundInQRWalletType option:selected').val();
            fund_in_selected_currency_address = fund_in_address_list[fund_in_selected_currency];
            showFundInModal();
        });

        $("#modalCopyFundInAddressBtn").click(function(){        
            modalCopyToClipboard(fund_in_selected_currency_address);
        });

        $("#navBuyCrypto").click(function(){
            $.redirect('buyCrypto.php');
        });

        $("#navBuyCrypto2").click(function(){
            $.redirect('buyCrypto.php');
        });

    });

    function modalCopyToClipboard(val){

        $("#myReceiveLink").select();
        document.execCommand("copy");

        swal.fire({
            position:"center",
            type:"success",
            title:"<?php echo $translations["M00137"][$language]; /* Copied to clipboard  */?>",
            showConfirmButton:!1,
            timer:1000
        })
    }

    function showFundInModal() {

        $('#myReceiveLink').val(fund_in_selected_currency_address);

        $('#fundInQrCode').empty();
        $('#fundInQrCode').qrcode({
            render: "canvas", 
            text: fund_in_selected_currency+':'+fund_in_selected_currency_address,
            width: 200,
            height: 200,
            background: "#ffffff",
            foreground: "#000000",
            src: profile_picture_url,
            imgWidth: 40,
            imgHeight: 40,
        });
            
        $('#fundInQrCode').css('margin', '0 auto');

        $("#fundInQrModal").modal("show");

    }

    function getFundInQRWalletType(data, message){

        if(data.result.coin_data) {
            $('#fundInQRWalletType').empty();
            fund_in_currency_list = data.result.coin_data;
			if(fund_in_currency_list.length > 0 && fund_in_address_list !=undefined){
				$.each(fund_in_currency_list, function(key, val) {
					if(fund_in_address_list[val['wallet_type']]!=undefined) {
						$('#fundInQRWalletType').append('<option data-image="'+val['image']+'" value="'+ val['wallet_type'] +'">'+ val['symbol'] +'</option>')
					}
				});
			}
           
        }

        function formatState (method) {
            if (!method.id) {
                return method.text;
            } 

            var optimage = $(method.element).attr('data-image')
            if(!optimage){
               return method.text;
            } else {                    
                var $opt = $(
                            '<span><img src="'+optimage+'" class="walletTypeIcon" /> <span style="vertical-align: middle;">' + method.text + '</span></span>'
                );
                return $opt;
            }
        };

        $('#fundInQRWalletType').select2({
            dropdownAutoWidth : true,
            templateResult: formatState,
            templateSelection: formatState,
            width: '250px',
        });

    }

</script>
<style>
/* .select2-container--default .select2-results > .select2-results__options {
    max-height: none;
    overflow-y: auto;
} */

</style>

<!-- fund in qr END --> 

