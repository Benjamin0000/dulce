<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
    <title>Payment</title>
    <script>
        window.payment_success = ""; 
        function loadPaymentSuccess() {
            // Create a new XMLHttpRequest object
            const xhr = new XMLHttpRequest();
            // Define the URL of the success page
            const url = '{{ route('process_payment', $order['id']) }}';

            // Set up the AJAX GET request
            xhr.open('GET', url, true);

            // Define a callback function to handle the response
            xhr.onreadystatechange = function() {
                // Check if the request is complete and successful
                if (xhr.readyState === 4 && xhr.status === 200) { 
                    window.payment_success = true;
                    window.location.href = "{{route('payment_successful')}}"

                } else if (xhr.readyState === 4) {
                    window.payment_success = false;
                    // If the request fails, log an error message
                    console.error('Error loading the Payment Success page');
                }
            };
            // Send the AJAX request
            xhr.send();
        }

        function payWithMonnify() {
            MonnifySDK.initialize({
                amount:'{{$order['total_cost']}}' ,
                currency: "NGN",
                reference: new String((new Date()).getTime()),
                customerFullName: '{{$order['fullname']}}',
                customerEmail: '{{$order['email']}}',
                apiKey: "MK_TEST_GY5MP9BA6Q",
                contractCode: "3796982631",
                paymentDescription: "Payment for items at Dulce",
                metadata: {
                    "orderID": '{{$order['orderID']}}',
                },
                onLoadStart: () => {
                    console.log("loading has started");
                },
                onLoadComplete: () => {
                    console.log("SDK is UP");
                },
                onComplete: function(response) { 
                    //Implement what happens when the transaction is completed.
                    loadPaymentSuccess();
                },
                onClose: function(data) {
                    console.log(data); 
                    if(window.payment_success === false){
                        window.location.href = "{{route('payment_canceled')}}"
                    }else{
                        window.location.href = "{{route('payment_successful')}}"
                    }
                    //Implement what should happen when the modal is closed here
                }
            });
        }
    </script>
</head>
<body>
    {{-- <div>
        <button type="button" onclick="payWithMonnify()">Pay With Monnify</button>
    </div> --}}
    <script>
        window.onload = ()=>{
            payWithMonnify();
        }
    </script>
</body>
</html>