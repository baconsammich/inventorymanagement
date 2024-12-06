<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier List</title>
    <link rel="stylesheet" href="/php_inventory_app/public/css/dark-theme.css">
</head>
<body>
    <div class="container">
        <h1>Supplier Management</h1>

        <!-- Navigation Menu -->
        <div class="navbar">
            <a href="/php_inventory_app/public/index.php?url=supplier/index" class="btn">All Suppliers</a>
            <a href="/php_inventory_app/public/index.php?url=supplier/add" class="btn">Add Supplier</a>
            <a href="/php_inventory_app/public/index.php?url=supplier/viewFavorites" class="btn">View Favorites</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Favorite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                    <tr>
                        <td><?= htmlspecialchars($supplier['SupplierName']) ?></td>
                        <td><?= htmlspecialchars($supplier['City']) ?></td>
                        <td><?= htmlspecialchars($supplier['Phone']) ?></td>
                        <td><?= htmlspecialchars($supplier['Email']) ?></td>
                        <td>
                            <?= $supplier['IsFavorite'] ? '<span class="btn btn-success">Yes</span>' : '<span class="btn btn-danger">No</span>' ?>
                        </td>
                        <td>
                            <a href="/php_inventory_app/public/index.php?url=supplier/edit&id=<?= $supplier['SupplierID'] ?>" class="btn">Edit</a>
                            <a href="/php_inventory_app/public/index.php?url=supplier/delete&id=<?= $supplier['SupplierID'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this supplier?');">Delete</a>
                            <a href="/php_inventory_app/public/index.php?url=supplier/toggleFavorite&id=<?= $supplier['SupplierID'] ?>" class="btn">
                                <?= $supplier['IsFavorite'] ? 'Unmark Favorite' : 'Mark Favorite' ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

