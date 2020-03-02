<include href="views/header.html">

    <body class="newBody">

        <div class="form-group m-5">
            <h3 class="mb-2">Summary</h3>
            <hr>
            <br>
            <?php
            //Connect to db
            require ('/controller/connect.php');

            //Define the query
            $sql = 'SELECT DISTINCT member_id, fname, lname, age, gender, phone, email, state, seeking,
                bio, premium, image FROM member';

            //Send the query to the database
            $result = mysqli_query($cnxn, $sql);
            ?>

            <table id="member-table" class="display">
                <thead>
                <tr>
                    <th>Member id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>Seeking</th>
                    <th>Biography</th>
                    <th>Premium</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                <?php
                //Print the results
                while ($row = mysqli_fetch_assoc($result)) {
                    $member_id = $row['member_id'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $age = $row['age'];
                    $gender = $row['gender'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $state = $row['state'];
                    $seeking = $row['seeking'];
                    $bio = $row['bio'];
                    $premium = $row['premium'];
                    $image = $row['image'];

                    echo "<tr>
                                      <td>$member_id</td>
                                      <td>$fname</td>
                                      <td>$lname</td>
                                      <td>$age</td>
                                      <td>$gender</td>
                                      <td>$phone</td>
                                      <td>$email</td>
                                      <td>$state</td>
                                      <td>$seeking</td>
                                      <td>$bio</td>
                                      <td>$premium</td>
                                      <td>$image</td>
                                  </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script src="scripts/guestbook.js"></script>
        <script>
            $('#member-table').DataTable();
        </script>
    </body>