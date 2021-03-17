<?php

//echo PHP_BINARY;
//   php file binary file  : /usr/local/php71/bin/php
//echo '<br>'. getcwd() ;
//current server path : /home/customer/www/izumilano.com/public_html/wp-content/plugins/strooka-connector/external










 
////CHECK CUSTOMERS 
 $link = mysqli_connect("localhost", "izumilan_mil", "a1r~20Rd", "izumilan_mil");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers/list/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"src\": [
    {
      \"name\": \"date_last_update\",
      \"value\": \"2020-03-15 12:00:00\"
    },
    {
      \"name\": \"last_id\",
      \"value\": 1
    }
  ]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);
//var_dump($response);


$obj= json_decode($response);
$obj2= (array) $obj;
$obj3 = (array) $obj2['rows'];
 foreach ($obj3 as $key => $value)
  {
    // get cat id n values
    $o = (array) $value;
    $email = $o['email'];
    $cust_n = $o['name'];
    $cust_s =$o['surname'];
    $cust_id =$o['id'];


    ///check if exists 
    ////add in woocommerce

    $doesexists = "SELECT * FROM izumilan_mil.wp6j_wc_customer_lookup where email ='$email';";
           if($result = mysqli_query($link, $doesexists))
            {
              if(mysqli_num_rows($result) > 0)
                {                     
                    continue; 
                }
              else 
              {   
                $insert ="insert into  izumilan_mil.wp6j_wc_customer_lookup (first_name, last_name, email,date_last_active,strooka_id) values ('$cust_n','$cust_s','$email', NOW(),$cust_id);";
              mysqli_query($link, $insert);
               // wc_create_new_customer( $email, $cust_n, '' );
              }
     foreach ($o as $key2 => $value2)
    {

      /////
    //echo '<pre>'.$key2.'</br>'.$value2.'</pre>';
      continue;
      }
  }
  }
  ///check if customer is in strooka  
 $woo_customer = "SELECT * FROM izumilan_mil.wp6j_wc_customer_lookup;";
               if($result = mysqli_query($link, $woo_customer))
                {
                    if(mysqli_num_rows($result) > 0)
                    {   
                        while($row = mysqli_fetch_array($result))
                          {   
                            $name = $row['first_name'];
                            $lastname = $row['last_name'];
                            $email = $row['email'];
                            $country = $row['country'];
                            $postcode = $row['postcode'];
                            $city = $row['city'];
                            $state = $row['state'];
                             

                             if(recursive_array_search($email, $obj3))
                             {
                             continue;
                             }
                            else 
                            {
                             
                            
                         $ch = curl_init();

                            curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers/add/");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                            curl_setopt($ch, CURLOPT_HEADER, FALSE);

                            curl_setopt($ch, CURLOPT_POST, TRUE);

                            curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                              \"name\": \"$name\",
                              \"surname\": \"$lastname\",
                              \"email\": \"$email\",
                              \"birth_date\": \" \"
                            }");

                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                              "Content-Type: application/json",
                              "Shared-Key: 5c353006fceab103872a1fb92928ec79"
                            ));

                            $response = curl_exec($ch);
                            curl_close($ch);   
                          }
                          }

                    }

                }                           








function get_cat()
{
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/categories/list/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"src\": [
    {
      \"name\": \"date_last_update\",
      \"value\": \"2020-03-15 12:00:00\"
    },
    {
      \"name\": \"last_id\",
      \"value\": 1
    }
  ]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);
$obj= json_decode($response);
$obj2= (array) $obj;
$obj3 = (array) $obj2['rows'];
return $obj3;
}
function show_cat($obj)
{         
  foreach ($obj as $key => $value)
  {
    // get cat id n values
    $o = (array) $value;
    foreach($o as $i)
    {
      $a = (array) $i;
      if(isset($a['name']))
      {
        $b = (array) $a['name'];
        $c = $o['id'];
        $desc = $b["IT"];
       // echo '<pre>' . ($b["IT"]) . '</pre>' ; 
     //   echo '<pre>' . $c . '</pre>' ; 
        $link = mysqli_connect("localhost:3306", "izumilan_mil", "a1r~20Rd", "izumilan_mil");
        $sql = "SELECT * FROM izumilan_mil.wp6j_term_taxonomy where taxonomy='product_cat' and description='$desc';";  

        if($result = mysqli_query($link, $sql))
        {  
          if(mysqli_num_rows($result) > 0)
            {          
              while($row = mysqli_fetch_array($result))
                {
                  $termID = $row['term_taxonomy_id'];
                  $update = "UPDATE izumilan_mil.wp6j_term_taxonomy SET strooka_cat_id=$c where term_taxonomy_id=$termID ";
                   mysqli_query($link, $update);
                }
            }
          else 
          {
            $insertTerm = "INSERT INTO izumilan_mil.wp6j_terms ( name, slug)  values ( '$desc','$desc')  ";
            mysqli_query($link, $insertTerm);
            //  echo $insertTerm;
            $getId = "SELECT term_id FROM  izumilan_mil.wp6j_terms where name='$desc' limit 1";
            if($result = mysqli_query($link, $getId))
            {
              if(mysqli_num_rows($result) > 0)
                {          
                  while($row = mysqli_fetch_array($result))
                  {            
                    $Termid = $row['term_id'];
                  }
                }  
            }    
            $insert = "INSERT INTO izumilan_mil.wp6j_term_taxonomy (term_id, taxonomy, description, strooka_cat_id) values ($Termid,'product_cat','$desc', $c) ";
            mysqli_query($link, $insert);
  
          }
        }    
        }       
      }
    }     
  }






////list prod

function list_products(){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/products/list/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"src\": [
    {
      \"name\": \"date_last_update\",
      \"value\": \"2020-03-15 12:00:00\"
    },
    {
      \"name\": \"last_id\",
      \"value\": 1
    }
  ]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);

//wp_die(var_dump($response));

$obj= json_decode($response);
$obj2= (array) $obj;
$obj3 = (array) $obj2['rows'];
return $obj3;
}

//wp_die(var_dump(list_products()));
function show_prod($obj)
{
  foreach ($obj as $key => $value)
  {
    // get cat id n values
    $o = (array) $value;
    foreach($o as $i)
    {
      $a = (array) $i;
      if(isset($a['name']))
      {

        $b = (array) $a['name'];
        $c = $o['id'];
        $price = $o['price'];
        $cat_arr = (array) $o['categories'];
          //wp_die(var_dump($cat_arr));
        if(isset($o['categories']))
        {
          if(isset($cat_arr['id']))
          {
          $cat = intval($cat_arr['id']);      
          }
          else
          {
            $cat = 0;  
          }
          
        }
        
        

        if(isset($b['IT'])){
        $desc = $b["IT"];
       
        

        //  echo "imgere24441";
            $img = $o['img'];
      
      //  echo '<pre>' . $c . '</pre>' ; 
        
            $prod_ex= "SELECT * FROM izu_wordpress.wp_6jposts where strooka_id=$c";
            $link = mysqli_connect("localhost:3306", "root", "", "izu_wordpress");
               
           if($result = mysqli_query($link, $prod_ex))
            {
           
              if(mysqli_num_rows($result) == 0)

              {
                $insert_prod= "INSERT INTO izu_wordpress.wp_6jposts (post_author,post_date, post_date_gmt,post_title,post_status, comment_status  ,ping_status  ,post_name, post_modified ,post_modified_gmt,post_type, strooka_id) values (1,NOW(),NOW(),'$desc','publish', 'open','closed',' ',  now(),now(),'product',$c )";
             // echo $insert_prod;
               mysqli_query($link, $insert_prod);

                
              }    
            }            
            if(isset($img))  
            {
              
              $prod_ex= "SELECT * FROM izu_wordpress.wp_6jposts where strooka_id=$c";
              if($result = mysqli_query($link, $prod_ex))
                {
                    if(mysqli_num_rows($result) > 0)
                    {   
                        while($row = mysqli_fetch_array($result))
                          {            
                            $post_id = $row['ID'];                  
                            $insert_img = "INSERT INTO izu_wordpress.wp_6jposts (post_date, post_date_gmt,post_title,post_status, post_name,post_modified, post_modified_gmt , post_parent, guid, post_type, post_mime_type ) VALUES (NOW(), NOW(),  '$desc','inherit','$desc',NOW(), NOW(), $post_id,'$img','attachment', 'image/png'); ";
                            mysqli_query($link, $insert_img);
                            //echo $insert_img;
                          }
                    }
                }
            }
            if(isset($price))
            {
               $prod_ex_p= "SELECT * FROM izu_wordpress.wp_6jposts where strooka_id=$c";
              if($result_p = mysqli_query($link, $prod_ex_p))
                {
                    if(mysqli_num_rows($result_p) > 0)
                    {   
                        while($row_p = mysqli_fetch_array($result))
                          {            
                            $post_id = $row['ID'];
                          
                          }
                    $insert_price = "INSERT INTO izu_wordpress.wp_6jpostmeta (post_id, meta_key,meta_value) VALUES ($post_id,'_regular_price', '$price') ;";
                    mysqli_query($link, $insert_price);
                    $insert_price2 = "INSERT INTO izu_wordpress.wp_6jpostmeta (post_id, meta_key,meta_value) VALUES ($post_id,'_price', '$price') ;";
                    mysqli_query($link, $insert_price2);
                    }

                }                           
            }
            $get_term_id = "SELECT * FROM izu_wordpress.wp_6jterm_taxonomy where strooka_cat_id=$cat;";
              if($result_t = mysqli_query($link, $get_term_id))
                {
                    if(mysqli_num_rows($result_t) > 0)
                    {   
                        while($row_t = mysqli_fetch_array($result_t))
                          {            
                            $term_tax_id = $row_t['term_taxonomy_id'];
                            $insert_tax ="INSERT INTO izu_wordpress.wp_6jterm_relationships (object_id, term_taxonomy_id) VALUES ($post_id, $term_tax_id) ";
                            mysqli_query($link, $insert_tax);
                            $insert_tax2 ="INSERT INTO izu_wordpress.wp_6jterm_relationships (object_id, term_taxonomy_id) VALUES ($post_id, 2) ";
                            mysqli_query($link, $insert_tax2);
                           // wp_die($insert_tax2 .' ' .$insert_tax );
                          }

                    }
                }          
                          }            





      }
       }
   
        }       
      }
         
  






///////list customers//

function list_customers()
{
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers/list/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"src\": [
    {
      \"name\": \"date_last_update\",
      \"value\": \"2020-03-15 12:00:00\"
    },
    {
      \"name\": \"last_id\",
      \"value\": 1
    }
  ]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);

  

$obj= json_decode($response);
      $obj2= (array) $obj;
      $obj3 = (array) $obj2['rows'];
      return $obj;
    }
/*
function sync_customers($obj) 
{
           
             // $name =  $obj['name'];
              //$surname = $obj['surname'];
        foreach ($obj as $key => $value)
          {
                    // get cat id n values
                    $o = (array) $value;
                    foreach($o as $i)

                    $obj = (array) $obj;
              echo '<pre>' . var_dump($obj[0]["name"]) . '</pre>';


}




*/


///end of list customers


//wp_die(var_dump(list_customers()));
function recursive_array_search($needle, $haystack, $strict = true)
{
  $iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($haystack), RecursiveIteratorIterator::SELF_FIRST);

  while ($iterator->valid())
  {
    if ($iterator->getDepth() === 0)
    {
      $current_key = $iterator->key();
    }

    if ($strict && $iterator->current() === $needle)
    {
      return $current_key;
    }
    elseif ($iterator->current() == $needle)
    {
      return $current_key;
    }

    $iterator->next();
  }

  return false;
}




 
////CHECK CUSTOMERS 
 $link = mysqli_connect("localhost:3306", "root", "", "izu_wordpress");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers/list/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"src\": [
    {
      \"name\": \"date_last_update\",
      \"value\": \"2020-03-15 12:00:00\"
    },
    {
      \"name\": \"last_id\",
      \"value\": 1
    }
  ]
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);
//var_dump($response);


$obj= json_decode($response);
$obj2= (array) $obj;
$obj3 = (array) $obj2['rows'];
 foreach ($obj3 as $key => $value)
  {
    // get cat id n values
    $o = (array) $value;
    $email = $o['email'];
    $cust_n = $o['name'];
    $cust_s =$o['surname'];
    $cust_id =$o['id'];


    ///check if exists 
    ////add in woocommerce

    $doesexists = "SELECT * FROM izu_wordpress.wp6j_wc_customer_lookup where email ='$email';";
           if($result = mysqli_query($link, $doesexists))
            {
              if(mysqli_num_rows($result) > 0)
                {                     
                    continue; 
                }
              else 
              {   
                $insert ="insert into  izu_wordpress.wp6j_wc_customer_lookup (first_name, last_name, email,date_last_active,strooka_id) values ('$cust_n','$cust_s','$email', NOW(),$cust_id);";
              mysqli_query($link, $insert);
               // wc_create_new_customer( $email, $cust_n, '' );
              }
     foreach ($o as $key2 => $value2)
    {

      /////
    //echo '<pre>'.$key2.'</br>'.$value2.'</pre>';
      continue;
      }
  }
  }
  ///check if customer is in strooka  
 $woo_customer = "SELECT * FROM izu_wordpress.wp6j_wc_customer_lookup;";
               if($result = mysqli_query($link, $woo_customer))
                {
                    if(mysqli_num_rows($result) > 0)
                    {   
                        while($row = mysqli_fetch_array($result))
                          {   
                            $name = $row['first_name'];
                            $lastname = $row['last_name'];
                            $email = $row['email'];
                            $country = $row['country'];
                            $postcode = $row['postcode'];
                            $city = $row['city'];
                            $state = $row['state'];
                             

                             if(recursive_array_search($email, $obj3))
                             {
                             continue;
                             }
                            else 
                            {
                             
                            
                         $ch = curl_init();

                            curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers/add/");
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                            curl_setopt($ch, CURLOPT_HEADER, FALSE);

                            curl_setopt($ch, CURLOPT_POST, TRUE);

                            curl_setopt($ch, CURLOPT_POSTFIELDS, "{
                              \"name\": \"$name\",
                              \"surname\": \"$lastname\",
                              \"email\": \"$email\",
                              \"birth_date\": \" \"
                            }");

                            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                              "Content-Type: application/json",
                              "Shared-Key: 5c353006fceab103872a1fb92928ec79"
                            ));

                            $response = curl_exec($ch);
                            curl_close($ch);   
                          }
                          }

                    }
                }                           









 
show_cat(get_cat());
show_prod(list_products());






?>