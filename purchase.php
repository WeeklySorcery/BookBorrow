<?php 
require 'config.php';

if(mysqli_connect_error()){
    echo "<script>
    alert('Cannot connect to database');
    window.location.href = 'cart.php';
    </script>";
    exit();
}

    if(isset($_POST['purchase'])){
        $user_id = $_SESSION['user_active'];

        $sqljoint = "SELECT users.user_id, cart_id, book_id, `name`, qty FROM `cart`, `users`, `products` WHERE cart.book_id = products.product_id AND cart.user_id = users.user_id AND users.user_id = $user_id;";
        $result_joint = mysqli_query($conn, $sqljoint);

        $query2="INSERT INTO orders(user_id, cart_id, book_id, f_name, quantity, phone_no, `address`, pay_mode) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        global $mysqli_prepare; 
        $stmt=$conn->prepare($query2);

        //Add to payment
        $sqlpayment = "SELECT * FROM `cart` WHERE user_id = $user_id;";
        $result_paym = mysqli_query($conn, $sqlpayment);
        $queryPaym="INSERT INTO payment(user_id, book_id, `date`) 
        VALUES (?, ?, ?)";
        $stmtPaym=$conn->prepare($queryPaym);

        

        if($stmtPaym){
            mysqli_stmt_bind_param($stmtPaym, "iid", $useID, $bookieID, $date_occ);
            foreach($result_paym as $key => $values) {
                $useID = $values['user_id'];
                $bookieID = $values['book_id'];
                $date_occ = date("Ymd");
                mysqli_stmt_execute($stmtPaym);
            }
        }

        //Add to deliver
        $sqlpayment1 = "SELECT * FROM `cart` WHERE user_id = $user_id;";
        $result_paym1 = mysqli_query($conn, $sqlpayment1);
        $queryPaym1="INSERT INTO delivery(user_id, `date`) 
        VALUES (?, ?)";
        $stmtPaym1=$conn->prepare($queryPaym1);
        
        if($stmtPaym1){
            mysqli_stmt_bind_param($stmtPaym1, "id", $use_del_ID, $date_del_occ);

            foreach($result_paym1 as $key => $values) {
                $use_del_ID = $values['user_id'];
                $date_del_occ = date("Ymd", strtotime('5 days'));
                mysqli_stmt_execute($stmtPaym1);
            }
        }


        if($stmt){
            mysqli_stmt_bind_param($stmt, "iiisiiss", $userID, $cartID, $bookID, $fName, $quant, $ph, $ad, $pm);
            foreach($result_joint as $key => $values) {
                $userID = $values['user_id'];
                $cartID = $values['cart_id'];
                $bookID = $values['book_id'];
                $fName = $values['name'];
                $quant = $values['qty'];
                $ph = "$_POST[phone_no]";
                $ad = "$_POST[address]";
                $pm = "$_POST[pay_mode]";
                mysqli_stmt_execute($stmt);
            }
            echo "<script>
            alert('Order Placed!');
            window.location.href = 'index.php';
            </script>";

            //Delete
            $query3deletion = "DELETE FROM `cart` WHERE user_id = '$user_id'";
            $stmtCartDeletion = $conn->prepare($query3deletion);
            mysqli_stmt_execute($stmtCartDeletion);
    

        } else {
            
            echo "<script>
            alert('SQL Error');
            window.location.href = 'cart.php';
            </script>";
            
        }

    }
?>
