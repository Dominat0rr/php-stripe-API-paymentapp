<?php
    class Transaction {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function addTransaction($data) {
            // Prepare Query
            $this->db->query('INSERT INTO transactions (id, customerId, product, amount, currency, status) VALUES (:id, :customerId, :product, :amount, :currency, :status)');

            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':customerId', $data['customerId']);
            $this->db->bind(':product', $data['product']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':currency', $data['currency']);
            $this->db->bind(':status', $data['status']);

            // Execute
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getTransactions() {
            $this->db->query('SELECT * FROM transactions ORDER BY date DESC');
            $results = $this->db->resultset();
            return $results;
        }
    }

?>