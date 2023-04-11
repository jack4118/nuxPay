<div class="col-lg-12 col-md-12">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default bx-shadow-none">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="collapse">
                        Menu
                    </a>
                </h4>
            </div>

            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <a href="javascript:void(0);" class="businessesGeneral">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "businessesGeneral.php" ? "active" : "");?>">
                            <span>General</span>
                        </div>
                    </a>

                    <div style="color: #337ab7; text-decoration: none; cursor: pointer;">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive checkHasChildClass">
                            <div class="dropdown">
                                <span class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Business Messenger
                                </span>
                                <div class="dropdown-menu adjustDropDownPosition" aria-labelledby="dropdownMenuButton">
                                    <a href="javascript:void(0);" class="businessesTeamMember">
                                        <div class="col-12 newBgTextColor <?php echo ($thisPage == "businessesTeamMember.php" ? "active" : "");?>">
                                            <span>Team Member</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="businessesCategories">
                                        <div class="col-12 newBgTextColor <?php echo ($thisPage == "businessesCategories.php" ? "active" : "");?>">
                                            <span>Categories</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="businessesLiveChatSettings">
                                        <div class="col-12 newBgTextColor <?php echo ($thisPage == "businessesLiveChatSettings.php" ? "active" : "");?>">
                                            <span>Live Chat Settings</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);" class="businessesFollower">
                                        <div class="col-12 newBgTextColor <?php echo ($thisPage == "businessesFollower.php" ? "active" : "");?>">
                                            <span>Followers</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="javascript:void(0);" class="businessesCommissionListing">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "businessesCommissionListing.php" ? "active" : "");?>">
                            <span>Commission Listing</span>
                        </div>
                    </a>

<!--                     <a href="javascript:void(0);" class="businessesTopUpHistory">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "businessesTopUpHistory.php" ? "active" : "");?>">
                            <span>Purchase History</span>
                        </div>
                    </a> -->

                    <!-- <a href="javascript:void(0);" class="businessesTicket">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "businessesTicket.php" ? "active" : "");?>">
                            <span>Ticket</span>
                        </div>
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</div>