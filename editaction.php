<?php
include('connect.php'); 
$bTb=$_POST['Btb-input'];
//echo''.$bTb.'';
$checkSql="SELECT * FROM $bTb";//to check if there is data in a row or not if yes-update else -insert
$checkQuery=mysqli_query($conn,$checkSql);

for($i= 1;$i<50;$i++){
    $checkRow=mysqli_fetch_array($checkQuery);
    $nextItem=$_POST['item'.$i.''];
    $nextPrice=$_POST['price'.$i.''];
    if($i==1){
        $sql1="UPDATE $bTb SET price = $nextPrice WHERE id = $i";
        $result1=mysqli_query($conn,$sql1);

    }
    else{
        if($checkRow){
            if($nextItem!=null and $nextPrice!=null){
            $sql2="UPDATE $bTb SET item = '$nextItem', price = '$nextPrice' WHERE id = $i";
            $result2=mysqli_query($conn,$sql2);}
            elseif($nextItem!=null and $nextPrice==null){
                $sql2="UPDATE $bTb SET item = '$nextItem', price = NULL WHERE id = $i";
                $result2=mysqli_query($conn,$sql2);}
            elseif($nextItem==null && $nextPrice!=null){
                echo "<script>alert('Item Name Cant Be Empty')</script>";
               
                break;
            }
        }
        elseif($checkRow==false and ($nextItem !=null and $nextPrice!=null)){
            
            $sql3= "INSERT INTO $bTb (item,price) VALUES ('$nextItem','$nextPrice')";
            $result3=mysqli_query($conn,$sql3);}
        elseif($checkRow==false and $nextItem !=null and $nextPrice==null){
                $sql3= "INSERT INTO $bTb (item,price) VALUES ('$nextItem',NULL)";
                    $result3=mysqli_query($conn,$sql3);
            }
        
        else{
            header("Location:http://localhost/MiniProject/budget.php
            ");
            exit();
            break;//exit loop if no more values added
        }
    }
} 

?>