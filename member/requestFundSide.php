<div class="col-md-4 requestFundLeft">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="requestLogo">
                <a href='homepage.php'>
                    <img src="<?php echo $requestFundLogo; ?>" alt="" class="d-block mx-auto img-fluid">
                </a>
            </div>
            <div class="requestFundDesc">
                <span class="requestDescNo">1</span>
                <div class="requestDescContent">
                    <b class="d-block"><?php echo $translations["M01494"][$language]; /*  Request Fund */ ?></b>
                    <span class="d-block"><?php echo $translations["M01538"][$language]; /*  Enter you and payer information. Describe about purpose of fund. */ ?></span>
                </div>
            </div>
            <div class="requestFundDesc">
                <span class="requestDescNo">2</span>
                <div class="requestDescContent">
                    <b class="d-block"><?php echo $translations["M01548"][$language]; /*  Send request */ ?></b>
                    <span class="d-block"><?php echo $sys['companyName']?> <?php echo $translations["M01549"][$language]; /*  will deliver your request to the payer. */ ?></span>
                </div>
            </div>
            <div class="requestFundDesc">
                <span class="requestDescNo">3</span>
                <div class="requestDescContent">
                    <b class="d-block"><?php echo $translations["M01550"][$language]; /*  Get Paid */ ?></b>
                    <span class="d-block"><?php echo $translations["M01551"][$language]; /*  You will be notifed once you've received the funds. */ ?></span>
                </div>
            </div>

            <!-- <div class="text-center loginCopyRight">
                Copyright © 2020 NuxPay. All Rights Reserved.
            </div> -->
        </div>
    </div>
</div>
