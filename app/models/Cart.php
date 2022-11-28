<?php
namespace app\models;

class Cart extends \app\core\Model{

//for order history
	public function getByUser($user_id){
		$SQL = "SELECT * FROM cart WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetchAll();
	}

	public function getCart($user_id, $product_id){
		$SQL = "SELECT * FROM cart WHERE user_id=:user_id AND status=:status AND product_id=:product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id,
						'status'=>'cart',
						'product_id'=>$product_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Cart');
		return $STMT->fetch();
	}


	public function insertIntoCart()
	{
		$SQL = "INSERT INTO cart(user_id, product_id, custom_cake_id, quantity, unit_price, shipping_id, status) VALUES (:user_id, :product_id, :custom_cake_id, :quantity, :unit_price, :shipping_id, :status)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id,
						'product_id'=>$this->product_id,
						'custom_cake_id'=>$this->custom_cake_id,
						'quantity'=>$this->quantity,
						'unit_price'=>$this->unit_price,
						'shipping_id'=>$this->shipping_id,
						'status'=>'cart']);
	}

	public function updateOrderStatus(){
		$SQL = "UPDATE cart SET status=:status WHERE user_id = :user_id AND status = :intitStatus";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['status'=>'paid',
						'user_id'=>$this->user_id,
						'initStatus'=>'cart']);
	}

	public function updateQty(){
		$SQL = "UPDATE cart SET quantity=quantity+:quantity WHERE user_id = :user_id AND status = :status AND product_id = :product_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['quantity'=>1,
						'user_id'=>$this->user_id,
						'status'=>'cart',
						'product_id'=>$this->product_id]);
	}

	public function updateItemStatus(){
		$SQL = "UPDATE cart SET status=:status WHERE product_id = :product_id AND status = :intitStatus";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['status'=>$this->status,
						'product_id'=>$this->product_id,
						'initStatus'=>$this->initStatus]);
	}
}