<?php
include('config.php');

// Fetch all blood list records
$query = "SELECT * FROM blood_list";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blood List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>View Blood List</h1>
    </header>

    <div class="container">
        <!-- Add Blood Information Form -->
        <div class="form-container">
            <h2>Add Blood Information</h2>
            <form action="add_blood.php" method="POST">
                <div class="form-group">
                    <label for="blood_name">Blood Name</label>
                    <input type="text" id="blood_name" name="blood_name" class="input-field" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="input-field" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="input-field" required>
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Add Blood</button>
                </div>
            </form>
        </div>

        <!-- Blood List Table -->
        <div class="list-container">
            <h2>Blood List</h2>
            <table class="blood-list">
                <thead>
                    <tr>
                        <th>Blood Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['blood_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td class="<?php echo strtolower($row['status']); ?>">
                                <?php echo htmlspecialchars($row['status']); ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

   
</body>
</html>
