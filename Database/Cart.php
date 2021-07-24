<?php


class Cart
{
 public $db = null;

 public  function  __construct(DbController $db)
 {
     if (!isset($db->con)) return null;
     $this->db = $db;

 }

 protected function addToCart($params= null,$table='cart'){

     if(isset($this->db->con)){

         if($params!= null){

             $column = implode(',',array_keys($params));
             $values = implode(',',array_values($params));

//            SQL Quary
             $query = sprintf("INSERT INTO %s(%s) VALUES (%s)",$table,$column,$values);
             $result = $this->db->con->query($query);
             
             return $result;
         }
     }

 }
  public  function  adding($userid,$itemid){
        if(isset($userid) && isset($itemid)){
            $param = array(
                'user_id'=>$userid,
                'item_id'=>$itemid
            );
        }
        $result = $this->addToCart($param);
        if($result){
            header('Location: index.php');
        }
  }
 public function cartArr($params = null): array
 {

     $tt = array_map(function ($data) {
//    print_r($data['item_id']);
         return $data['item_id'];
     }, $params);
return array_unique($tt);
 }

    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }


}