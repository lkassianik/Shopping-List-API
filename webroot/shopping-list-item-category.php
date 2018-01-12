<?php

  function categorize_item($item_id = 0, $category_id = 0) {
      global $connection;

      $query="INSERT INTO shopping_list_item_category 
        SET item_id='{$item_id}',
          category_id='{$category_id}'";

      if(mysqli_query($connection, $query)) {
        $response=array(
          'status' => 1,
          'status_message' =>'Category For Item Added Successfully.'
        );
      }
      else {
        $response=array(
          'status' => 0,
          'status_message' =>'Category For Item Addition Failed.'
        );
      }

      echo json_encode($response);  
  }

  function get_item_category($item_id = 0) {
    global $connection;

    $query = "SELECT * FROM shopping_list_item_category";

    if($item_id != 0) {
      $query.=" WHERE item_id=".$item_id." LIMIT 1";
    }

    $response = array();
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
      $response[]=$row;
    }
    return json_encode($response);
  }