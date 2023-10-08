# Project 1
+ By: David Purser
+ URL: <http://e2p1.dpurser.me>

## Game planning
+ Establish the parameters that define the deck of cards (e.g., number of suits, cards per suit)
+ Create an empty array to store the cards (i.e., a "deck")
+ Populate the cards array with one of each card
+ Randomly re-order the cards array (i.e., "shuffle the deck")
+ Split the cards array into two separate arrays (i.e., "deal the cards")
+ Create an empty array to store the rounds
+ Repeat the following sequence until one player array has no remaining elements (i.e., they have run out cards)
  + Remove the last element from each player array (i.e., "pop" the element)
  + Compare the value of the "rank" key of each element (e.g., using an "if" statement)
  + Award both cards to the player with the higher "rank" value (i.e., "push" the elements), or discard both in the event of a draw
  + Add a round to the rounds array with the details of the round and the outcome
+ Compute the winner by identifying the array with zero elements


## Outside resources
+ <https://en.wikipedia.org/wiki/Standard_52-card_deck>
+ <https://www.w3schools.com/php/php_arrays_associative.asp>
+ <https://www.php.net/manual/en/function.array-splice.php>
+ <https://www.php.net/manual/en/function.array-pop.php>
+ <https://www.php.net/manual/en/function.array-push.php>
+ <https://stackoverflow.com/questions/8409098/if-condition-in-an-associative-array>
+ <https://github.com/susanBuck/e2/blob/main/practice/card-deal.php>


## Notes for instructor
Cards are defined using a set of key value pairs consiting of a;
+ Suit (string)
+ Value (integer)
+ Rank (string or integer)

While the Value and Rank attributes may appear duplicative, they serve different purposes. Value is used to evaluate the  order of a card relative to another, while Rank is used to communicate the appearance of the card. For example, an Ace has a Value of 1 and a Rank of "A".

I attempted to assign the rank while constructing the associative array of cards using ternary conditional operators, for example:

$card = [
    'suit' => $suit,
    'value' => $i,
    'rank' => ($i == 13) ? "K" : (($i == 12) ? "Q" : "J")
];

However, this seemed convoluted so instead looped through the cards array and added the rank using a separate series of "if" functions. The last bullet point in my Outside resources section is the reference for the ternary operator attempt. 

I also recognise the various options provided in the Week 5 content on dealing cards one-by-one. I evaluated each of these options, but decided that the in-built array_splice() function was more computationally efficient. I have included the GitHub link in my Outside resources section.
