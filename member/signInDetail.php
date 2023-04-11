

<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>
<?php include 'headerLogin.php'; ?>


<body class="navNoBtn m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default f-17" style="background: #F6F7F9;">

  
  <div class="m-grid m-grid--hor m-grid--root m-page">


    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(images/bg-3-1.jpg);">
      <div class="m-grid__item m-grid__item--fluid  m-login__wrapper">
        <div class="m-login__container containerCustom2">

          <div class="m-login__signin">
            <div class="m-login__head">
              <h3 class="m-login__title"><?php echo $translations["M00424"][$language]; ?><!-- Tell us about your Business --></h3>
              <div class="m-login__desc"><?php echo $translations["M00425"][$language]; ?><!-- These basic information will appear as a public information to other users. --></div>
            </div>
            <div class="m-wizard m-wizard--5 m-wizard--success m-wizard--step-first" id="m_wizard">

             
              <div class="m-portlet__padding-x">
               
              </div>
             
              <div class="m-wizard__head m-portlet__padding-x"> 
                <div class="row">
                  <div class="responsiveCustom">     
                    
                    <div class="m-wizard__nav">
                      <div class="m-wizard__steps">              
                        <div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1">
                          <div class="m-wizard__step-info">
                            <a href="#" class="m-wizard__step-number">              
                              <span class="m-wizard__step-seq">1.</span>
                              <span class="m-wizard__step-label">
                                <?php echo $translations["M00426"][$language]; ?><!-- Business Profile --> 
                              </span>
                              <span class="m-wizard__step-icon"><i class="la la-check"></i></span> 
                            </a>                  
                          </div>
                        </div>

                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                          <div class="m-wizard__step-info">
                            <a href="#m_wizard_form_step_2" class="m-wizard__step-number">              
                              <span class="m-wizard__step-seq">2.</span>
                              <span class="m-wizard__step-label">
                                <?php echo $translations["M00427"][$language]; ?><!-- Company Address -->
                              </span>
                              <span class="m-wizard__step-icon"><i class="la la-check"></i></span> 
                            </a>                  
                          </div>
                        </div>

                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                          <div class="m-wizard__step-info">
                            <a href="#" class="m-wizard__step-number">
                              <span class="m-wizard__step-seq">3.</span>
                              <span class="m-wizard__step-label">
                                <?php echo $translations["M00428"][$language]; ?><!-- Business Info -->
                              </span>
                              <span class="m-wizard__step-icon"><i class="la la-check"></i></span>
                            </a>                      
                          </div>
                        </div>

                      </div>  
                    </div>  
                             
                  </div>
                </div>          
              </div>
              
              <div class="m-wizard__form m-t-rem3">

                <form class="m-form m-form--label-align-left- m-form--state-" id="m_form" novalidate="novalidate">
                  
                  <div class="m-portlet__body">

                    
                    <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                     
                        <div class="">



                          <form class="m-login__form m-form" action="#">
                            <div class="form-group m-form__group">
                              <input type="text" id="business_name" name="signInBusinessName" class="form-control m-input" placeholder="<?php echo $translations["M00429"][$language]; //Business Name?>*" value="<?php echo $_SESSION['business']['business_name'] ?>" disabled="" style="background: #EFEFEF;">
                            </div>
                            <div class="form-group m-form__group">
                              <input type="text" id="business_website" name="signInWebsite" class="form-control m-input" placeholder="<?php echo $translations["M00430"][$language]; //Website ?>">
                            </div>
                            <div class="form-group m-form__group">
                              <input type="text" id="business_phone_number" name="signInDetailPhoneNumber" class="form-control m-input" placeholder="<?php echo $translations["M00431"][$language]; //Phone Number ?>" onkeypress="return isNumberKey(event);">
                            </div>
                            <div class="form-group m-form__group">
                                <select id="business_company_size" name="signInCompanySize" class="form-control m-input company-color" placeholder="<?php echo $translations["M00432"][$language]; //Company Size ?>" style=" min-height: 51px; padding-left: 1.5rem; padding-right: 10px; padding-top: 15px;">
                                  <option value="" disabled selected hidden style=""><?php echo $translations["M00432"][$language]; //Company Size ?></option>
                                  <option value="1-50">1-50</option>
                                  <option value="51-100">51-100</option>
                                  <option value="101-300">101-300</option>
                                  <option value="301-500">301-500</option>
                                  <option value="501-1000">501-1000</option>
                                </select>
                            </div>
                            <div class="form-group m-form__group">
                              <input type="text" id="business_email_address" name="signInBusinessEmail" class="form-control m-input" placeholder="<?php echo $translations["M00433"][$language]; //Business Email ?>">
                            </div>
                     
                            <div class="form-group m-form__group" style="position: relative;">
                 <input type="text" id="businessContactUsUrl" name="signInWebsite" class="form-control m-input" placeholder="<?php echo $translations["M00434"][$language]; //Contact Us URL ?>">
                <span href="javascript:void(0);" data-toggle="m-tooltip" class="portletCustom m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="" data-html="true" data-original-title="<?php echo $translations["M01171"][$language]; //Example ?>: http://www.sample.com/contactUs" style="position: absolute; top: 10px; right: -25px;">
                  <i class="flaticon-info m--icon-font-size-lg3"></i>
                </span>
              </div>
                          </form> 
                        </div>
                        
                      </div>
                    </div>
                    
                    <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                      <div class="m-form__section m-form__section--first">

                        <div class="form-group m-form__group">
                          <input type="text" id="business_address1" name="signInAddress1" class="form-control m-input" placeholder="<?php echo $translations["M00435"][$language]; //Address Line 1 ?>">
                        </div>
                        <div class="form-group m-form__group">
                          <input type="text" id="business_address2" name="signInAddress2" class="form-control m-input" placeholder="<?php echo $translations["M00436"][$language]; //Address Line 2 ?>">
                        </div>
                        <div class="form-group m-form__group">
                          <input type="text" id="business_city" name="signInCity" class="form-control m-input" placeholder="<?php echo $translations["M00437"][$language]; //City ?>">
                        </div>
                        <div class="form-group m-form__group">
                          <input type="text" id="business_state" name="signInState" class="form-control m-input" placeholder="<?php echo $translations["M00438"][$language]; //State ?>">
                        </div>
                        <div class="form-group m-form__group">
                          <input type="text" id="business_postal" name="signInZip" class="form-control m-input" placeholder="<?php echo $translations["M00439"][$language]; //Zip or Postal Code ?>" onkeypress="return isNumberKey(event);">
                        </div>
                        <div class="form-group m-form__group">
                          <select id="business_country" name="signInCountry" class="form-control m-input" placeholder="<?php echo $translations["M00440"][$language]; //Country ?>" style="height: 3.5rem;">
                          <?php include 'countryList.php'; ?>
                         </select>
                        </div>

                      </div>
                    </div>
                    
                    <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                      <div class="m-form__section m-form__section--first">


                        <div class="form-group m-form__group">
                          <textarea rows="4" id="business_info" name="signInBusinessInfo" placeholder="<?php echo $translations["M00441"][$language]; //Business Info ?>" class="textareaInfo" maxlength="120" style="width: 100%; background: #fff; padding: 10px; outline: 0; border: 1px solid #ebedf2;"></textarea>
                        </div>


                      </div>
                    </div>
                    
                    </form>
                  </div>
                  
                 
                  <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                    <div class="m-form__actions m-form__actions text-center">

                      <div class="">

                        <a href="#" class="">
                          <button id="" class="btn m-btn--pill m-btn--air btn-outline-secondary btn-sm m-btn m-btn--custom mt-2 skipBtn" style="color:#000;background:#ebedf2;" data-wizard-action="skip" onclick="window.location.href='signInReady.php'"><?php echo $translations["M00442"][$language]; ?><!-- Skip --></button>&nbsp;&nbsp;
                          <button id="" class="btn m-btn--pill m-btn--air btn-outline-secondary btn-sm m-btn m-btn--custom mt-2 skipBtn" style="color:#000;background:#ebedf2;margin-right: 9px;" data-wizard-action="prev"><?php echo $translations["M00443"][$language]; ?><!-- Back --></button>
                          <button id="" class="btn btn-focus m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-login-button mt-2" style="" data-wizard-action="next"><?php echo $translations["M00444"][$language]; ?><!-- Next --></button>
                        </a>
                        <a href="#">
                          <button id="addDetailBtn" class="btn btn-focus m-btn--pill m-btn--air btn-outline-metal btn-sm m-btn m-btn--custom theme-login-button mt-2" style="" data-wizard-action="submit"><?php echo $translations["M00445"][$language]; ?><!-- Save --></button>
                        </a>
                      </div>
                    </div>
                  </div>
                 
              </div>
              
            </div>
          </div>
        </div>  
      </div>
        <?php include 'footerLogin.php'; ?>

    </div>        

 
  <?php include 'sharejsDashboard.php'; ?>
  <script src="js/wizard.js" type="text/javascript"></script>

</body>


</html>

<script type="text/javascript">

  var url = 'scripts/reqLogin.php';
  var method = 'POST';
  var debug = 0;
  var bypassBlocking = 0;
  var bypassLoading = 0;



  $(document).ready(function() {
    $('#addDetailBtn').click(function() {

      var name = $("#business_name").val();
      var website = $("#business_website").val();
      var phone = $("#business_phone_number").val();
      var address1 = $("#business_address1").val();
      var address2 = $("#business_address2").val();
      var city = $("#business_city").val();
      var state = $("#business_state").val();
      var postal = $("#business_postal").val();
      var country = $("#business_country").val();
      var info = $("#business_info").val();
      var size = $("#business_company_size").val();
      var email = $("#business_email_address").val();
      var contactUsUrl = $('#businessContactUsUrl').val();

      var formData = {
        command   : "editBusinessConfirm",
        business_name   : name,
        business_website   : website,
        business_phone_number   : phone,
        business_address1   : address1,
        business_address2   : address2,
        business_city   : city,
        business_state   : state,
        business_postal   : postal,
        business_country   : country,
        business_info   : info,
        business_company_size   : size,
        business_email_address: email,
        businessContactUsUrl: contactUsUrl
      };
      var fCallback = companyDetail;
      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

    });
  });

  function companyDetail(data, message) {
    showMessage('<?php echo $translations["M01172"][$language]; /* Update business detail successfully. */ ?>', 'success', '<?php echo $translations["M01173"][$language]; /* Success */ ?>', 'check-circle-o', 'signInReady.php');
  }

</script>