<?php

function PrintIndexPage($previousCorp) {
    if($previousCorp != 'None') {
        printf("<div class=\"blocks\">");
            printf("<div class=\"container\">");
              printf("<h3 class=\"page-header\"> Ore Belt Resources </h3>");
              printf("<div class=\"view view-first\"> <a href=\"ore.php?corporation=$previousCorp\"> <img src=\"https://image.eveonline.com/Type/1230_64.png\" /> </a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"ore_comp.php?corporation=$previousCorp\"> <img src=\"https://image.eveonline.com/Type/28432_64.png\" /> </a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"mins.php?corporation=$previousCorp\"> <img src=\"https://image.eveonline.com/Type/34_64.png\" /> </a> </div>");
              printf("<div class=\"clearfix\"></div>");
              printf("<h3 class=\"page-header\"> Ice Belt Resources </h3>");
              printf("<div class=\"view view-first\"> <a href=\"ice.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/16267_64.png\" /></a></div>");
              printf("<div class=\"view view-first\"> <a href=\"i_prod.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/16274_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"fuel.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/4247_64.png\" /></a> </div>");
              printf("<div class=\"clearfix\"></div>");
              printf("<h3 class=\"page-header\"> Planet Resources </h3>");
              printf("<div class=\"view view-first\"> <a href=\"pi.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/2267_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"pi_t1.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/2396_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"pi_t2.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/44_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"pi_t3.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/2869_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"pi_t4.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/2345_64.png\" /></a> </div>");
              printf("<div class=\"clearfix\"></div>");
              printf("<h3 class=\"page-header\"> Gas Cloud Materials <strong>(2nd Icon Works)</strong></h3>");
              printf("<div class=\"view view-first\"> <img src=\"https://image.eveonline.com/Type/25268_64.png\" /></div>");
              printf("<div class=\"view view-first\"> <a href=\"wgas.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/30375_64.png\" /></a></div>");
              printf("<div class=\"clearfix\"></div>");
              printf("<h3 class=\"page-header\"> Salvage Materials</h3>");
              printf("<div class=\"view view-first\"><a href=\"salvage.php?corporation=$previousCorp\"><img src=\"https://image.eveonline.com/Type/25605_64.png\" /></a> </div>");
              printf("<div class=\"clearfix\"></div>");
            printf("</div>");
          printf("</div>");
          printf("</div class=\"clearfix\">");
          printf("</div>");
          printf("</div>");
          printf("<hr>");
    } else {
        printf("<div class=\"blocks\">");
            printf("<div class=\"container\">");
              printf("<h3 class=\"page-header\"> Ore Belt Resources </h3>");
              printf("<div class=\"view view-first\"> <a href=\"ore.php\"> <img src=\"https://image.eveonline.com/Type/1230_64.png\" /> </a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"ore_comp.php\"> <img src=\"https://image.eveonline.com/Type/28432_64.png\" /> </a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"mins.php\"> <img src=\"https://image.eveonline.com/Type/34_64.png\" /> </a> </div>");
              printf("<div class=\"clearfix\"></div>");
              printf("<h3 class=\"page-header\"> Ice Belt Resources </h3>");
              printf("<div class=\"view view-first\"> <a href=\"ice.php\"><img src=\"https://image.eveonline.com/Type/16267_64.png\" /></a></div>");
              printf("<div class=\"view view-first\"> <a href=\"i_prod.php\"><img src=\"https://image.eveonline.com/Type/16274_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"fuel.php\"><img src=\"https://image.eveonline.com/Type/4247_64.png\" /></a> </div>");
              printf("<div class=\"clearfix\"></div>");
              printf("<h3 class=\"page-header\"> Planet Resources </h3>");
              printf("<div class=\"view view-first\"> <a href=\"pi.php\"><img src=\"https://image.eveonline.com/Type/2267_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"pi_t1.php\"><img src=\"https://image.eveonline.com/Type/2396_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"pi_t2.php\"><img src=\"https://image.eveonline.com/Type/44_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"pi_t3.php\"><img src=\"https://image.eveonline.com/Type/2869_64.png\" /></a> </div>");
              printf("<div class=\"view view-first\"> <a href=\"pi_t4.php\"><img src=\"https://image.eveonline.com/Type/2345_64.png\" /></a> </div>");
              printf("<div class=\"clearfix\"></div>");
              printf("<h3 class=\"page-header\"> Gas Cloud Materials <strong>(2nd Icon Works)</strong></h3>");
              printf("<div class=\"view view-first\"> <img src=\"https://image.eveonline.com/Type/25268_64.png\" /></div>");
              printf("<div class=\"view view-first\"> <a href=\"wgas.php\"><img src=\"https://image.eveonline.com/Type/30375_64.png\" /></a></div>");
              printf("<div class=\"clearfix\"></div>");
              printf("<h3 class=\"page-header\"> Salvage Materials</h3>");
              printf("<div class=\"view view-first\"><a href=\"salvage.php\"><img src=\"https://image.eveonline.com/Type/25605_64.png\" /></a> </div>");
              printf("<div class=\"clearfix\"></div>");
            printf("</div>");
          printf("</div>");
          printf("</div class=\"clearfix\">");
          printf("</div>");
          printf("</div>");
          printf("<hr>");
    }
}
