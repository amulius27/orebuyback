<?php

function PrintContractHTMLHeader($bgimage) {
    printf("<!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <!--metas-->
                <meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
                <meta content=\"Warped Intentions Buy Back Program\" name=\"description\">
                <meta content=\"index,follow\" name=\"robots\">
                <meta content=\"width=device-width, initial-scale=1\" name=\"viewport\">
                <title>
                    Warped Intentions Buy Back Program
                </title>
                <link href=\"/../css/bootstrap.min.css\" rel=\"stylesheet\">
                <link href=\"/../css/style.css\" rel=\"stylesheet\" type=\"text/css\">
                <link href=\"/../css/custom.css\" rel=\"stylesheet\">
                <link href=\"/../css/eve-link.css\" rel=\"stylesheet\">
                <link rel=\"shortcut icon\" href=\"/../images/favicon.ico\" type=\"image/x-icon\">
                <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\" type=\"text/javascript\"></script>
                <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\"></script>
                <style type=\"text/css\">
                    body{
                        background-image:url(" . $bgimage . ");
                        background-repeat:no-repeat;
                        background-attachment: fixed;
                    }
                    .affix {
                        top: 75px;
                    }
                    .affix-bottom {
                        position: absolute;
                    }
                </style>
            </head>");
}