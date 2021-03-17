<?php
  /*
    Plugin Name: <strong> Strooka Connector </strong>
    
    Description: Plugin to connect woocommerce to Strooka 
    Author: Kabir Lovero
    Version: 1.0
    
    */



/*ADD CATEGORY
ADD CATEGORY CURL ADDED IN ajax-actions.php

*/

/*edit category in term.php
if $taxonomy =="product_cat"

*/


/*delete  category in edit-tags.php
if $taxonomy =="product_cat"

*/



//require(dirname(__FILE__) . '/wp-load.php');

 
function Strooka_Connector(){
        add_menu_page( 'Strooka Connector', 'Strooka Admin', 'manage_options', 'strooka', 'strooka_admin' );
}




function add_this_to_new_products( $new_status, $old_status, $post ) {
    global $post;
    if ( $post->post_type !== 'product' ) return;
    if ( 'publish' !== $new_status or 'publish' === $old_status ) return;
    $PRODUCT= wc_get_product($post->ID);
    $PRODUCT_data = $PRODUCT->get_data();
    
/*HERE WE ADD CURL TO SEND NEW PRODUCT DATA*/


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/products/add/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"name\": \"".$PRODUCT_data['name']."\",
  \"active\": 1,
  \"description\": \"".$PRODUCT_data["description"]."\",
  \"img\": \" \",
  \"price\": ".intval($PRODUCT_data['price']).",
  \"categories\": ".$PRODUCT_data['category_ids'][0]."
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);
//wp_die( var_dump($response));
var_dump($response);




/*DONE PRODUCT ADD*/





}


function getProd_img($id)
{
  $link = mysqli_connect("localhost", "izumilan_mil", "a1r~20Rd", "izumilan_mil");
  $get_img = "SELECT * FROM izumilan_mil.wp6j_posts where post_parent=$id and post_mime_type='image/png';";
  if($result = mysqli_query($link, $get_img))
    {
    if(mysqli_num_rows($result) > 0)
      {          
       while($row = mysqli_fetch_array($result))
       {
       $img = $row['guid'];
        }
      }
    }
return $img;

}



function edit_product_post( $new_status, $old_status, $post ) {
    global $post;
    if ( $post->post_type !== 'product' ) return;
    
    $PRODUCT= wc_get_product($post->ID);
    $PRODUCT_data = $PRODUCT->get_data();
    

  //wp_die( var_dump("EDIOTEASD"));

 }

 function get_stroo_id($post_id)
 {
  $link = mysqli_connect("localhost", "izumilan_mil", "a1r~20Rd", "izumilan_mil");
  $get_str = "SELECT * FROM izumilan_mil.wp6j_posts where ID=$post_id;";
    if($result = mysqli_query($link, $get_str))
    {
    if(mysqli_num_rows($result) > 0)
      {          
       while($row = mysqli_fetch_array($result))
       {
       $str_id = $row['strooka_id'];
       }
      }
    }
return $str_id;

 }



 function mp_sync_on_product_save( $product_id ) {
     $product = wc_get_product( $product_id );
     /*HERE WE ADD CURL TO EDIT PRODUCT DATA*/

$prod_data =$product->get_data() ;
$name = $prod_data['name'];
$description = $prod_data['description'];
$price = $prod_data['price'];
$prod_id = $prod_data['id'] ;
$img =  getProd_img($prod_id);
$strooka_prod_id = get_stroo_id($prod_id);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/products/edit/$strooka_prod_id/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"name\": \"$name\",
  \"active\": 1,
  \"description\": \"$description\",
  \"img\": \"$img\",
  \"price\": $price,
  \"categories\":  1  
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);

//var_dump($response);
//wp_die($img);









//STOP EDIT PROD




}
/*delete prod*/
function deletepost($post_id){
  global $post;
    if ( $post->post_type !== 'product' ) return;
      
      $prod_id = wc_get_product($post->ID);
      $stroo_pr = get_stroo_id($prod_id);
      $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/products/delete/$stroo_pr/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);


}


/*new customer added */

function new_customer_added( $customer_get_id  ) { 
       $cust_id =  $customer_get_id  ;
$customer_Data = get_user_meta( $customer_get_id);
//$name = $customer_Data['first_name'][0];
//$lastname = $customer_Data['last_name'][0];
//$email = $customer_Data['email'][0];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers/add/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"name\": \"test2\",
  \"surname\": \"test4\",
  \"email\": \"test\",
  \"birth_date\": \" \"
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);


//wp_die(var_dump($customer_Data));
}; 
/* end of new customer code */
/*EDIT CUSTOMER*/



function edit_CUSTOMER( $customer_get_id  ) { 
$cust_id =  $customer_get_id  ;
$customer_Data = get_user_meta( $customer_get_id);
$name = $customer_Data['first_name'][0];
$lastname = $customer_Data['last_name'][0];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers/edit/$cust_id/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"name\": \"$name\",
  \"surname\": \"$lastname\"

}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
//wp_die(var_dump($response));


  }
  /*END EDIT CUSTOMER */

  /*start of address change function*/

function customerAddressChange($customer_get_id){

$customer_Data = get_user_meta( $customer_get_id);

$cust_id = $customer_get_id;
$address = $customer_Data['shipping_address_1'][0]; 
$zipcode = $customer_Data['billing_postcode'][0];
$city = $customer_Data['billing_city'][0];
$province  = $customer_Data['shipping_state'][0];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers_addresses/add/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"customer_id\": \"$cust_id\",
  \"name\": \"Casa\",
  \"doorphone\": \"\",
  \"address\": \"$address\",
  \"zipcode\": \"$zipcode\",
  \"city\": \"$city\",
  \"province\": \"$province\",
  \"coord\": \" \",
  \"default_delivery\": \"1\",
  \"default_billing\": \"1\",
  \"company\": \" \",
  \"vat\": \" \",
  \"taxcode\": \" \",
  \"sdi\": \" \",
  \"pec\": \" \"
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Shared-Key: 5c353006fceab103872a1fb92928ec79"
));

$response = curl_exec($ch);
curl_close($ch);
//wp_die(var_dump($response));



}


  /*end of address change function*/



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



 
//show_cat($obj3);




//Wp_die(show_cat($obj3));


///// get list of categories


/*
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

var_dump($response);
*/



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
            $img = $a['img'];
      
      //  echo '<pre>' . $c . '</pre>' ; 
        
            $prod_ex= "SELECT * FROM izumilan_mil.wp6j_posts where strooka_id=$c";
            $link = mysqli_connect("localhost", "izumilan_mil", "a1r~20Rd", "izumilan_mil");
               
           if($result = mysqli_query($link, $prod_ex))
            {
           
              if(mysqli_num_rows($result) == 0)

              {
                $insert_prod= "INSERT INTO izumilan_mil.wp6j_posts (post_author,post_date, post_date_gmt,post_title,post_status, comment_status  ,ping_status  ,post_name, post_modified ,post_modified_gmt,post_type, strooka_id) values (1,NOW(),NOW(),'$desc','publish', 'open','closed',' ',  now(),now(),'product',$c )";
             // echo $insert_prod;
               mysqli_query($link, $insert_prod);

/*

$post = array(
    'post_author' => 1,
    'post_content' => $desc,
    'post_status' => "publish",
    'post_title' => $desc,
    'post_type' => "product",
);

//Create post
$post_id = wp_insert_post( $post);
wp_set_object_terms( $post_id, 'simple', 'product_type' );
update_post_meta( $post_id, '_visibility', 'visible' );
update_post_meta( $post_id, '_stock_status', 'instock');
update_post_meta( $post_id, 'total_sales', '0' );
update_post_meta( $post_id, '_downloadable', 'no' );
update_post_meta( $post_id, '_virtual', 'no' );
update_post_meta( $post_id, '_regular_price', '' );
update_post_meta( $post_id, '_sale_price', '' );
update_post_meta( $post_id, '_purchase_note', '' );
update_post_meta( $post_id, '_featured', 'no' );
update_post_meta( $post_id, '_weight', '' );
update_post_meta( $post_id, '_length', '' );
update_post_meta( $post_id, '_width', '' );
update_post_meta( $post_id, '_height', '' );
update_post_meta( $post_id, '_sku', '' );
update_post_meta( $post_id, '_product_attributes', array() );
update_post_meta( $post_id, '_sale_price_dates_from', '' );
update_post_meta( $post_id, '_sale_price_dates_to', '' );
update_post_meta( $post_id, '_price', '$price' );
update_post_meta( $post_id, '_sold_individually', '' );
update_post_meta( $post_id, '_manage_stock', 'no' );
update_post_meta( $post_id, '_backorders', 'no' );
update_post_meta( $post_id, '_stock', '' );
/*if($post_id){
    $attach_id = get_post_meta($product->parent_id, "_thumbnail_id", true);
    add_post_meta($post_id, '_thumbnail_id', $attach_id);
}*/

                
              }    
            }            
            if(isset($img))  
            {
              
              $prod_ex= "SELECT * FROM izumilan_mil.wp6j_posts where strooka_id=$c";
              if($result = mysqli_query($link, $prod_ex))
                {
                    if(mysqli_num_rows($result) > 0)
                    {   
                        while($row = mysqli_fetch_array($result))
                          {            
                            $post_id = $row['ID'];                  
                            $insert_img = "INSERT INTO izumilan_mil.wp6j_posts (post_date, post_date_gmt,post_title,post_status, post_name,post_modified, post_modified_gmt , post_parent, guid, post_type, post_mime_type ) VALUES (NOW(), NOW(),  '$desc','inherit','$desc',NOW(), NOW(), $post_id,'$img','attachment', 'image/png'); ";
                            mysqli_query($link, $insert_img);
                            //echo 'IMG : ' . $insert_img;
                          }
                    }
                }
            }
            if(isset($price))
            {
               $prod_ex_p= "SELECT * FROM izumilan_mil.wp6j_posts where strooka_id=$c";
              if($result_p = mysqli_query($link, $prod_ex_p))
                {
                    if(mysqli_num_rows($result_p) > 0)
                    {   
                        while($row_p = mysqli_fetch_array($result))
                          {            
                            $post_id = $row['ID'];
                          
                          }
                    $insert_price = "INSERT INTO izumilan_mil.wp6j_postmeta (post_id, meta_key,meta_value) VALUES ($post_id,'_regular_price', '$price') ;";
                    mysqli_query($link, $insert_price);
                    $insert_price2 = "INSERT INTO izumilan_mil.wp6j_postmeta (post_id, meta_key,meta_value) VALUES ($post_id,'_price', '$price') ;";
                    mysqli_query($link, $insert_price2);
                    }

                }                           
            }
            $get_term_id = "SELECT * FROM izumilan_mil.wp6j_term_taxonomy where strooka_cat_id=$cat;";
              if($result_t = mysqli_query($link, $get_term_id))
                {
                    if(mysqli_num_rows($result_t) > 0)
                    {   
                        while($row_t = mysqli_fetch_array($result_t))
                          {            
                            $term_tax_id = $row_t['term_taxonomy_id'];
                            $insert_tax ="INSERT INTO izumilan_mil.wp6j_term_relationships (object_id, term_taxonomy_id) VALUES ($post_id, $term_tax_id) ";
                            mysqli_query($link, $insert_tax);
                            $insert_tax2 ="INSERT INTO izumilan_mil.wp6j_term_relationships (object_id, term_taxonomy_id) VALUES ($post_id, 2) ";
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






function strooka_admin(){
        $html = "<h1 class='strooka'>Strooka Connector</h1>";
        $html .= "<p class='strooka_par'>Use this page to sync with your strooka application</p>";
        $html .= "<h2 class='strooka_par'>Categories</h2>";
        $html .= "<label class='strooka_par'>Sync Categories</label>";
        $html .= "<p class='strooka_par'>Click the button below to sync the strooka categories with your woocommerce instance</p>";
        $html .= "<form action='https://www.izumilano.com/wp-content/plugins/strooka-connector/strooka_connector.php' method='post' ><button class='strooka_par' name='sync_cat'>Sync Categories</button></form>";
        $html .= "<h2 class='strooka_par'>Products</h2>";
        $html .= "<label class='strooka_par'>Sync Products</label>";
        $html .= "<p class='strooka_par'>Click the button below to sync the strooka Products with your woocommerce instance</p>";
        $html .= "<form action='https://www.izumilano.com/wp-content/plugins/strooka-connector/strooka_connector.php' method='post' ><button class='strooka_par' name='sync_prod'>Sync Products</button></form>";
        echo $html;

}
 
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










// file paths will be stored in an array keyed off md5(file path)






 
if(isset($_POST['sync_cat']))
{
show_cat(get_cat());
echo '<a href="https://www.izumilano.com/wp-admin/admin.php?page=strooka"><button class="strooka_par">Go Back </button></a>'; 
}

if(isset($_POST['sync_prod']))
{
  show_prod(list_products());
  echo '<a href="https://www.izumilano.com/wp-admin/admin.php?page=strooka"><button class="strooka_par">Go Back </button></a>'; 
} 

    ?>
