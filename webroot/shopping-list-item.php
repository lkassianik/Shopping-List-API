<?php

  function get_items($item_id = 0) {
    global $connection;

    $query = "SELECT * FROM shopping_list_item";

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
  // http://www.yourpath.com/?api_method=insert_item&item_name=newItem&item_description=newDescription
  function insert_item() {
    global $connection;

    $item_name = $_REQUEST["item_name"];
    $item_description = $_REQUEST["item_description"];

    $query="INSERT INTO shopping_list_item 
      SET name='{$item_name}', 
      description='{$item_description}'";

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

    echo json_encode($response);
  }


  function update_item($item_id) {
    global $connection;

    $item = get_items($item_id);
    $item = json_decode($item, true);
    $item = $item[0];

    if ($item == null) {
      echo "No item with id={$item_id} exists in the database...";
      die(500);
    }

    $item_name = $_REQUEST["item_name"] ?: $item['name'];
    $item_description = $_REQUEST["item_description"] ?: $item['description'];
    $item_purchased = $_REQUEST["item_purchased"] ?: $item['purchased'];
    $item_in_queue = $_REQUEST["item_inqueue"] ?: $item['inQueue'];
    
    $query = "UPDATE shopping_list_item 
      SET name='{$item_name}', 
        description='{$item_description}', 
        purchased={$item_purchased}, 
        inQueue={$item_in_queue} 
      WHERE id={$item_id}";

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

    echo json_encode($response);
  }

  function delete_item($item_id)
  {
    global $connection;
    $query="UPDATE shopping_list_item 
      SET inQueue=0
      WHERE id=".$item_id;

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

    echo json_encode($response);
  }