<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    // if(!isset ($_SESSION['access'][$thisPage]))
    //     echo '<script>window.location.href="accessDenied.php";</script>';
    // $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<?php include("head.php"); ?>
<link rel="stylesheet" href="css/invoicePrint.css" type="text/css" media="print" />

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include("topbar.php"); ?>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
           
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <!-- <i class="m-nav__link-icon flaticon-interface-6"></i> -->
                        <a id="backBtn" href="javascript:void(0);" class="btn btn-primary waves-effect waves-light" style="" role="button">Back</a>
                        <a id="print" href="#" class="btn btn-primary waves-effect waves-light" style="" role="button">Print</a>
                    </div>

                    <!-- <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="#" class="m-nav__link m-nav__link--icon">  
                            </a>
                        </li>
                    </ul> -->
                </div>
            </div>

            <!-- END: Subheader -->             
            <div class="m-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="invoiceContent" class="m-portlet">  
                            <div class="m-portlet__body m-portlet__body--no-padding">
                                <div class="m-invoice-2">
                                    <div class="m-invoice__wrapper">
                                        <div class="m-invoice__head">   
                                            <div class="m-invoice__container m-invoice__container--centered">              
                                                <div class="m-invoice__logo">
                                                    <a href="#">
                                                        <h1><b class="Invoice-tittle">INVOICE</b></h1>    
                                                    </a>                 
                                                    <a href="#">
                                                        <img src="<?php echo $config["logoLoginURL"] ?>" height="60">     
                                                    </a>
                                                </div> 
                                                <span class="m-invoice__desc">
                                                    <span>TheNux</span>
                                                    <span>2051 Junction Ave, Suite 212</span>
                                                    <span>San Jose, CA 95131, USA</span>
                                                </span>
                                                <span class="m-invoice__desc">
                                                    <span>Mobile: (408) 916-1177</span>
                                                    <span>Email: support@thenux.com</span>
                                                    <span>Website: thenux.com </span>
                                                </span>

                                                <div class="m-invoice__items">
                                                    <div class="m-invoice__item">
                                                        <span class="m-invoice__subtitle">DATE</span>
                                                        <span id="invoiceDate" class="m-invoice__text"><!-- 04/10/2018 --></span>
                                                    </div>
                                                    <div class="m-invoice__item">
                                                        <span class="m-invoice__subtitle">INVOICE NO.</span>
                                                        <span id="invoiceID" class="m-invoice__text" style=""><!-- I-10208 --></span>
                                                    </div>
                                                    <div class="m-invoice__item">
                                                        <span class="m-invoice__subtitle">INVOICE TO.</span>
                                                        <span class="m-invoice__text">
                                                            <span id="invoiceName"><!-- Tan Hong Zhang --></span><br>
                                                            <span id="invoiceAddress"><!-- 11, jalan harimau --></span><br>
                                                            <span id="invoiceAddress2"><!-- 83000 batu pahat --></span><br>
                                                            <span id="invoiceAddress3"><!-- johor --></span><br>
                                                            <span id="invoiceAddress4"><!-- Malaysia --></span></span>
                                                        </div>
                                                    </div>
                                                </div>                      
                                            </div>
                                        </div>
                                        </div>
                                        <div class="m-invoice-2" align="center" style="margin-bottom: 80px;margin-top: 80px">
                                        <div id="invoiceList" class="table-responsive"> 
                                                    <table class="table">
                                                        <thead style="background-color: white">                                          
                                                            <tr>
                                                                <th>QUANTITY</th>
                                                                <th>DESCRIPTION</th>
                                                                <th style="text-align: right;">UNIT COST</th>
                                                                <th style="text-align: right;">AMOUNT</th>
                                                            </tr>
                                                        </thead>    
                                                        <tbody>  
                                                            <tr style="font-weight: 600">
                                                                <td id="invoiceQuantity" style="text-align: left;"><!-- 200 --></td>
                                                                <td id="invoicePlan" style="text-align: left;"><!-- haha --></td>
                                                                <td id="invoicePrice" class="invoicePrice" style="text-align: right;"><!-- 100 --></td>

                                                                <td id="invoiceAmount" style="text-align: right;" class="invoiceTotalAmount" style="color: #28b214"><!-- 400 --></td>
                                                            </tr>
                                                        </tbody> 
                                                    </table>
                                                </div>

                                            </div>

                                            <div class="m-invoice__footer" style="padding-bottom: 50px;margin: auto;">                      
                                                <div class="m-invoice__table  m-invoice__table--centered table-responsive" style="width: 70%;margin: auto;"> 
                                                    <table class="table">

                                                        <tbody class="totalAmount">  
                                                            <tr>
                                                                <td>Sub Amount</td>
                                                                <td id="tSubAmount" class="invoiceTotalAmount"><!-- 5000 --></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Discount</td>
                                                                <td id="tDiscount" class="invoiceTotalAmount">- <!-- 100 --></td>
                                                            </tr>       
                                                            <tr>
                                                                <td>Total Amount</td>
                                                                <td id="tAmount" class="invoiceTotalAmount"><!-- 4900 --></td>
                                                            </tr>                                                                    
                                                        </tbody> 
                                                    </table>
                                                </div>                                                              
                                            </div>                       
                                   
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>

                </div>      

            </div>
            </div>
                </div> <!-- container -->

            </div> <!-- content -->

            <?php include("footer.php"); ?>

        </div>
        <!-- End content-page -->


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <?php include("shareJs.php"); ?>

    <script>
    var searchId = 'searchForm';   
    // Initialize the arguments for ajaxSend function
    var url             = 'scripts/reqTopUpHistory.php';
    var method          = 'POST';
    var debug           = 0;
    var bypassBlocking  = 0;
    var bypassLoading   = 0;
    var pageNumber      = 1;
    var formData        = "";
    var fCallback       = "";
    var invoiceID = "<?php echo $_POST['invoiceID']; ?>";
    var businessID = "<?php echo $_POST['id']; ?>";
    // console.log(invoiceID);
    // console.log(businessID);

    var parentLink = $('ul.breadcrumb').children();
    var total = $('ul.breadcrumb').children().length;

    $(parentLink).each(function(k,v){
        if (total>=4 && k==total-2) {
            var oldLink = $(this).children().attr("href");
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\");"});
            // console.log(oldLink);
        }else if(k==total-1){
            var oldLink = $(this).children().attr("href");
            var redirectData = invoiceID;
            $(this).children().attr({href:"javascript:void(0);", onClick:"redirectBreadcrumb(\""+oldLink+"\",\""+redirectData+"\");"});
        }
    });

    function redirectBreadcrumb(link,data){
        if (data) {
            $.redirect(link, {id: businessID,invoiceID: data});
        }else{
            $.redirect(link, {id: businessID});
        }
    }


    $(document).ready(function() {

        if (!businessID) {
            window.ajaxEnabled = false;
            showMessage("Business Not Found, Please try again. ", 'danger', 'Some error occured', "", 'topUpHistory.php');
        }

        $('#backBtn').click(function() {
            if (businessID) {
                $.redirect("businessesTopUpHistory.php", {id: businessID});
            }else{
                $.redirect("topUpHistory.php");
            }
        });

        $('#print').click(function() {
            window.print();
        });

        fCallback = loadDefaultListing;
        formData  = {command: 'adminGetInvoiceDetails',
        invoiceID : invoiceID };
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
 
    });


    function loadDefaultListing(data, message) {
        // console.log(data);
        $('#invoiceDate').text(data.billing_date);
        $('#invoiceID').text(data.billing_invoice);
        $("#invoiceName").text(data.first_name + " " + data.last_name);
        $('#invoiceAddress').text(data.address);
        $('#invoiceAddress2').text(data.city);
        $('#invoiceAddress3').text(data.state);
        $('#invoiceAddress4').text(data.country);
        $('#invoiceQuantity').text(data.quantity);
        $('#invoicePlan').text(data.billing_subscription);
        $('#invoicePrice').text("$ "+data.billing_amount).digits();
        $('#invoiceAmount').text("$ "+data.total_amount).digits();
        $('#tSubAmount').text("$ "+data.total_amount).digits();
        // $('#tDiscount').text(data.business_name);
        $('#tAmount').text("$ "+data.total_amount).digits();

    }          
 
    </script>

</body>
</html>
