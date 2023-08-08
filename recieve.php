<?php

include('header.php');


if (isset($_SESSION['UNAME'])) {
    $loggedInUsername = $_SESSION['UNAME'];

    // Fetch the money requests for the logged-in user from the database
    $sql = "SELECT * FROM request WHERE p_username = '$loggedInUsername'";
    $result = mysqli_query($con, $sql);

    // Check if there are any money requests for the logged-in user
    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1>Money Requests</h1>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $totalAmount = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $requestId = $row['id'];
                                        $requesterId = $row['r_username'];
                                        $amount = $row['amount'];
                                        $totalAmount += $amount;
                                        ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">Money Request from <?php echo $requesterId; ?></h5>
                                                <p class="card-text">Amount: <?php echo $amount; ?></p>
                                                <button class="btn btn-primary pay-button"
                                                        data-request-id="<?php echo $requestId; ?>">Pay
                                                </button>
                                            </div>
                                        </div>
                                    <?php }
                                    ?>
                                    <p class="total-amount">Total Amount: <?php echo $totalAmount; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1>Money Requests</h1>
                                </div>
                                <div class="card-body">
                                    <p>No money requests found </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>User session not found. Please log in.</p>";
}

include('footer.php');
mysqli_close($con);
?>
<script>
    document.title="Pending";
    document.getElementById("recieve_link").classList.add('active');   
 </script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var payButtons = document.querySelectorAll('.pay-button');

        payButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var card = this.closest('.card');
                var requestId = this.getAttribute('data-request-id');

                // Perform AJAX request to handle the payment and remove the card
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'pay_request.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Payment successful, remove the card from the DOM
                            card.remove();
                        } else {
                            // Payment failed, handle the error or display a message
                            console.error('Payment error');
                        }
                    }
                };
                xhr.send('request_id=' + requestId);
            });
        });
    });
</script>
