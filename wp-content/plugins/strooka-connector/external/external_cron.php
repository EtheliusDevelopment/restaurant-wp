<?php
$link = mysqli_connect("localhost:3306", "izumilan_mil", "a1r~20Rd", "izumilan_mil");

/*


function delete_customer($id)
{

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers/delete/$id/");
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




////CHECK CUSTOMERS

//copmmented for now  
 $link = mysqli_connect("localhost:3306", "izumilan_mil", "a1r~20Rd", "izumilan_mil");

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
var_dump($response);
/*


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
       foreach ($o as $key2 => $value2)
    {
    echo '<pre>'.$key2.'</br>'.$value2.'</pre>';
      }
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
                $insert ="insert into  izu_wordpress.wp6j_wc_customer_lookup (first_name, last_name, email,strooka_id) values ('$cust_n','$cust_s','$email',$cust_id);";
                //mysqli_query($link, $insert);
              //  wc_create_new_customer( $email, $cust_n, '' );
              }
     foreach ($o as $key2 => $value2)
    {
    echo '<pre>'.$key2.'</br>'.$value2.'</pre>';
      }
  }
  } 






*/
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



  //GET ALL WC CUSTOMERS /// compare them with the strooka ones

function get_customer_meta($post_id){
   $link = mysqli_connect("localhost:3306", "izumilan_mil", "a1r~20Rd", "izumilan_mil");
   $get_cust = "SELECT * FROM wp_postmeta WHERE post_id = $post_id;";
   if($result = mysqli_query($link, $get_cust))
            {
              if(mysqli_num_rows($result) > 0)
              {
        while($row = mysqli_fetch_array($result))
                  { 
                   if($row['meta_key']=="_billing_first_name")
                   {
                    $name = $row['meta_value'];
                   }
                    if($row['meta_key']=="_billing_last_name")
                   {
                    $lastname = $row['meta_value'];
                   }
                   if($row['meta_key']=="_billing_email")
                   {
                    $email = $row['meta_value'];
                   }                   
                  }
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
/*
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






$get_cust = "SELECT ID, post_author, post_date, post_status, post_type FROM wp_posts
WHERE post_type = 'shop_order' and post_status='wc-completed';";
if($result = mysqli_query($link, $get_cust))
            {
              if(mysqli_num_rows($result) > 0)
              {
        while($row = mysqli_fetch_array($result))
                  {  
                  $post_id = $row['ID'];
                   $get_meta ="SELECT * FROM wp_postmeta WHERE post_id = $post_id;";                              
                              if($result2 = mysqli_query($link, $get_meta))
                          {
                          if(mysqli_num_rows($result2) > 0)
                            {
                    while($row2 = mysqli_fetch_array($result2))
                    {

                      if($row2['meta_key']=="_billing_email")
                      { 
                        //$post_id = $row2['meta_id'];
                        $email = $row2['meta_value'];

                        if(recursive_array_search($email, $obj3))
                        {
                          continue;
                        }
                        else
                        {

                          get_customer_meta($post_id);
                        }
                      }
                  //    echo '<pre>'.$row2['meta_key']. ' :  '.$row2['meta_value']. '</pre>';
                    }
                    //echo '<hr>';
                  } 
                
          }
              }                         
             }   
             }










///LIST CUSTOMER ADDRESSES
/*
  $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/customers_addresses/list/");
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





/*

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.strooka.com/categories/delete/32/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     "Content-Type: application/json",
      "Shared-Key: 5c353006fceab103872a1fb92928ec79"
      ));

    $response = curl_exec($ch);
    curl_close($ch);

    var_dump($response);




*/











?>

