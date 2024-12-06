<?php

namespace Models;

use Database;

class Supplier {
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM Suppliers ORDER BY SupplierName");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getFavorites() {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM Suppliers WHERE IsFavorite = 1 ORDER BY SupplierName");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM Suppliers WHERE SupplierID = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public static function add($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO Suppliers (SupplierName, Address, City, State, ZipCode, Phone, Email, Website, IsFavorite)
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['SupplierName'], $data['Address'], $data['City'],
            $data['State'], $data['ZipCode'], $data['Phone'],
            $data['Email'], $data['Website'], $data['IsFavorite']
        ]);
    }

    public static function update($id, $data) {
        $db = Database::connect();
        $fields = [];
        $values = [];

        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $values[] = $value;
        }

        $values[] = $id;

        $sql = "UPDATE Suppliers SET " . implode(", ", $fields) . " WHERE SupplierID = ?";
        $stmt = $db->prepare($sql);

        return $stmt->execute($values);
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM Suppliers WHERE SupplierID = ?");
        return $stmt->execute([$id]);
    }
}

