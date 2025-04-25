<?php

$startMoney = 100;
$playGameChoice = "";

function displayIntro()
{
    echo "Welcome to the Adventure Game Player!\n";
    echo "Let us first set up your profile!.\n";
    playerDetails();
    echo "You find yourself standing at a crossroads.\n";
    echo "Which path will you choose? (1 or 2)\n";
}

function choosePath()
{
    global $startMoney;
    
    $choice = readline("> ");
    
    if ($choice == 1) {
        echo "You chose Path 1. You encounter a friendly traveler.\n";
        echo "You have $startMoney coins.\n";
        echo "Looks like the traveler is selling you some items. Which item would you like to buy?\n";
        echo "1. Dagger\n";
        echo "2. Health Potion\n";
        echo "3. Purple Cape\n";
        echo "4. A Dog Bone\n";
        $itemChoice = readline("> ");
        buyItem($itemChoice);
    } elseif ($choice == 2) {
        echo "You chose Path 2. You stumble upon a hidden cave.\n";
        echo "Would you like to enter the mystery cave? (yes or no)\n";
        $travelChoice = readline("> ");
        if ($travelChoice == "yes" || $travelChoice == "y") {
            echo "You enter the cave nervously.\n";
            echo "As you walk around, you suddenly encounter a goblin with a knife.\n";
            echo "Will you fight it? (yes or no)\n";
            $fightChoice = readline("> ");
            if ($fightChoice == "yes" || $fightChoice == "y") {
                echo "You courageously fight the goblin.\n";
                echo "Your Dagger comes in handy and you decapitate the goblin.\n";
                echo "Would you like to continue exploring the cave? (yes or no)\n";
                $continueChoice = readline("> ");
                if ($continueChoice == "yes" || $continueChoice == "y") {
                    $numberChoice = GuessingGameEncounter();
                    if ($numberChoice == "yes" || $numberChoice == "y") {
                        detailsGameYes();
                        if ($GLOBALS['playGameChoice'] == "yes" || $GLOBALS['playGameChoice'] == "y") {
                            numberGuessingGame();
                        }
                    }
                }
            } elseif ($fightChoice == "no" || $fightChoice == "n") {
                echo "You cowardly run away from the scene.\n";
                echo "You run out of the cave, earning nothing but a fright.\n";
                visitVillage();
            }
        } elseif ($travelChoice == "no" || $travelChoice == "n") {
            visitVillage();
        }
    } else {
        echo "Invalid choice. Please choose 1 or 2.\n";
        choosePath();
    }
}

function buyItem($itemChoice)
{
    global $startMoney;
    
    switch ($itemChoice) {
        case 1:
            if ($startMoney >= 65) {
                echo "You bought a Dagger.\n";
                $startMoney -= 65;
                echo "Would you like to research this Dagger? (yes or no)\n";
                $detailsChoice = readline("> ");
                if ($detailsChoice == "yes" || $detailsChoice == "y") {
                    echo "Dagger Details:\n";
                    echo "Attack: +5.\n";
                    echo "Durability: 5.\n";
                } else {
                    echo "No knowledge of Dagger.\n";
                }
            } else {
                echo "Not enough Money.\n";
                buyItem(readline("> "));
            }
            break;

        case 2:
            echo "You bought a Health Potion.\n";
            $startMoney -= 30;
            echo "Would you like to research this Health Potion? (yes or no)\n";
            $detailsChoice = readline("> ");
            if ($detailsChoice == "yes" || $detailsChoice == "y") {
                echo "Health Potion Details:\n";
                echo "Health: +10.\n";
                echo "Usage: 1.\n";
            } else {
                echo "No knowledge of Health Potion.\n";
            }
            break;

        case 3:
            echo "You bought a Purple Cape.\n";
            $startMoney -= 50;
            echo "Would you like to research this Purple Cape? (yes or no)\n";
            $detailsChoice = readline("> ");
            if ($detailsChoice == "yes" || $detailsChoice == "y") {
                echo "Purple Cape Details:\n";
                echo "Defense: +7.\n";
                echo "Durability: 5.\n";
            } else {
                echo "No knowledge of Purple Cape.\n";
            }
            break;

        case 4:
            echo "You bought a Dog Bone.\n";
            $startMoney -= 10;
            echo "Would you like to research this Dog Bone? (yes or no)\n";
            $detailsChoice = readline("> ");
            if ($detailsChoice == "yes" || $detailsChoice == "y") {
                echo "Dog Bone Details:\n";
                echo "Missing Details.\n";
                echo "Dog Bone is MYSTERIOUS.\n";
            } else {
                echo "No knowledge of Dog Bone.\n";
            }
            break;

        default:
            echo "Invalid item choice.\n";
            buyItem(readline("> "));
            break;
    }
    exploreCave();
}

function exploreCave()
{
    global $startMoney;
    
    echo "Behind the traveler is a hidden cave. Would you like to explore? (yes or no)\n";
    $travelChoice = readline("> ");
    if ($travelChoice == "yes" || $travelChoice == "y") {
        echo "You enter the cave nervously.\n";
        echo "As you walk around, you suddenly encounter a goblin with a knife.\n";
        echo "Will you fight it? (yes or no)\n";
        $fightChoice = readline("> ");
        if ($fightChoice == "yes" || $fightChoice == "y") {
            echo "You courageously fight the goblin.\n";
            echo "Your Dagger comes in handy and you decapitate the goblin.\n";
            echo "Would you like to continue exploring the cave? (yes or no)\n";
            $continueChoice = readline("> ");
            if ($continueChoice == "yes" || $continueChoice == "y") {
                $numberChoice = GuessingGameEncounter();
                if ($numberChoice == "yes" || $numberChoice == "y") {
                    detailsGameYes();
                    if ($GLOBALS['playGameChoice'] == "yes" || $GLOBALS['playGameChoice'] == "y") {
                        numberGuessingGame();
                    }
                }
            }
        } else {
            echo "You cowardly run away from the scene.\n";
            visitVillage();
        }
    } elseif ($travelChoice == "no" || $travelChoice == "n") {
        visitVillage();
    }
}

function visitVillage()
{
    global $startMoney;
    
    echo "You explore the surroundings and find yourself in a village nearby.\n";
    echo "Would you like to visit the village? (yes or no)\n";
    $villageChoice = readline("> ");
    if ($villageChoice == "yes" || $villageChoice == "y") {
        echo "You enter the village and take a rest.\n";
        echo "You find a swordsmith selling swords.\n";
        echo "Would you like to enter? (yes or no)\n";
        $swordsmithChoice = readline("> ");
        if ($swordsmithChoice == "yes" || $swordsmithChoice == "y") {
            buyLongsword();
        } else {
            echo "You exit the shop without buying anything.\n";
        }
    }
}

function buyLongsword()
{
    global $startMoney;
    
    echo "You decide to enter the store in search of a better weapon.\n";
    echo "You find your eyes take a liking to a longsword.\n";
    echo "The Longsword costs 80 coins.\n";
    echo "Would you like to buy it? (yes or no)\n";
    $buyChoice = readline("> ");
    if ($buyChoice == "yes" || $buyChoice == "y") {
        if ($startMoney >= 80) {
            echo "You bought the Longsword.\n";
            $startMoney -= 80;
            echo "Remaining Money: $startMoney\n";
        } else {
            echo "You don't have enough money to buy the Longsword.\n";
        }
    }
}

function GuessingGameEncounter()
{
    echo "You come across a mysterious wizard.\n";
    echo "The wizard beckons you to a Number Guessing Game.\n";
    echo "Would you like to play? (yes or no)\n";
    $numberChoice = readline("> ");
    return $numberChoice;
}

function detailsGameYes()
{
    global $playGameChoice;
    
    echo "Details: In this game, you will guess a number between 1 and 10.\n";
    echo "If you guess it right, you get a prize!\n";
    echo "Do you wish to continue? (yes or no)\n";
    $playGameChoice = readline("> ");
}

function numberGuessingGame()
{
    echo "The wizard tells you to guess a number between 1 and 10.\n";
    $randomNumber = rand(1, 10);
    $guess = readline("Your guess: ");
    
    if ($guess == $randomNumber) {
        echo "Congratulations! You guessed it right!\n";
    } else {
        echo "Oops! The correct number was $randomNumber.\n";
    }
}

// Call the main game flow
displayIntro();
choosePath();
