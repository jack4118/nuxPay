function businessProfileCallback(data, debug){
	ajaxBlocking = 0;

	// console.log(data);
    var json = JSON.parse(data);

    	switch(json.viewType){
    		// case "getProfile":
    		// pro = "";
    		// pro += '<form id="clickable-wizard" action="page_forms_wizard.html" method="post" class="form-horizontal form-bordered ui-formwizard">';
      //       pro += '	<div id="clickable-first" class="step ui-formwizard-content tabcontent">';
      //       pro += '    	<div class="form-group text-center">';
      //       pro += '    	<img id="blah" src="img/businessAccount/.png" alt="Upload your photo..." class="w3-circle m-b-rem1" style="width:150px; height:150px;"/>';
      //       pro += '    	<br>';
      //       pro += '    	<span class="text-danger">*</span><span>Photo should be at least 300px x 300px</span>';
      //       pro += '    	</div>';
      //       pro += '    	<div align="center" style="margin-top: 10px; margin-bottom: 10px;">';
      //       pro += '    	<div class="btn btn-themeGreen btn-md">';
      //       pro += '    	<label for="imgInp" class="" style="display:inline; font-weight:400;">Upload Photo</label>';
      //       pro += '    	</div>';
      //       pro += '    	</div>';
      //       pro += '   	 <input type="file" id="imgInp" />';
      //       pro += '	</div>';
      //       pro += '	<div id="clickable-second" class="step ui-formwizard-content tabcontent">';               
      //       pro += '	<div class="form-group">';
      //       pro += '	    <label class="col-md-3  " for="example-clickable-firstname">Business Name</label>';
      //       pro += '	    <div class="col-md-9">';
      //       pro += '	        <input type="text" id="example-clickable-firstname" name="example-clickable-firstname" class="form-control" placeholder="" disabled="disabled">';
      //       pro += '	    </div>';
      //       pro += '	</div>';
      //       pro += '	<div class="form-group">';
      //       pro += '	    <label class="col-md-3" for="example-clickable-lastname">Phone Number</label>';
      //       pro += '	    <div class="col-md-9">';
      //       pro += '	       <input type="text" id="example-clickable-lastname" name="example-clickable-lastname" class="form-control" value="">';
      //       pro += '	    </div>';
      //       pro += '	</div>';
      //       pro += '	<div class="form-group">';
      //       pro += '		<label class="col-md-3" for="example-clickable-country">Business Email</label>';
      //       pro += '    	<div class="col-md-9">';
      //       pro += '    	    <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" value="">';
      //       pro += '    	</div>';
      //       pro += '	</div>';
      //       pro += '	<div class="form-group">';
      //       pro += '	    <label class="col-md-3" for="example-clickable-country">Website</label>';
      //       pro += '	   <div class="col-md-9">';
      //       pro += '	        <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" value="">';
      //       pro += '	    </div>';
      //       pro += '	</div>';
      //       pro += '	<div class="form-group">';
      //       pro += '	    <label class="col-md-3" for="example-clickable-country">Address Line 1</label>';
      //       pro += '	    <div class="col-md-9">';
      //       pro += '	        <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" value="">';
      //       pro += '	    </div>';
      //       pro += '	</div>';
      //       pro += '    <div class="form-group">';
      //       pro += '        <label class="col-md-3" for="example-clickable-country">Address Line 2</label>';
      //       pro += '        <div class="col-md-9">';
      //       pro += '            <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" value="">';
      //       pro += '        </div>';
      //       pro += '    </div>';
      //       pro += '    <div class="form-group">';
      //       pro += '        <label class="col-md-3" for="example-clickable-country">City</label>';
      //       pro += '        <div class="col-md-9">';
      //       pro += '            <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" value="">';
      //       pro += '        </div>';
      //       pro += '    </div>';
      //       pro += '    <div class="form-group">';
      //       pro += '        <label class="col-md-3" for="example-clickable-country">State</label>';
      //       pro += '        <div class="col-md-9">';
      //       pro += '            <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" value="">';
      //       pro += '        </div>';
      //       pro += '    </div>';
      //       pro += '    <div class="form-group">';
      //       pro += '        <label class="col-md-3" for="example-clickable-country">Postal</label>';
      //       pro += '        <div class="col-md-9">';
      //       pro += '            <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" value="">';
      //       pro += '        </div>';
      //       pro += '    </div>';
      //       pro += '    <div class="form-group">';
      //       pro += '        <label class="col-md-3" for="example-clickable-country">Country</label>';
      //       pro += '        <div class="col-md-9">';
      //       pro += '            <input type="text" id="example-clickable-country" name="example-clickable-country" class="form-control" value="">';
      //       pro += '        </div>';
      //       pro += '    </div>';
      //       pro += '	<div class="form-group">';
      //       pro += '	    <label class="col-md-3" for="example-clickable-country">Company Size</label>';
      //       pro += '	    <div class="col-md-9 btn-group">';
      //       pro += '	        <a id="companySizeRange" href="javascript:void(0)" data-toggle="dropdown" class="btn btn-default dropdown-toggle"> Employee<span class="caret m-l-rem1"></span></a>';
      //       pro += '	            <ul class="dropdown-menu text-left">';

      //       // if(typeof json.data.companySize.item !== "undefined" && Object.keys(json.data.companySize.item).length !== 0){
                	
      //       //     	var companySize = json.data.companySize.item
      //       //     	if(companySize.length > 0){
      //       //     		for(var i = 0 ; i < companySize.length; i++ ){

      //       pro += '	                <li class="sizeRange">';
      //       pro += '	                    <a href="javascript:void(0)">';
      //       pro += '	                    Employee';
      //       pro += '	                    </a>';
      //       pro += '	                </li>';
      //       pro += '	                <li class="divider"></li>';

      //       // 			}
      //       // 		}else{

      //       // pro += '	                <li class="sizeRange">';
      //       // pro += '	                    <a href="javascript:void(0)">';
      //       // pro += '	                   '+json.data.companySize.item+'';
      //       // pro += '	                    </a>';
      //       // pro += '	                </li>';
      //       // pro += '	                <li class="divider"></li>';

      //       // 		}
      //       // }else{

      //       // pro += '	                <li class="sizeRange">';
      //       // pro += '					<span>No data</span>'
      //       // pro += '	                </li>';

      //       // }

      //       pro += '                 </ul>';
      //       pro += '        	</div>';
      //       pro += '    	</div>';
      //       pro += '    	<div class="form-group">';
      //       pro += '    	<div class="col-md-9"></div>';
      //       pro += '    	<div class="col-md-3">';
      //       pro += '    	        <button type="button" class="btn btn-themeGreen" style="width: 100%;">Save</button>';
      //       pro += '    	</div>';
      //       pro += '    	</div>';
      //       pro += '	</div>';
      //       pro += '	<div id="clickable-third" class="step ui-formwizard-content tabcontent">';
      //       pro += '	    <div class="form-group">';
      //       pro += '	        <label class="col-md-2 control-label" for="example-clickable-suggestions">Description</label>';
      //       pro += '	        <div class="col-md-10">';
      //       pro += '	            <textarea id="example-clickable-suggestions" name="example-clickable-suggestions" rows="5" class="form-control ui-wizard-content"></textarea>';
      //       pro += '	        </div>';
      //       pro += '	    </div>';
      //       pro += '	<div class="form-group">';
      //       pro += '	<div class="col-md-9"></div>';
      //       pro += '	<div class="col-md-3">';
      //       pro += '        	<button type="button" class="btn btn-themeGreen" style="width: 100%;">Save</button>';
      //       pro += '	</div>';
      //       pro += '	</div>';
      //       pro += '	   </div>';
      //       pro += '</form>';

    		// $("#busienssProfileSite").empty().append(pro);
    		// $(document).ready(function(){
         
      //           $("#clickable-first").show();
      //           $("#clickable-second").hide();
      //           $("#clickable-third").hide();
      //       });

      //       function readURL(input) {
      //           if (input.files && input.files[0]) {
      //           var reader = new FileReader();
            
      //           reader.onload = function (e) {
      //           $('#blah').attr('src', e.target.result);
      //           }
            
      //           reader.readAsDataURL(input.files[0]);
      //           }
      //       }
    
    		// 	$("#imgInp").change(function(){
      //   			readURL(this);
    		// 	});

    		// $(".sizeRange").click(function(){
      //           // console.log($(this).text().trim());

      //           $("#companySizeRange").text($(this).text().trim());

      //           var sizeRangeAry = $(this).text().trim().split(" - ");

      //           // console.log(sizeRangeAry);

      //           var sizeRange = sizeRangeAry[0] + "-" + sizeRangeAry[1];

      //           var data ={
      //               'command' : 'getBusinessDetails',
      //               'viewType' : 'getProfile',
      //               'sizeRange' : sizeRange
      //           };

      //           jaxSend("scripts/reqDashboard.php", data, "POST", dashboardCallback, 0, 0);

      //       });

            

    		// break;


            // case "deleteBusiness":
            // var pop = "";
            // pop += '<div class="modal-dialog">';
            // pop += '    <div class="modal-content">';
            // pop += '        <div class="modal-header bg-w border-b">';
            // pop += '            <button type="button" class="close" data-dismiss="modal">&times;</button>';
            // pop += '            <h4 class="modal-title">Delete Business</h4>';
            // pop += '        </div>';
            // pop += '        <div class="modal-body border-b">';
            // pop += '            <span>You are about to delete your business "ABC Telco". Deleting your business will disable any services associated with your account. Please be sure you are no longer using these services prior to deleting your account.</span>';
            // pop += '            <hr>';
            // pop += '            <input id="tick" type="checkbox" name="" value="Bike" class="m-r-rem1">I understand that by deleting my business will delete all my services.<br>';
            // pop += '        </div>';
            // pop += '    </div>';
            // pop += '    <div class="modal-footer bg-w">';
            // pop += '        <button type="button" class="btn btn-effect-ripple btn-themeGreen p-l-rem3 p-r-rem3 m-t-rem2" data-dismiss="modal" style="overflow: hidden; position: relative;">Cancel</button>';
            // pop += '        <button id="confirm" type="button" class="btn btn-effect-ripple btn-themeGreen p-l-rem3 p-r-rem3 m-t-rem2" onclick="removeBusinessSuccessful();" style="overflow: hidden; position: relative;">Confirm</button>';
            // pop += '    </div>';
            // pop += '</div>';

            // $("#myModal4").empty().append(pop);

            // $(document).ready(function(){
            //     document.getElementById("confirm").disabled = true;

            //     $("#tick").click(function(){
            //         document.getElementById("confirm").disabled = false;
            //     });
            // });

            // break;

            // case "goToSuccess":
            // alert("yesssss");
            // var success = "";

            // break;

    	}
}



function getBusinessProfileDetails(){

	var data ={
  		'command' : 'getBusinessDetails',
  		'viewType' : 'getProfile'
 	};

 	jaxSend("scripts/reqOperation.php", data, "POST", businessProfileCallback, 0, 1);

}


// function removeBusiness(){

//     var data ={
//         'command' : 'getBusinessDetails',
//         'viewType' : 'deleteBusiness'
//     };

//     jaxSend("scripts/reqOperation.php", data, "POST", businessProfileCallback, 0, 0);

// }