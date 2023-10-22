<?php

require 'Catalog.php';

function vowelCount($word)
{

    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $word = strtolower($word); // Convert the word to lowercase for case insensitivity
    $wordArray = str_split($word);
    $count = 0;

    foreach ($wordArray as $char) {
        if (in_array($char, $vowels)) {
            $count++;
        }
    }

    return $count;

}

// Examples

$example1 = vowelCount('apple'); // Should yield 2
echo($example1);

$example2 = vowelCount('lynx'); // Should yield 0
echo($example2);

$example3 = vowelCount('hi'); // Should yield 1
echo($example3);

$example4 = vowelCount('mississippi'); // Should yield 4
echo($example4);


class Person {
    public $firstName;
    public $lastName;
    public $age;

    // Constructor to initialize the properties
    public function __construct($firstName, $lastName, $age) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    // Method to get the full name
    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }

    // Method to get the classification (adult or minor)
    public function getClassification() {
        if ($this->age >= 18) {
            return "adult";
        } else {
            return "minor";
        }
    }

}

// Example

$person = new Person('John', 'Harvard', 45);
echo $person->firstName; # Should print "John"
echo $person->getFullName(); # Should print "John Harvard"
echo $person->getClassification(); # Should print "adult"

$example = (5 > 10) ? 9 : 10;

echo $example;

$catalog = new Catalog;