<script>
    var language = "<?php echo $language; ?>";
    var translations = <?php echo json_encode($translations); ?>;
</script>

<!--begin::Base Scripts -->
<script src="js/vendors.js" type="text/javascript"></script>
<script src="js/main.js?vs=<?php echo $version; ?>" type="text/javascript"></script>
<!-- <script src="js/general.js" type="text/javascript"></script> -->
<script src="js/select2.full.js" type="text/javascript"></script>

<!--end::Base Scripts -->

<!-- Validation js (Parsleyjs) -->
<!-- <script type="text/javascript" src="js/parsley.js-2.8.0/dist/parsley.min.js"></script>
<script type="text/javascript" src="js/parsley.js-2.8.0/src/extra/validator/comparison.js"></script>
<script type="text/javascript" src="js/parsley.js-2.8.0/dist/i18n/en.js"></script>
<script type="text/javascript">window.Parsley.setLocale('en');</script> -->

<script src="js/jquery.redirect.js"></script>
<?php echo '<script src="js/general.js?ts='.$sys['version'].'"></script>'; ?>

<!-- T2ii custom standard js -->
<script src="js/logout.js"></script>
<script src="js/search.js"></script>
<?php echo '<script src="js/table.js?ts='.$sys['version'].'"></script>'; ?>

<script src="js/livechat/perfectScrollbar.js"></script>
<!--<script src="js/livechat/main.js?version=4.0.0"></script>-->
<?php if ($currentPage!= "qrPayment.php") {
//   echo '<script src="https://www.thenux.com/js/liveChatWidget.js?id=11607" id="liveChatWidgetScript"></script>';
} ?>

<script src="js/aos.js"></script>
<script src="js/waves.js"></script>
<script src="js/moment.js"></script>
<script src="js/moment-timezone.js"></script>
<script src="js/moment-timezone-with-data.js"></script>
<script src="js/bootstrap-switch.js" type="text/javascript"></script>
<!-- <script src="js/session-timeout.js"></script> -->

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
          var url = 'scripts/reqLogin.php';
          var method = 'POST';
          var debug = 0;
          var bypassBlocking = 0;
          var bypassLoading = 0;
          var fCallback = reloadPage;
          var formData = {command: 'setLanguage', language : language, isoCode : isoCode};

          $.ajax({
            type: 'POST',
            url: 'scripts/reqLogin.php',
            data: formData,
            success : function(result) {
              reloadPage();
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
        if((pageName == 'messenger.php') || (pageName == 'login.php') || (pageName == 'signUp.php') || (pageName == 'signUpSuccessActivated.php') || (pageName == 'signInActivateEmail.php') || (pageName == 'contactUsWeb.php') || (pageName == 'pricing.php') || (pageName == 'dl.php') || (pageName == 'download.php') || (pageName == 'signUpCheckEmail.php') || (pageName == 'signUpFailActivated.php') || (pageName == 'signUpActivateExpired.php') || (pageName == 'tnc.php') || (pageName == 'forgotPassword.php') || (pageName == 'pricing.php') || (pageName == 'verification.php') || (pageName == 'redirectApp.php') || (pageName == 'documentation.php') || (pageName == 'landingPage.php') || (pageName == 'landingCreateAccount.php')|| (pageName == 'liveChatPage.php')|| (pageName == 'messenger.php')|| (pageName == 'paymentGateway.php') || (pageName == 'walletLanding.php') || (pageName == 'wallet.php') || (pageName == 'blogTheNuxWallet.php') || (pageName == 'blogCryptocurrencyWallet.php') || (pageName == 'livePrice.php') || (pageName == 'blogLiveChat.php') || (pageName == 'blogList.php') || (pageName == 'blog.php')|| (pageName == 'aboutUs.php')|| (pageName == 'createCoin.php')  || (pageName == 'referralProgram.php') || (pageName == 'xChangeTutorial.php') || (pageName == 'masterDealer.php') || (pageName == 'myQrCode.php') || (pageName == 'myQr.php') || (pageName == 'blogArticle.php') || (pageName == 'docs.php') || (pageName == 'newsList.php') || (pageName == 'news.php') || (pageName == 'thenuxListCoin.php') || (pageName == 'newDocs.php') || (pageName == 'newBlog.php') || (pageName == 'story.php') || (pageName == 'qrPayment.php') || (pageName == 'signInRegisterPhone.php') || (pageName == 'signUpVerfifyPhone.php') || (pageName == 'qrPaymentSummary.php') )
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
                    url: 'scripts/reqLogin.php',
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
                    url: 'scripts/reqLogin.php',
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
        // console.log(formData);
        $.ajax({
            type: 'POST',
            url: 'scripts/reqTracking.php',
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
              url: 'scripts/reqTracking.php',
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
