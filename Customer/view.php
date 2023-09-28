<?php include "header.php" ?>
<div class="container">
  <h2>My Bills</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Date</th>
		<th>Quantity</th>
        <th>Amount</th>

      </tr>
    </thead>
    <tbody>
	<?php
	$phone = $_SESSION['name'];
	$stmt = $conn->query("SELECT customer.customerid, customer.phone, bills.quantity, bills.amount, bills.customerid, bills.date 
	FROM customer, bills where customer.phone = '$phone' AND customer.customerid = bills.customerid order by bills.id desc");
	while($row = $stmt->fetch()){
	?>
  
      <tr>
	  
		<td><?php echo $row['date']; ?></td>
		<td><?php echo $row['quantity']; ?></td>
		<td><?php echo $row['amount']; ?></td>
      </tr>
      
	<?php } ?>
    </tbody>
  </table>
</div>

<!--pay process-->
<?php 
require 'stripe-php-master/init.php';
// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
\Stripe\Stripe::setApiKey('sk_test_51N0JuoCGDKAmDhvyv4ylo81ZuTN9RZEFVJ8REAB5jSH0Ll8QKLHVGof1MRe56SWCfzLat3cNFDH4u0865nAzKo7V00M2Nlcdnz');

$intent = \Stripe\PaymentIntent::create([
  'amount' => 50,
  'currency' => 'usd',
  // Verify your integration in this guide by including this parameter
  'metadata' => ['integration_check' => 'accept_a_payment'],
]);


?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Favicon -->
       <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <title>Stripe Custom Payment flow integration using PHP/JavaScript</title>
  <script src="https://js.stripe.com/v3/"></script>

</head>
<style>
.demoInputBox {
    padding: 10px;
    border: #d0d0d0 1px solid;
    border-radius: 4px;
    background-color: #FFF;
    width: 100%;
    margin-top: 5px;
    box-sizing:border-box;
}
button {
  float: left;
  display: block;
  background: #27324E;
  color: white;
  border-radius: 2px;
  border: 0;
  margin-top: 20px;
  font-size: 19px;
  font-weight: 400;
  width: 100%;
  height: 47px;
  line-height: 45px;
  outline: none;
}

button:focus {
  background: #24B47E;
}

button:active {
  background: #159570;
}

.main-amount{
  font-size: 20px;
  font-weight: bold;
  color: #27324E;
  letter-spacing: 2px;
  border: 1px solid green;
  background-color: #f9f9f9;
  padding: 10px;
  text-decoration:none;
  display: inline-block; 
  }   
 </style> 
<body>
  <div class="container">
    
    <div class="row">
             <br>

      <div class="col-lg-4">
  
 <!-- card element goes here-->
<form id="payment-form" data-secret="<?= $intent->client_secret ?>">
  <div class="field-row">
        <label>Card Holder Name</label> <span id="card-holder-name-info" class="info"></span><br> 
        <input type="text" id="fullname" name="fullname" class="demoInputBox" required>
    </div><br>
    <div class="field-row">
        <label>Email</label> <span id="email-info" class="info"></span><br>
        <input type="email" id="email" name="email" class="demoInputBox" required>
    </div>
<br>
  <div id="card-element">
    <!-- Elements will create input elements here -->
  </div>

  <!-- We'll put the error messages in this element -->
  <div id="card-errors" role="alert"></div>

  <button id="card-button">Pay</button>
</form>

 
      </div>
      
      <div class="col-lg-6">
        
      </div>
      
    </div>
    
  </div>
 
<script>
  // Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/apikeys
var stripe = Stripe('pk_test_51N0JuoCGDKAmDhvy8UdY9PXbqt7sX563ga6NYkacS2UTYShaIBfpySY95Vd9dbVXBu7FpHBKiVHO3irKdyKLf6tK00Ev7Hi6il');
var elements = stripe.elements();

// Set up Stripe.js and Elements to use in checkout form
var style = {
  base: {
    color: "green",
  }
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

var form = document.getElementById('payment-form');
var fullname = document.getElementById('fullname');
var email = document.getElementById('email');
form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  // If the client secret was rendered server-side as a data-secret attribute
  // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
  stripe.confirmCardPayment(form.dataset.secret, {
    payment_method: {
      card: card,
      billing_details: {
        name: fullname,
        email: email
      }
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      alert(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
        alert('The payment has been proccessed');
        window.location.replace("http://localhost/phGarbage/customer/success.php");

      }
    }
  });
});


</script>

</body>
</html>
<?php include "footer.php" ?>
		
		