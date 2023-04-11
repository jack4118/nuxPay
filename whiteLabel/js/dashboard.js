function dashboardCallback(data, debug){
	ajaxBlocking = 0;

	console.log(data);
    var json = JSON.parse(data);

    	switch(json.viewType){
        	case "getUsageList":

            	var content = "";
        		    content += '<img id="boxImage" src="img/dashboard-box.png" alt="avatar" class="absolute" width="100%" height="100%">';
                content += '    <div class="widget-image-content">';
                content += '        <span class="text-15 m-r-rem3"><b>Monthly Usage</b></span>';
                content += '        <div id="dateMonthly" class="btn-group">';
                if(json.startDate != null && json.endDate != null) {

                    content += '        <a id="selectedDateRange2" href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle">'+json.startDate+' / '+json.endDate+' <span class="caret m-l-rem1"></span></a>';
                
                }else{

                content += '        <a id="selectedDateRange2" href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle">'+json.data.monthlyUsage.date.item[0].createOn+' <span class="caret m-l-rem1"></span></a>';
                
                }

                content += '        <ul class="dropdown-menu m-l-rem2" style="min-height: 50px; height: 100px; overflow-y: scroll;">';
                
                if(typeof json.data.monthlyUsage.date.item !== "undefined" && Object.keys(json.data.monthlyUsage.date.item).length !== 0){
                	
                	var monthlyDate = json.data.monthlyUsage.date.item
                	if(monthlyDate.length > 0){
                		for(var i = 0 ; i < monthlyDate.length; i++ ){

                content += '            <li>';
                content += '                <a class="dateRangeSelection" href="javascript:void(0)">';						
                content += '                    '+json.data.monthlyUsage.date.item[i].createOn+'';
                content += '                </a>';
                content += '            </li>';
                content += '            <li class="divider"></li>';

                		}
                	}else{

                content += '            <li>';
                content += '                <a class="dateRangeSelection" href="javascript:void(0)">';						
                content += '                    '+json.data.monthlyUsage.date.item.createOn+'';
                content += '                </a>';
                content += '            </li>';
                content += '            <li class="divider"></li>';

                	}
                }else{
               	content += '            <li>';
                content += '                <a href="javascript:void(0)">';						
                content += '                    No Date';
                content += '                </a>';
                content += '            </li>';
                }

                content += '        </ul>';
                content += '   </div>';
                content += '        <br><br>';
                content += '        <span class="text-25 m-l-rem1">'+json.data.monthlyUsage.balance+'</span>';
                content += '        <span class="m-l-rem3">Received</span>';
                content += '        <br><br>';
                content += '        <div class="progress progress-striped active">';
                content += '    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: '+json.data.monthlyUsage.percentageUsage+'%"></div>';
                content += '</div>';
                content += '<span class="pull-right">'+json.data.monthlyUsage.messageUsed+' / '+json.data.monthlyUsage.messageTotal+' Messages</span>';
                content += '    </div>';

            $("#usageMonthlyList").empty().append(content);

            $(".dateRangeSelection").click(function(){
                // console.log($(this).text().trim());

                $("#selectedDateRange2").text($(this).text().trim());

                var dateRangeAry = $(this).text().trim().split(" - ");
                var startDateAry = dateRangeAry[0].split("/");
                var endDateAry = dateRangeAry[1].split("/");

                // console.log(startDateAry);

                var startDate = startDateAry[0] + "-" + startDateAry[1] + "-" + startDateAry[2];
                var endDate = endDateAry[0] + "-" + endDateAry[1] + "-" + endDateAry[2];

                var data ={
                    'command' : 'getUsage',
                    'viewType' : 'getUsageList',
                    'startDate' : startDate,
                    'endDate' : endDate
                };

            });

            break;


           	case "smallSubscriptionBox":

           		var subBox = "";

           		
                subBox += '                    <div class="m-portlet m-portlet--tab">';
                subBox += '                        <div class="m-portlet__head">';
                subBox += '                            <div class="m-portlet__head-caption">';
                subBox += '                                <div class="m-portlet__head-title">';
                subBox += '                                    <span class="m-portlet__head-icon m--hide">';
                subBox += '                                        <i class="la la-gear"></i>';
                subBox += '                                    </span>';
                subBox += '                                                    <h3 class="m-portlet__head-text">';
                subBox += '                                        My Subscription';
                subBox += '                                    </h3>';
                subBox += '                                </div>';
                subBox += '                            </div>';
                subBox += '                        </div>';                            
                subBox += '                        <div class="m-portlet__body">';
                subBox += '                                <div class="text-center">';                        
                subBox += '                                        <h3 style="color: #28b214;text-transform: uppercase;">'+json.result.package_description+'</h3>';
                subBox += '                                        <span>Current Plan</span>';
                subBox += '                        </div>';
                subBox += '           </div>';
                subBox += '           <div class="m-portlet__foot">';                                        
                subBox += '                   <div class="row text-center">';                                        
                subBox += '                       <div class="col-6 my-3" style="border-right: 1px solid #ebedf2">';             
                subBox += '                           <h5>'+json.result.package_start_date+ '</h5>';                                
                subBox += '                           <span>Date Created </span>';
                subBox += '                        </div>';             
                subBox += '                        <div class=" col-6 my-3">';
                subBox += '                           <h5>'+json.result.package_end_date+'</h5>';             
                subBox += '                           <span>Renewal Date</span>';             
                subBox += '                        </div>';             
                subBox += '                   </div>';             
                subBox += '            </div>';                       
                subBox += '       </div>';            
                
           	$("#smallSubscriptionBox").empty().append(subBox);
           	break;
    }

}

function getRightSidebar(){
    
	var data ={
  		'command' : 'getTopBusinessDetails',
  		'viewType' : 'getRightSidebarList'
 	};

 	jaxSend("scripts/reqOperation.php", data, "POST", dashboardCallback, 0, 1);

}


function getSubscription(){
    // showCanvas();
	var data ={
  		'command' : 'getSmallSubscriptionBox',
  		'viewType' : 'smallSubscriptionBox'
 	};

 	jaxSend("scripts/reqOperation.php", data, "POST", dashboardCallback, 0, 1);
    // hideCanvas();
}


