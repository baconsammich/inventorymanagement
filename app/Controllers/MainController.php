<?php

namespace Controllers;

use Models\Inventory;

class MainController {
    /**
     * Displays the main menu.
     */
    public function index() {
        include __DIR__ . '/../Views/main_menu.php';
    }

    /**
     * Handles inventory export to a CSV file.
     */
    public function exportInventory() {
        try {
            // Fetch all inventory data
            $inventoryData = Inventory::getAll();

            if (empty($inventoryData)) {
                echo "No inventory data to export.";
                return;
            }

            // Set CSV headers
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment;filename="inventory_export.csv"');

            // Open output stream
            $output = fopen('php://output', 'w');

            // Write header row
            fputcsv($output, array_keys($inventoryData[0]));

            // Write data rows
            foreach ($inventoryData as $row) {
                fputcsv($output, $row);
            }

            fclose($output);
            exit;

        } catch (\Exception $e) {
            echo "Error exporting inventory: " . $e->getMessage();
        }
    }

    /**
     * Exit the application.
     */
    public function exit() {
        echo "Goodbye!";
        exit;
    }
}

