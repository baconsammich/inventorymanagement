<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
    <link href="/php_inventory_app/public/css/dark-theme.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Add New Supplier</h1>
        <form method="POST" action="">
            <label for="SupplierName">Supplier Name</label>
            <input type="text" name="SupplierName" id="SupplierName" required>

            <label for="Address">Address</label>
            <input type="text" name="Address" id="Address">

            <label for="City">City</label>
            <input type="text" name="City" id="City">

            <label for="State">State</label>
            <input type="text" name="State" id="State">

            <label for="ZipCode">Zip Code</label>
            <input type="text" name="ZipCode" id="ZipCode">

            <label for="Phone">Phone</label>
            <input type="text" name="Phone" id="Phone">

            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email">

            <label for="Website">Website</label>
            <input type="url" name="Website" id="Website">

            <label for="IsFavorite">
                <input type="checkbox" name="IsFavorite" id="IsFavorite"> Mark as Favorite
            </label>

            <button type="submit" class="btn">Add Supplier</button>
            <a href="/?url=supplier/index" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>

