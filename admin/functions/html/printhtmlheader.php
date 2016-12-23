<?php

function PrintHTMLHeader($bgimage) {
  
    printf("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <!DOCTYPE html>
    <html lang=\"en\">
    <head>
    <!--metas-->
    <meta content=\"text/html; charset=UTF-8\" http-equiv=\"Content-Type\">
    <meta content=\"Warped Intentions Buy Back Program\" name=\"description\">
    <meta content=\"index,follow\" name=\"robots\">
    <meta content=\"width=device-width, initial-scale=1\" name=\"viewport\">
    <title>W4RP Buy Back Program</title>
    <link href=\"/../css/bootstrap.min.css\" rel=\"stylesheet\">
    <link href=\"/../css/bootstrap-table-expandable.css\" rel=\"stylesheet\">
    <link href=\"/../css/style.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href=\"/../css/custom.css\" rel=\"stylesheet\">
    <link href=\"/../css/eve-link.css\" rel=\"stylesheet\">
    <link rel=\"shortcut icon\" href=\"/../images/favicon.ico\" type=\"image/x-icon\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
    <script src=\"/../js/bootstrap-table-expandable.js\"></script>
    <style type=\"text/css\">
        body{
            background-image:url(" . $bgimage . ");
            background-repeat:no-repeat;
            background-attachment: fixed;
        }
        .affix {
            top: 60px;
        }
        .affix-bottom {
            position: absolute;
        }
    </style>
</head>");
    
}

?>