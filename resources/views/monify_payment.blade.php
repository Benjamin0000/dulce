<html>
<head>
    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
    <script>
        function payWithMonnify() {
            MonnifySDK.initialize({
                amount:'{{$order['total']}}' ,
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
                    console.log(response);
                },
                onClose: function(data) {
                    //Implement what should happen when the modal is closed here
                    console.log(data);
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