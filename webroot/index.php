<?php 
  include("shopping-list-config.php");
  include("shopping-list-item.php");
  include("shopping-list-category.php");

  // Connect to database

  $endpoint = ENDPOINT;
  $user = USERNAME;
  $password = PASSWORD;
  $database = DATABASE;

  $connection = mysqli_connect($endpoint, $user, $password, $database);

  function init() {
    $request_method=$_SERVER["REQUEST_METHOD"];
    $api_method = $_REQUEST['api_method'];  
      
    if ($request_method !== 'GET') {
      die("This API call must be made with GET");
    }

    switch($api_method)
    {
      case 'get_items':
        $item_id = $_REQUEST['item_id'];
        if(!empty($item_id)) {
          echo get_items($item_id);
        }
        else {
          echo get_items();
        }
        break;
      case 'update_item':
        $item_id = $_REQUEST['item_id'];
        if(!empty($item_id)) {
          update_item($item_id);
        } else {
          echo "You must specify item id with '&item_id=123' to update item...";
        }
        break;
      case 'insert_item':
        insert_item();
        break;  
      case 'delete_item':
        $item_id = $_REQUEST['item_id'];
        if(!empty($item_id)) {
          delete_item($item_id);
        } else {
          echo "You must specify item id with '&item_id=123' to delete item...";
        }
        break;
      case 'get_categories':
        $category_id = $_REQUEST['category_id'];
        if(!empty($category_id)) {
          echo get_categories($category_id);
        }
        else {
          echo get_categories();
        }
        break; 
      case 'insert_category':
        insert_category();
        break;                
      default:
        // Invalid Request Method
        echo "You must specify an API method with '?api_method=...'.";
        die(500);
        break;
    }    
  }

  init();


