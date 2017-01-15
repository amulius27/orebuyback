<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function PrintNavBarContracts($corporation) {
    //Start the session
    session_start();
    if(isset($corporation)) {
        printf("<div class=\"navbar navbar-inverse navbar-fixed-top\" style=\"height: 72px;\" role=\"navigation\">
            <div class=\"navbar-header\">
                <button class=\"navbar-toggle\" data-target=\".navbar-collapse\" data-toggle=\"collapse\" type=\"button\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button> 
                <a class=\"navbar-brand\" href=\"index.html\">
                    <img src=\"http://image.eveonline.com/Alliance/99004116_64.png\" style=\"margin-top: -10px;\">
                </a>
            </div>
            <div class=\"collapse navbar-collapse pull-left\">
                <ul class=\"nav navbar-nav\">
                    <li><a href=\"../index.php?corporation=$corporation\">Home</a></li>
                    <li><a href=\"http://forums.warpedintentions.com\">Forum</a></li>
                </ul>
            </div>
        </div>");    
    } else {
        printf("<div class=\"navbar navbar-inverse navbar-fixed-top\" style=\"height: 72px;\" role=\"navigation\">
            <div class=\"navbar-header\">
                <button class=\"navbar-toggle\" data-target=\".navbar-collapse\" data-toggle=\"collapse\" type=\"button\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button> 
                <a class=\"navbar-brand\" href=\"index.html\">
                    <img src=\"http://image.eveonline.com/Alliance/99004116_64.png\" style=\"margin-top: -10px;\">
                </a>
            </div>
            <div class=\"collapse navbar-collapse pull-left\">
                <ul class=\"nav navbar-nav\">
                    <li><a href=\"../index.php\">Home</a></li>
                    <li><a href=\"http://forums.warpedintentions.com\">Forum</a></li>
                </ul>
            </div>
        </div>");
    }
}