<?php

namespace App;

class WishList extends ObjectModel
{

    protected $table = 'wishlist';
    protected $fillable = ['user_id', 'product_id','status'];
    protected $user_id;
    protected $product_id;
    protected $rules = [];

	
    public function getWishList($user_id, $product_id)
    {
	    return $this->execute('SELECT * FROM wishlist where user_id = ? AND product_id = ?' , [$user_id, $product_id] );
    }

    public function addData($user_id, $product_id) {
        
        $query = $this->execute('SELECT * FROM wishlist where user_id = ? AND product_id = ?' , [$user_id, $product_id] );
        if(empty($query)){
            $this->product_id = $product_id;
            $this->user_id = $user_id;
            $id = parent::add();
            return $id;
        } else{
            $id = $this->updateRow($this->table, ['status' => 1], 'user_id = :user_id AND product_id = :product_id', [ 'user_id' => $user_id, 'product_id' => $product_id ] );
            return $id;
        }
    }

    public function updateData($user_id, $product_id) {
        $id = $this->updateRow($this->table, ['status' => 0], 'user_id = :user_id AND product_id = :product_id', [ 'user_id' => $user_id, 'product_id' => $product_id ] );
        return $id ;
    }
}