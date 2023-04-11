<div id="autoFundOut" class="docsContainer docsContainer mx-0 tabcontent" style="background-color: transparent; margin-top: 30px;">
    <div>

        <!-- <div style="text-align:left">
            <div class="divArea col-12">
                <div class="col-7">
                    <h2>External Fund Out</h2>
                    <span class="doc-font">
                    The <?php echo $sys['companyName']; ?> API is organized around <a href="http://en.wikipedia.org/wiki/Representational_State_Transfer"target="_blank">REST</a> Our API has predictable resource-oriented URLs, accepts 
                    <a href="https://www.json.org/json-en.html"target="_blank">JSON-encoded</a> request bodies, returns <a href="https://www.json.org/json-en.html"target="_blank">JSON-encoded</a> responses,and uses standard HTTP response 
                    codes, authentication, and verbs.
                    </span>  
                </div>
                <div class="col-5">
                    <div>
                        <div class="greyBox">
                            <div>
                                <div class="greyBoxTopBar">Base URL</div>
                            </div>
                    <pre>
<code class="codeStyle">​<?php echo $sys['apiDomain']; ?></code>
                    </pre>
                        </div>
                    </div>

                </div>
                
            </div>
            
            <div class="divDivider"></div> -->
            
            <!-- <div class="divArea col-12">
                <div class="col-12">
                    <h2>Authentication</h2>
                    <span class="doc-font">
                    The <?php echo $sys['companyName']; ?> API uses API Keys and Business ID to authenticate request. You can obtain and manage your API keys in <?php echo $sys['companyName']; ?> dashboard.    
                    </span>
                    <br></br>
                    <span class = "doc-font">
                    &#9679; API Keys can generate from <a href="<?php echo $sys['domain']; ?>/apiIntegration.php"target="_blank">API Integration page</a>.
                    <br>&nbsp;&nbsp;&nbsp;Example: DO3ImBQzZbwsSEc69J14pkijTY5auVkN
                    </span> 
                    <br></br>
                    <span class = "doc-font">
                    &#9679; Business ID can get from <a href="<?php echo $sys['domain']; ?>/settings.php"target="_blank">Settings page</a>.
                    <br>&nbsp;&nbsp;&nbsp;Example: 12345
                    </span> 

                </div>
            </div>

            <div class="divDivider"></div>

            <div class="divArea col-12">
                <div class="col-12">
                    <h2>Callback URL</h2>
                    <span class="doc-font">
                    To receive the status updates from <?php echo $sys['companyName']; ?>, you will need to set the Callback URL in your <?php echo $sys['companyName']; ?> account.
                    <br>The Callback URL is set on <a href="<?php echo $sys['domain']; ?>/apiIntegration.php"target="_blank">API Integration page</a>.
                    </span>   
                </div>
            </div>

            <div class="divDivider"></div>

            <div class="divArea col-12">
                <div class="col-12">
                    <h2>Wallet Type</h2>
                    <span class="doc-font">
                    Perform transaction using <?php echo $sys['companyName']; ?> supported crypto-currency as below:
                    <br></br>
                    </span>   
                    <div>
                    <div class="col-4 ml-5">
                        <div class="whiteBox">
                            <div class="whiteBoxTopBar" style="text-align:center">
                                Wallet Type Description
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr id="title">
                                        <th class="table-row-property">
                                        <span>Wallet Type</span>
                                        </th>
                                        <th class="table-row-definition">
                                        <span>Description</span>
                                        </th>
                                    </tr>
                                    <tr id="tetherusd">
                                        <td class="table-row-property">
                                            <span>tetherusd</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Tether USD</span>
                                        </td>
                                    </tr>
                                    <tr id="ethereum">
                                        <td class="table-row-property">
                                            <span>ethereum</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Ethereum</span>
                                        </td>
                                    </tr>
                                    <tr id="bitcoin">
                                        <td class="table-row-property">
                                            <span>bitcoin</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Bitcoin</span>
                                        </td>
                                    </tr>
                                    <tr id="bitcoincash">
                                        <td class="table-row-property">
                                            <span>bitcoincash</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Bitcoin Cash</span>
                                        </td>
                                    </tr>
                                    <tr id="litecoin">
                                        <td class="table-row-property">
                                            <span>litecoin</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Litecoin</span>
                                        </td>
                                    </tr>
                                    <tr id="thenuxcoin">
                                        <td class="table-row-property">
                                            <span>thenuxcoin</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>TheNux Coin</span>
                                        </td>
                                    </tr>
                                    <tr id="bnb">
                                        <td class="table-row-property">
                                            <span>bnb</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Binance Coin</span>
                                        </td>
                                    </tr>
                                    <tr id="usd2">
                                        <td class="table-row-property">
                                            <span>usd2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>USD2</span>
                                        </td>
                                    </tr>
                                    <tr id="myr2">
                                        <td class="table-row-property">
                                            <span>myr2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>MYR2</span>
                                        </td>
                                    </tr>
                                    <tr id="hkd2">
                                        <td class="table-row-property">
                                            <span>hkd2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>HKD2</span>
                                        </td>
                                    </tr>
                                    <tr id="rmb2">
                                        <td class="table-row-property">
                                            <span>rmb2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>RMB2</span>
                                        </td>
                                    </tr>
                                    <tr id="eur2">
                                        <td class="table-row-property">
                                            <span>eur2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>EUR2</span>
                                        </td>
                                    </tr>
                                    <tr id="won2">
                                        <td class="table-row-property">
                                            <span>won2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>WON2</span>
                                        </td>
                                    </tr>
                                    <tr id="yen2">
                                        <td class="table-row-property">
                                            <span>yen2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>YEN2</span>
                                        </td>
                                    </tr>
                                    <tr id="php2">
                                        <td class="table-row-property">
                                            <span>php2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>PHP2</span>
                                        </td>
                                    </tr>
                                    <tr id="thb2">
                                        <td class="table-row-property">
                                            <span>thb2</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>THB2</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                           
                    </div>
                </div>
                
            </div>

            <div class="divDivider"></div> -->

            <div class="divArea col-12">
                <div class="col-12">
                    <h2>Automated Fund Out</h2>
                    <span class="doc-font">
                    This is a function to enable your application to send crypto-currencies to your customer. The fund will be transferred from your dedicated wallet to your recipient address.
                    Before performing this transaction, your find out address needs to have sufficient balance, and whitelist the recipient of this transaction.
                    Currently Fund Out only supports USDT, ETH & BTC.
                    <br></br>
                    You may find your fund out address from <a href="<?php echo $sys['domain']; ?>/transferWallet.php"target="_blank">Fund Out page</a>.
                    <br></br>
                    The whitelist of your recipient need to be done in <a href="<?php echo $sys['domain']; ?>/whitelistAddresses.php"target="_blank">Whitelist Address page</a>
                    </span>
                </div>
            </div>  

            <div class="divDivider"></div>

            <div class="divArea col-12">
                <div class="col-6">
                    <span class="doc-font">
                    Method: POST
                    <br>Request Body: JSON
                    </span>
                    <br></br>
                    <span class="doc-font">
                    <b>Attribute:</b>
                    <br>
                    </span>
                    <div>
                        <table class="table">
                                <tbody>
                                    <tr id="title">
                                        <th class="table-row-definition">
                                        <span>Attribute</span>
                                        </th>
                                        <th class="table-row-definition">
                                        <span>Type</span>
                                        </th>
                                        <th class="table-row-definition">
                                        <span>Description
                                        </th>

                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                            <span>business_id</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>String</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>12345</span><br>
                                            The <a href="<?php echo $sys['domain']; ?>/apiIntegration.php"target="_blank">business_id</a> can be obtained from <?php echo $sys['companyName']; ?> settings.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                            <span>api_key</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>String</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>DO3ImBQzZbwsSEc69J14pkijTY5auVkN</span><br>
                                            The <a href="<?php echo $sys['domain']; ?>/apiIntegration.php"target="_blank">api_key</a> can be obtained from <?php echo $sys['companyName']; ?> dashboard.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                            <span>wallet_type</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>String</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>tetherusd</span><br>
                                            This attribute is to include the cryptocurrency that you wanna perform the transaction, may refer section <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">Wallet Type</a>.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                            <span>reference_id</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>String</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>invoice001</span><br>
                                            This attribute is for you to identify the transaction while <?php echo $sys['companyName']; ?> responds to your request and callback to your <a href="<?php echo $sys['domain']; ?>/apiIntegration.php"target="_blank">Callback URL</a>on status update.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                            <span>recipient_address</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>String</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0x05fc5a079e0583b8a07526023a16e2022c4c6296</span><br>
                                            The recipient_address is the wallet address that is going to receive the fund out from your address. It has to be <a href="<?php echo $sys['domain']; ?>/whitelistAddressHistory.php"target="_blank">whitelisted</a> before performing this transaction.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                            <span>amount</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>String</span>
                                        </td>
                                        <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>1200.89</span><br>
                                            It’s the amount that will fund out from your fund out address to recipient_address. The balance in your <a href="<?php echo $sys['domain']; ?>/transferWallet.php"target="_blank">fund out address</a> needs to be sufficient to perform this transaction.
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="col-6">
                <div>
                        <div class="greyBox">
                            <div>
                                <div class="greyBoxTopBar">Endpoint:</div>
                            </div>
                    <pre>
<code class="codeStyle"><?php echo $sys['apiDomain']; ?>​/​crypto/external/transfer</code>
                    </pre>
                        </div>
                    </div>
                    
                    <div class="scroll">
                        <div class="greyBox">
                            <div>
                                <div class="greyBoxTopBar">Example Request Body in JSON:</div>
                            </div>
                    <pre>
<code class="codeStyle">{
    "business_id": "12345",
    "api_key": "DO3ImBQzZbwsSEc69J14pkijTY5auVkN", "wallet_type": "tetherusd",
    "reference_id": "invoice001", "recipient_address":
    "0x05fc5a079e0583b8a07526023a16e2022c4c6296”, "amount": "1200.89"
}</code>
                    </pre>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divDivider"></div>

            <div class="divArea col-12">
                <div class="row col-6">
                    <span class="doc-font">If the request have successfully received in <?php echo $sys['companyName']; ?>​ endpoint, will response attribute as below:
                    </span>
                    <div>
                            <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>code</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>1</span><br>
                                            <span>The code is identified as the status of this request.</span><br>
                                            <span>If ​1​ = Success and able to process;</span><br>
                                            <span>If ​0​ = Fail to process due to error</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>message</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>SUCCESS</span><br>
                                            <span>This message will return the status of this request in word.</span><br>
                                            <span>If ​SUCCESS​ = Success and able to process;</span><br>
                                            <span>If ​FAILED​ = Fail to process due to error</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>message_d</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>Success</span><br>
                                            <span>This message_d will return the message description of <br>this request in sentences.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>data</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>The details of the response will be in the data object.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>referenceID</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>invoice001</span><br>
                                            <span>This data is for you to identify the transaction while you request <a href="<?php echo $sys['domain']; ?>/requestFundAfterLogin.php"target="_blank">Fund Out </a> via <?php echo $sys['companyName']; ?> API.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>transactionHash</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0x5eb98f8f65ac07fed0d0b1d4be264875da58b37d<br>71f8e02b05d4cb50d2172222</span><br>
                                            <span class="indent">The transactionHash is the unique hash for this fund<br> out request from Fund Out address to recipient address.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>amountDetails</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>This object is the transaction amount from fund out<br> address to recipient wallet address.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>amount</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>12.089000</span><br>
                                            <span>The transaction amount is return in decimal value.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>unit</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>USDT</span><br>
                                            <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of the transaction in symbol.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>walletType</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>tetherusd</span><br>
                                            <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of this transaction</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>exchangeRate</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>This object will provide the conversion rate of the<br> wallet_type in fiat currency</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>USD</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0.99918496</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>transactionHash</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0x5eb98f8f65ac07fed0d0b1d4be264875da58b37d<br>71f8e02b05d4cb50d2172222</span><br>
                                            <span class="indent">The transactionHash is the unique hash for this fund<br> out request from Fund Out address to recipient address.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                        
                                            <td class="table-row-definition">
                                            <span>serviceChargeDetails</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>This object is the transaction amount from fund<br> out address to <?php echo $sys['companyName']; ?> service charge wallet address.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>amount</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>12.089000</span><br>
                                            <span>The transaction amount is return in decimal value.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>unit</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>USDT</span><br>
                                            <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of the transaction in symbol.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>walletType</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>tetherusd</span><br>
                                            <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of this transaction.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>exchangeRate</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>This object will provide the conversion rate of the<br> wallet_type in fiat currency</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>USD</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0.99918496</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>transactionHash</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0x5eb98f8f65ac07fed0d0b1d4be264875da58b37d<br>71f8e02b05d4cb50d2172222</span><br>
                                            <span class="indent">The transactionHash is the unique hash for this fund<br> out request from Fund Out address to <?php echo $sys['companyName']; ?> services charge wallet address.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>feeChargeDetails</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>This object is the transaction amount from fund <br>out address to <?php echo $sys['companyName']; ?> miner/gas fee wallet address.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>amount</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>12.089000</span><br>
                                            <span>The transaction amount is return in decimal value.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>unit</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>USDT</span><br>
                                            <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of the transaction in symbol.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>walletType</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>tetherusd</span><br>
                                            <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of this transaction.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>exchangeRate</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>This object will provide the conversion rate of the<br> wallet_type in fiat currency</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>USD</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0.99918496</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>transactionHash</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0x5eb98f8f65ac07fed0d0b1d4be264875da58b37d<br>71f8e02b05d4cb50d2172222</span><br>
                                            <span>The transactionHash is the unique hash for this fund<br> out request from Fund Out address to <?php echo $sys['companyName']; ?> miner/gas fee wallet address.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>feeDetails</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>This object is the transaction amount from fund out address to <?php echo $sys['companyName']; ?> miner/gas fee in actual wallet address.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>amount</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0.00054000</span><br>
                                            <span>The miner fee amount is return in decimal value.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>unit</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>ETH</span><br>
                                            <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of the transaction in symbol.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>walletType</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>tetherusd</span><br>
                                            <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of this transaction.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>exchangeRate</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>This object will provide the conversion rate of the<br> wallet_type in fiat currency</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>USD</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>461.95000000</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>confirmation</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>0</span><br>
                                            <span>This is the confirmation of this transaction from <br>Fund Out Address to Recipient Wallet Address in blockchain network.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>status</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>pending</span><br>
                                            <span>The status of the transaction in blockchain network.</span> 
                                           </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>time</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>2020-11-04 14:09:12</span><br>
                                            <span>The timing while returning this response.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>successTime</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>2020-11-04 14:09:12</span><br>
                                            <span>This is the timing while returning this response with status of success.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>whitelist</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>Address is whitelisted.</span><br>
                                            <span>It will show if the recipient address has been <a href="<?php echo $sys['domain']; ?>/whitelistAddressHistory.php"target="_blank">whitelisted</a> in your <?php echo $sys['companyName']; ?> account.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>isWhitelist</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>1</span><br>
                                            <span>It will show if the recipient address has been <a href="<?php echo $sys['domain']; ?>/whitelistAddressHistory.php"target="_blank">whitelisted</a> in your <?php echo $sys['companyName']; ?> account.</span><br>
                                            <span>If ​1​ = whitelisted.</span><br>
                                            <span>If ​0​ = not whitelisted.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>errorMessage</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>Insufficient balance</span><br>
                                            <span>If the requests have failed to process, it will return the error info here.</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>errorType</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>destination</span><br>
                                            <span>If the requests have failed to process, it will return the error type here.</span> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>errorCode</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>E10000</span><br>
                                            <span>If the requests have failed to process, it will return the error code here.</span> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-row-definition">
                                            <span>balance</span>
                                            </td>
                                            <td class="table-row-definition">
                                            <span>Example:</span><br>
                                            <span>20000000</span><br>
                                            <span>The balance of Fund Out Address.</span> 
                                            </td>
                                        </tr>


                                    </tbody>
                            </table>
                    </div>
                </div>

                <div class="col-6">
                    <div>
                            <div class="greyBox">
                                <div>
                                    <div class="greyBoxTopBar">If Request is Success:</div>
                                </div>
                        <pre class="scroll">
<code class="codeStyle">{
    "code": 1,
    "message": "SUCCESS", "message_d": "Success", 
    "data": {
        "referenceID": "test",
        "transactionHash": "0x5eb98f8f65ac07fed0d0b1d4be264875da58b37d71f8e02b05d4cb50d2172222",
        "amountDetails": {
            "amount": "10.000000", "unit": "USDT", "walletType": "tetherusd", "exchangeRate": {
            "USD": "0.99918496" },
            "transactionHash": "0x5eb98f8f65ac07fed0d0b1d4be264875da58b37d71f8e02b05d4cb50d2172222"
        }, 
        "serviceChargeDetails": {
            "amount": "1.000000", "unit": "USDT", "walletType": "tetherusd", "exchangeRate": {
            "USD": "0.99918496" },
            "transactionHash": "0x762a0796d08e32975083b6b6e5caa752c9bc4d85995afee211c3a2859f4a31df"
        }, 
        "feeChargeDetails": {
            "amount": "0.278026", "unit": "USDT", "walletType": "tetherusd",
            If the requests have failed to process, it will return the error code here.
            balance
            Example:
            20000000
            The balance of Fund Out Address.
        "exchangeRate": { 
            "USD": "0.99918496"
        }, 
        "transactionHash":"0x09aef2d60c10ff068394bcdd6b2b80b5412bedcb25ecba2ee44c1459097dee23" },
        "confirmation": 0,
        "status": "pending",
        "time": "2020-11-04 14:09:12", "successTime": "",
        "whitelist": "Address is whitelisted.", "isWhitelist": "1"
    }
}</code>
                        </pre>
                        </div>
                    </div>
                    <div class="scroll">
                        <div class="greyBox">
                            <div>
                                <div class="greyBoxTopBar">Error when Insufficient balance in fund out address:</div>
                            </div>
                    <pre>
<code class="codeStyle">{
    "code": 0,
    "message": "FAILED",
    "message_d": "Insufficient balance", 
    "data": {
        "errorCode": "E10000",
        "errorMessage": "Insufficient balance", "totalTokenAmount": "110279478", "balance": 20000000,
        "referenceID": "test"
    }
}</code>
                    </pre>
                        </div>
                    </div>

                    <div class="scroll">
                        <div class="greyBox">
                            <div>
                                <div class="greyBoxTopBar">Error When Address did not whitelist:</div>
                            </div>
                    <pre>
<code class="codeStyle">{
    "code": 0,
    "message": "FAILED",
    "message_d": "Address are not whitelisted.", 
    "data": {
        "errorMessage": "Address are not whitelisted.", "errorType": "destination",
        "isWhitelist": "0",
        "referenceID": "test"
    }
}</code>
                    </pre>
                        </div>
                    </div>
                  
                
                
                
                
                
                </div>


                

            </div>

            <div class="divDivider"></div>

            <div class="divArea col-12">
                <div class="col-6">
                    <span class="doc-font">
                    After <?php echo $sys['companyName']; ?> have successfully received the request, while there’s updates on the transaction status, it will make a callback to your ​Callback URL​ as below:
                    <br></br>
                    <b>Attribute:</b>
                    <br></br>
                    </span>
                    
                    <div>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>command</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>externalFundOutCallback</span><br>
                                        <span>This command will return the type of request callback.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>params</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>The details of the callback will be in the data object.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>referenceID</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>invoice001</span><br>
                                        <span>This data is for you to identify the transaction while you request <a href="<?php echo $sys['domain']; ?>/requestFundAfterLogin.php"target="_blank">Fund Out </a> via <?php echo $sys['companyName']; ?> API.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>transactionToken</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>f072043dd4a7a9573a3cc3305a85fe2d</span><br>
                                        <span>The transactionToken is to identify the validity of this transaction with the blockchain network.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>transactionHash</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>0x5eb98f8f65ac07fed0d0b1d4be264875da58b37<br>d71f8e02b05d4cb50d2172222</span><br>
                                        <span>The transactionHash is the unique hash for this fund out request from Fund Out address to recipient address.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>amountDetails</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>This object is the transaction amount from fund out address to recipient wallet address.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>amount</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>12.008900</span><br>
                                        <span>The transaction amount is return in decimal value.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>unit</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>USDT</span><br>
                                        <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of the transaction in symbol.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>walletType</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>tetherusd</span><br>
                                        <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of this transaction.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>exchangeRate</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>This object will provide the conversion rate of the wallet_type in fiat currency</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>USD</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>0.99918496</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>transactionHash</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>0x5eb98f8f65ac07fed0d0b1d4be264875da58b37<br>d71f8e02b05d4cb50d2172222</span><br>
                                        <span>The transactionHash is the unique hash for this fund out request from Fund Out address to recipient address.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>serviceChargeDetails</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>This object is the transaction amount from fund out address to <?php echo $sys['companyName']; ?> service charge wallet address.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>amount</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>12.008900</span><br>
                                        <span>The service charge amount is return in decimal value.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>unit</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>USDT</span><br>
                                        <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of the transaction in symbol.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>walletType</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>tetherusd</span><br>
                                        <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of this transaction.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>exchangeRate</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>This object will provide the conversion rate of the wallet_type in fiat currency</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>USD</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>0.99918496</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>transactionHash</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>0x5eb98f8f65ac07fed0d0b1d4be264875da58b37<br>d71f8e02b05d4cb50d2172222</span><br>
                                        <span>The transactionHash is the unique hash for this fund out request from Fund Out address to <?php echo $sys['companyName']; ?> service charge wallet address.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>feeChargeDetails</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>This object is the transaction amount from fund out address to <?php echo $sys['companyName']; ?> miner/gas fee wallet address.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>amount</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>12.008900</span><br>
                                        <span>The miner fee amount is return in decimal value.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>unit</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>USDT</span><br>
                                        <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of the transaction in symbol.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>walletType</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>tetherusd</span><br>
                                        <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of this transaction.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>exchangeRate</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>This object will provide the conversion rate of the wallet_type in fiat currency</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>USD</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>0.99918496</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>transactionHash</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>0x5eb98f8f65ac07fed0d0b1d4be264875da58b37<br>d71f8e02b05d4cb50d2172222</span><br>
                                        <span>The transactionHash is the unique hash for this fund out request from Fund Out address to <?php echo $sys['companyName']; ?> miner/gas fee wallet address.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>feeDetails</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>This object is the transaction amount from fund out address to <?php echo $sys['companyName']; ?> miner/gas fee in actual wallet address.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>amount</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>0.00054000</span><br>
                                        <span>The miner fee amount is return in decimal value.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>unit</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>ETH</span><br>
                                        <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of the transaction in symbol.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>walletType</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>ethereum</span><br>
                                        <span>The <a href="<?php echo $sys['domain']; ?>/settingsWithdrawalWallet.php"target="_blank">wallet_type</a> of this transaction.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>exchangeRate</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>This object will provide the conversion rate of the wallet_type in fiat currency</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>USD</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>461.95000000</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>confirmation</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>78</span><br>
                                        <span>This is the confirmation of this transaction from Fund Out Address to Recipient Wallet Address in blockchain network.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>status</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>confirmed</span><br>
                                        <span>The status of the transaction in blockchain network.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>time</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>2020-11-11 11:14:29</span><br>
                                        <span>The timing while returning this callback.</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-row-definition">
                                        <span>successTime</span>
                                        </td>
                                        <td class="table-row-definition">
                                        <span>Example:</span><br>
                                        <span>2020-11-11 11:14:38</span><br>
                                        <span>This is the timing while returning this callback with status of success.</span>
                                        </td>
                                    </tr>

                                </tbody>
                        </table>
                    </div>
                </div>        
                
                <div class="col-6">
                    <div class="scroll">
                        <div class="greyBox">
                            <div>
                                <div class="greyBoxTopBar">Example of Callback Data:</div>
                            </div>
                    <pre>
<code class="codeStyle">{
    "command": "externalFundOutCallback", "params": {
        "referenceID": 0,
        "transactionHash": "0x5eb98f8f65ac07fed0d0b1d4be264875da58b37d71f8e02b05d4cb50d2172222",
        "amountDetails": {
            "amount": "10.000000", "unit": "USDT", "walletType": "tetherUSD", "exchangeRate": {
            "USD": "382.73742481" },
            "transactionHash": "0x5eb98f8f65ac07fed0d0b1d4be264875da58b37d71f8e02b05d4cb50d2172222"
        }, 
        "serviceChargeDetails": {
            "amount": "1.000000", "unit": "USDT", "walletType": "tetherUSD", "exchangeRate": {
            "USD": "382.73742481"
        }, "transactionHash":"0x762a0796d08e32975083b6b6e5caa752c9bc4d85995afee211c3a2859f4a31df" },
        "feeChargeDetails": { 
            "amount": "0.278026", "unit": "USDT", "walletType": "tetherUSD", "exchangeRate": {
            "USD": "382.73742481" },
            "transactionHash": "0x09aef2d60c10ff068394bcdd6b2b80b5412bedcb25ecba2ee44c1459097dee23"
        },
        "confirmation": 52,
        "status": "confirmed",
        "time": "2020-11-04 14:09:07", "successTime": "2020-11-04 14:08:42"
    }
}</code>
                    </pre>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    
    </div>
</div>


<style>
.codeStyle{
background-color: rgb(128,128,128);
padding: 2px;
padding-left:10px;
color: white;
  
}
.divArea{
display: flex;
flex-direction: row;
}
.divDivider{
border-bottom:1px solid #e3e8ee;
height: 1px;
margin-top: 50px;
margin-left: auto;
margin-right: auto;
margin-bottom: 50px;
width: calc(100% - 10vw);
max-width:calc(1200px + 5vw);
}

.greyBoxTopBar{
 background-color:rgb(105,105,105);
 border-radius:8px;
 padding:5px;
 padding-left:10px;
 color:white;
}
.greyBox{
 background-color:rgb(128,128,128);
 border-radius:8px;
}

.whiteBoxTopBar{
 background-color:rgb(128,128,128);
 border-radius:8px;
 padding:5px;
 padding-left:10px;
}
.whiteBox{
 /* background-color: #fafaff; */
 border-radius:8px;
 text-align:center;
}

.tableTopBar{
background-color: #e3e8e;
border-radius:8px;
padding:5px;
padding-left:10px;
}

.table{
background-color: #f7faf;
margin-bottom: 12px;
border-radius:8px;
/* display:flex; */
}

.table-row-property{
    width: 150px;
    /* font-weight: 600; */
    text-align: right;
    display: table-cell;
    padding: 9px 30px;
    font-size: 13px;
    vertical-align: top;
}

.table-row-definition{
    display: table-cell;
    padding: 9px 30px;
    font-size: 13px;
    vertical-align: top;
}
.scroll {
  /* background-color: #fed9ff; */
  /* width: 300px; */
  height: 300px; 
  overflow-x: auto;
  overflow-y: auto;
  border-radius:8px;

  /* text-align: center; */
  /* padding: 20px; */
}

.indent {
  text-indent: 50px;
}

</style>