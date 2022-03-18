<?php
require_once("databaseConnect.php");
require_once __DIR__ . '/vendor/autoload.php';

if(isset($_GET['order'])){

$order_id = $_GET['order'];

$selectOrder = "SELECT * FROM `orders`  WHERE `order_id` = '$order_id' " ;    
$runselectOrder = mysqli_query($connect, $selectOrder);

while ($row = mysqli_fetch_array($runselectOrder)) {
    
    $customer_id = $row['customer_id'];
    $customer_nid = $row['customer_nid'];
    $customer_name = $row['customer_name'];
    $package_id = $row['package_id'];
    $phone_number = $row['phone_number'];
    $email = $row['email'];
    $payment_status = $row['payment_status'];
    $nominee_nid = $row['nominee_nid'];
    $order_time = $row['order_time'];
    $order_cancel = $row['order_cancel'];
      
    $selectNominee = "SELECT * FROM `nominee`  WHERE `order_id` = '$order_id' " ;
    $runselectNominee = mysqli_query($connect, $selectNominee);
    
    while ($row2 = mysqli_fetch_array($runselectNominee)) {
        
          $nominee_id = $row2['nominee_id'];
          $full_name = $row2['full_name'];
          $relation_ship = $row2['relation_ship'];
          $birth_date = $row2['birth_date'];
          $email = $row2['email'];
          $flat_area = $row2['flat_area'];
          $post_office = $row2['post_office'];
          $thana = $row2['thana'];
          $district = $row2['district'];
          $post_code = $row2['post_code'];
          $division = $row2['division'];
    }
    
    $selectPackage = "SELECT * FROM `package`  WHERE `package_id` = '$package_id' " ;    
    $runselectPackage = mysqli_query($connect, $selectPackage);
    
    while ($row3 = mysqli_fetch_array($runselectPackage)) {
        
          $package_name = $row3['package_name'];
          $premium = $row3['premium'];
          $coverage = $row3['coverage'];
    }
}

if($payment_status == 0){$payment_sta = 'Unpaid';}else{$payment_sta = 'Paid';}

$date = date('d/m/Y h:i a', strtotime($order_time));

$data .= '<center ><b>Health Insurance Invoice </b></center><br><br>';

$data .= '<h3>Invoice Number :#'.$order_id.'</h3>';
$data .= 'Premium :'.$premium.'<br>';
$data .= "Payment Status : <span style='color:red;'>".$payment_sta."</span><br>";
$data .= 'Order Time :'.$date.'<br><br>';

$data .= '<center><b>Invoice To</b></center>';
$data .= 'Customer Name :'.$customer_name.'<br>';
$data .= 'Customer NID :'.$customer_nid.'<br>';
$data .= 'Customer Phone Number :'.$phone_number.'<br>';
$data .= 'Customer Email :'.$email.'';
$data .= '<br><br>';

$data .= '<center><b>Nominne Info</b></center>';
$data .= 'Nominne Name :'.$full_name.'<br>';
$data .= 'Nominne NID :'.$nominee_nid.'<br>';
$data .= 'Relationship :'.$relation_ship.'<br>';
$data .= 'Birthdate :'.$birth_date.'<br>';
$data .= 'Email :'.$email.'<br>';
$data .= 'Address :'.$flat_area.' P.O: '.$post_office.' P.S.: '.$thana.' Dist : '.$district.' - '.$post_code.'<br>';
$data .= '<br><br>';

$data .= '
<table class="table" style="width:100%;" border="1">
  <thead>
    <tr>
      <th style="text-align:center;">Description</th>
      <th >Total</th>>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th style="text-align:right;">Package :'.$package_name.'</th>
      <td style="text-align:center;">TK '.$premium.' BDT</td>
    </tr>
    <tr>
      <td style="text-align:right;">Ttotal</td>
      <td style="text-align:center;">TK '.$premium.' BDT</td>
    </tr>
  </tbody>
</table>

';


$mpdf = new Mpdf\Mpdf([
    'mode' => 'c',
    'margin_top' => 20,
    'margin_bottom' => 12,
    'margin_header' => 10,
    'margin_footer' => 10,
  ]);

$mpdf->WriteHTML($data);

$mpdf->showImageErrors = true;
$mpdf->mirrorMargins = 1;
// Output a PDF file directly to the browser
$mpdf->Output('Invoice-'.$order_id.'.pdf', 'D');

}else{
    header('location : dashboard.php');
}

?>