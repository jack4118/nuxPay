var serverURL = "https://thenux.com/";



if(document.getElementById("liveChatWidgetScript")){
  var scriptLink = document.getElementById("liveChatWidgetScript").src;//$("#xunLiveChatScript").attr("src");
}

if(document.getElementById("xunLiveChatScript")){
  var scriptLink = document.getElementById("xunLiveChatScript").src;//$("#xunLiveChatScript").attr("src");
}

var scriptLinkAry = scriptLink.split("=");
var businessID = scriptLinkAry[1];
//$(document).ready(function () {
document.addEventListener('DOMContentLoaded', function(){ 
    if (!window.jQuery) {  
      var script = document.createElement('script'); 
      document.head.appendChild(script);    
      script.type = 'text/javascript';
      script.src = "//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js";
      script.onload = function(){
        initialise();
        //$('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') );
      } 
    }else{
      initialise();
    } 

    




    
  });
  //});

function initialise(){
  
  var param = {"id":businessID};
  $.ajax({
    url: serverURL+"scripts/reqLiveChat.php",
    type: "POST",
    data: param,
    crossDomain: true,
    beforeSend: function(request) {
      request.setRequestHeader('Access-Control-Allow-Methods' , 'GET,POST,PUT,DELETE,OPTIONS');
      request.setRequestHeader("Access-Control-Allow-Origin", '*');
    },

    contentType: 'application/x-www-form-urlencoded;',

    success: function(result){

      var obj = JSON.parse(result);
      // var obj = result;
      $("body").append(obj.data);
      //$.getScript(serverURL+"js/livechat/main.js?version=4.0.0", function(data, textStatus, jqxhr) {});
      
      //ajaxSend(serverURL+'scripts/reqTag.php', {command: 'getBusinessProfile',businessID:businessID}, "POST", getBusiness, "", "", "", "");

      // Create IE + others compatible event handler
      var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
      var eventer = window[eventMethod];
      var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

      // Listen to message from child window
      eventer(messageEvent,function(e) {
        console.log('parent received message!:  ',e.data);

        if(e.data.event == "closeLiveChat"){
          $('.floated-chat-w').toggleClass('active');
        }
        if(e.data.event == "showUnread"){

          if(!$('.floated-chat-w').hasClass('active')){
            $('#unreadBadges').text(e.data.data);
            $('#unreadBadges').show();
          }

          
        }
      },false);
      
      $('.floated-chat-btn, .floated-chat-w .chat-close').on('click', function () {
        $('.floated-chat-w').toggleClass('active');
        document.getElementById('livechatIframe').contentWindow.postMessage({event:"showLiveChat"}, "*");
        $('#unreadBadges').text(0);
            $('#unreadBadges').hide();
        return false;
      });
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
        
    }
  });
}



