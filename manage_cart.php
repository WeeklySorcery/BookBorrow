<?php 
session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['add_to_cart']))
        {

            if(isset($_SESSION['cart'])){

                $myitems=array_column($_SESSION['cart'], 'product_name');

                    if(in_array($_POST['product_name'], $myitems)){
                        echo "<script>
                            alert('Item already added');
                            window.location.href = 'http://localhost/BookBorrowTheUltimate/details.php?id=".$_POST['product_id']."';
                            </script>";
                    }
                    else{
                        $count=count($_SESSION['cart']);
                        $_SESSION['cart'][$count]=array('product_name'=>$_POST['product_name'], 'product_price'=>$_POST['product_price'],'Quantity'=>1);
                            echo "<script>
                            alert('Item  added');
                            window.location.href = 'http://localhost/BookBorrowTheUltimate/details.php?id=".$_POST['product_id']."';
                            </script>";
                    }
            }
            else 
            {
                $_SESSION['cart'][0]=array('product_name'=>$_POST['product_name'], 'product_price'=>$_POST['product_price'],'Quantity'=>1);
                echo "<script>
                alert('Item added');
                window.location.href = 'http://localhost/BookBorrowTheUltimate/details.php?id=".$_POST['product_id']."';
                </script>";
            }
        }
        if(isset($_POST['Remove_Item']))
        {
            foreach($_SESSION['cart'] as $key => $value){
                if($value['product_name']==$_POST['product_name'])
                {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo"<script>
                        alert('Item Removed');
                        window.location.href = 'cart.php';
                    </script>"; 
                }
            }
        }
        if(isset($_POST['Mod_Quantity']))
        {
            foreach($_SESSION['cart'] as $key => $value){
                if($value['product_name']==$_POST['product_name'])
                {
                    $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
                    
                    echo"<script>
                        window.location.href = 'cart.php';
                    </script>"; 
                }
            }
        }
    }



?>