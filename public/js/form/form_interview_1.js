// JavaScript Document
// Created by: Juan Camilo Martinez Morales
// Email: juan.martinez@mggroup.com.co
// Date: 2015-03-03

var idFormInterview = 0;

$(document).ready(function() {
    saveText();
    saveTextarea();
    saveRadio();
    saveCheck();
    getInfoInterviewOne();
});

function saveText() {
    $(".saveText").change(function() {
        var idElementDom = $(this).attr("id");
        $.ajax({
            url: "index.php/form/do_saveInterviewOne",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "IdFormInterview": idFormInterview,
                "Column": idElementDom,
                "IsText": true,
                "Value": $(this).val(),
                "IdFormT08": idFormT08
            },
            success: function(result) {
                $(idElementDom).css("border", "2px solid #f9ba22");
                idFormInterview = result;
            },
            error: function(error) {
                alert(error);
            }
        });
    });
}

function saveTextarea() {
    $(".saveTextarea").change(function() {
        var idElementDom = $(this).attr("id");
        $.ajax({
            url: "index.php/form/do_saveInterviewOne",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "IdFormInterview": idFormInterview,
                "Column": idElementDom,
                "IsText": true,
                "Value": $(this).val(),
                "IdFormT08": idFormT08
            },
            success: function(result) {
                $(idElementDom).css("border", "2px solid #f9ba22");
                idFormInterview = result;
            },
            error: function(error) {
                alert(error);
            }
        });
    });
}

function saveRadio() {
    $(".saveRadio").change(function() {
        var idElementDom = $(this).attr("name");
        $.ajax({
            url: "index.php/form/do_saveInterviewOne",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "IdFormInterview": idFormInterview,
                "Column": idElementDom,
                "IsText": false,
                "Value": $(this).val(),
                "IdFormT08": idFormT08
            },
            success: function(result) {
                //$(idElementDom).css("border", "2px solid #f9ba22");
                idFormInterview = result;
            },
            error: function(error) {
                alert(error);
            }
        });
    });
}

function saveCheck() {
    $(".saveCheck").change(function() {
        var idElementDom = $(this).attr("name");
        $.ajax({
            url: "index.php/form/do_saveInterviewOne",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "IdFormInterview": idFormInterview,
                "Column": idElementDom,
                "IsText": false,
                "Value": $(this).val(),
                "IdFormT08": idFormT08
            },
            success: function(result) {
                //$(idElementDom).css("border", "2px solid #f9ba22");
                idFormInterview = result;
            },
            error: function(error) {
                alert(error);
            }
        });
    });
}

function saveSelect() {
    $(".saveCheck").change(function() {
        var idElementDom = $(this).attr("id");
        $.ajax({
            url: "index.php/form/do_saveInterviewOne",
            type: "POST",
            data: {
                "csrf_test_name": get_csrf_hash,
                "IdFormInterview": idFormInterview,
                "Column": idElementDom,
                "IsText": false,
                "Value": $(this).val(),
                "IdFormT08": idFormT08
            },
            success: function(result) {
                idFormInterview = result;
            },
            error: function(error) {
                alert(error);
            }
        });
    });
}

function getInfoInterviewOne() {
    $.ajax({
        url: "index.php/form/getInfoInterviewOne",
        type: "POST",
        dataType: "json",
        data: {
            "csrf_test_name": get_csrf_hash,
            "IdFormT08": idFormT08
        },
        success: function(result) {
            if (result[0] != undefined) {
                idFormInterview = result[0].id;
                $.each(result[0], function(key, value) {
                    if (key.substring(0, 10) == "preguntano") {
                        $("#" + key).val(value);
                    }
                    else if (key.substring(0, 8) == "pregunta") {
                        $("input[name='" + key + "'][value='" + value + "']").parent().trigger("click");
                    }
                });
            }
        },
        error: function(error) {
            alert(error);
        }
    });
}