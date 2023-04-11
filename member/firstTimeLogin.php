<?php include 'include/config.php'; ?>
<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<?php include 'headerDashboard.php'; ?>
		<div class="m-grid__item m-grid__item--fluid m-wrapper">

			<div class="m-subheader marginTopHeader">

                <div class="col-12 pageHeader mt-3 ">
                <?php echo $translations["M01609"][$language]; /*  Welcome Onboard*/ ?>
                </div>
			</div>

			<div class="m-content">
                <div class="col-12" id="profileSection">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-12" id="changeBusinessNameSection">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <div class="row m-form">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="capitalStyle"> 
                                                            <?php echo $translations["M01813"][$language]; /*  Your Name*/ ?>
                                                        </label>
                                                        <input id="businessName" type="text" class="form-control" enabled>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" id="changePasswordSection">
                                    <div class="m-portlet">
                                        <div class="m-portlet__body">
                                            <div class="row m-form">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                        <?php echo $translations["M01569"][$language]; /* New Password  */?>
                                                            <span class="text-danger">*</span></label>
                                                            <i data-toggle="m-tooltip" data-direction="left" data-width="auto" class="m-form__heading-help-icon descMsg flaticon-info m--icon-font-size-lg" title="" data-html="true" data-original-title="<p align='left' class='mb-0'>Min 4 characters</p>"></i>
                                                        <input id="newPassword" type="password" class="form-control" style="width: 45%">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="capitalStyle">
                                                        <?php echo $translations["M01570"][$language]; /* Confirm New Password  */?>
                                                        <span class="text-danger">*</span></label>
                                                        <input id="confirmPassword" type="password" class="form-control" style="width: 45%">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <button id="saveBtn" class="btn searchBtn my-2" type="button">
                            <?php echo $translations["M01820"][$language]; /* Save  */?></button>
                            <button id="skipBtn" class="btn searchBtn my-2" style="display: none;" type="button">Skip</button>
                        </div>

                    </div>
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

    var url             = 'scripts/reqEditBusiness.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';


//    var date = new Date();
//    date.setTime(date.getTime()+(10*1000));
//    var expires = "; expires="+date.toGMTString();

    document.cookie = "firstLogin=visited";
    // document.cookie = "firstLogin=visited" +expires+"";
   
    $(document).ready(function(){
        $('#saveBtn').click(function(){
            $newBusinessName = $('#businessName').val();
            $newPassword = $('#newPassword').val();
            $confirmNewPassword = $('#confirmPassword').val();

            if ($newBusinessName == ''){
                showMessage('Account Name cannot be empty.', 'warning', 'Error', 'warning', '');
                return;
            } 

            if(hasChangedPassword!=2) {
                if ($newPassword == ''){
                    showMessage('Password cannot be empty.', 'warning', 'Error', 'warning', '');
                    return;
                } else if ($confirmNewPassword == ''){
                    showMessage('Confirm password cannot be empty.', 'warning', 'Error', 'warning', '');
                    return;
                } else if ($newPassword != $confirmNewPassword){
                    showMessage('Password does not match.', 'warning', 'Error', 'warning', '');
                    return;
                }
            }
            

            if(hasChangedPassword==2) {

                fCallback = editCallback;
                formData  = {
                    command: 'firsttimebusinessupdate',
                    business_name: $newBusinessName
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            } else {

                fCallback = editCallback;
                formData  = {
                    command: 'firsttimeupdate',
                    business_name: $newBusinessName,
                    password: $newPassword,
                    confirm_password: $confirmNewPassword
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }
			
		

            
        })

        $('#skipBtn').click(function(){
            
            if(hasChangedPassword==2) {

                fCallback = editSkipCallback;
                formData  = {
                    command: 'firsttimebusinessskipupdate'
                };
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            }
            
        })

        if(hasChangedPassword==2) {
            $('#changePasswordSection').hide();
            $('#skipBtn').show();
        } else {
            $('#changePasswordSection').show();
            $('#skipBtn').hide();
        }


        if(hasChangedPassword==2) {

            $('#businessName').keypress(function(e) {
                if (e.which == 13) {
                    $('#businessName').blur();
                    $('#saveBtn').trigger('click');
                }
            });

        } else {

            $('#businessName').keypress(function(e) {
                if (e.which == 13) {
                    $('#newPassword').focus();
                }
            });

            $('#newPassword').keypress(function(e) {
                if (e.which == 13) {
                    $('#confirmPassword').focus();
                }
            });

            $('#confirmPassword').keypress(function(e) {
                if (e.which == 13) {
                    $('#confirmPassword').blur();
                    $('#saveBtn').trigger('click');
                }
            });
        }



        




    });

    function editSkipCallback() {

        $.redirect("dashboard.php");
        
    }

    function editCallback(data, message){
        if (data['code'] == 1){
            showMessage('Update successful.', 'success', 'Success', "check-circle-o", 'dashboard.php');    
        } else {
            showMessage(message, 'warning', 'Error', "warning", '');    
        }
    }
</script>
