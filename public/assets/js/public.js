$(document).ready(function() {
	$('#datepicker').datepicker({
        weekStart: 1,
        format: "dd/mm/yyyy",
        startDate: todaysDate(),
        daysOfWeekDisabled: "0,6"
    });
});

function todaysDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }

    return dd+'/'+mm+'/'+yyyy;
}

/**
 * http://partialclass.blogspot.ie/2011/07/calculating-working-days-between-two.html
 */
function workingDaysBetweenDates(startDate, endDate) {
    // Validate input
    if (endDate < startDate)
        return 0;
    
    // Calculate days between dates
    var millisecondsPerDay = 86400 * 1000; // Day in milliseconds
    startDate.setHours(0,0,0,1);  // Start just after midnight
    endDate.setHours(23,59,59,999);  // End just before midnight
    var diff = endDate - startDate;  // Milliseconds between datetime objects    
    var days = Math.ceil(diff / millisecondsPerDay);
    
    // Subtract two weekend days for every week in between
    var weeks = Math.floor(days / 7);
    days = days - (weeks * 2);

    // Handle special cases
    var startDay = startDate.getDay();
    var endDay = endDate.getDay();
    
    // Remove weekend not previously removed.   
    if (startDay - endDay > 1)         
        days = days - 2;      
    
    // Remove start day if span starts on Sunday but ends before Saturday
    if (startDay == 0 && endDay != 6)
        days = days - 1  
            
    // Remove end day if span ends on Saturday but starts after Sunday
    if (endDay == 6 && startDay != 0)
        days = days - 1  
    
    return days;
}

function stringToDate(str){
    var date = str.split("/"),
        d = date[0],
        m = date[1],
        y = date[2];
    return new Date(y + "-" + m + "-" + d);
}

function findById(source, id) {
    return source.filter(function( obj ) {
        return +obj.id === +id;
    })[ 0 ];
}

function exists(source, id) {
    return source.filter(function( obj ) {
        return +obj.id === +id;
    }).length;
}

function sumQuote(obj, prop) {
    if (obj == null) {
        return 0;
    }
    return obj.reduce(function (a, b) {
    	var sum = b[prop] * b.qty;
        return b[prop] == null ? a : a + sum;
    }, 0);
}

/**
 * http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
 */
function validateEmail(email) {  
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}