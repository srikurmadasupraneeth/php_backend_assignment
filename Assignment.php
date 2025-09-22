/*Assignment - III

Object Oriented Programming Challenge
For this challenge, create a bank account class that has two attributes:
owner 
balance 
and two methods:
deposit
withdraw
As an added requirement, withdrawals may not exceed the available balance.
Instantiate your class, make several deposits and withdrawals, and test to make sure 
the account can't be overdrawn. */

<?php
class BankAccount { 
    public $owner;   
    public $balance;
    public function __construct($owner, $balance = 0) {
        $this->owner = $owner;      
        $this->balance = $balance; 
    }
/* so according to the question, firstly i need to create a class, to create a class in php, 
i used the keyword named class , and after that it should have 2 attributes, so i created 2 public attrributes, 
why i used public specifically because , with public we can access outside the class as well
and after that i created a Ccnstructor which sets the initial values when the account is created
*/
public function deposit($amount) {
    if ($amount <= 0) {
        echo "Deposit amount should be greater than zero.\n";
        return;
    }

    $this->balance += $amount;
    echo "Deposited: $amount\n";
    echo "Current Balance: $this->balance\n";
}

/* after that i created a method named deposit, which takes amount as the parameter
and checks if the amount is greater than 0, if it is then it adds the amount or else it shows an error message 
*/
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
}
/* after that i created a method named withdraw, which takes amount as the parameter
and checks if the amount is greater than 0, if it is then it checks if the 
amount is less thean or equal to the balance, if it is then it deducts the amount from the balance or
else it shows and error message
*/

// Created a new bank account
$account1 = new BankAccount("Praneeth", 12000);

// Show my details
echo "Account Owner: " . $account1->owner . "\n";
echo "Starting Balance: " . $account1->balance . "\n\n";

// Deposited money
$account1->deposit(5000);
$account1->deposit(3000);

echo "\n";

// Withdraw money
$account1->withdraw(2000); 
$account1->withdraw(22000);
$account1->withdraw(-10); 

?>