<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    

</head>
<body>

<div class="container">

    <form action="">

        <div class="row">

            <div class="col">

                <h3 class="title">Donate</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" id="name" name="name" placeholder="Enter your Name">
                </div>
                <!-- <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="example@example.com">
                </div>
                <div class="inputBox">
                    <span>Mobile :</span>
                    <input type="text" placeholder="Mobile no">
                </div> -->
                <div class="inputBox">
                    <span>Amount :</span>
                    <input type="text" id="amt" name="amt" placeholder="Amount">
                </div>

                

            </div>

            
        <input type="button" value="Pay Now" name="btn" id="btn" onclick="pay_now()" class="submit-btn">

    </form>

</div>    
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_qyeFWGZQg3HDJy", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Food Donation",
                        "description": "Test Transaction",
                        "image": "https://cdni.iconscout.com/illustration/premium/thumb/food-donation-box-6500855-5433272.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>
    
</body>
</html>