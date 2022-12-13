<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "reglog");


if(mysqli_connect_error()){
    echo "<script>
    alert('Cannot connect to database');
    window.location.href = 'cart.php';
    </script>";
    exit();
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['purchase'])){
        
        $query1 =  "INSERT INTO `order_manager`(`User_id`, `Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) 
       VALUES ('$_POST[user_id]','$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]')";
        if(mysqli_query($conn, $query1)){
            
            $Order_Id=mysqli_insert_id($conn);
            $query2="INSERT INTO `user_orders`(Order_id, product_name, product_price, Quantity) VALUES (?,?, ?, ?) ";
            global $mysqli_prepare; 
            $stmt=$conn->prepare($query2);

            if($stmt){
                mysqli_stmt_bind_param($stmt, "isii", $Order_Id, $Item_Name, $Price, $Quantity);
                foreach($_SESSION['cart'] as $key => $values){
                    $Item_Name=$values['product_name'];
                    $Price=$values['product_price'];
                    $Quantity=$values['Quantity'];
                    mysqli_stmt_execute($stmt); }
                unset($_SESSION['cart']);
                echo "<script>
                alert('Order Placed!');
                window.location.href = 'index.php';
                </script>";
            } else {

                echo "<script>
            alert('SQL Error');
            window.location.href = 'cart.php';
            </script>";

            }
        }
        else{
            echo "<script>
            alert('SQL Error');
            window.location.href = 'cart.php';
            </script>";
        }
    }
}

?>
