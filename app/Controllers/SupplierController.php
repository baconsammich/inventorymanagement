<?php

namespace Controllers;

use Models\Supplier;

class SupplierController {
    /**
     * Displays the list of all suppliers.
     */
    public function index() {
        $suppliers = Supplier::getAll();
        require_once BASE_PATH . '/Views/supplier_list.php';
    }

    /**
     * Adds a new supplier.
     */
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitizeInput([
                'SupplierName' => $_POST['SupplierName'] ?? '',
                'Address' => $_POST['Address'] ?? '',
                'City' => $_POST['City'] ?? '',
                'State' => $_POST['State'] ?? '',
                'ZipCode' => $_POST['ZipCode'] ?? '',
                'Phone' => $_POST['Phone'] ?? '',
                'Email' => $_POST['Email'] ?? '',
                'Website' => $_POST['Website'] ?? '',
                'IsFavorite' => isset($_POST['IsFavorite']) ? 1 : 0,
            ]);

            if ($this->validateSupplierData($data) && Supplier::add($data)) {
                header('Location: /php_inventory_app/public/index.php?url=supplier/index');
                exit;
            } else {
                echo "Error: Failed to add supplier. Please check your input.";
            }
        }

        require_once BASE_PATH . '/Views/supplier_add.php';
    }

    /**
     * Displays favorite suppliers.
     */
    public function viewFavorites() {
        $suppliers = Supplier::getFavorites();
        require_once BASE_PATH . '/Views/supplier_list.php';
    }

    /**
     * Edits a supplier's details.
     *
     * @param int|null $id Supplier ID.
     */
    public function edit($id) {
        if (is_null($id) || !is_numeric($id)) {
            echo "Error: Invalid or missing Supplier ID.";
            exit;
        }

        $supplier = Supplier::getById($id);

        if (!$supplier) {
            echo "Error: Supplier not found.";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitizeInput([
                'SupplierName' => $_POST['SupplierName'] ?? '',
                'Address' => $_POST['Address'] ?? '',
                'City' => $_POST['City'] ?? '',
                'State' => $_POST['State'] ?? '',
                'ZipCode' => $_POST['ZipCode'] ?? '',
                'Phone' => $_POST['Phone'] ?? '',
                'Email' => $_POST['Email'] ?? '',
                'Website' => $_POST['Website'] ?? '',
                'IsFavorite' => isset($_POST['IsFavorite']) ? 1 : 0,
            ]);

            if ($this->validateSupplierData($data) && Supplier::update($id, $data)) {
                header('Location: /php_inventory_app/public/index.php?url=supplier/index');
                exit;
            } else {
                echo "Error: Failed to update supplier. Please check your input.";
            }
        }

        require_once BASE_PATH . '/Views/supplier_edit.php';
    }

    /**
     * Deletes a supplier.
     *
     * @param int|null $id Supplier ID.
     */
    public function delete($id) {
        if (is_null($id) || !is_numeric($id)) {
            echo "Error: Invalid or missing Supplier ID.";
            exit;
        }

        if (Supplier::delete($id)) {
            header('Location: /php_inventory_app/public/index.php?url=supplier/index');
            exit;
        } else {
            echo "Error: Failed to delete supplier.";
        }
    }

    /**
     * Toggles the favorite status of a supplier.
     *
     * @param int|null $id Supplier ID.
     */
    public function toggleFavorite($id) {
        if (is_null($id) || !is_numeric($id)) {
            echo "Error: Invalid or missing Supplier ID.";
            exit;
        }

        $supplier = Supplier::getById($id);

        if (!$supplier) {
            echo "Error: Supplier not found.";
            exit;
        }

        $newStatus = $supplier['IsFavorite'] ? 0 : 1;

        if (Supplier::update($id, ['IsFavorite' => $newStatus])) {
            header('Location: /php_inventory_app/public/index.php?url=supplier/index');
            exit;
        } else {
            echo "Error: Failed to update favorite status.";
        }
    }

    /**
     * Sanitizes input data.
     *
     * @param array $data Input data.
     * @return array Sanitized data.
     */
    private function sanitizeInput(array $data): array {
        foreach ($data as $key => $value) {
            $data[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
        }
        return $data;
    }

    /**
     * Validates supplier data.
     *
     * @param array $data Supplier data.
     * @return bool True if valid, false otherwise.
     */
    private function validateSupplierData(array $data): bool {
        if (empty($data['SupplierName']) || strlen($data['SupplierName']) > 255) {
            return false;
        }

        if (!empty($data['Email']) && !filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if (!empty($data['Website']) && !filter_var($data['Website'], FILTER_VALIDATE_URL)) {
            return false;
        }

        if (!empty($data['Phone']) && !preg_match('/^\+?[0-9\s\-]+$/', $data['Phone'])) {
            return false;
        }

        return true;
    }
}

