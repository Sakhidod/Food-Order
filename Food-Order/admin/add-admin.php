<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <form action="" method="POST">
            
           <table class="tbl-30">
               <tr>
                   <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

           </table>

        </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    // Process the Value from Form and Save it in Database

    // Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // 1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Password Encryption with MD5

        // 2. SQL Query to Save the data into the database
        $sql = "INSERT INTO tbl_admin (full_name, username, password) VALUES ('$full_name', '$username', '$password')";


        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4. Check whether the (Query is Execute) data is interested or not and display apprropriate message
        if($res==TRUE)
        {
            //Data Iserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
             //Failed to Insert Data
             //echo"Faile to Insert Data";
             //Create a Session Variable to Display Message
             $_SESSION['add'] = "Failed to Add Admin";
             //Redirect Page to Add Admin
             header("location:".SITEURL.'admin/add-admin.php');
        }

      
    }
?>
