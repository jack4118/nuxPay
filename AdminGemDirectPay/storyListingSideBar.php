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
                    <a href="javascript:void(0);" class="storyDetails">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "storyListingDetails.php" ? "active" : "");?>">
                            <span>Details</span>
                        </div>
                    </a>
                    <a href="javascript:void(0);" class="storyUpdate">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "storyListingUpdate.php" ? "active" : "");?>">
                            <span>Update</span>
                        </div>
                    </a>
                    <a href="javascript:void(0);" class="storyTransaction">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "storyListingTransaction.php" ? "active" : "");?>">
                            <span>Transactions</span>
                        </div>
                    </a>
                    <a href="javascript:void(0);" class="storyActivity">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "storyListingActivity.php" ? "active" : "");?>">
                            <span>Story Activity</span>
                        </div>
                    </a>
                    <a href="javascript:void(0);" class="storyComment">
                        <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "storyListingComment.php" ? "active" : "");?>">
                            <span>Story Comment</span>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>