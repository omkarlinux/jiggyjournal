/*!
 * Start Bootstrap - Freelancer Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('body').on('click', '.page-scroll a', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});


//Jiggy Journal 

//dropdown menu

$(document).ready(function () {
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
});

// interval is in milliseconds. 1000 = 1 second - so 1000 * 10 = 10 seconds
$('.carousel').carousel({
  interval: 1000 * 4
});

//Datepicker

$(document).ready(function(){
    $('.input-group.date input').datepicker({
        format: "mm/dd/yyyy",
        autoclose: true,
        todayHighlight: true,
        todayBtn: "linked",
        orientation: "bottom right"
    });    
});

function submitAction(act) {
    if(!validate()){
        document.editPageForm.action = act;
        document.editPageForm.submit();   
    }
}

function validate(){
    $(".control-group .controls.date input").trigger("change.validation", {submitting: true});
    return $(".control-group .controls.date input").jqBootstrapValidation("collectErrors");
}

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// Validates that the input string is a valid date formatted as "mm/dd/yyyy"
function isValidDate($el, dateString, callback)
{
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        returnValue = false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        returnValue = false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    returnValue =  day > 0 && day <= monthLength[month - 1];
    
    callback({
      value: dateString,
      valid: returnValue,
      message: "Must be a valid date in mm/dd/yyyy format"
    });
};