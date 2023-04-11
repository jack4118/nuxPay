//var business_id = "10064";
// BOSH服务端点
var serverURL = "https://thenux.com/";
var BOSH_SERVICE = 'https://prod.xun.global:5280/bosh/';
var socketUrl = "public.prod.xun.global";
var jidDomain = "@prod.xun.global";
var business_contact_us_url = "";
var unreadCount = 0;
var Gab = {
  jid_to_id: function (jid) {
        return Strophe.getBareJidFromJid(jid)
            .replace(/@/g, "-")
            .replace(/\./g, "-");
    },
  on_message: function (message) {
    var msgLayer = $(message).find("message");
    var msgBody = $(msgLayer).find("body");
    var xmppEvent;
    if($(msgLayer).find("composing").length){
      xmppEvent = $(msgLayer).find("composing");
    }else{
      xmppEvent = $(msgLayer).find("paused");
    }
    if(xmppEvent.length){
      
      if(xmppEvent.prop("tagName") == "composing"){
        $('.chat-messages').append('<div class="message isTypingBubble"><div class="message-content"><i class="la la-pencil pr-2 isTyping isTyping" style="font-size: 1.2rem;"></i><span class="isTyping">Is typing...</span></div></div>');
      }else{
        $(".isTypingBubble").remove();
      }
    }
    
    var livechatData = $(message).find("livechat");

    if(msgBody.length){

      var senderJID = $(msgLayer).find("sender_jid").text();

      if(msgBody.length && Strophe.getBareJidFromJid(connection.jid) != Strophe.getBareJidFromJid(senderJID) && senderJID){
        $('.chat-messages').append('<div class="message"><div class="message-content" data-time='+getNow()+'>' + msgBody.text() + '</div></div>');
        var $messages_w = $('#msgDiv');
        $messages_w.scrollTop($messages_w.prop("scrollHeight"));
        var temp_to_ID = msgLayer.attr("from").split('\\');
        sendMsgAcknowledgement(temp_to_ID[0],msgLayer.attr("id"));
        unreadCount++;
        parent.postMessage({event:"showUnread",data:unreadCount}, "*");
      }
      cacheMsg();
    }else if(livechatData.length){
      if($(livechatData).find("status").text() == "accepted"){
        $("#tagName").html($(livechatData).find("name").text());
        $("#businessName").html(getCookie("tagName"));
        $("#startChatBox").removeClass("waiting");
        $(".message").show();
        setCookie("agentName", $(livechatData).find("name").text(), 1);
        setCookie("accepted", 1, 1);
      }else if($(livechatData).find("status").text() == "standup" || $(livechatData).find("status").text() == "closed"){
        $("#startChatBox").addClass("waiting");
        $(".message").hide();
        $("#tagName").html(getCookie("tagName"));
        setCookie("accepted", 0, 1);
      }
      
      setCookie("businessName", "Employee", 1);
    }

        var full_jid = $(message).attr('from');
        var jid = Strophe.getBareJidFromJid(full_jid);
        var jid_id = Gab.jid_to_id(jid);        

        return true;
    }
}

function formatXml(xml) {
  var formatted = '';
  var reg = /(>)(<)(\/*)/g;
  xml = xml.replace(reg, '$1\r\n$2$3');
  var pad = 0;
  jQuery.each(xml.split('\r\n'), function (index, node) {
    var indent = 0;
    if (node.match(/.+<\/\w[^>]*>$/)) {
      indent = 0;
    } else if (node.match(/^<\/\w/)) {
      if (pad != 0) {
        pad -= 1;
      }
    } else if (node.match(/^<\w[^>]*[^\/]>.*$/)) {
      indent = 1;
    } else {
      indent = 0;
    }

    var padding = '';
    for (var i = 0; i < pad; i++) {
      padding += '  ';
    }

    formatted += padding + node + '\r\n';
    pad += indent;
  });

  xml_escaped = formatted.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/ /g, '&nbsp;').replace(/\n/g, '');
  return xml_escaped;
}

var connection = null;

function log(msg, sent) {
  if (sent) {
     console.log("SENT");

     console.log($('<textarea/>').html(msg).text());
    
  } else {

     //console.log("RECV");
     //console.log($('<textarea/>').html(msg).text());

  }
}
function rawInput(data) {
  log(formatXml(data), false);
}
function rawOutput(data) {
  log(formatXml(data), true);
}


function onConnect(status) {
  if (status == Strophe.Status.CONNECTING) {
    log('Strophe is connecting.');
  } else if (status == Strophe.Status.CONNFAIL) {
    log('Strophe failed to connect.');
    $('#connect').get(0).value = 'connect';
  } else if (status == Strophe.Status.DISCONNECTING) {
    log('Strophe is disconnecting.');
  } else if (status == Strophe.Status.DISCONNECTED) {
    log('Strophe is disconnected.');
    $('#connect').get(0).value = 'connect';
  } else if (status == Strophe.Status.CONNECTED) {
    log('Strophe is connected.');
    setName();
    $(document).trigger('connected');
  }else if (status == Strophe.Status.ATTACHED) {
    log('Strophe is ATTACHED.');
    initialiseHandler();
  }
}

function setName(){
    let iq = $iq({'type':'set', 
                  'id':connection.getUniqueId()
                }).c('query', {'xmlns':'urn:xmpp:xun:public:user:info'
                }).c("nick",$("#nickname").val()).up()
                .c("email",$("#email").val()).up()
                .c("business_id",business_id).up()
                .c("business_tag",getCookie("selectedTag")).up();
    connection.sendIQ(iq);
}
function sendMsg(msg){
  var jid = connection.jid;
  if(msg){
    var body = msg;
  }else{
    if($("#message-input").val().trim().length > 0){
      var body = $("#message-input").val();
    }else{
      return;
    }
  }

  $("#message-input").val('');

  var message = $msg({from: jid,
                      to: business_id+jidDomain,
                      "type": "chat",
                      "id" : connection.getUniqueId()})
      .c('body').t(body).up()
      .c('business', {xmlns: "business","id":business_id}).up()
      .c('sender_name', $("#nickname").val()).up()
      .c('tag', getCookie("selectedTag"));
  connection.send(message);
}
function sendMsgAcknowledgement(to_ID,msgID){
  var jid = connection.jid;


  var acknowledgement = $msg({
                      to: to_ID,
                      type:"chat",
                      })
                      .c('received',{xmlns: "urn:xmpp:receipts","id":msgID,"type":"groupchat"}).up()
                      .c('business', {xmlns: "business","id":business_id}).up()
                      .c('tag', {xmlns: "business"}).t(getCookie("selectedTag"));
  connection.send(acknowledgement);
}

function initialiseHandler(){
  var iq = $iq({type: 'get'}).c('query', {xmlns: 'jabber:iq:roster'});
    Gab.connection.send($pres().c("show","chat"));

    Gab.connection.addHandler(Gab.on_roster_changed,
                              "jabber:iq:roster", "iq", "set");

    Gab.connection.addHandler(Gab.on_message,
                              null, "message");
}

function getDepartment(){

  var url             = serverURL+'scripts/reqTag.php';
  var method          = 'POST';
  var debug           = 0;
  var bypassBlocking  = 0;
  var bypassLoading   = 0;
  var pageNumber      = 1;
  var formData        = "";
  var fCallback       = "";

      
      fCallback = buildTagList;
      formData  = {
          command: 'tagList',
          businessID: business_id
      };

      ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

      


  
}
function buildTagList(data,message){

  var d = new Date();
  var now = Math.round(d.getTime()/1000);

  for(var i=0; i<data.result.length; i++) {
    if(data.result[i]["working_hour_from"].length == 0){
      var from_total = 0;
      var to_total = 0;
    }else{
      var from_split = data.result[i]["working_hour_from"].split(":");

      var utcYMD = new Date();
      utcYMD.setUTCFullYear(d.getUTCFullYear());
      utcYMD.setUTCMonth(d.getUTCMonth());
      utcYMD.setUTCDate(d.getUTCDate());
      utcYMD.setUTCHours(from_split[0]);
      utcYMD.setUTCMinutes(from_split[1]);
      utcYMD.setUTCSeconds(from_split[2]);

      var from_total = Math.round(utcYMD.getTime()/1000);


      var to_split = data.result[i]["working_hour_to"].split(":");

      utcYMD.setUTCHours(to_split[0]);
      utcYMD.setUTCMinutes(to_split[1]);
      utcYMD.setUTCSeconds(to_split[2]);


      var to_total = Math.round(utcYMD.getTime()/1000);
    }
    $('#tagListBox').append('<option value="'+data.result[i]["tag"]+'" data-from="'+from_total+'" data-to="'+to_total+'">'+data.result[i]["tag"]+'</option>');
  };
}
function getBusiness(data,message){

  if(data.xun_business.business_profile_picture_url.length == 0){

    $("#profileImg").attr("src","images/defaultBusiness.png");
    $("#waitingImg").attr("src","images/defaultBusiness.png");
  }else{
    $("#profileImg").attr("src",data.xun_business.business_profile_picture_url);
    $("#waitingImg").attr("src",data.xun_business.business_profile_picture_url);
  }
  if(data.xun_business.business_name.length > 0){

    $("#businessName").html(data.xun_business.business_name);
    setCookie("businessName", data.xun_business.business_name, 1);
  }
  if(data.xun_business.liveChatInfo[0].length){
    $("#firstCol").html(data.xun_business.liveChatInfo[0]);

  }
  if(data.xun_business.liveChatInfo[1].length){
    $("#secondCol").html(data.xun_business.liveChatInfo[1]);
    
  }

  business_contact_us_url = data.xun_business.business_contact_us_url;
}

function initialise(){


  $("#close, #close2").click(function(){
    unreadCount = 0;
    parent.postMessage({event:"closeLiveChat"}, "*");

    return false;
  });
  $('.message-input').on('keypress', function (e) {

    if (e.which == 13 && $(this).val().trim().length) {
      
      return false;
    }
  });

  $('#startChatBtn').bind('click', function () {

    if(!$("#nickname").val()){
      alert("Please key in your name.");
      $("#nickname").focus();
      return;
    }else if(!$("#email").val()){
      alert("Please key in your email.");
      $("#email").focus();
      return;
    }

    if(!validateEmail($("#email").val())){
      alert("Please key in valid email.");
      return;
    }

    $("#beforeStartChatBox").addClass("hide");
    $("#startChatBox").removeClass("hide");
    
    $("#tagName").html($("#tagListBox").val());


    var d = new Date();
    var now = Math.round(d.getTime()/1000);

    $('select').change(function(){
       var selected = $(this).find('option:selected');
       var extra = selected.data('foo'); 
    });

    var from_date = new Date($( "#tagListBox option:selected" ).data('from')*1000);
    // console.log("from_date =" +from_date.toString());
    // Hours part from the timestamp
    var from_hours = from_date.getHours();
    if(from_hours < 10)from_hours = "0"+from_hours;
    // Minutes part from the timestamp
    var from_minutes = from_date.getMinutes();
    if(from_minutes < 10)from_minutes = "0"+from_minutes;
    var from = from_hours+":"+from_minutes;

    var to_date = new Date($( "#tagListBox option:selected" ).data('to')*1000);
    // console.log("to_date =" +to_date.toString());
    // Hours part from the timestamp
    var to_hours = to_date.getHours();
    if(to_hours < 10)to_hours = "0"+to_hours;
    // Minutes part from the timestamp
    var to_minutes =  to_date.getMinutes();

    if(to_minutes < 10)to_minutes = "0"+to_minutes;
    var to = to_hours+":"+to_minutes;

    if($( "#tagListBox option:selected" ).data('from') != 0){

      $("#workingHourText").html("Working Hours: "+from+"-"+to);
    }else{
      $("#workingHourText").html("");
    }
    $("#contact_us_url_href").attr("href", business_contact_us_url);
    

    if((((d.getHours() < from_hours) || (d.getHours() == from_hours && d.getMinutes() < from_minutes)) || 
      ((d.getHours() > to_hours) || (d.getHours() == to_hours && d.getMinutes() > to_minutes))) && $( "#tagListBox option:selected" ).data('from') != 0){
      // console.log("outOfHours")
  
      // console.log("Working Hours: "+from+"-"+to);
      $("#startChatBox").addClass("outOfHours");
      if(business_contact_us_url.length > 0){
        $("#contact_us_sentences").show();
        $("#contact_us_url_href").attr("href", business_contact_us_url);

      }
      if(business_contact_us_url.length > 0){
        $("#contact_us_sentences").show();

      }
      
    }else{
      $("#startChatBox").addClass("waiting");
      setCookie("tagName", $("#tagListBox").val(), 1 );
      setCookie("selectedTag", $("#tagListBox").val(), 1 );
      connection.connect(socketUrl,
             null,
             onConnect);
      Gab.connection = connection;
      window.setTimeout(function(){
          $("#startChatBox").addClass("outOfHours");
          // console.log("timer!!!");
          if(business_contact_us_url.length > 0){
            $("#contact_us_sentences").show();
            //connection.disconnect();
          }
        }, 
        60000);
    }

 
    

    
  });
}

function addUnloadEvent(){
  window.onbeforeunload = function (e) {
    e = e || window.event;

    // For IE and Firefox prior to version 4
    if (e) {
        e.returnValue = 'Sure?';
    }

    // For Safari
    return 'Sure?';
  };
}

$(document).ready(function () {

  //addUnloadEvent();

  $("#liveChatSendTranscriptBtn").click(function() {
    emailTranscript();
    swal({
        position:"center",
        type:"success",
        title:"Chat transcript already sent to xxx@gmail.com."
    })
  });

  // Create IE + others compatible event handler
  var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
  var eventer = window[eventMethod];
  var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

  eventer(messageEvent,function(e) {

    if(e.data.event == "showLiveChat"){
      unreadCount = 0;     
    }
    
  },false);


  // in itialise 
  getDepartment();
  ajaxSend(serverURL+'scripts/reqTag.php', {command: 'getBusinessProfile',businessID:business_id}, "POST", getBusiness, "", "", "", "");
  initialise();

  var options = {
    'mechanisms': [
        Strophe.SASLAnonymous,
    ],
    'keepalive': true    
  };

  // connect to xmpp 
  connection = new Strophe.Connection(BOSH_SERVICE,options);

  // log
  connection.rawInput = rawInput;
  connection.rawOutput = rawOutput;
  var restoreConnectionFlag = true;

  // try reconnect
  try {
    Gab.connection = connection;
    connection.restore(null, onConnect);
    

  } catch(e) {
    restoreConnectionFlag = false;
  }

  if(restoreConnectionFlag){
    $("#beforeStartChatBox").addClass("hide");
    $("#startChatBox").removeClass("hide");

    if(getCookie("accepted") == "1"){
      $("#startChatBox").removeClass("waiting");
      //console.log(localStorage.getItem("msg"));
      $("#msgDiv > .outHoursAccept").remove();
      $("#msgDiv > .outHoursText").remove();
      $("#msgDiv").append(localStorage.getItem("msg"));
      var $messages_w = $('#msgDiv');
      $messages_w.scrollTop($messages_w.prop("scrollHeight"));
      $("#tagName").html(getCookie("agentName"));
    }else{
      $("#tagName").html(getCookie("tagName"));
    }

    $("#beforeStartChatBox").addClass("hide");
    
    $("#businessName").html(getCookie("businessName"));



  }else{
    setCookie("accepted", "0", 1 );
  }  

  $('#online').bind('click', function () {
    var button = $('#online').get(0);
    if (button.value == 'online') {
      button.value = 'offline';
      online();
    } else {
      button.value = 'online';
      offline();
    }
  });

  /*$('#composing').bind('click', function () {
    Chat.changeStatus(CHAT_STATUS.COMPOSING);
  });
  $('#paused').bind('click', function () {
    Chat.changeStatus(CHAT_STATUS.PAUSED);
  });
  $('#gone').bind('click', function () {
    Chat.changeStatus(CHAT_STATUS.GONE);
  });
  $('#inactive').bind('click', function () {
    Chat.changeStatus(CHAT_STATUS.INACTIVE);
  });
  $('#active').bind('click', function () {
    Chat.changeStatus(CHAT_STATUS.ACTIVE);
  });*/

  
  $('#send').bind('click', function () {
    sendMsg();
  });
  $('.message-input').on('keypress', function (e) {
    if (e.which == 13 && $(this).val().trim().length) {
      $('.chat-messages').append('<div class="message self"><div class="message-content"  data-time='+getNow()+'><span>' + $(this).val() + '</span></div></div>');
      //$(this).val('');
      var $messages_w = $('#msgDiv');
      $messages_w.scrollTop($messages_w.prop("scrollHeight"));
      cacheMsg();
      sendMsg();
      return false;
    }
  });

  $(document).bind('connected', function () {
    // console.log("connected!");
    var iq = $iq({type: 'get'}).c('query', {xmlns: 'jabber:iq:roster'});
    Gab.connection.send($pres().c("show","chat"));

    Gab.connection.addHandler(Gab.on_roster_changed,
                              "jabber:iq:roster", "iq", "set");

    Gab.connection.addHandler(Gab.on_message,
                              null, "message");
    sendMsg($("#nickname").val()+" send in enquiry.\nEmail : "+$("#email").val());


  });
});

function ajaxSend(url, val, method, fCallback, debug, bypassBlocking, bypassLoading, importFlag) {
    // console.log('ajaxSend');
     // console.log(window.ajaxEnabled);
    //if(!window.ajaxEnabled)
    //    return false;
    method = method || "POST";
    bypassBlocking = bypassBlocking || 0;
    debug = debug || 0;
    bypassLoading = bypassLoading || 0;
    
    var contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
    var processData = true;
    if(importFlag == 1){
        contentType = false;
        processData = false;
    }

    var ajaxBlocking = 0;
    if(!bypassLoading)
        showCanvas();
    
    if(debug) 
        console.log("url:"+url+" ## val:"+JSON.stringify(val, null, 4)+" ## method:"+method+" ## fCallback:"+fCallback.name+" ## debug:"+debug+" ## bypassBlocking:"+bypassBlocking+" ## ajaxBlocking:"+ajaxBlocking);
    
    if(ajaxBlocking === 0 || bypassBlocking){//prevent spam click
        //console.log('ajaxSendStart');
        ajaxBlocking = 1;
        $.ajax({
            url: url,
            type: method,
            data: val,
            contentType: contentType,
            processData: processData,
//            async: true,
        success: function(result){
                //console.log('ajaxSendSuccess');
                //if(!result)
                    //showMessage('Some error occurred', 'danger', 'No results found.', '', '');
                 //console.log('printing result');
                var obj = JSON.parse(result);
                //console.log('obj result');
                // console.log(obj);
                // var obj = result;
                if(debug)
                    console.log(obj);
                if (debug == 2) {
                    /* For testing API in Super Admin Site */
                    fCallback(obj);
                }
                else {
                    // alert('wait');
                    if (obj.code == '1') {
                        if (typeof(fCallback) == 'function')
                            fCallback(obj, obj.message_d, obj);
                    }
                 else {
                    errorHandler(obj.code, obj.message, obj.message_d);
                }
            }

        },
        error: function(xhr) {
                //alert('ajaxSendError');
                //alert(xhr);
                //alert(xhr.status);
                //alert(xhr.statusText);

                if(debug)
                    console.log(xhr);
                var message = xhr.status + ' ' + xhr.statusText;
                //showMessage(xhr.responseText, 'danger', message, '', '');
            },
            complete: function() {
                //alert('ajaxSendComplete');
                ajaxBlocking = 0;
                if(!bypassLoading)
                    hideCanvas();
            }
        });
    }
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function cacheMsg(){
  localStorage["msg"] = $("#msgDiv").html();
}

function emailTranscript(){
  var string = "";
  $(".message").each(function( index ) {
    if($(this).children(".message-content").length){
      if($( this ).hasClass("self")){
        string += "[self@"+$(this).children(".message-content").data("time")+"] : "+$(this).children(".message-content").text()+"\n";

      }else{
        string += "["+getCookie("agentName")+"@"+$(this).children(".message-content").data("time")+"] : "+$(this).children(".message-content").text()+"\n"; 
      }
    }

  });
  console.log( "string");
  console.log( string);
}

function getNow () {
  now = new Date();
  year = "" + now.getFullYear();
  month = "" + (now.getMonth() + 1); if (month.length == 1) { month = "0" + month; }
  day = "" + now.getDate(); if (day.length == 1) { day = "0" + day; }
  hour = "" + now.getHours(); if (hour.length == 1) { hour = "0" + hour; }
  minute = "" + now.getMinutes(); if (minute.length == 1) { minute = "0" + minute; }
  second = "" + now.getSeconds(); if (second.length == 1) { second = "0" + second; }
  return String(year + "-" + month + "-" + day + "_" + hour + ":" + minute + ":" + second);
}
