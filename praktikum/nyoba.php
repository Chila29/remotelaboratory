<?php
$hal = "dashboard";
include('../component/connectdb.inc.php');
include('../component/head.inc.php');
?>
<form action="" method="POST" id="start">
    <button class="btn btn-primary forward" value="1" name="forward">Forward Start</button>
    <button class="btn btn-primary stop" value="0" name="stop">Stop</button>
    <button class="btn btn-primary reverse" value="1" name="reverse">Reverse Start</button>
    <script>
        $(document).ready(function() {
            $('.forward').click(function(e) {
                $.ajax({
                    type: "POST",
                    url: "../_actions/sendStartForward.php",
                    data: {
                        start: $(".forward").attr('value')
                    },
                    success: function() {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            icon: 'success',
                            title: 'START FORWARD!!!'
                        })
                    }
                })
                e.preventDefault();
            })
            $('.reverse').click(function(e) {
                $.ajax({
                    type: "POST",
                    url: "../_actions/sendStartReverse.php",
                    data: {
                        start: $(".reverse").attr('value')
                    },
                    success: function() {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            icon: 'success',
                            title: 'START REVERSE!!!'
                        })
                    }
                })
                e.preventDefault();
            })
            $('.stop').click(function(e) {
                $.ajax({
                    type: "POST",
                    url: "../_actions/sendStop.php",
                    data: {
                        start: $(".stop").attr('value')
                    },
                    success: function() {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            icon: 'success',
                            title: 'STOP!!!'
                        })
                    }
                })
                e.preventDefault();
            })
        })
    </script>
</form>

<?php
var_dump($_POST);
?>