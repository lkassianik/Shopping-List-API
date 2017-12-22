<?php

  // Connect to database

  // Commenting out for now to test URL rewrites
  // $connection=mysqli_connect('localhost','root','','rest_api');

  function init() {
    $request_method=$_SERVER["REQUEST_METHOD"];
    $api_method = $_REQUEST['api_method'];  
      
    if ($request_method !== 'GET') {
      die("This API call must be made with GET");
    }

    echo $api_method;

    switch($api_method)
    {
      case 'get_items':
        $item_id = $_REQUEST['item_id'];
        if(!empty($item_id)) {
          get_items($item_id);
        }
        else {
          get_items();
        }
        break;
      default:
        // Invalid Request Method
        echo "You must specify an API method with '?api_method=...'.";
        die(500);
        break;
    }    
  }


  function get_items($item_id = 0) {

    echo '[
        {
          "name": "milk",
          "itemDescription": "white water"
        },
        {
          "name": "bread",
          "itemDescription": "baked spongy plant mush"
        }
      ]';    
}
// /*
//     global $connection;
//     $query = "SELECT * FROM shopping_list_item";

//     if($item_id != 0) {
//       $query.=" WHERE id=".$item_id." LIMIT 1";
//     }

//     $response = array();
//     $result = mysqli_query($connection, $query);
//     while ($row = mysqli_fetch_array($result)) {
//       $response[]=$row;
//     }
//     header('Content-Type: application/json');
//     echo json_encode($response);
// */
//   }  

/*
  function insert_item() {
    global $connection;
    $item_name = $_POST["item_name"];
    $item_description = $_POST["item_description"];
    $query="INSERT INTO shopping_list_item SET name='{$item_name}', description='{$item_description}'";

    if(mysqli_query($connection, $query)) {
      $response=array(
        'status' => 1,
        'status_message' =>'Item Added Successfully.'
      );
    }
    else {
      $response=array(
        'status' => 0,
        'status_message' =>'Item Addition Failed.'
      );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
  }


  function update_item($item_id) {
    global $connection;
    parse_str(file_get_contents("php://input"),$post_vars);

    $item_name = $post_vars["item_name"];
    $item_description = $post_vars["item_description"];

    $query="UPDATE shopping_list_item SET name='{$item_name}', description={$item_description} WHERE id=".$item_id;
    if(mysqli_query($connection, $query)) {
      $response=array(
        'status' => 1,
        'status_message' =>'Item Updated Successfully.'
      );
    }
    else {
      $response=array(
        'status' => 0,
        'status_message' =>'Item Updation Failed.'
      );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
  }

  function delete_item($item_id)
  {
    global $connection;
    $query="DELETE FROM shopping_list_item WHERE id=".$item_id;

    if(mysqli_query($connection, $query)) {
      $response=array(
        'status' => 1,
        'status_message' =>'Product Deleted Successfully.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Product Deletion Failed.'
      );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  */

  init();

?>

