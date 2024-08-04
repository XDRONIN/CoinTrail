<?php
$item0=$_POST['item0'];
$price0=$_POST['price0'];

//echo''.$item1.''.$price1;

$items=array();
$items[0]=$item0;
$prices=array();
$prices[0]=$price0;
for($i= 1;$i<50;$i++){
    $nextItem=$_POST['item'.$i.''];
    $nextPrice=$_POST['price'.$i.''];
   // echo''.$nextItem.'';
   if($nextItem!=null && $nextPrice!=null){
    $items[$i]=$nextItem;
    $prices[$i]=$nextPrice;
   }
   elseif($nextItem!=null){
    $items[$i]=$nextItem;

}
else{
    break;
}

}
foreach($items as $item) {
    echo"".$item."";}
 foreach($prices as $price) {
        echo"".$price."";}    

       ?>