<?php 

require_once ('../model/model.php');

function fetchAllUsers(){
	//echo 'success';
	return showAllUsers();

}
function fetchUsers($username){
	return showUsers($username);

}

function fetchAllProducts(){
	//echo 'success';
	return showAllProduct();

}

/*function fetchProduct($productName){
	return showProduct($productName);

}*/

function fetchSearch($productName){
	return search($productName);

}



?>