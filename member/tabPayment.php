<div id="paymentGateWay" class="mx-0 tabcontent" style="background-color: transparent; margin-top: 30px;">
    <div class="m-b-rem5" style="padding-right:0px">
        
        <div>
            <div class="col-md-12">
                <span class="doc-font">
                    <?php echo $sys['companyName']; ?> Payment Gateway allows you to receive payment with its automate callback feature. It notifies backend system when payment is received.
                </span>
                <br><br>
                <span class="doc-font">
                    First, you have to setup <?php echo $sys['companyName']; ?> Payment Gateway in <?php echo $sys['domain']; ?>. You are required to enter destination address and callback URL. Callback URL defined as an URL that enables <?php echo $sys['companyName']; ?> system to make HTTP POST when payment is received.
                </span>
                <br><br>
                <span class="doc-font">Every callback will be in POST method while data in JSON format.</span>
            </div>
        </div>


        <div class="divDivider"></div>

        <!-- Generate Address api -->
        <div class="col-md-12">
            <div style="margin-top: 42px">
                <b class="doc-title" style="color: #262626;">Merchant Request Transaction</b><br>
                <span class="doc-font" style="">
                    <?php echo $sys['companyName']; ?> Payment Gateway also provide an API to generate address. API format as follow:
                </span>
                <br>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row" style="margin-top: 42px">

                <div class="col-lg-7 col-md-7 col-12">
                    <b class="doc-title" style="color: #262626;">Path:</b><br>
                    <span class="doc-font" style="word-break: break-all;">
                        <?php echo $sys['apiDomain']; ?>/payment_gateway/merchant/transaction/request
                    </span>
                </div>
            </div>
        </div>
		<div class="col-md-12" style="display:flex;padding-left:0px; padding-right:0px">
        <div class="row col-md-12" style="padding-left:10px; padding-right:0px">
        <div class="col-md-6" style="padding-right:0px">
            <div class="doc-title-margin-top2">
                <b class="doc-title" style="color: #262626;">params Variable</b><br>
                <div class="table-responsive table-responsive-no-border" style="display:flex">
                    <table class="table table-vcenter t-head2 changeColorTr changeColorBody" style="height: 263px">
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
                                <td>api_key</td>
                                <td>STRING</td>
                                <td>API Key</td>
                                <td>sOEcGm7P9I3hj4gZaAUyf05vNXRHCkJS</td>
                            </tr>
                            <tr>
                                <td>account_id</td>
                                <td>STRING</td>
                                <!-- <td>The business_id can be obtained from NuxPay settings.</td> -->
                                <td>Account ID</td>
                                <td>15935</td>
                            </tr>
                            <tr>
                                <td>currency</td>
                                <td>STRING</td>
                                <td>Wallet Type</td>
                                <td>tetherusd</td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Amount</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>reference_id</td>
                                <td>STRING</td>
                                <td>Reference ID</td>
                                <td>1001</td>
                            </tr>
                            <tr>
                                <td>redirect_url</td>
                                <td>STRING</td>
                                <td>Merchant Redirect URL</td>
                                <td><?php echo $sys['apiDomain']; ?></td>
                            </tr>
                            <tr>
                                <td>payment_type</td>
                                <td>STRING</td>
                                <td>Payment Type</td>
                                <td>payment_gateway</td>
                            </tr>
                            <tr>
                                <td>fiat_currency_id</td>
                                <td>STRING</td>
                                <td>Fiat Currency Type</td>
                                <td>myr</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 p-t-rem5" style="padding-right:0px">
            <b class="doc-title" style="color: #262626;">Sample Input</b>
            <br>
            <pre class="code-box prettyprint; white-space:pre;">
                <code class="code-bg">
{
    "api_key": "sOEcGm7P9I3hj4gZaAUyf05vNXRHCkJS",
    "account_id": "15935",
    "currency": "tetherusd",
    "amount": "10",
    "reference_id": "1001",
    "redirect_url": "<?php echo $sys['apiDomain']; ?>",
    "payment_type" : "payment_gateway", 
    "fiat_currency_id" : "myr"
}






                </code>
            </pre>
        </div>
		<div class="col-md-12" style="padding-right:0px">
	 	<div class="doc-title-margin-top2"style="padding-right:0px">
        	<b class="doc-title" style="color: #262626;">Wallet Type</b><br>
		
			<table class="table table-vcenter t-head changeColorTr changeColorBody">
				<thead>
					<tr>
						<th>Wallet Type</th>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>tetherusd</td>
						<td>Tether USD (ERC20)</td>
					</tr>
					<tr>
						<td>ethereum</td>
						<td>Ethereum</td>
					</tr>
					<tr>
						<td>tron</td>
						<td>Tron</td>
					</tr>
					<tr>
						<td>tronusdt</td>
						<td>Tether USD (TRC20)</td>
					</tr>
					<tr>
						<td>bitcoin</td>
						<td>Bitcoin</td>
					</tr>
					<tr>
						<td>bitcoincash</td>
						<td>Bitcoin Cash</td>
					</tr>
                    <tr>
						<td>filecoin</td>
						<td>Filecoin</td>
					</tr>
					<tr>
						<td>litecoin</td>
						<td>Litecoin</td>
					</tr>
					<tr>
						<td>thenuxcoin</td>
						<td>TheNux Coin</td>
					</tr>
					<tr>
						<td>bnb</td>
						<td>Binance Coin</td>
					</tr>
					<tr>
						<td>usd2</td>
						<td>USD2</td>
					</tr>
					<tr>
						<td>myr2</td>
						<td>MYR2</td>
					</tr>
					<tr>
						<td>hkd2</td>
						<td>HKD2</td>
					</tr>
					<tr>
						<td>rmb2</td>
						<td>RMB2</td>
					</tr>
					<tr>
						<td>eur2</td>
						<td>EUR2</td>
					</tr>
					<tr>
						<td>won2</td>
						<td>WON2</td>
					</tr>
					<tr>
						<td>yen2</td>
						<td>YEN2</td>
					</tr>
					<tr>
						<td>php2</td>
						<td>PHP2</td>
					</tr>
					<tr>
						<td>thb2</td>
						<td>THB2</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		</div>
        

        <div class="col-md-12" style="display:flex; padding-right:0px">
        <div class="row col-md-12" style="padding-left:0px; padding-right:0px">
        <div class="col-md-6" style="padding-right:0px">
            <div class="doc-title-margin-top2">
                <b class="doc-title" style="color: #262626;"><?php echo $translations["M01455"][$language]; //Successful Response Value (Status code: 200) ?></b><br>
                <div class="table-responsive table-responsive-no-border" style="display:flex">
                    <table class="table table-vcenter t-head2 changeColorTr changeColorBody" style="height: 263px">
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
                                <td>code</td>
                                <td>INTEGER</td>
                                <td>Response Code</td>
                                <td>1/0</td>
                            </tr>
                            <tr>
                                <td>message</td>
                                <td>STRING</td>
                                <td>Response Message</td>
                                <td>SUCCESS/ERROR</td>
                            </tr>
                            <tr>
                                <td>message_d</td>
                                <td>STRING</td>
                                <td>This message_d will return the message description of this request in sentences.</td>
                                <td>Success</td>
                            </tr>
                            <tr>
                                <td>data</td>
                                <td>Object</td>
                                <td>The details of the response will be in the data object.</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>transaction_token</td>
                                <td>STRING</td>
                                <td>Transaction Token</td>
                                <td>0ivzo3prguV9stRC</td>
                            </tr>
                            <tr>
                                <td>reference_id</td>
                                <td>STRING</td>
                                <td>Reference ID</td>
                                <td>1001</td>
                            </tr>
                            <tr>
                                <td>address</td>
                                <td>STRING</td>
                                <td>Fund In Address</td>
                                <td>0x7aed1145d4bc04488db317bd4e963584050a5864</td>
                            </tr>
                            <tr>
                                <td>payment_id</td>
                                <td>STRING</td>
                                <td>Payment ID</td>
                                <td>1616671145</td>
                            </tr>
                            <tr>
                                <td>payment_url</td>
                                <td>STRING</td>
                                <td>Payment URL</td>
                                <!-- <td>https://dev.nuxpay.com/qrPayment.php?transaction_token=0ivzo3prguV9stRC</td> -->
                                <td><?php echo $sys['domain']; ?>/qrPayment.php?transaction_token=0ivzo3prguV9stRC</td>
                            </tr>
                            <tr>
                                <td>cryptocurrency_amount</td>
                                <td>STRING</td>
                                <td>Crypto Currency Amount</td>
                                <td>2.411223</td>
                            </tr>
                            <tr>
                                <td>crypto_symbol</td>
                                <td>STRING</td>
                                <td>Crypto Symbol</td>
                                <td>USDT</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 p-t-rem5" style="padding-right:0px">
            <b class="doc-title" style="color: #262626;"><?php echo $translations["M01456"][$language]; //Sample Output ?></b>
            <br>
            <pre class="code-box prettyprint; white-space:pre;">
                <code class="code-bg">
{
    "code": 1,
    "message": "SUCCESS",
    "message_d": "Success.",
    "data": {
        "transaction_token": "0ivzo3prguV9stRC",
        "reference_id": "1001",
        "address": "0x7aed1145d4bc04488db317bd4e963584050a5864",
        "payment_id": 1616671145,
        "payment_url": "<?php echo $sys['domain']; ?>/qrPayment.php?transaction_token=0ivzo3prguV9stRC",
        "cryptocurrency_amount": "2.411223",
        "crypto_symbol": "USDT"
    }
}




                </code>
            </pre>
        </div>
    </div>
</div>
        

        <div class="divDivider"></div>
        <!-- Callback -->
        <div class="col-md-12">
            <div>
                <b class="doc-title">Callback data is as following</b><br>
                <div class="table-responsive table-responsive-no-border">
                    <table class="table table-vcenter t-head2 changeColorTr changeColorBody" style="height:150px">
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

        <div class="col-md-12" style="display:flex; padding-right:0px">
        <div class="row col-md-12" style="padding-left:0px; padding-right:0px">
        <div class="col-md-6" style="padding-right:0px">
            <div class="doc-title-margin-top2">
                <b class="doc-title" style="color: #262626;">params Variable</b><br>
                <div class="table-responsive table-responsive-no-border">
                    <table class="table table-vcenter t-head2 changeColorTr changeColorBody">
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
                                <td>receivedTxID</td>
                                <td>STRING</td>
                                <td>Received Transaction ID</td>
                                <td style="word-break: break-all;">0x4eb58a8394b14200371d77eba9281415721873f4b83bce829b1a2fb3240ab57f</td>
                            </tr>
                            <tr>
                                <td>referenceID</td>
                                <td>STRING</td>
                                <td>Transaction Reference ID</td>
                                <td>2552510</td>
                            </tr>
                            <tr>
                                <td>txDetails</td>
                                <td>Object</td>
                                <td>Transaction Details</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>input</td>
                                <td>Array</td>
                                <td>Fund In Transaction Data</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>receivedTxID</td>
                                <td>STRING</td>
                                <td>Received Transaction ID</td>
                                <td style="word-break: break-all;">0x4eb58a8394b14200371d77eba9281415721873f4b83bce829b1a2fb3240ab57f</td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Amount</td>
                                <td>0.100000000000000000</td>
                            </tr>
                            <tr>
                                <td>unit</td>
                                <td>STRING</td>
                                <td>Coin Unit</td>
                                <td>ETH</td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>STRING</td>
                                <td>Coin Type</td>
                                <td>ethereum</td>
                            </tr>
                            <tr>
                                <td>exchangeRate</td>
                                <td>STRING</td>
                                <td>Exchange Rate</td>
                                <td>478.8574884700</td>
                            </tr>
                            <tr>
                                <td>referenceID</td>
                                <td>STRING</td>
                                <td>Reference ID</td>
                                <td>2556718</td>
                            </tr>
                            <tr>
                                <td>charges</td>
                                <td>Object</td>
                                <td>Charges</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Amount</td>
                                <td>0.199963</td>
                            </tr>
                            <tr>
                                <td>unit</td>
                                <td>STRING</td>
                                <td>Unit</td>
                                <td>USDT</td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>STRING</td>
                                <td>Type</td>
                                <td>tetherUSD</td>
                            </tr>
                            <tr>
                                <td>exchangeRate</td>
                                <td>STRING</td>
                                <td>Exchange Rate</td>
                                <td>1.00014654</td>
                            </tr>
                            <tr>
                                <td>minerFee</td>
                                <td>Object</td>
                                <td>Miner Fee Details</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Miner Fee Amount</td>
                                <td>0.000105000000000000</td>
                            </tr>
                            <tr>
                                <td>unit</td>
                                <td>STRING</td>
                                <td>Miner Fee Unit</td>
                                <td>ETH</td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>STRING</td>
                                <td>Miner Fee Type</td>
                                <td>ethereum</td>
                            </tr>
                            <tr>
                                <td>exchangeRate</td>
                                <td>STRING</td>
                                <td>Miner Fee Exchange Rate</td>
                                <td>478.8574884700</td>
                            </tr>
                            <tr>
                                <td>output</td>
                                <td>Array</td>
                                <td>Destination Transaction Data</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>destination</td>
                                <td>Object</td>
                                <td>Destination Transaction Details</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Destination Transaction Amount</td>
                                <td>0.089790000000000000</td>
                            </tr>
                            <tr>
                                <td>unit</td>
                                <td>STRING</td>
                                <td>Destination Transaction Unit</td>
                                <td>ETH</td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>STRING</td>
                                <td>Destination Transaction Type</td>
                                <td>ethereum</td>
                            </tr>
                            <tr>
                                <td>exchangeRate</td>
                                <td>STRING</td>
                                <td>Destination Transaction Exchange Rate</td>
                                <td>478.8574884700</td>
                            </tr>
                            <tr>
                                <td>charges</td>
                                <td>Object</td>
                                <td>Service Charge Details</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Service Charge Amount</td>
                                <td>0.089790000000000000</td>
                            </tr>
                            <tr>
                                <td>unit</td>
                                <td>STRING</td>
                                <td>Service Charge Unit</td>
                                <td>ETH</td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>STRING</td>
                                <td>Service Charge Type</td>
                                <td>ethereum</td>
                            </tr>
                            <tr>
                                <td>exchangeRate</td>
                                <td>STRING</td>
                                <td>Service Charge Exchange Rate</td>
                                <td>478.8574884700</td>
                            </tr>
                            <tr>
                                <td>minerFee</td>
                                <td>Object</td>
                                <td>Miner Fee Details</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Miner Fee Amount</td>
                                <td>0.089790000000000000</td>
                            </tr>
                            <tr>
                                <td>unit</td>
                                <td>STRING</td>
                                <td>Miner Fee Unit</td>
                                <td>ETH</td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>STRING</td>
                                <td>Miner Fee Type</td>
                                <td>ethereum</td>
                            </tr>
                            <tr>
                                <td>exchangeRate</td>
                                <td>STRING</td>
                                <td>Miner Fee Exchange Rate</td>
                                <td>478.8574884700</td>
                            </tr>
                            <tr>
                                <td>txID</td>
                                <td>STRING</td>
                                <td>Transaction ID</td>
                                <td style="word-break: break-all;">0x51f7dc400c3f127ef9ce12d6684408e0fc631ccbf165b9622b73e4c3a219cdfc</td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Transaction Amount</td>
                                <td>0.08979 ETH</td>
                            </tr>
                            <tr>
                                <td>amountReceive</td>
                                <td>STRING</td>
                                <td>Amount Received in destination address</td>
                                <td>0.1 ETH</td>
                            </tr>
                            <tr>
                                <td>serviceCharge</td>
                                <td>STRING</td>
                                <td>Service Charge imposed in this transaction</td>
                                <td>0.01 ETH</td>
                            </tr>
                            <tr>
                                <td>minerAmount</td>
                                <td>STRING</td>
                                <td>Miner Amount</td>
                                <td>0.000105 ETH</td>
                            </tr>
                            <tr>
                                <td>address</td>
                                <td>STRING</td>
                                <td>Sender Address</td>
                                <td style="word-break: break-all;">0x46739ede49c94be3de880d2e2511aa34549bb6a5</td>
                            </tr>
                            <tr>
                                <td>status</td>
                                <td>STRING</td>
                                <td>Status</td>
                                <td>success</td>
                            </tr>
                            <tr>
                                <td>transactionDate</td>
                                <td>STRING</td>
                                <td>Transaction Date</td>
                                <td>2020-11-20 10:08:07</td>
                            </tr>
                            <tr>
                                <td>transactionUrl</td>
                                <td>STRING</td>
                                <td>Transaction Url</td>
                                <td style="word-break: break-all;">https://ropsten.etherscan.io/tx/0x51f7dc400c3f127ef9ce12d6684408e0fc631ccbf165b9622b73e4c3a219cdfc</td>
                            </tr>
                            <tr>
                                <td>type</td>
                                <td>STRING</td>
                                <td>Coin Type</td>
                                <td>ethereum</td>
                            </tr>
                            <tr>
                                <td>sender</td>
                                <td>Object</td>
                                <td>Sender Address</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>internal</td>
                                <td>STRING</td>
                                <td>Internal Address</td>
                                <td style="word-break: break-all;">0x90561a2423694e34fccb20fff89e0b9150537d40<br></td>
                            </tr>
                            <tr>
                                <td>external</td>
                                <td>STRING</td>
                                <td>External Address</td>
                                <td style="word-break: break-all;">0xf4dd12271cb73b5eda57721334e59bce0f2cacca</td>
                            </tr>
                            <tr>
                                <td>recipient</td>
                                <td>STRING</td>
                                <td>internal</td>
                                <td style="word-break: break-all;">0x858ce2d99a674a340a1baf1f308e3dca0a697e86</td>
                            </tr>
                            <tr>
                                <td>recipient</td>
                                <td>STRING</td>
                                <td>external</td>
                                <td style="word-break: break-all;">0x406198aD26DeD711878b2702a9Fa23fdCB4a557e</td>
                            </tr>
                            <tr>
                                <td>clientReferenceID</td>
                                <td>STRING</td>
                                <td>Client Reference ID</td>
                                <td>19499895</td>
                            </tr>
                            <tr>
                                <td>transactionToken</td>
                                <td>STRING</td>
                                <td>Transaction Token</td>
                                <td>Dqu1mOstUy237GZS</td>
                            </tr>
                            <tr>
                                <td>paymentTxID</td>
                                <td>STRING</td>
                                <td>Payment Transaction ID</td>
                                <td>P1616672575</td>
                            </tr>
                            <tr>
                                <td>fiatDetails</td>
                                <td>Object</td>
                                <td>Fiat Details</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>amount</td>
                                <td>STRING</td>
                                <td>Amount</td>
                                <td>10.00</td>
                            </tr>
                            <tr>
                                <td>unit</td>
                                <td>STRING</td>
                                <td>Unit</td>
                                <td>USD</td>
                            </tr>
                            <tr>
                                <td>exchangeRate</td>
                                <td>STRING</td>
                                <td>Exchange Rate</td>
                                <td>1.00014654</td>
                            </tr>
                            <tr>
                                <td>transactionType</td>
                                <td>STRING</td>
                                <td>Transaction Type</td>
                                <td>payment_gateway</td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6"style="padding-right:0px">

            <div class="col-md-12 p-t-rem5" style="padding-left:5px; padding-right:0px">
            <b class="doc-title" style="color: #262626;"><?php echo $translations["M01456"][$language]; //Sample Output ?></b>
            <br>
            <pre class="code-box prettyprint" style="height: 2470px; white-space:pre;">
                <code class="code-bg">
{
    "command": "paymentGatewayCallback",
    "params": {
        "receivedTxID": "0xf97a6c1612b21d43b83e8b42a401492f4abb59becf171b25b36c208a82572e5d",
        "referenceID": "2556718",
        "txDetails": {
            "input": [
                {
                    "receivedTxID": "0xf97a6c1612b21d43b83e8b42a401492f4abb59becf171b25b36c208a82572e5d",
                    "amount" : "5.000000",
                    "unit": "USDT",
                    "type": "tetherUSD",
                    "exchangeRate": "1.00014654",
                    "referenceID": 2556718,
                    "charges": {
                        "amount": "0.199963",
                        "unit": "USDT",
                        "type": "tetherUSD",
                        "exchangeRate": "1.00014654"
                    },
                    "minerFee": {
                        "amount": 2.435553,
                        "unit": "USDT",
                        "type": "tetherUSD",
                        "exchangeRate": "1.00014654"
                    },
                }
            ],
            "output": [
                {
                    "destination": {
                        "amount": 2.364484,
                        "unit": "USDT",
                        "type": "tetherUSD",
                        "exchangeRate": "1.00014654"
                    },
                    "charges": {
                        "amount": "0.199963",
                        "unit": "USDT",
                        "type": "tetherUSD",
                        "exchangeRate": "1.00014654"
                    },
                    "minerFee": {
                        "amount": 2.435553,
                        "unit": "USDT",
                        "type": "tetherUSD",
                        "exchangeRate": "1.00014654"
                    },
                }
            ]
        },
        "txID": "0x8b010024ca13333e236c2783b5fa667825977bb8365b9fa83ee7286e5971331d",
        "amount": "2.364484 USDT",
        "amountReceive": "5 USDT",
        "serviceCharge": "0.199963 USDT",
        "minerAmount": "2.435553 USDT",
        "address": "0x378192fa01ff8695846b6e3694bc6857faace234",
        "status": "success",
        "transactionDate": "2021-03-26 09:38:27",
        "transactionUrl": "https://ropsten.etherscan.io/tx/0x8b010024ca13333e236c2783b5fa667825977bb8365b9fa83ee7286e5971331d",
        "type": "tetherUSD",
        "sender": {
            "internal": "",
            "external": "0x406198ad26ded711878b2702a9fa23fdcb4a557e"
        },
        "recipient": {
            "internal": "",
            "external": "0xd10D0434013CA543E3598aaEDAC2fEB2C2B75962"
        },
        "clientReferenceID": "19499895",
        "transactionToken": "Dqu1mOstUy237GZS",
        "paymentTxID": "P1616672575",
        "fiatDetails": {
            "amount": "10.00",
            "unit": "USD",
            "exchangeRate": "1.00014654"
        },
        "transactionType": "payment_gateway"
    }
}

</code>
            </pre>
        </div>
        </div>
        </div>
        </div>
        
        
        <!-- YF2 -->

        <div class="divDivider"></div>
        <!-- whitelist api -->
        <div id="whitelistSection" class="col-md-12">
            <div style="margin-top: 42px">
                <b class="doc-title" style="color: #262626;">Whitelist Address API</b><br>
                <span class="doc-font" style="">
                    This API is use to whitelist the address.
                </span>
                <br>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row" style="margin-top: 42px">

                <div class="col-lg-6 col-md-6 col-12">
                    <b class="doc-title" style="color: #262626;">Path:</b><br>
                    <span class="doc-font" style="word-break: break-all;">
                        <?php echo $sys['apiDomain']; ?>/whitelist/address/multi
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
                    <table class="table table-vcenter t-head2 changeColorTr changeColorBody">
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
                                <td>account_id</td>
                                <td>STRING</td>
                                <td>account_id</td>
                                <td>16226</td>
                            </tr>

                            <tr>
                                <td>api_key</td>
                                <td>STRING</td>
                                <td>whitelisting module api key</td>
                                <td>n32MKbhtYTIuw84EeOVa7qmplLcJHGRy</td>
                            </tr>
                            
                            <tr>
                                <td>address</td>
                                <td>Objects</td>
                                <td>address</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>address</td>
                                <td>STRING</td>
                                <td>Address</td>
                                <td>0x16643a9f1475c5552d11d93f41db00e20b477348</td>
                            </tr>
                            <tr>
                                <td>wallet_type</td>
                                <td>STRING</td>
                                <td>Wallet Type</td>
                                <td>tetherusd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
        <div class="col-md-12" style="padding-left:0px; padding-right:0px">
            <div class="doc-title-margin-top2">
                <b class="doc-title" style="color: #262626;"><?php echo $translations["M01455"][$language]; //Successful Response Value (Status code: 200) ?></b><br>
                <div class="table-responsive table-responsive-no-border">
                    <table class="table table-vcenter t-head2 changeColorTr changeColorBody">
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
                                <td>code</td>
                                <td>INTEGER</td>
                                <td>Response Code</td>
                                <td>1/0</td>
                            </tr>
                            <tr>
                                <td>message</td>
                                <td>STRING</td>
                                <td>Response Message</td>
                                <td>Success/Failed</td>
                            </tr>
                            <tr>
                                <td>data</td>
                                <td>Objects</td>
                                <td>Whitelist Data</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>address</td>
                                <td>STRING</td>
                                <td>Address</td>
                                <td>0x16643a9f1475c5552d11d93f41db00e20b477348</td>
                            </tr>
                            <tr>
                                <td>wallet_type</td>
                                <td>STRING</td>
                                <td>Wallet Type</td>
                                <td>tetherusd</td>
                            </tr>
                            <tr>
                                <td>status</td>
                                <td>STRING</td>
                                <td>Status</td>
                                <td>Success/Failed</td>
                            </tr>
                            <tr>
                                <td>reason</td>
                                <td>STRING</td>
                                <td>Reason</td>
                                <td>Duplicate address detected</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>

        <div class="col-md-6">
        <div class="col-md-12 p-t-rem5" style="padding-left:0px; padding-right:0px">
            <b class="doc-title" style="color: #262626;"><?php echo $translations["M01456"][$language]; //Sample Output ?></b>
            <br>
            <pre class="code-box prettyprint">
                <code class="code-bg">

code : 1
message : Success
message_d : Success
data :
  0 :
    address : 0x16643a9f1475c5552d11d93f41db00e20b477348
    wallet_type : tetherusd
    status : Failed
    reason : Duplicate address detected
  1 :
    address : 0xade4f9852a30860f01539392247ba545e3a138d9
    wallet_type : bitcoin
    status : Failed
    reason : Invalid address
  2 :
    address : 2N9ogZNCkdrJrH2sxWFjhfRRoqRMev73KEH
    wallet_type : bitcoin
    status : Success
    reason : Success


                </code>
            </pre>
        </div>
    </div>
        <div class="divDivider"></div>



    
    </div>
</div>

<style>

.divDivider{
border-bottom:1px solid #e3e8ee;
height: 1px;
margin-top: 50px;
margin-left: auto;
margin-right: auto;
margin-bottom: 10px;
width: calc(100% - 10vw);
max-width:calc(1200px + 5vw);
}

.table-responsive-half {
  display: block;
  width: 50%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.t-head2 {
    background-color: #fcf8f8;
    border-top: 1px solid #e7ebee;
    color: #4e5a64;
    font-size: 12px;
    height: 3.6rem;
}

/* pre.prettyprint {
    width: 100%;
    margin: 1em auto;
    padding: 1em; */
    /* white-space: pre-wrap; */
    /* background-color: #000;
    border-radius: 8px; */
    
/* } */

</style>