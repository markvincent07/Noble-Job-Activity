<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application System</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            color: #333;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            color: #00695c;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            width: 100%;
            max-width: 600px;
            gap: 10px;
        }

        form input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: box-shadow 0.3s;
        }

        form input[type="text"]:focus {
            box-shadow: 0 0 8px rgba(0, 105, 92, 0.5);
        }

        form input[type="submit"] {
            background-color: #00695c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        form input[type="submit"]:hover {
            background-color: #004d40;
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: #00796b;
            font-weight: bold;
            transition: color 0.3s, text-decoration 0.3s;
        }

        a:hover {
            color: #004d40;
            text-decoration: underline;
        }

        table {
            width: 90%;
            max-width: 1000px;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
        }

        th {
            background-color: #004d40;
            color: white;
            font-weight: bold;
        }

        td {
            color: #333;
        }

        td a {
            color: #d32f2f;
            font-weight: bold;
        }

        tr:hover {
            background-color: #e0f2f1;
        }

        /* Notifications */
        .notification {
            padding: 15px;
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-size: 1.1rem;
        }

        .success {
            background-color: #e8f5e9;
            color: #388e3c;
            border: 1px solid #388e3c;
        }

        .error {
            background-color: #ffebee;
            color: #d32f2f;
            border: 1px solid #d32f2f;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            table {
                width: 100%;
            }

            form {
                flex-direction: column;
                gap: 15px;
            }

            form input[type="text"], 
            form input[type="submit"] {
                width: 100%;
            }

            a {
                display: block;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>

<?php  
    if (isset($_SESSION['message']) && isset($_SESSION['status'])) {
        $class = $_SESSION['status'] == "200" ? "success" : "error";
        echo "<div class='notification $class'>{$_SESSION['message']}</div>";
    }
    unset($_SESSION['message']);
    unset($_SESSION['status']);
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
    <input type="text" name="searchInput" placeholder="Search applicants">
    <input type="submit" name="searchBtn" value="Search">
</form>

<p><a href="index.php">Clear Search Query</a></p>
<p><a href="insertApplicant.php">Insert New Applicant</a></p>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Years of Experience</th>
        <th>Specialization</th>
        <th>Favorite Programming Language</th>
        <th>Action</th>
    </tr>

    <?php if (!isset($_GET['searchBtn'])) { ?>
        <?php $getAllUsers = getAllUsers($pdo); ?>
        <?php foreach ($getAllUsers as $row) { ?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['years_of_experience']; ?></td>
                <td><?php echo $row['specialization']; ?></td>
                <td><?php echo $row['favorite_programming_language']; ?></td>
                <td>
                    <a href="editApplicant.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="deleteApplicant.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <?php $searchForAUser = searchForAUser($pdo, $_GET['searchInput']); ?>
        <?php foreach ($searchForAUser as $row) { ?>
            <tr>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['years_of_experience']; ?></td>
                <td><?php echo $row['specialization']; ?></td>
                <td><?php echo $row['favorite_programming_language']; ?></td>
                <td>
                    <a href="editApplicant.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="deleteApplicant.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>

</body>
</html>
