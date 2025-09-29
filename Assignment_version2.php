<?php
class BankAccount { 
    public $owner;   
    public $balance;
    public $email;
    public $mobileNumber;

    // Constructor with additional for email and mobile number
    public function __construct($owner, $email, $mobileNumber, $balance = 0) {
        $this->owner = $owner;      
        $this->balance = $balance; 
        $this->email = $email;
        $this->mobileNumber = $mobileNumber;
    }

    // Deposit method
    public function deposit($amount) {
        if ($amount <= 0) {
            echo "Deposit amount should be greater than zero.\n";
            return;
        }

        $this->balance += $amount;
        echo "Deposited: $amount\n";
        echo "Current Balance: $this->balance\n";
    }

    // Withdraw method
    public function withdraw($amount) {
        if ($amount <= 0) {
            echo "Withdraw amount must be more than zero.\n";
            return;
        }

        if ($amount > $this->balance) {
            echo "Cannot withdraw. Not enough balance.\n";
            return;
        }

        $this->balance -= $amount;
        echo "Withdrawn: $amount\n";
        echo "Current Balance: $this->balance\n";
    }

    // Method to return account details in JSON format
    public function toJSON() {
        $transaction = [
            "name" => $this->owner,
            "email" => $this->email,
            "mobileNumber" => $this->mobileNumber,
            "currentBalance" => $this->balance, 
        ];

        return json_encode($transaction);
    }
}

// Created a new bank account with email and mobile number
$account1 = new BankAccount("Praneeth", "Praneethpjsf123@gmail.com", 7702763357, 12000);

// Show account details
echo "Account Owner: " . $account1->owner . "\n";
echo "Starting Balance: " . $account1->balance . "\n";
echo "Email: " . $account1->email . "\n";
echo "Mobile Number: " . $account1->mobileNumber . "\n\n";

// Deposited money
$account1->deposit(5000);
$account1->deposit(3000);

echo "\n";

// Withdraw money
$account1->withdraw(2000); 
$account1->withdraw(22000);
$account1->withdraw(-10); 

// Display account details in JSON format
echo "\nAccount Details in JSON Format: \n";
echo $account1->toJSON();

?>
