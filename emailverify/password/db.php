<?php 
require_once('config/connection.php');
$query = "SELECT * FROM storage";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data From Database</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>
<body class="bg-dark ">
    <div class="container" >
        <div class="col"></div>
        <div class="card mt-5">
            <div class="card-header">
                <h2 class="Display-6 text-center">Fetch Data From Database</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr class="bg-dark text-white">
                        <td>Count</td>    
                        <td>Website</td>
                        <td>Username</td>
                        <td>Password</td>
                        <td>Copy</td>
                    </tr>
                    <?php  
                     $count = 1; // Initialize a counter variable
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                    <td><?php echo $count++; ?></td> <!-- Display the column number and increment the counter -->
                        <td><?php echo $row['website']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td id="password_<?php echo $row['password']; ?>"><?php echo $row['password']; ?></td>
                        <td><button class="btn btn-primary copy-button" data-id="<?php echo $row['password']; ?>">Copy</button></td>
                    </tr>   
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div>
        <br>    
        <div class="text-center">
    <form action="decrypt.php">
        <p><span style="color: red; font-size: 20px;">Copy your Password & Click on Decrypt Button to Show Original Password</span></p>
        <button class="btn btn-primary">Decrypt Password</button>
    </form>
</div>
    </div>

    <script>
        // Add event listeners to all copy buttons
        var copyButtons = document.querySelectorAll('.copy-button');
        copyButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var passwordId = this.getAttribute('data-id');
                var passwordText = document.getElementById('password_' + passwordId).innerText;
                copyToClipboard(passwordText);
            });
        });

        // Function to copy text to clipboard
        function copyToClipboard(text) {
            var textarea = document.createElement('textarea');
            textarea.textContent = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert('Password copied to clipboard!');
        }
    </script>
</body>
</html>
