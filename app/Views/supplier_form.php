<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($supplier) ? 'Edit' : 'Add' ?> Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/php_inventory_app/public/css/dark-theme.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4"><?= isset($supplier) ? 'Edit' : 'Add' ?> Supplier</h1>
        <div class="card p-4">
            <form method="POST">
                <div class="mb-3">
                    <label for="SupplierName" class="form-label">Name</label>
                    <input type="text" name="SupplierName" id="SupplierName" class="form-control"
                           value="<?= htmlspecialchars($supplier['SupplierName'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <label for="City" class="form-label">City</label>
                    <input type="text" name="City" id="City" class="form-control"
                           value="<?= htmlspecialchars($supplier['City'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="State" class="form-label">State</label>
                    <input type="text" name="State" id="State" class="form-control"
                           value="<?= htmlspecialchars($supplier['State'] ?? '') ?>">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" name="IsFavorite" id="IsFavorite" class="form-check-input"
                        <?= isset($supplier['IsFavorite']) && $supplier['IsFavorite'] ? 'checked' : '' ?>>
                    <label for="IsFavorite" class="form-check-label">Favorite</label>
                </div>
                <button type="submit" class="btn btn-primary"><?= isset($supplier) ? 'Update' : 'Save' ?></button>
            </form>
        </div>
    </div>
</body>
</html>

