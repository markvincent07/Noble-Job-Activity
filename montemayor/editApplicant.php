<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Applicant</title>
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
		    border-radius: 10px;
		    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
		    padding: 30px 40px;
		    max-width: 600px;
		    width: 100%;
		    margin: 20px;
		}

		h1 {
		    color: #00695c;
		    text-align: center;
		    font-size: 2rem;
		    margin-bottom: 20px;
		}

		form p {
		    margin-bottom: 20px;
		}

		label {
		    display: block;
		    font-weight: bold;
		    margin-bottom: 5px;
		    color: #555;
		}

		input[type="text"],
		input[type="number"] {
		    width: 100%;
		    padding: 12px;
		    border: 1px solid #ddd;
		    border-radius: 8px;
		    font-size: 1rem;
		    box-sizing: border-box;
		    outline: none;
		    transition: box-shadow 0.3s ease;
		}

		input[type="text"]:focus,
		input[type="number"]:focus {
		    box-shadow: 0 0 8px rgba(0, 105, 92, 0.5);
		}

		input[type="submit"] {
		    background-color: #00695c;
		    color: white;
		    border: none;
		    padding: 12px;
		    font-size: 1rem;
		    border-radius: 8px;
		    cursor: pointer;
		    font-weight: bold;
		    width: 100%;
		    transition: background-color 0.3s ease, transform 0.2s;
		}

		input[type="submit"]:hover {
		    background-color: #004d40;
		    transform: scale(1.05);
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Edit Applicant</h1>
		<?php $getUserByID = getUserByID($pdo, $_GET['id']); ?>
		<form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
			<p>
				<label for="firstName">First Name</label> 
				<input type="text" name="first_name" value="<?php echo htmlspecialchars($getUserByID['first_name']); ?>">
			</p>
			<p>
				<label for="lastName">Last Name</label> 
				<input type="text" name="last_name" value="<?php echo htmlspecialchars($getUserByID['last_name']); ?>">
			</p>
			<p>
				<label for="email">Email</label> 
				<input type="text" name="email" value="<?php echo htmlspecialchars($getUserByID['email']); ?>">
			</p>
			<p>
				<label for="yearsOfExperience">Years of Experience</label> 
				<input type="number" name="years_of_experience" value="<?php echo htmlspecialchars($getUserByID['years_of_experience']); ?>">
			</p>
			<p>
				<label for="specialization">Specialization</label> 
				<input type="text" name="specialization" value="<?php echo htmlspecialchars($getUserByID['specialization']); ?>">
			</p>
			<p>
				<label for="favoriteProgrammingLanguage">Favorite Programming Language</label> 
				<input type="text" name="favorite_programming_language" value="<?php echo htmlspecialchars($getUserByID['favorite_programming_language']); ?>">
			</p>
			<p>
				<input type="submit" value="Save Changes" name="editUserBtn">
			</p>
		</form>
	</div>
</body>
</html>
