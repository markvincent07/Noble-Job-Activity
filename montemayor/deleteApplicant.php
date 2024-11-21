<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Confirmation</title>
	<link rel="stylesheet" href="styles.css">
	<style>
		body {
		    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		    background-color: #f4f7f9;
		    color: #333;
		    display: flex;
		    justify-content: center;
		    align-items: center;
		    min-height: 100vh;
		    margin: 0;
		}

		.container {
		    background-color: #ffffff;
		    border: 3px solid #e53935;
		    padding: 30px;
		    border-radius: 12px;
		    width: 90%;
		    max-width: 500px;
		    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
		    text-align: center;
		}

		h1 {
		    color: #e53935;
		    font-size: 2rem;
		    margin-bottom: 20px;
		    text-transform: uppercase;
		}

		h2 {
		    font-size: 1.1rem;
		    color: #444;
		    margin: 10px 0;
		}

		.warning {
		    color: #e53935;
		    font-size: 1rem;
		    margin: 20px 0;
		    font-weight: bold;
		}

		.deleteBtn {
		    display: flex;
		    justify-content: space-between;
		    margin-top: 20px;
		}

		.deleteBtn form input[type="submit"] {
		    background-color: #e53935;
		    color: white;
		    border: none;
		    padding: 10px 15px;
		    border-radius: 6px;
		    cursor: pointer;
		    font-size: 1rem;
		    font-weight: bold;
		    transition: background-color 0.3s, transform 0.2s;
		}

		.deleteBtn form input[type="submit"]:hover {
		    background-color: #b71c1c;
		    transform: scale(1.05);
		}

		.cancelBtn {
		    background-color: #b0bec5;
		    color: white;
		    border: none;
		    padding: 10px 15px;
		    border-radius: 6px;
		    cursor: pointer;
		    font-size: 1rem;
		    font-weight: bold;
		    text-decoration: none;
		    transition: background-color 0.3s, transform 0.2s;
		}

		.cancelBtn:hover {
		    background-color: #78909c;
		    transform: scale(1.05);
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Confirm Deletion</h1>
		<p class="warning">This action is irreversible. Please confirm you want to delete this applicant.</p>
		<?php $getUserByID = getUserByID($pdo, $_GET['id']); ?>
		<h2><strong>First Name:</strong> <?php echo htmlspecialchars($getUserByID['first_name']); ?></h2>
		<h2><strong>Last Name:</strong> <?php echo htmlspecialchars($getUserByID['last_name']); ?></h2>
		<h2><strong>Email:</strong> <?php echo htmlspecialchars($getUserByID['email']); ?></h2>
		<h2><strong>Years of Experience:</strong> <?php echo htmlspecialchars($getUserByID['years_of_experience']); ?></h2>
		<h2><strong>Specialization:</strong> <?php echo htmlspecialchars($getUserByID['specialization']); ?></h2>
		<h2><strong>Favorite Programming Language:</strong> <?php echo htmlspecialchars($getUserByID['favorite_programming_language']); ?></h2>

		<div class="deleteBtn">
			<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
				<input type="submit" name="deleteUserBtn" value="Delete">
			</form>
			<a href="index.php" class="cancelBtn">Cancel</a>
		</div>	
	</div>
</body>
</html>
