<div class="row">
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
                        <a href="utmTracking.php">
                            <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "utmTracking.php" ? "active" : "");?>">
                                <span>UTM Tracking</span>
                            </div>
                        </a>
                        <a href="utmIndividual.php">
                            <div class="mb-3 col-sm-3 col-md-2 text-center menuActive <?php echo ($thisPage == "utmIndividual.php" ? "active" : "");?>">
                                <span>Individual Tracking</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>