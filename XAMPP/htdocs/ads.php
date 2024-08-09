<!DOCTYPE html>
<html>

<head>
    <title>AD's Registration</title>
</head>

<body>
    <div class="memory_back">
        <div class='memories__card'>
            <div align="center">
                <h1>AD's Entery Form</h1>
            </div>
            <form action="insert_ads.php" method="post" class="insert_form">
                <table align="center" style="font-size: 20px;" width="25%" class="form_table">
                    <tr>
                        <td>
                            <label>AD's id</label>
                        </td>
                        <td><input type="text" name="AD_id" placeholder="ex: ad01" /></td>
                    </tr>

                    <tr>
                        <td>
                            <label>AD's title</label>
                        </td>
                        <td><input type="text" name="AD_title" /></td>
                    </tr>

                    <tr>
                        <td>
                            <label>AD's Description</label>
                        </td>
                        <td><input type="text" name="AD_description" /></td>
                    </tr>

                    <tr>
                        <td>
                            <label>AD File</label>
                        </td>
                        <td>
                            <input type="radio" name="AD_file" value="Landing page" />Landing page <br>
                            <input type="radio" name="AD_file" value="Lead from" />Lead form <br>
                            <input type="radio" name="AD_file" value="Website" />Website
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>ADSet id</label>
                        </td>
                        <td>
                            <!-- <input type="text" name="ADSET_id" /> -->
                            <select name="ADSET_id" style="width: 100%;">
                                <option value="">Select id</option>
                                <option value="as1">as1</option>
                                <option value="as2">as2</option>
                                <option value="as3">as3</option>
                                <option value="as4">as4</option>
                                <option value="as5">as5</option>
                                <option value="as6">as6</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>User id</label>
                        </td>
                        <td>
                            <!-- <input type="number" name="USER_id"/> -->
                            <select name="USER_id" style="width: 100%;">
                                <option value="">Select id</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </td>
                    </tr>

                    <!-- <tr>
        <td>
            <label>User Name</label>
        </td>
        <td><input type="text" name="USER_name" /></td>
        </tr>
        <tr>
        <td>
            <label>Gender</label>
        </td>
        <td>
            <input type="radio" name="USER_gender" value="Male" />Male
            <input type="radio" name="USER_gender" value="Female" />Female
        </td>
        </tr>
        <tr>
        <td>
            <label>Email</label>
        </td>
        <td><input type="email" name="USER_Email" /></td>
        </tr>
        <tr>
        <td>
            <label>Phone no.</label>
        </td>
        <td><input type="phone" name="USER_number" /></td>
        </tr>
        <tr>
        <td>
            <label>Address</label>
        </td>
        <td>
            <input type="radio" name="USER_address" value="India" />INDIA
            <input type="radio" name="USER_address" value="USA" />USA
        </td>
        </tr> -->

                    <tr>
                        <td colspan="2" align="center" class="submit_btn">
                            <input type="submit" name="save" value="Submit" class="submit_btn" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>

<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dam";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // // Check connection
    // if (!$conn) 
    // {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    
    // // Prepare and bind parameters
    // $stmt = $conn->prepare("INSERT INTO USERS (USER_name, USERS_gender, USER_Emaill, USER_number, USER_address) VALUES (?,
    // ?, ?, ?, ?)");
    // $stmt->bind_param("sssis", $name, $gender, $email, $number, $address);

    // // Set parameters and execute
    // $name = $_POST['name'];
    // $gender = $_POST['gender'];
    // $email = $_POST['email'];
    // $number = $_POST['number'];
    // $address = $_POST['address'];

    // $stmt->execute();

    // echo "New record created successfully";

    // $stmt->close();
    // $conn->close();

    if(isset($_POST['save']))
    {	
        $AD_id = $_POST['AD_id'];
        $AD_title = $_POST['AD_title'];
        $AD_description = $_POST['AD_description'];
        $AD_file = $_POST['AD_file'];
        $ADSET_id = $_POST['ADSET_id'];
        $USER_id = $_POST['USER_id'];

        $sql_query = "INSERT INTO ads (AD_id,AD_title,AD_description,AD_file,ADSET_id,USER_id)
        VALUES ('$AD_id','$AD_title','$AD_description','$AD_file','$ADSET_id','$USER_id')";

        if (mysqli_query($conn, $sql_query)) 
        {
            // echo "New Details Entry inserted successfully !";
            echo '<script>
                    window.location.href = "ads.php";
                    alert("New ADS Entry inserted successfully!")
                </script>';
        } 
        else
        {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    $sql1 = "SELECT * FROM `ads`";
    $result = mysqli_query($conn, $sql1);

    $rows = mysqli_num_rows($result);
    
    
    echo "<center><h1>AD's DATALIST</h1></center>";
    
    if($rows > 0)
    {
        echo
        "<center>
        <table border=1 width=80% class=datalist_table>
        <tr>
            <th>AD's id</th>
            <th>Title</th>
            <th>Description</th>
            <th>file</th>
            <th>ADSet id</th>
            <th>User id</th>
        </tr>";
        while($row = mysqli_fetch_assoc($result))
        {
            echo
            "<tr>
                <td>". $row["AD_id"]."</td>
                <td>".$row["AD_title"]."</td>
                <td>".$row["AD_description"]."</td>
                <td>".$row["AD_file"]."</td>
                <td>".$row["AD_file"]."</td>
                <td>".$row["USER_id"]."</td>
            </tr>";
        }
        echo
        "</table>
        </center>";
    }
?>
<style>
@import url(" https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

:root {
    --primary-color: #3d5cb8;
    --primary-color-dark: #334c99;
    --text-dark: #0f172a;
    --text-light: #64748b;
    --extra-light: #f1f5f9;
    --white: #ffffff;
    --max-width: 1200px;
    --light-orange: #d46b6b;
    --dark-bluesh: #223e52;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.datalist_table {
    border-spacing: 1;
    border-collapse: collapse;
    background: #d46b6b;
    border-radius: 6px;
    overflow: hidden;
    max-width: 80%;
    width: 100%;
    margin: 0 auto;
    position: relative;
    text-align: center;
    font-size: 25px;
    border-color: #f1f5f9;

    th {
        background-color: #ffcca3;
    }
}

.memory_back {
    background-color: var(--extra-light);
}

.memories__card {
    padding: 5rem 4rem;
    text-align: center;
    border-radius: 15rem;
    background-color: var(--white);
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.25);
    justify-content: space-around;
    align-items: center;
    margin-top: 10px;
    margin-bottom: 20px;
}

.insert_form {
    margin-top: 10px;
    justify-content: center;
    width: 100%;
    align-items: center;
    display: flex;
}

.insert_form .submit_btn {
    font-size: 20px;
    margin-top: 10px;
    padding-left: 5px;
    padding-right: 5px;
    border-radius: 15px;
}

.form_table {
    border-spacing: 1;

    td {
        text-align: left;
    }

    .submit_btn {
        text-align: center;
        align-items: center;
    }
}
</style>