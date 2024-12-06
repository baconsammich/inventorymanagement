<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <!-- Link to the CSS file -->
    <link href="/php_inventory_app/public/css/dark-theme.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Main Menu</h1>
        <div class="list-group">
            <a href="/?url=supplier/index" class="list-group-item">Supplier Management</a>
            <a href="/?url=inventory/index" class="list-group-item">Inventory Management</a>
            <a href="/?url=category/index" class="list-group-item">Category Management</a>
            <a href="/?url=location/index" class="list-group-item">Location Management</a>
            <a href="/?url=bulkimport/index" class="list-group-item">Bulk Import</a>
            <a href="/?url=main/exportInventory" class="list-group-item">Export Inventory</a>
            <a href="/?url=report/index" class="list-group-item">Reports</a>
            <a href="/?url=main/exit" class="list-group-item text-danger">Exit</a>
        </div>
        <footer>
            &copy; <?php echo date('Y'); ?> Inventory Management System
        </footer>
    </div>
</body>
</html>

