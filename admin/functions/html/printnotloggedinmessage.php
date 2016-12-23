<?php

function PrintNotLogged() {
    printf("<div class=\"container\">
                <div class=\"col-md-6\">
                    <h2>
                    <span class=\"error\">You are not authorized to access this page.</span>
                    Please <a href=\"index.php\">login</a> or speak to your site administrator.
                    </h2>
                </div>
            </div>");
}