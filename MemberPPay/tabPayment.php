<?php include 'include/config.php'; ?>

<div id="paymentGateWay" class="docsContainer docsContainer mx-0 tabcontent" style="background-color: transparent; margin-top: 30px;">
    <div class="docsContainer m-b-rem5">
        
        <div>
            <div class="col-md-12">
                <span class="doc-font">
                    <?php echo $sys['companyName']; ?> payment gateway allows you to receive payment with its automate callback feature. It notifies backend system when payment is received.
                </span>
                <br><br>
                <span class="doc-font">
                    First, you have to setup <?php echo $sys['companyName']; ?> payment gateway in <?php echo $sys['domain']; ?>. You are required to enter destination address and callback URL. Callback URL defined as an URL that enables <?php echo $sys['companyName']; ?> system to make HTTP POST when payment is received.
                </span>
                <br><br>
                <span class="doc-font">Every callback will be in POST method while data in JSON format.</span>
            </div>
        </div>

        <div class="col-md-12">
            <div class="doc-title-margin-top1">
                <b class="doc-title">Callback data is as following</b><br>
                <div class="table-responsive table-responsive-no-border">
                    <table class="table table-vcenter t-head changeColorTr changeColorBody">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Data Type</th>
                                <th>Description</th>
                                <th>Sample data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>command</td>
                                <td>STRING</td>
                                <td>Action type</td>
                                <td>paymentGatewayCallback</td>
                            </tr>
                            <tr>
                                <td>params</td>
                                <td>JSON Array</td>
                                <td>Data array</td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="doc-title-margin-top2">
                <b class="doc-title" style="color: #262626;">params Variable</b><br>
                <div class="table-responsive table-responsive-no-border">
                    <table class="table table-vcenter t-head changeColorTr changeColorBody">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Data Type</th>
                                <th>Description</th>
                                <th>Sample data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>referenceID</th>
                                <th>STRING</th>
                                <th>Transaction Reference ID</th>
                                <th>1002649</th>
                            </tr>
                            <tr>
                                <td>txID</td>
                                <td>STRING</td>
                                <td>Transaction ID</td>
                                <td style="word-break: break-all;">0xe32371bda70c286b0cd3f44da42d66b534eeae03aa5c9f173e1549a875a7547d</td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Transaction Amount</td>
                                <td>69.18 MYR2</td>
                            </tr>
                            <tr>
                                <td>amountReceive</td>
                                <td>STRING</td>
                                <td>Amount Received in destination address</td>
                                <td>70 MYR2</td>
                            </tr>
                            <tr>
                                <td>serviceCharge</td>
                                <td>STRING</td>
                                <td>Service Charge imposed in this transaction</td>
                                <td>0.82 MYR2</td>
                            </tr>
                            <tr>
                                <td>minerAmount</td>
                                <td>STRING</td>
                                <td>Miner Amount</td>
                                <td>0 MYR2</td>
                            </tr>
                            <tr>
                                <td>address</td>
                                <td>STRING</td>
                                <td>Sender Address</td>
                                <td>0x3d06744856606fa8fb62db6fd0f702139e36c3d3</td>
                            </tr>
                            <tr>
                                <td>status</td>
                                <td>STRING</td>
                                <td>Status</td>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <td>transactionDate</td>
                                <td>STRING</td>
                                <td>Transaction Date</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>transactionUrl</td>
                                <td>STRING</td>
                                <td>Transaction Url</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>STRING</td>
                                <td>Coin Type</td>
                                <td>myr2</td>
                            </tr>
                            <tr>
                                <td>sender</td>
                                <td>STRING</td>
                                <td>internal</td>
                                <td>0x90561a2423694e34fccb20fff89e0b9150537d40<br></td>
                            </tr>
                            <tr>
                                <td>sender</td>
                                <td>STRING</td>
                                <td>external</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>recipient</td>
                                <td>STRING</td>
                                <td>internal</td>
                                <td>0x858ce2d99a674a340a1baf1f308e3dca0a697e86</td>
                            </tr>
                            <tr>
                                <td>recipient</td>
                                <td>STRING</td>
                                <td>external</td>
                                <td></td>
                            </tr>

                            <tr>
                                <td>creditDetails</td>
                                <td>STRING</td>
                                <td>amountDetails</td>
                                <td>
                                    amount : 6918
                                    <br>
                                    unit : MYR2
                                    <br>
                                    rate : 100
                                </td>
                            </tr>

                            <tr>
                                <td>creditDetails</td>
                                <td>STRING</td>
                                <td>amountReceiveDetails</td>
                                <td>
                                    amount : 7000
                                    <br>
                                    unit : MYR2
                                    <br>
                                    rate : 100
                                </td>
                            </tr>

                            <tr>
                                <td>creditDetails</td>
                                <td>STRING</td>
                                <td>serviceChargeDetails</td>
                                <td>
                                    amount : 82
                                    <br>
                                    unit : MYR2
                                    <br>
                                    rate : 100
                                </td>
                            </tr>

                            <tr>
                                <td>creditDetails</td>
                                <td>STRING</td>
                                <td>exchangeRate</td>
                                <td>
                                    USD : 0.24336229
                                </td>
                            </tr>

                            <tr>
                                <td>minerAmountDetails</td>
                                <td>STRING</td>
                                <td>serviceChargeDetails</td>
                                <td>
                                    amount : 0
                                    <br>
                                    unit : MYR2
                                    <br>
                                    rate : 100
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="doc-title-margin-top2">
                <b class="doc-title" style="color: #262626;">Raw Callback format</b><br>
                <span class="doc-font" style="">

                    <pre class="code-box prettyprint">
                        <code class="code-bg" style="word-break: break-all;">
{\"command\":\"paymentGatewayCallback\",\"params\":{\"referenceID\":\"1002649\",\"txID\":\"0xe32371bda70c286b0cd3f44da42d66b534eeae03aa5c9f173e1549a875a7547d\",\"amount\":\"69.18 MYR2\",\"amountReceive\":\"70 MYR2\",\"serviceCharge\":\"0.82 MYR2\",\"minerAmount\":\"0 MYR2\",\"address\":\"0x3d06744856606fa8fb62db6fd0f702139e36c3d3\",\"status\":\"pending\",\"transactionDate\":\"0\",\"transactionUrl\":\"\",\"type\":\"myr2\",\"sender\":{\"internal\":\"0x90561a2423694e34fccb20fff89e0b9150537d40\",\"external\":\"\"},\"recipient\":{\"internal\":\"0x858ce2d99a674a340a1baf1f308e3dca0a697e86\",\"external\":\"\"},\"creditDetails\":{\"amountDetails\":{\"amount\":\"6918\",\"unit\":\"MYR2\",\"rate\":\"100\"},\"amountReceiveDetails\":{\"amount\":\"7000\",\"unit\":\"MYR2\",\"rate\":\"100\"},\"serviceChargeDetails\":{\"amount\":\"82\",\"unit\":\"MYR2\",\"rate\":\"100\"},\"exchangeRate\":{\"USD\":\"0.24336229\"},\"minerAmountDetails\":{\"amount\":\"0\",\"unit\":\"MYR2\",\"rate\":\"100\"}}}}
                        </code>
                    </pre>

                    
                </span>
                <br>
            </div>
        </div>

        <div class="col-md-12">
            <div style="margin-top: 42px">
                <b class="doc-title" style="color: #262626;">Generate Address API</b><br>
                <span class="doc-font" style="">
                    <?php echo $sys['companyName']; ?> Payment Gateway also provide an API to generate address. API format as follow:
                </span>
                <br>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row" style="margin-top: 42px">

                <div class="col-lg-6 col-md-6 col-12">
                    <b class="doc-title" style="color: #262626;">Path:</b><br>
                    <span class="doc-font" style="word-break: break-all;">
                        <?php echo $sys['apiDomain']; ?>/crypto/generate/new/address
                    </span>
                </div>
                <div class="col-lg-6 col-md-6 col-12 apiPaymentMarginTop">
                    <b class="doc-title" style="color: #262626;">Request Type:</b><br>
                    <span class="doc-font" style="">
                        POST
                    </span><br>
                </div>

            </div>
        </div>

        <div class="col-md-12">
            <div class="doc-title-margin-top2">
                <b class="doc-title" style="color: #262626;">Request Parameter:</b><br>
                <div class="table-responsive table-responsive-no-border">
                    <table class="table table-vcenter t-head changeColorTr changeColorBody">
                        <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Data Type</th>
                                <th>Description</th>
                                <th>Sample Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>apikey</td>
                                <td>STRING</td>
                                <td>API Key can be obtained by login to <?php echo $sys['domain']; ?>/login.php</td>
                                <td>EyXo65nFiyqZKMh35EZelMspkasdim9sQ6I</td>
                            </tr>
                            <tr>
                                <td>wallet_type</td>
                                <td>STRING</td>
                                <td>wallet_type</td>
                                <td>bitcoin/ethereum/usd2/myr2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="doc-title-margin-top2">
                <b class="doc-title" style="color: #262626;"><?php echo $translations["M01455"][$language]; //Successful Response Value (Status code: 200) ?></b><br>
                <div class="table-responsive table-responsive-no-border">
                    <table class="table table-vcenter t-head changeColorTr changeColorBody">
                        <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Data Type</th>
                                <th>Description</th>
                                <th>Sample Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Status</td>
                                <td>STRING</td>
                                <td>Response Code</td>
                                <td>ok</td>
                            </tr>
                            <tr>
                                <td>message</td>
                                <td>STRING</td>
                                <td>Response Message</td>
                                <td>SUCCESS/ERROR</td>
                            </tr>
                            <tr>
                                <td>result</td>
                                <td>result</td>
                                <td>Address Data</td>
                                <td>{new_address: (string)new_address}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12 p-t-rem5">
            <b class="doc-title" style="color: #262626;"><?php echo $translations["M01456"][$language]; //Sample Output ?></b>
            <br>
            <pre class="code-box prettyprint">
                <code class="code-bg">

status : ok
message : SUCCESS
message_d : Address Successfully Generated
code : 1
result :
new_address : 2NByXFU7vCkMhBxiRozysQsyNcDmZwofnAn

                </code>
            </pre>
        </div>

    
    </div>
</div>
