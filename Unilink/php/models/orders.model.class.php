<?
class Orders extends Dbh{
    protected function getOrders(){
            $stmt = $this->connect()->prepare('SELECT* FROM orders;');
            if(!$stmt->execute()){
                $stmt = NULL;
                exit();
            }
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return  $results;
    }
}