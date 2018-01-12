<?php

  function get_categories($category_id = 0) {
    global $connection;

    $query = "SELECT * FROM shopping_list_category";

    if($item_id != 0) {
      $query.=" WHERE id=".$item_id." LIMIT 1";
    }

    $response = array();
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
      $response[]=$row;
    }
    return json_encode($response);
  }  

  // use URL:
  // http://www.yourpath.com/?api_method=insert_category&category_name=newCategory
  function insert_category() {
    global $connection;

    $category_name = $_REQUEST["category_name"];

    $query="INSERT INTO shopping_list_category 
      SET name='{$category_name}'";

    if(mysqli_query($connection, $query)) {
      $response=array(
        'status' => 1,
        'status_message' =>'Category Added Successfully.'
      );
    }
    else {
      $response=array(
        'status' => 0,
        'status_message' =>'Category Addition Failed.'
      );
    }

    echo json_encode($response);
  }  

  function delete_category($item_id) {
    global $connection;
    $query="UPDATE shopping_list_category 
      SET active=0
      WHERE id=".$item_id;

    if(mysqli_query($connection, $query)) {
      $response=array(
        'status' => 1,
        'status_message' =>'Category Deleted Successfully.'
      );
    }
    else
    {
      $response=array(
        'status' => 0,
        'status_message' =>'Category Deletion Failed.'
      );
    }

    echo json_encode($response);
  }