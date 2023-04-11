<?php include 'include/config.php'; ?>

<?php
session_start();

if((isset($_POST['access_token']) && $_POST['access_token'] != "")) {
  $_SESSION["access_token"] = $_POST['access_token'];
  $_SESSION["business"]["uuid"] = $_POST['businessID'];
  $_SESSION["sessionLoginTime"] = $_POST['sessionLoginTime'];
}

$reference_id = $_POST['reference_id'];
$type = $_POST['type'];

?>

<?php include 'headDashboard.php'; ?>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--static m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >


    <div class="m-grid m-grid--hor m-grid--root m-page">

        <?php include 'headerDashboard.php'; ?>


        <div class="m-grid__item m-grid__item--fluid m-wrapper">

            
            <div class="m-content marginTopHeader" id="escrowChatDiv">            

                <div class="row" >
                    <!-- left side -->
                    <div id="detailDivSmall" class="col-lg-4 col-sm-12 dashboardBoxGap" >
                        <div class="dashboardBox2">
                            <div class="col-12">
                                <div class="row">
                                    <div style="width: 50px;">
                                        <img id='infoImage2' style="width: 50px;" >
                                    </div>

                                    <div class="col-8 row" style="padding-left: 30px;">
                                        <span class="mobileDetailDiv" id="infoAmount2" >-</span>
                                        <span class="mobileDetailDiv" id="infoCreatedAt2" >-</span>
                                        
                                        <div class="mobileDetailDiv" style="margin-top: 10px;">
                                            
                                            <button disabled style="background-color: #eda840;color:white;border:0px;border-radius: 3px;padding-left: 5px;padding-right: 5px;"><?php echo $translations["M01900"][$language]; /* Escrow */?></button>

                                        </div>

                                    </div>

                                </div>

                                <div class="row" style="margin-top: 30px;">
                                    <span id="transDetail"><?php echo $translations["M01901"][$language]; /* View Transaction Details */?></span>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>

                    <div id="detailDivBig" class="col-lg-4 col-sm-12 dashboardBoxGap" >
                        <div class="dashboardBox2">
                            <!-- TX details --> 
                            <div class="row" style="text-align: center;">
                                <div class="col-12" >
                                    <img id='infoImage' style="width: 50px;" >
                                </div>
                                <div id="infoAmount" class="col-12" style="padding-top: 10px;">
                                    -
                                </div>
                                <div id="infoCreatedAt" class="col-12" style="padding-top: 3px;color:grey;">
                                    -
                                </div>
                                <div class="col-12" style="padding-top: 5px;margin-bottom: 20px;">
                                    <button disabled style="background-color: #eda840;color:white;border:0px;border-radius: 3px;padding-left: 5px;padding-right: 5px;"><?php echo $translations["M01900"][$language]; /* Escrow */?></button>
                                </div>
                                <div class="col-12" style="background-color: grey;height: 1px;">
                                </div>
                            </div>
                            <!-- end TX details --> 
                            <!-- recipient details --> 
                            <div class="row" style="margin-top: 20px;">
                                <div id="infoSendReceiveDetail" class="col-12" style="font-weight: bold;">
                                    -
                                </div>
                                <div id="infoNickname" class="col-12" style="margin-top: 10px;">
                                    -
                                </div>
                                <div id="infoMobileEmail" class="col-12" style="margin-top: 3px;margin-bottom: 20px">
                                    -
                                </div>
                                <div class="col-12" style="background-color: grey;height: 1px;">
                                </div>
                            </div>
                            <!-- END recipient details --> 
                            <!-- transaction details --> 
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-12" style="font-weight: bold;">
                                    <?php echo $translations["M01902"][$language]; /* Transaction Details */?>
                                </div>
                                <div class="col-12" style="margin-top: 10px; word-break: break-all;" >
                                    <span><?php echo $translations["M01903"][$language]; /* Tx Hash */?>:</span><br><span id="infoTxHash" style="color:grey;">-</span><img id="copyTransactionHash" src="images/dashboard/newCopyIcon.png" style="width: 20px; cursor: pointer;float:right;" class="copyImgClick"/>
                                </div>
                                <div class="col-12" style="margin-top: 3px; word-break: break-all;">
                                    <span><?php echo $translations["M00602"][$language]; /* From */?>:</span><br><span id="infoFromAddress" style="color:grey;">-</span><img id="copyFromAddress" src="images/dashboard/newCopyIcon.png" style="width: 20px; cursor: pointer;float:right;" class="copyImgClick"/>
                                </div>
                                <div class="col-12" style="margin-top: 3px;margin-bottom: 20px; word-break: break-all;">
                                    <span><?php echo $translations["M00603"][$language]; /* To */?>:</span><br><span id="infoToAddress" style="color:grey;">-</span><img id="copyToAddress" src="images/dashboard/newCopyIcon.png" style="width: 20px; cursor: pointer;float:right;" class="copyImgClick"/>
                                </div>


                            </div>
                            <!-- end transaction details --> 
                            <div class="row" style="margin-top: 30px;">
                                <button id="releaseFundButton" class="btn primaryBtn" style="width: 100%;display: none;"><?php echo $translations["M01904"][$language]; /* Release Fund */?></button>
                            </div>
                            
                        </div>
                    </div>
                    <!-- end left side -->
                    <!-- right side -->
                    <div class="col-lg-8 col-sm-12 dashboardBoxGap escrowMessageBox" >
                        <div class="dashboardBox">
                            <div style="height: calc(100vh - 100px); width: 100%; overflow-y: scroll; margin-bottom: 20px;" id="messageDiv">
                                
                            </div>

                            <div style="height:40px; position: absolute; left:30px; right:30px; bottom: 10px;">

                                <input class="form-control sendChatText" placeholder="Type message here... " style="height: 100%; width:calc(100% - 50px);float: left;">

                                <div style="float: left; height: 100%;">
                                    <button style="" class="btn escrowSendChat"><img style="width: 30px; margin-left: -5px;" src="./images/Escrow/send.png"></button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end right side -->
                </div>
            </div>

        </div>

    </div>


    <?php include 'footerDashboard.php'; ?>

</div>



<?php include 'sharejsDashboard.php'; ?>


<div class="modal fade" id="paymentDetailsModal" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-w border-b justify-content-center">
                <div class="row">
                    <div class="modal-title col-12 text-center">
                        <img style="width: 50px;" src="" id="modalCoinImg">
                    </div>
                    <div class="modalAmount mt-2 col-12 text-center" id="modalAmountReceive">
                        -
                    </div>
                    <div class="success text-center mt-2 mx-auto" id="modalStatus" style="background-color: #eda840;color:white;border:0px;border-radius: 3px;padding-left: 5px;padding-right: 5px;">
                        <?php echo $translations["M01900"][$language]; /* Escrow */?>
                    </div>
                    <div class="col-12 modalTime text-center mt-2" id="modalCreatedAt">
                        -
                    </div>
                </div>
                
            </div>
            <div class="modal-body detailsModal border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px; border-bottom: 1px solid #e9ecef;">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 modalTitleLabel" id="modalSendReceiveDetail" >
                            -
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01905"][$language]; /* Name */?>:
                                </div>
                                <div class="col-8">
                                    <span style="word-break: break-all;" id="modalNickname">
                                        -
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01906"][$language]; /* Email/Mobile */?>:
                                </div>
                                <div class="col-8">
                                    <span style="word-break: break-all;" id="modalMobileEmail">
                                        -
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-body detailsModal border-b col-12" style="line-height: 25px; border-bottom-left-radius: .3rem; border-bottom-right-radius: .3rem; padding-bottom: 20px;">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 modalTitleLabel" >
                            <?php echo $translations["M01902"][$language]; /* Transaction Details */?>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <?php echo $translations["M01625"][$language]; /* Transaction Hash */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalTransactionHash">
                                        -
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 35px; padding-right:10px; padding-left:10px" id="modalCopyTransactionHash">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                <?php echo $translations["M00603"][$language]; /* To */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalToAddress">
                                        -
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 35px; padding-right:10px; padding-left:10px" id="modalCopyToAddress">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 pr-0">
                                <?php echo $translations["M00602"][$language]; /* From */?>:
                                </div>
                                <div class="col-8" style="word-break: break-all;">
                                    <span id="modalFromAddress">
                                        -
                                    </span>
                                    <span>
                                        <img src="images/dashboard/newCopyIcon.png" style="width: 35px; padding-right:10px; padding-left:10px" id="modalCopyFromAddress">
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <button id="modalReleaseFundButton" class="btn primaryBtn" style="width: 100%; margin-top: 20px; display: none;"><?php echo $translations["M01904"][$language]; /* Release Fund */?></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>


</html>

<style type="text/css">
    
.messageRowDiv {
    /*background-color: green;*/
    padding-left: 20px;
    padding-right: 10px;
    padding-bottom: 30px;
    width: calc(100% - 70px);
}

.businessNameSpan {
    color: black;
    font-size: 16px;
    font-weight: 400;
}

.createTimeSpan {
    padding-left: 10px;
    padding-right: 10px;
    color: grey;
    font-size: 14px;
    font-weight: 200;
}

.createDateSpan {
    /*background-color: yellow; */
    width: 100%; 
    text-align: center;
    color: grey;
    font-size: 16px;
    font-weight: 200;
}

.messageSpan {

}

.userPicDiv {
    width: 70px; 
    text-align: right;
}

.userPicImg {
    width: 50px;
}

.escrowSendChat {
    height: 40px;
    width: 50px;
    margin-top: -5px;
    background-color: transparent;

}

.sendChatText {
    border-radius: 8px;
}

.escrowMessageBox {
    /*min-height: 200px;*/
    height: 100%;
}

.mobileDetailDiv {
    width: 100%; 
    text-align: left;
}

#infoAmount2 {
    font-size: 18px;
    font-weight: 400;
}

#infoCreatedAt2 {
    font-size: 14px;
    font-weight: 200;
    color: grey;
}

#transDetail {
    font-size: 16px;
    font-weight: 400;
    color: #51C2DB;
}

.modalTitleLabel {
    font-size: 14px;
    font-weight: 400;
}

#detailDivSmall, #detailDivBig {
    display: inline;
}

@media (max-width: 991px) {
    #detailDivSmall {
        display: block;
    }

    #detailDivBig {
        display: none;
    }
}

@media (min-width: 992px) {
    #detailDivSmall {
        display: none;
    }

    #detailDivBig {
        display: block;
    }
}

</style>

<script>

    var url             = 'scripts/reqEscrowChat.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var dateToday       = new Date();
    // var firstTime       = "<?php echo $_POST['firstTime']; ?>";
    // var walletType      = "<?php echo $_POST['walletType']; ?>";
    // var hasSetFundOutAddress = '<?php echo $_SESSION['hasSetFundOutAddress']?>';
    // var displayDate = '<?php echo date('d M Y, g:i A', strtotime($_SESSION['registerDate'])) ?>';
    var hasChangedPassword = '<?php echo $_SESSION["changedPassword"]; ?>';


    var reference_id = '<?php echo $reference_id; ?>';
    var type = '<?php echo $type; ?>';
    var firstLoadDone = false;

    if (hasChangedPassword == 0){
        $.redirect('firstTimeLogin.php');
    }

    if(reference_id=="" || type=="") {
        $.redirect("index.php");
    }

    $(document).ready(function(){
        
        fCallback = nuxpayEscrowGetMessageData;
        formData  = {
            command: 'nuxpayEscrowGetMessage',
            reference_id: reference_id
        };

        console.log(formData);
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);



        fCallback = cryptoEscrowGetTransactionData;
        formData  = {
            command: 'cryptoEscrowGetTransaction',
            reference_id: reference_id,
            type: type
        };

        //console.log(formData);
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

        

        $('.escrowSendChat').click(function(){
            
            var messageText = $('.sendChatText').val().trim();
            
            if(messageText != "") {

                $('.sendChatText').val('');

                fCallback = nuxpayEscrowSendMessageData;
                formData  = {
                    command: 'nuxpayEscrowSendMessage',
                    reference_id: reference_id,
                    message: messageText
                };

                console.log(formData);
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            }
            
        });

        $('#transDetail').click(function(){
            
            $('#paymentDetailsModal').modal('show');
            
        });

        $('.sendChatText').keypress(function(e) {
            if (e.which == 13) {
                $('.escrowSendChat').trigger('click');
            }
        });

        $('#modalReleaseFundButton').click(function(){

	    $('#paymentDetailsModal').modal('hide');
 
            var transaction_hash = $('#modalTransactionHash').text();

            fCallback = nuxpayEscrowReleaseData;
                formData  = {
                    command: 'nuxpayEscrowRelease',
                    transaction_hash: transaction_hash
                };

            console.log(formData);
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        });

        $('#releaseFundButton').click(function(){

            var transaction_hash = $('#infoTxHash').text();

            fCallback = nuxpayEscrowReleaseData;
                formData  = {
                    command: 'nuxpayEscrowRelease',
                    transaction_hash: transaction_hash
                };

            //console.log(formData);
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
        
        });

        $('#copyTransactionHash').click(function() {
            copyToClipboard($('#infoTxHash').text())
        });

        $('#copyFromAddress').click(function() {
            copyToClipboard($('#infoFromAddress').text())
        });

        $('#copyToAddress').click(function() {
            copyToClipboard($('#infoToAddress').text())
        });

        $('#modalCopyTransactionHash').click(function() {
            copyToClipboard($('#modalTransactionHash').text())
        });

        $('#modalCopyFromAddress').click(function() {
            copyToClipboard($('#modalFromAddress').text())
        });

        $('#modalCopyToAddress').click(function() {
            copyToClipboard($('#modalToAddress').text())
        });
        

    });

    function copyToClipboard(val){
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

   

    function nuxpayEscrowReleaseData(data, message) {

        //console.log('#####');
        //console.log(message);
        //console.log('#####');
        //console.log(data);
        //console.log('#####');

	showMessage(message, 'success', '<?php echo $translations["M01195"][$language]; /* Success */ ?>', "check-circle-o", '');

        fCallback = cryptoEscrowGetTransactionData;
        formData  = {
            command: 'cryptoEscrowGetTransaction',
            reference_id: reference_id,
            type: type
        };

        //console.log(formData);
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function cryptoEscrowGetTransactionData(data, message) {

        // console.log('#####');
        // console.log(message);
        // console.log('#####');
        // console.log(data);
        // console.log('#####');

        var transInfo = data.result;

        if(transInfo) {

            var amount = transInfo.amount;
            var amountFinal = transInfo.amount_final;
            var businessId = transInfo.business_id;
            var createdAt = transInfo.created_at;
            var destinationAddress = transInfo.destination_address;
            
            var senderAddress = transInfo.sender_address;
            var status = transInfo.status;
            var transactionHash = transInfo.transaction_hash;
            var image = transInfo.image;
            var releaseEscrow = transInfo.release_escrow;

            var senderReceiverEmailAddress = "";
            var senderReceiverMobileNumber = "";
            var senderReceiverName = "";

            if(type=="send") {
                senderReceiverEmailAddress = transInfo.receiver_email_address;
                senderReceiverMobileNumber = transInfo.receiver_mobile_number;
                senderReceiverName = transInfo.receiver_name;

                $('#infoSendReceiveDetail').html('Recipient Details');
                $('#modalSendReceiveDetail').html('Sender Details');

            } else {
                senderReceiverEmailAddress = transInfo.sender_email_address;
                senderReceiverMobileNumber = transInfo.sender_mobile_number;
                senderReceiverName = transInfo.sender_name;

                $('#infoSendReceiveDetail').html('Sender Details');
                $('#modalSendReceiveDetail').html('Recipient Details');

            }

            if(releaseEscrow) {
                $('#releaseFundButton').show();
                $('#modalReleaseFundButton').show();
            } else {
                $('#releaseFundButton').hide();
                $('#modalReleaseFundButton').hide();
            }

            var createDateFormatted = moment(createdAt).format('MMM DD, YYYY, h:mm A');

            $('#infoAmount').html(amount);
            $('#infoAmount2').html(amount);

            $('#modalAmountReceive').html(amount);
            
            $('#infoCreatedAt').html(createDateFormatted);
            $('#infoCreatedAt2').html(createDateFormatted);

            $('#modalCreatedAt').html("Created on "+createDateFormatted);
            

            $('#infoNickname').html(senderReceiverName);
            $('#modalNickname').html(senderReceiverName);

            $('#infoImage').attr('src', image);
            $('#infoImage2').attr('src', image);
            $('#modalCoinImg').attr('src', image);

            $('#infoTxHash').html(transactionHash);
            $('#modalTransactionHash').html(transactionHash);
            
            $('#infoFromAddress').html(senderAddress);
            $('#modalFromAddress').html(senderAddress);

            if(destinationAddress!="" && destinationAddress!=null) {
                $('#infoToAddress').html(destinationAddress);
                $('#modalToAddress').html(destinationAddress);
            } else {
                $('#infoToAddress').html("-");
                $('#modalToAddress').html("-");
            }
          

            if(senderReceiverEmailAddress!="") {
                $('#infoMobileEmail').html(senderReceiverEmailAddress);
                $('#modalMobileEmail').html(senderReceiverEmailAddress);
            } else {
                $('#infoMobileEmail').html(senderReceiverMobileNumber);
                $('#modalMobileEmail').html(senderReceiverMobileNumber);
            }
          
            // $('.escrowMessageBox').css("height", '500' );
            // $('.escrowMessageBox').css("height", $('#detailDivBig').height() );
        }
        
    }

    function nuxpayEscrowSendMessageData(data, message) {

        // console.log('#####');
        // console.log(message);
        // console.log('#####');
        // console.log(data);
        // console.log('#####');


        fCallback = nuxpayEscrowGetMessageData;
        formData  = {
            command: 'nuxpayEscrowGetMessage',
            reference_id: reference_id
        };

        console.log(formData);
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function nuxpayEscrowGetMessageData(data,message) {

        // console.log('#####');
        // console.log(message);
        // console.log('#####');
        // console.log(data);
        // console.log('#####');

        var messageHtml = "";

        var arrMessage = data.data;

        if(arrMessage.length>0) {

            var lastCreateDate = "";
            $.each(arrMessage, function(k, v) {
                
                var userPicUrl = "./images/Escrow/default-pic.png";
                var businessName = v['business_name'];
                var message = v['message']; //'Note however that if you replace the contents of this div the click handler that you have assigned will be destroyed. If you intend to inject some new DOM elements inside the div for which you need to attach event handlers, this attachments should be performed inside the .click handler after inserting the new contents. If the original selector of the event is preserved you may also take a look at the .delegate method to attach the handler.';
                var userId = v['user_id'];
                var createdAt = v['created_at'];

                var createDate = moment(createdAt).format('MMM DD, YYYY');
                var createTime = moment(createdAt).format('hh:mm');

                if(createDate != lastCreateDate) {
                    messageHtml += '<div class="row" style="width: 100%; margin-bottom: 20px;">';
                    messageHtml += '<span class="createDateSpan" style="" >'+createDate+'</span>';
                    messageHtml += '</div>';
                }

                
                messageHtml += '<div class="row" style="width: 100%;">';
                messageHtml += '<div class="userPicDiv" style="">';
                messageHtml += '<img class="userPicImg" src="'+userPicUrl+'" style="" >';
                messageHtml += '</div>';
                messageHtml += '<div class="messageRowDiv" style="">';
                messageHtml += '<div><span class="businessNameSpan" >'+businessName+'</span><span class="createTimeSpan" >'+createTime+'</span></div>';
                messageHtml += '<span class="messageSpan">'+message+'</span></div>';
                messageHtml += '</div>';


                lastCreateDate = createDate;

            });

        }

        //console.log(messageHtml);
        $('#messageDiv').html(messageHtml);

        if(!firstLoadDone) {
            $("#messageDiv").animate({ scrollTop: $("#messageDiv")[0].scrollHeight}, 0);
        } else {
            $("#messageDiv").animate({ scrollTop: $("#messageDiv")[0].scrollHeight}, 1000);
        }
        
        firstLoadDone = true;

        // console.log($('#detailDivBig').height());
        // $('.escrowMessageBox').css("height", $('#detailDivBig').height() );
    }

    function str_pad(n) {
        return String("00" + n).slice(-2);
    }

    // $('.escrowMessageBox').css("max-height", (screen.height - 250) );


    $( window ).resize(function() {

        // console.log($('#detailDivBig').height());
        // $('.escrowMessageBox').css("height", $('#detailDivBig').height() );
    });

</script>


