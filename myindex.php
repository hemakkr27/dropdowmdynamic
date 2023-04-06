<!DOCTYPE html>
<html>
<head>
    <title>Search Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .header {
            padding: 30px;
            text-align: center;
            background-color: #007bff;
            color: white;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .column {
            float: left;
            width: 33.33%;
            padding: 10px;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            font-size: 16px;
        }

        input[type=submit] {
            background-color: #007bff;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background-color: #005cbf;
        }

        input[type=submit]:active {
            background-color: #005cbf;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Search Records</h1>
    </div>

    <div class="row">
        <div class="column">
            <label for="district">District:</label>
            <select id="district" name="district">
                <option value="">-- Select District --</option>
                <option value="district1">District 1</option>
                <option value="district2">District 2</option>
                <option value="district3">District 3</option>
            </select>
        </div>

        <div class="column">
            <label for="tehsil">Tehsil:</label>
            <select id="tehsil" name="tehsil">
                <option value="">-- Select Tehsil --</option>
                <option value="tehsil1">Tehsil 1</option>
                <option value="tehsil2">Tehsil 2</option>
                <option value="tehsil3">Tehsil 3</option>
      
		
		<option value="tehsil4">Tehsil 4</option>
            </select>
        </div>

        <div class="column">
            <label for="village">Village:</label>
            <select id="village" name="village">
                <option value="">-- Select Village --</option>
                <option value="village1">Village 1</option>
                <option value="village2">Village 2</option>
                <option value="village3">Village 3</option>
                <option value="village4">Village 4</option>
            </select>
        </div>
    </div>

    <div class="search-container">
        <input type="submit" name="search" value="Search">
    </div>

    <?php
        // connect to the database
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "database_name";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // check if the search button was clicked
        if (isset($_POST['search'])) {
            // get the selected values
            $district = $_POST['district'];
            $tehsil = $_POST['tehsil'];
            $village = $_POST['village'];

            // construct the SQL query
            $sql = "SELECT * FROM student_records WHERE district='$district' AND tehsil='$tehsil' AND village='$village'";

            // execute the query
            $result = $conn->query($sql);

            // check if there are any results
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table>";
                echo "<tr><th>Name</th><th>Roll No</th><th>Address</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["name"]."</td><td>".$row["roll_no"]."</td><td>".$row["address"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        }

        // close the database connection
        $conn->close();
    ?>

</body>
</html>