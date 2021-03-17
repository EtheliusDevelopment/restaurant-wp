<?php
/*
   $link = mysqli_connect("localhost:3306", "izumilan_mil", "a1r~20Rd", "izumilan_mil");



$ins_count = "INSERT INTO wp6j_termmeta (term_id,meta_key,meta_value) VALUES (104,'product_count_product_cat',12)";
$ins_ord= "INSERT INTO wp6j_termmeta (term_id,meta_key,meta_value) VALUES (104,'order','0')";


$get_cat_id ="SELECT * FROM `wp6j_term_taxonomy` WHERE strooka_cat_id is not null";
          if($result = mysqli_query($link, $get_cat_id))
            {
              if(mysqli_num_rows($result) > 0)
                {  
                    while($row = mysqli_fetch_array($result))
                  {                    
                      $term_id = $row['term_id'];
                      $ins_count = "INSERT INTO wp6j_termmeta (term_id,meta_key,meta_value) VALUES ($term_id,'product_count_product_cat',12)";
                      mysqli_query($link, $ins_count);
            $ins_ord= "INSERT INTO wp6j_termmeta (term_id,meta_key,meta_value) VALUES ($term_id,'order','0')";
            mysqli_query($link, $ins_ord);

                    }
        }
      }


*/
      ?>