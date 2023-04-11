/**
 * Javascript functions for canvas loader
 * 
 **/

function showCanvas() {
    $('body').css({'cursor' : 'wait'});
    $('#canvasLoader').removeClass('hide');
}

function hideCanvas() {
    $('body').css({'cursor' : 'default'});
    setTimeout(function() {
        $('#canvasLoader').addClass('hide');
    }, 1000);
}

/**
 * 
 * message - The message you want to show to the user
 * status - bootstrap status (success, danger, warning)
 * title - The title for this dropdown modal
 * favicon - The fontawesome icon name without the 'fa-'.
 *           Search for the fontawesome icon here --> http://fontawesome.io/icons/
 * url - The url you want to refer the users to when this dropdown modal is closed
 *
 **/
function showMessage(message, status, title, favicon, url, canvasBtnArray) {
    var btnArrayIsObject = jQuery.isPlainObject(canvasBtnArray) ? 1 : 0;

    // if ($('#canvasMessage').hasClass('in')) {
    //     //
    //     alert(123);
    // }else{
        $('#canvasMessage').modal('toggle');
    // }

    $('#canvasMessage').find('h4').html('<i class="fa fa-3x fa-'+favicon+'"></i><span style="">'+title+'</span>');
    $('#canvasAlertMessage').removeClass('alert-success');
    $('#canvasAlertMessage').removeClass('alert-danger');
    $('#canvasAlertMessage').removeClass('alert-warning');
    $('#canvasAlertMessage').addClass('alert-'+status);
    $('#canvasAlertMessage').html('<span>'+message+'</span>');
    $('#canvasMessage .modal-footer').find('button').not('#canvasCloseBtn').remove();
    if(typeof(canvasBtnArray) != 'undefined' || !jQuery.isEmptyObject(canvasBtnArray)) {
        if(canvasBtnArray == '')
            return false;
        $.each(canvasBtnArray, function(key, val) {
            if (!btnArrayIsObject) key = val;
            $('<button id="canvas'+key+'Btn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">'+val+'</button>').insertBefore('#canvasCloseBtn');
        });
    }
    
    $('#canvasMessage').on('hidden.bs.modal', function() {
        $('.modal-backdrop').remove();
        $('#canvasMessage .modal-footer').find('button').not('#canvasCloseBtn').remove();
        if(url.constructor === Array) {
            $.redirect(url[0], url[1]); 
        }
        else {
            if(url != '')
                window.location.href = url;
        }
    });
}

/**
*   This function is to handle all ajax send
*
**/

function ajaxSend(url, val, method, fCallback, debug, bypassBlocking, bypassLoading, importFlag) {
    if(!window.ajaxEnabled)
        return false;
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
        ajaxBlocking = 1;
        $.ajax({
            url: url,
            type: method,
            data: val,
            contentType: contentType,
            processData: processData,
//            async: true,
            success: function(result){
                if(!result)
                    showMessage('Some error occurred', 'danger', 'No results found.', '', '');
                
                var obj = JSON.parse(result);
                if(debug)
                    console.log(obj);
                if (debug == 2) {
                    /* For testing API in Super Admin Site */
                    fCallback(obj);
                }
                else {
               
                    if (obj.status == 'ok') {
                        if (typeof(fCallback) == 'function')
                            fCallback(obj.data, obj.statusMsg, obj);
                    }
                    else {
                        if(obj.data != null && obj.data.field)
                            showCustomErrorField(obj.data.field, obj.statusMsg);
                        else
                            errorHandler(obj.code, obj.statusMsg);
                    }
                }
               
            },
            error: function(xhr) {
                if(debug)
                    console.log(xhr);
                var message = xhr.status + ' ' + xhr.statusText;
                showMessage(xhr.responseText, 'danger', message, '', '');
            },
            complete: function() {
                ajaxBlocking = 0;
                if(!bypassLoading)
                    hideCanvas();
            }
        });
    }
}

/** 
*   This function is to handle the error codes
*   errorCode - code
*   errorMsg - statusMsg
**/

function errorHandler(errorCode, errorMsg) {
    switch(errorCode) {
        case '0':
            showMessage(errorMsg, "danger", "Some error occured","file", "");
            break;
        case 0:
            showMessage(errorMsg, "danger", "Some error occured","file", "");
            break;
        case 1:
            showMessage(errorMsg, "warning", "Some error occured","file", "");
            break;
        case 2:
            showMessage(errorMsg, "danger", "Some error occured","file", "");
            break;
        case 3:
            showMessage(errorMsg, "danger", "Session Time Out","user-times", "pageLogin.php");
            break;
        case 4:
            $(location).attr('href', 'maintenance.php')
            break;
        case 5:
            break;
        default:
            alert("Unknown error code and message:"+errorCode+" - "+errorMsg);
    }
}

function showErrorField(data) {
    var type = 'text';
    if(data.type)
        type = data.type;
//    if(data.field)
//        $('#'+data.field).attr('type', type).attr('required', 'required').parsley().validate();
    
    if(Array.isArray(data.field)) {
        $.each(data.field, function(key, arr) {
            var id = '';
            var attr = [];
            var value = [];
            var msg = [];
            $.each(arr, function(k, v) {
                if(k == 'id')
                    id = v;
                if(id == '')
                    return;
                if(k == 'attr') {
                    if(!Array.isArray(v))
                        msg.push(v);
                    else {
                        $.each(v, function(innerKey, innerVal) {
                            attr.push(innerVal);
                        });
                    }
                }
                if(k == 'value') {
                    if(!Array.isArray(v))
                        msg.push(v);
                    else {
                        $.each(v, function(innerKey, innerVal) {
                            value.push(innerVal);
                        });
                    }
                }
                if(k == 'msg') {
                    if(!Array.isArray(v))
                        msg.push(v);
                    else {
                        $.each(v, function(innerKey, innerVal) {
                            msg.push(innerVal);
                        });   
                    }
                }
            });
            if(id == '')
                return;
            var inputID = $('#'+id);
            $.each(attr, function(k, val) {
                if(value[k])
                    inputID.attr(val, value[k]);
                else
                    inputID.attr(val, '');
                inputID.parsley().validate();
            });
            $.each(msg, function(k, val) {
                inputID.parsley().addError('custom', {message: val});
            });
        });
    }
    else {
        if(data.field)
            $('#'+data.field).attr('type', type).attr('required', 'required').parsley().validate();
    }
    
    $('.content-page').find('.parsley-error').focus();
}

function showCustomErrorField(data, statusMsg) {
    if(Array.isArray(data)) {
        $.each(data, function(key, array) {
            var id = '';
            var msg = "";
            $.each(array, function(k, v) {
                if(k == 'id')
                    id = v;
                else if(k == 'msg')
                    msg = v;
                if(id == '')
                    return;
            });
            if(id == '')
                return;
            else if(msg.length > 0)
                $('#'+id).text(msg);
        });
    }
    else {
        // API params checking error
        $('#'+data+'Error').text(statusMsg);
    }
}

function dateTimeFormat(timeStamp ,isTime ,isDate){

    var d = "";
    var t = "";
    
    if(isDate !== 0) d = "DD/MM/YYYY";
    if(isTime !== 0) t = "hh:mm:ss A";
    var dateString = moment.unix(timeStamp).format(d+" "+t);

    return dateString;

}

function dateTime24Format(timeStamp ,isTime ,isDate){

    var d = "";
    var t = "";
    
    if(isDate !== 0) d = "DD/MM/YYYY";
    if(isTime !== 0) t = "HH:mm:ss";
    var dateString = moment.unix(timeStamp).format(d+" "+t);

    return dateString;

}

// Similar function like php $_GET
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
        return null;
    }
    else{
        return decodeURI(results[1]) || 0;
    }
}

/*
 * Convert date to timestamp
 * 
 * dateValue will be in this format
 * 1)  DD/MM/YYYY (eg. 15/12/2017)
 * 
 * 2)  DD/MM/YYYY H:mm:ss (eg. 15/12/2017 18:00:00)
 *     or
 *     DD/MM/YYYY h:mm:ss AM/PM (eg. 15/12/2017 06:00:00 PM)
 *
 */
function dateToTimestamp(dateValue) {
    // console.log(dateValue);
    var res, datePart, dateTs;
    var isDateTime = dateValue.split(' ');
    
    if(isDateTime[0].split('/').length > 2)
        res = isDateTime[0].split('/');
    else if(isDateTime[0].split('-').length > 2)
        res = isDateTime[0].split('-');
    else
        return false;
    
    datePart = res[1]+'/'+res[0]+'/'+res[2];
    if (isDateTime.length == 1) {
        dateTs = Date.parse(datePart)/1000;
    }
    else {
        datePart = datePart+' '+isDateTime[1];
        if(isDateTime[2])
            datePart = datePart+' '+isDateTime[2];
        dateTs = Date.parse(datePart)/1000;
    }
    // console.log(dateTs);
    return dateTs;
}

/*
 * Convert timestamp to date
 * 
 * tsValue will be the timestamp value generated by PHP strtotime() function
 * showTime - 1 will be show time. 
 *            0 will be don't show time.
 * time24Hours - 1 will be time showed in 24 hour format. 
 *               0 will be time showed in 12 hour format with AM/PM at the back
 *
 */
function timestampToDate(tsValue, showTime, time24Hours) {
    var d = new Date(tsValue*1000);
    var formattedDate = d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear();
    
    if(showTime == 0)
        return formattedDate;
    
    if(showTime == 1) {
        var hours = (d.getHours() < 10) ? "0" + d.getHours() : d.getHours();
        var minutes = (d.getMinutes() < 10) ? "0" + d.getMinutes() : d.getMinutes();
        var formattedTime = hours + ":" + minutes;
    }
    
    if(time24Hours == 1) {
        formattedDate = formattedDate + " " + formattedTime;
        return formattedDate;
    }
    
    var a = '';
    if(time24Hours == 0) {
        a = 'AM';
        if(hours == 0)
            hours = 12;
        if(hours > 12) {
            a = 'PM';
            hours-= 12;
        }
    }
    
    formattedTime = hours + ":" + minutes + " " + a;
    formattedDate = formattedDate + " " + formattedTime;
    
    return formattedDate;
}

/*
 * Get timezone
 * 
 * This returns the difference from the clients timezone from UTC time in seconds
 *
 */
function getOffsetSecs() {
    var offSet = new Date().getTimezoneOffset();
    return offSet*60;
}

// Function to get today's date
function getTodayDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    var today = dd+'/'+mm+'/'+yyyy;
    return today;
}

/*
 * Convert date to timestamp
 * 
 * timeString will be in this format
 * 1)  h:mm:ss AM/PM (eg. 06:00:00 PM)
 * 2)  h:mm AM/PM (eg. 07:00 PM)
 *
 */
function formatTime(timeString) {
    var result, timePart, meridiemPart, hourPart = 0;
    
    var isTimeString = timeString.split(' ');
    
    timePart = isTimeString[0].split(':');
    if(timePart.length < 1)
        return false;
    
    meridiemPart = isTimeString[1];
    if(meridiemPart == 'pm' || meridiemPart == 'PM')  {
        hourPart = 12;
    }
    
    if(timePart[0] == 12)
        result = parseInt(timePart[0]);
    else
        result = parseInt(timePart[0]) + hourPart;
    
    if(result < 10) {
        result = '0' + result;
    }
    
    if((result == 12) && (meridiemPart == 'am' || meridiemPart == 'AM')) {
        result = '00';
    }
    
    if(timePart.length == 2)
        result = result + ':' + timePart[1];
    else if(timePart.length == 3)
        result = result + ':' + timePart[1] + ':' + timePart[2];
    else
        return false;
    
    return result;
}

/*
*
* dataType - dateRange, singleDate, timeRange, text
* dataName - for switch case in search
* dataValue - input value
*/
function buildSearchDataByType(searchID) {
    search = $('#'+searchID);
    
    var dataForm = [];
    var dataName, dataType, dataValue, dataParent;
    var inputType;
    var tsFrom, tsTo;
    var timeFrom, timeTo;
    
    // To keep track of input fields in form-group
    var i;
    
    search.find('div.form-group').each(function() {
        var formGroup = $(this);
        
        // Reset variable
        inputType = '';
        
        if(formGroup.find('input').length)
            inputType = 'input';
        else if (formGroup.find('select').length)
            inputType = 'select';
        else
            return true;
        
        // Reset variable
        tsFrom = '';
        tsTo = '';
        timeFrom = '';
        timeTo = '';
        i = 0;
        
        formGroup.find(inputType).each(function() {
            var inputValue = $(this);
            
            // Reset variable
            dataName = '';
            dataType = '';
            dataValue = '';
            dataParent = '';
            
            dataName = inputValue.attr('dataName');
            dataType = inputValue.attr('dataType');
            
            if(!dataName || !dataType)
                return true;
            
            if(inputType == 'select')
                dataValue = inputValue.find('option:selected').val();
            else
                dataValue = inputValue.val();
            
            i++;
            switch(dataType) {
                case "dateRange":
                    if(dataValue)
                        dataValue = dateToTimestamp(dataValue);
                    else
                        dataValue = 0;
                    
                    if(i == 1) {
                        tsFrom = dataValue;
                    }
                    else if(i == 2){
                        tsTo = dataValue;
                    }
                    
                    // On the same day, need to format tsTo
                    if((tsFrom == tsTo) && (tsFrom > 0))
                        tsTo += 86399;
                    break;
                    
                case "singleDate":
                    if(!dataValue)
                        return true;
                    
                    dataValue = dateToTimestamp(dataValue);
                    
                    break;
                    
                case "timeRange":
                    dataParent = inputValue.attr('dataParent');
                    if(!dataParent || !dataValue)
                        return true;
                    
                    if(i == 1) {
                        timeFrom = formatTime(dataValue);
                    }
                    else if(i == 2) {
                        timeTo = formatTime(dataValue);
                    }
                    
                    dataValue = $('input[dataName = "'+dataParent+'"]').val();
                    if(!dataValue)
                        dataValue = getTodayDate();
                    
                    dataValue = dateToTimestamp(dataValue);
                    
                    break;
                    
                case "select":
                    
                    break;
                    
                case "text":
                    
                    break;
                    
                default:
                    return true;
            }
            if(!dataValue)
                return true;
        });
        if(!dataName || !dataType)
            return true;
        
        if((dataType == 'dateRange') && (tsFrom || tsTo))
            dataForm.push({dataName : dataName, dataType : dataType, tsFrom : tsFrom, tsTo : tsTo});
        else if((dataType == 'timeRange') && (timeFrom || timeTo))
            dataForm.push({dataName : dataName, dataType : dataType, dataValue : dataValue, timeFrom : timeFrom, timeTo : timeTo});
        else if(dataValue)
            dataForm.push({dataName : dataName, dataType : dataType, dataValue : dataValue});
    });
    return dataForm;
}

//Add check boxes to table.
function addColumn(tableId, data, columnIndex, status) {
    var i = 0;
    $('#'+tableId+' tr').each(function() {
        var checkbox = $('<input />', {
            type: 'checkbox',
            id: 'chk'+i
        });
        var blank = $('<span>');

        if(columnIndex) {
            var columnText = $(this).find("td").eq(columnIndex).html();
            if(columnText == status)
                blank.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(this);
            else
                checkbox.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(this);
        }
        else
            checkbox.wrap('<td style="width : 12px !important;"></td>').parent().prependTo(this);
        i++;
    })
    $('#chk0').css("display", "none");
}

function limitInteger(){
    this.value = this.value.replace(/[^0-9]/g, '');
}

function limitFloat(){
    this.value = this.value.replace(/[^0-9.]/g, '');
}

function checkFloatNumber(value){

    return value.match(/^-?\d*(\.\d+)?$/);
}

function getUtcTime(timeValue){
    // get current date time
    var dateTime= getTodayDate() + " " + timeValue;
    // get userOffsetSec with negative
    var userTimezone= -getOffsetSecs();
    // get utc timestamp
    var utcTimeStamp = dateToTimestamp(dateTime)-userTimezone;
    // get 24h format dateTime 12/10/2018 13:15:30
    var convertToDate = dateTime24Format(utcTimeStamp,1,1);
    // split date time
    var splitDateTime = convertToDate.split(" ");
    // get time
    var getUTCTime = splitDateTime[1];
    return getUTCTime;
}

function getUserLocalTime(timeValue){
    // get current date time
    var dateTime= getTodayDate() + " " + timeValue;
    // get userOffsetSec
    var userTimezone= getOffsetSecs();
    // get utc timestamp
    var utcTimeStamp = dateToTimestamp(dateTime)-userTimezone;
    // get 24h format dateTime 12/10/2018 13:15:30
    var convertToDate = dateTime24Format(utcTimeStamp,1,1);
    // split date time
    var splitDateTime = convertToDate.split(" ");
    // get time
    var getUTCTime = splitDateTime[1];
    return getUTCTime;
}

// add number comma  1,000,000
$.fn.digits = function(){ 
    return this.each(function(){ 
        $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") ); 
    })
}

function currencyFormat(num,decimals) {
    return (
        num
            .toFixedNoRounding(decimals) // always two decimal digits
            // .replace('.', ',') // replace decimal point character with ,
            .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')

        ) // use . as a separator
    }

Number.prototype.toFixedNoRounding = function(n) {
    const reg = new RegExp("^-?\\d+(?:\\.\\d{0," + n + "})?", "g")
    const a = this.toString().match(reg)[0];
    const dot = a.indexOf(".");
    if (dot === -1) { // integer, insert decimal dot and pad up zeros
        return a + "." + "0".repeat(n);
    }
    const b = n - (a.length - dot) + 1;
    return b > 0 ? (a + "0".repeat(b)) : a;
}

function formatNumber(number, decimals, separator) {
    number = parseFloat(number);
    number = number.toFixed(decimals);
    if(separator == 1)
    number = number.toString().replace(/(\d)(?=(\d\d\d)+(?!\d)+(?=(.\d\d)))/g, "$1,");
    return number;
}

function addCommas(nStr,)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}