<script>
    var language = "<?php echo $language; ?>";
    var translations = <?php echo json_encode($translations); ?>;
</script>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/vendors.js" type="text/javascript"></script>
<script src="js/newVendors.js" type="text/javascript"></script>
<script src="js/main.js?vs=<?php echo $version; ?>" type="text/javascript"></script>
<script src="js/select2.full.js" type="text/javascript"></script>

<script src="js/jquery.redirect.js"></script>
<?php echo '<script src="js/general.js?ts='.$sys['version'].'"></script>'; ?>

<script src="js/logout.js"></script>
<script src="js/search.js"></script>
<?php echo '<script src="js/table.js?ts='.$sys['version'].'"></script>'; ?>

<script src="js/livechat/perfectScrollbar.js"></script>
<!--<script src="https://www.thenux.com/js/liveChatWidget.js?id=11607" id="liveChatWidgetScript"></script>-->
<script src="js/aos.js"></script>
<script src="js/waves.js"></script>
<script src="js/moment.js"></script>
<script src="js/moment-timezone.js"></script>
<script src="js/moment-timezone-with-data.js"></script>
<script src="js/bootstrap-switch.js" type="text/javascript"></script>
<script src="js/jquery.simplePagination.js" type="text/javascript"></script>

<script src="js/moment/moment.js" type="text/javascript"></script>
<script src="js/moment/moment-with-locales.js" type="text/javascript"></script>
<script src="js/dropify.min.js"></script>

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

//button link
$('.upGrade').click(function(){
    window.location.href='liveChatWidget.php';
});
$('#newBusinessBtn').click(function(){
    window.location.href='createNewBusiness.php';
});

        function linkDownload(){
            window.location.href="dl.php";
        }

    $(document).ready(function () {

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

        $(".changeLanguage").click(function(){
            changeLanguage($(this).attr("language"),$(this).attr("languageISO"));
        });


        <?php $thisPage = basename($_SERVER['REQUEST_URI']); ?>
        var thisPage = "<?php echo $thisPage ?>";

        if(thisPage == "aboutUs.php"){
            $(".rewardProgramBtn").click(function(){
                $('html, body').animate({
                    scrollTop: $("div#scrollToReferral").offset().top-100
                }, 800);
            })

            $(".rewardPartner").click(function(){
                $('html, body').animate({
                    scrollTop: $("div#scrollToPartner").offset().top-100
                }, 800);
            })
        }

        if(thisPage == "fundRaising.php"){
            $(".newMainBtn").click(function(){
                $('html, body').animate({
                    scrollTop: $("div#goTopStoriesSection").offset().top + 10
                }, 800);
            })
        }

        function classOnScroll(){
          let $header1 = $('.kt-header'),
          $scroll1 = $(window).scrollTop();

          let $header2 = $('.dekstopHeaderViewOnly'),
          $scroll2 = $(window).scrollTop();

          let $header3 = $('.kt-header-mobile'),
          $scroll3 = $(window).scrollTop();

          if($scroll1 > 10){
            if(!$header1.hasClass('scrolled'))
              $header1.addClass('scrolled');
          }
          else
            $header1.removeClass('scrolled');

          if($scroll2 > 10){
            if(!$header2.hasClass('scrolled'))
              $header2.addClass('scrolled');
          }
          else
            $header2.removeClass('scrolled');

          if($scroll3 > 10){
            if(!$header3.hasClass('scrolled'))
              $header3.addClass('scrolled');
          }
          else
            $header3.removeClass('scrolled');
      }

        classOnScroll();

        $(window).on('scroll resize',classOnScroll);

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

            if (this.href == window.location.href && $(this).hasClass("m-menu__link") && $(this).hasClass("headerLink")) {
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


        // window.onscroll = function() {scrollFunction()};


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
        // Pages before login won't be affected by the accessToken checking
        if((pageName == 'messenger.php') || (pageName == 'login.php') || (pageName == 'signUp.php') || (pageName == 'signUpSuccessActivated.php') || (pageName == 'signInActivateEmail.php') || (pageName == 'contactUsWeb.php') || (pageName == 'pricing.php') || (pageName == 'dl.php') || (pageName == 'download.php') || (pageName == 'signUpCheckEmail.php') || (pageName == 'signUpFailActivated.php') || (pageName == 'signUpActivateExpired.php') || (pageName == 'tnc.php') || (pageName == 'forgotPassword.php') || (pageName == 'pricing.php') || (pageName == 'verification.php') || (pageName == 'redirectApp.php') || (pageName == 'documentation.php') || (pageName == 'landingPage.php') || (pageName == 'landingCreateAccount.php')|| (pageName == 'liveChatPage.php')|| (pageName == 'messenger.php')|| (pageName == 'paymentGateway.php') || (pageName == 'walletLanding.php') || (pageName == 'wallet.php') || (pageName == 'blogTheNuxWallet.php') || (pageName == 'blogCryptocurrencyWallet.php') || (pageName == 'livePrice.php') || (pageName == 'blogLiveChat.php') || (pageName == 'blogList.php') || (pageName == 'blog.php')|| (pageName == 'aboutUs.php')|| (pageName == 'createCoin.php')  || (pageName == 'referralProgram.php') || (pageName == 'xChangeTutorial.php') || (pageName == 'masterDealer.php') || (pageName == 'myQrCode.php') || (pageName == 'myQr.php') || (pageName == 'blogArticle.php') || (pageName == 'docs.php') || (pageName == 'newsList.php') || (pageName == 'news.php') || (pageName == 'thenuxListCoin.php') || (pageName == 'whatWeDo.php') || (pageName == 'paymentResolution.php') || (pageName == 'homepage.php') || (pageName == 'masterDealerProgram.php') || (pageName == 'merchant.php') || (pageName == 'supportAssets.php') || (pageName == 'crowdFunding.php') || (pageName == 'crowdFundingSuccess.php') || (pageName == 'profitSharing.php') || (pageName == 'fundRaising.php') || (pageName == 'fundRaisingList.php') || (pageName == 'fundRaisingDetails.php') || (pageName == 'nuxStoryPaymentMethod.php') || (pageName == 'nuxStoryPaymentSuccess.php') || (pageName == 'nuxStoryPaymentDetails.php') || (pageName == 'nuxPaymentGateway.php') || (pageName == 'contactUs.php') || (pageName == 'crypto.php') || (pageName == 'tracking.php') || (pageName == 'nuxpayLandingPage.php') || (pageName == 'nuxpayLandingPage.php') || (pageName == 'promoLandingPage.php') || (pageName == 'index.php'))
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
                $(this).parent().parent().parent().removeAttr("style");;
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

    $("a").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
    });

    function utmTracking(businessName,mobileNumber,email,action,status){
        // var x = document.cookie;

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

    function scrollFunction() {
      if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        $('#signupButton').show();
      } else {
        $('#signupButton').hide();
      }
    }

</script>
