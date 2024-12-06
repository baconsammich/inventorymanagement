<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link rel="stylesheet" href="/php_inventory_app/public/css/dark-theme.css">
</head>
<body>
    <div class="container">
        <h1>Edit Supplier</h1>
        <form method="POST" action="">
            <label for="SupplierName">Supplier Name</label>
            <input type="text" name="SupplierName" id="SupplierName" value="<?= htmlspecialchars($supplier['SupplierName']) ?>" required>

            <label for="City">City</label>
            <input type="text" name="City" id="City" value="<?= htmlspecialchars($supplier['City']) ?>">

            <label for="Phone">Phone</label>
            <input type="text" name="Phone" id="Phone" value="<?= htmlspecialchars($supplier['Phone']) ?>">

            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email" value="<?= htmlspecialchars($supplier['Email']) ?>">

            <label for="IsFavorite">
                <input type="checkbox" name="IsFavorite" id="IsFavorite" <?= $supplier['IsFavorite'] ? 'checked' : '' ?>>
                Mark as Favorite
            </label>

            <button type="submit" class="btn">Save</button>
            <a href="/php_inventory_app/public/index.php?url=supplier/index" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>

