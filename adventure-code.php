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
        echo "Would you like to enter the mystery cave?.\n";
        $travelChoice = readline("> ");
    if ($travelChoice == "yes" || $travelChoice == "y") {
        echo "You enter the cave nervously.\n";
        echo "As you walk around, you suddenly encounter a goblin with a knife.\n";
        echo "Will you fight it?\n";
        $fightChoice = readline("> ");
        if ($fightChoice == "yes" || $fightChoice == "y") {
            echo "You courageously fight the goblin.\n";
            echo "Your Dagger comes in handy and you decapitate the goblin.\n";
            echo "Would you like to continue exploring the cave?.\n";
            $continueChoice = readline("> ");
            if($continueChoice == "yes" || $continueChoice == "y"){
                $numberChoice = GuessingGameEncounter();
                if($numberChoice == "yes" || $numberChoice == "y"){
                    detailsGameYes();
                    if($GLOBALS['playGameChoice'] == "yes" || $GLOBALS['playGameChoice'] == "y"){
                        numberGuessingGame();
                    }
                }
                elseif($numberChoice == "no" || $numberChoice == "n"){
                    detailsGameNo();
                    if($GLOBALS['playGameChoice'] == "yes" || $GLOBALS['playGameChoice'] == "y"){
                        numberGuessingGame();
                    }
                    elseif($GLOBALS['playGameChoice'] == "yes" || $GLOBALS['playGameChoice'] == "y"){
                        echo "The Wizard shakes his head and you leave the vicinity empty handed.\n";
                    }
                }
            }
            echo "You also earn 10 coins.\n";
            $startMoney += 10;
            echo "Remaining Money: $startMoney\n";
        } elseif ($fightChoice == "no" || $fightChoice == "n") {
            echo "You cowardly run away from the scene.\n";
            echo "You run out the cave, earning nothing but a fright.\n";
            visitVillage();
        }
    }
    elseif ($travelChoice == "no" || $travelChoice == "n"){
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
                echo "Would you like to research this Dagger?\n";
                $detailsChoice = "";
                while ($detailsChoice != "yes" && $detailsChoice != "no" && $detailsChoice != "y" && $detailsChoice != "n") {
                    $detailsChoice = readline("> ");
                    if ($detailsChoice == "yes" || $detailsChoice == "y") {
                        echo "Dagger Details:\n";
                        echo "Attack: +5.\n";
                        echo "Durability: 5.\n";
                    } elseif ($detailsChoice == "no" || $detailsChoice == "n") {
                        echo "No knowledge of Dagger.\n";
                    } else {
                        echo "Invalid Choice, Try Again.\n";
                    }
                }
            } else {
                echo "Not enough Money.\n";
                echo "Which item would you like to buy?.\n";
                buyItem(readline("> "));
            }
            break;

        case 2:
            echo "You bought a Health Potion.\n";
            $startMoney -= 30;
            echo "Would you like to research this Health Potion?.\n";
            $detailsChoice = "";
            while ($detailsChoice != "yes" && $detailsChoice != "no" && $detailsChoice != "y" && $detailsChoice != "n") {
                $detailsChoice = readline("> ");
                if ($detailsChoice == "yes" || $detailsChoice == "y") {
                    echo "Health Potion Details:\n";
                    echo "Health: +10.\n";
                    echo "Usage: 1.\n";
                } elseif ($detailsChoice == "no" || $detailsChoice == "n") {
                    echo "No knowledge of Health Potion.\n";
                } else {
                    echo "Invalid Choice, Try Again.\n";
                }
            }
            break;

        case 3:
            echo "You bought a Purple Cape.\n";
            $startMoney -= 50;
            echo "Would you like to research this Purple Cape?.\n";
            $detailsChoice = "";
            while ($detailsChoice != "yes" && $detailsChoice != "no" && $detailsChoice != "y" && $detailsChoice != "n") {
                $detailsChoice = readline("> ");
                if ($detailsChoice == "yes" || $detailsChoice == "y") {
                    echo "Purple Cape Details:\n";
                    echo "Defense: +7.\n";
                    echo "Durability: 5.\n";
                } elseif ($detailsChoice == "no" || $detailsChoice == "n") {
                    echo "No knowledge of Purple Cape.\n";
                } else {
                    echo "Invalid Choice, Try Again.\n";
                }
            }
            break;

        case 4:
            echo "You bought a Dog Bone.\n";
            $startMoney -= 10;
            echo "Would you like to research this Dog Bone?.\n";
            $detailsChoice = "";
            while ($detailsChoice != "yes" && $detailsChoice != "no" && $detailsChoice != "y" && $detailsChoice != "n") {
                $detailsChoice = readline("> ");
                if ($detailsChoice == "yes" || $detailsChoice == "y") {
                    echo "Dog Bone Details:\n";
                    echo "Missing Details.\n";
                    echo "Dog Bone is MYSTERIOUS.\n";
                } elseif ($detailsChoice == "no" || $detailsChoice == "n") {
                    echo "No knowledge of Dog Bone.\n";
                } else {
                    echo "Invalid Choice, Try Again.\n";
                }
            }
            break;

        default:
            echo "Invalid item choice.\n";
            echo "Please choose one of these options.\n";
            buyItem(readline("> "));
            break;
    }
    exploreCave();
}


    
function exploreCave()
{
    global $startMoney;
    
    $validChoices = array("yes", "no", "y", "n");
    while(true){
        echo "Behind the traveler is a hidden cave. Would you like to explore?\n";
        $travelChoice = strtolower(readline("> "));
        if (in_array($travelChoice, $validChoices)) {
            break;
        }
    }

    if ($travelChoice == "yes" || $travelChoice == "y") {
        echo "You enter the cave nervously.\n";
        echo "As you walk around, you suddenly encounter a goblin with a knife.\n";
    
        while(true){
            echo "Will you fight it?\n";
            $fightChoice = strtolower(readline("> "));
            if (in_array($fightChoice, $validChoices)) {
                break;
            }
        }
    }
           
        if ($fightChoice == "yes" || $fightChoice == "y") {
            echo "You courageously fight the goblin.\n";
            echo "Your Dagger comes in handy and you decapitate the goblin.\n";
            
            while(true){
                echo "Would you like to continue exploring the cave?\n";
                $continueChoice = strtolower(readline("> "));
                if (in_array($continueChoice, $validChoices)) {
                    break;
                }
            }
        }
            
            if ($continueChoice == "yes" || $continueChoice == "y") {
                $numberChoice = GuessingGameEncounter();
                if ($numberChoice == "yes" || $numberChoice == "y") {
                    detailsGameYes();
                    if ($GLOBALS['playGameChoice'] == "yes" || $GLOBALS['playGameChoice'] == "y") {
                        numberGuessingGame();
                    }
                    elseif ($GLOBALS['playGameChoice'] == "no" ||
                            $GLOBALS['playGameChoice'] == "n"){
                                echo "The Wizard shakes his head, disappointed, and you leave the vicinity empty-handed.\n";
                            }
                    else{
                        echo "Invalid Choice. Try Again.\n";
                    }
                } 
                elseif {
                    detailsGameNo();
                    if ($playGameChoice == "yes" || $playGameChoice == "y") {
                        numberGuessingGame();
                    } 
                    elseif ($playGameChoice == "no" || $playGameChoice == "n") {
                        echo "The Wizard shakes his head, disappointed, and you leave the vicinity empty-handed.\n";
                    }
                    else {
                        echo "Invalid Choice. Try Again.\n";
                    }
                }
                else {
                    echo "Invalid Choice. Try Again.\n";
                }
            } else {
                echo "You decide to leave the cave.\n";
            } 
        } else  {
            echo "You cowardly run away from the scene.\n";
            echo "You run out the cave, earning nothing but a fright.\n";
        }
    }

    visitVillage();
}
        
        
        
        
        function visitVillage()
        {
        global $startMoney;
        
        echo "You explore the surroundings and find yourself a village nearby.\n";
        echo "Would you like to visit the village?\n";
        $villageChoice = readline("> ");
        if ($villageChoice == "yes" || $villageChoice == "y") {
            echo "You enter the village and take a rest.\n";
            echo "You find nearby a swordsmith selling swords.\n";
            echo "Would you like to enter?\n";
            $swordsmithChoice = readline("> ");
            if ($swordsmithChoice == "yes" || $swordsmithChoice == "y") {
                buyLongsword();
            }
            elseif($swordsmithChoice == "no" || $swordsmithChoice == "n"){
                echo("You exit the shop without buying anything.\n");
                
            }
            else{
                echo("Invalid Choice. Try Again.\n");
            }
        }
    }

function buyLongsword()
{
    global $startMoney;
    
    echo "You decide to enter the store in search for a better weapon.\n";
    echo "You find your eyes take a liking to a longsword.\n";
    echo "You have $startMoney coins.\n";
    echo "The Longsword costs 80 coins.\n";
    echo "Would you like to buy it?\n";
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

function displayGameOver()
{
    $wordGameOver = "
    *******        **       **        **  ********
   **     **     **  **     ***      ***  **
   **          **      **   ** **  ** **  **
   **   ****  ************  **   **   **  ********
   **     **  **        **  **        **  **
    **   **   **        **  **        **  **
     *****    **        **  **        **  ********

   *********   **              **  *********   **********
 **         **  **            **   **          **      **
**           **  **          **    **          **      **
**           **   **        **     *********   **********
**           **    **      **      **          **     ** 
**          **      **    **       **          **      **
 **        **        **  **        **          **       **
   *********           **          *********   **        **
   
    
";
echo $wordGameOver;
}

function GuessingGameEncounter(){
    echo "You continue deeper into the cave.\n";
    echo "You come across a mysterious looking wizard.\n";
    echo "Next to the wizard is a table with a bunch of wizarding equipment.\n";
    echo "The wizard beckons you to a Number Guessing Game.\n";
    echo "Would you like to see the details of the game?.\n";
    $numberChoice = readline("> ");
    return $numberChoice;
}

function detailsGameYes(){
    global $playGameChoice;
    
    echo "Details: .\n";
    echo "\"\tWithin the veil of mystery, a number lies unseen,
    Between one and ten, where shadows intervene.
    Three chances granted, to unveil its hidden sheen,
    Success bestows riches, failure brings a health routine.\".\n\n";
    echo "Would you like to play?.\n";
    $playGameChoice = readline("> ");
}

function detailsGameNo(){
    global $playGameChoice;
    
    echo "You have disregarded the details of the game.\n";
    echo "Would you like to play?.\n";
    $playGameChoice = readline("> ");
    return $playGameChoice;
}

function numberGuessingGame(){
    global $startMoney;
    
    $numberToGuess = rand(1, 10); 
    $remainingTries = 3; 

    echo "Welcome to the Number Guessing Game!\n";
    echo "You have 3 tries to guess the number between 1 and 10.\n";

    for ($i = 1; $i <= 3; $i++) {
        echo "Guess #$i: ";
        $guess = readline();

        // Check if the guess is correct
        if ($guess == $numberToGuess) {
            echo "Congratulations! You guessed the number correctly.\n";
            echo "The Wizard nods his head in respect and hands you your prize money of 50 coins.\n";
            break; 
        } else {
            $remainingTries--; 
            if ($remainingTries > 0) {
                echo "Incorrect guess. You have $remainingTries tries left.\n";
            } else {
                echo "Sorry, you've run out of tries. The correct number was $numberToGuess.\n";
                echo "The Wizard smirks and takes away 20% of your health.\n";
            }
        }
    }
}

function playerDetails(){
    echo "Here are your player details for the game.\n";
    echo "Attack: 2\n";
    echo "Health: 15\n";
    echo "Put in your Name Please:\n";
    $playerName = readline("> ");
    echo "Name: $playerName\n";
    echo "Welcome $playerName! I hope you enjoy your time here.\n";
}
displayIntro();
choosePath();

?>
























<?php

$playerCoins = 100;
$playerAttack = 2;
$validChoices = array("yes", "no", "y", "n");

function displayIntro()
{
    $validChoicesNumber = array("1", "2");
    echo "Welcome to the Adventure Game Player!\n";
    echo "Let us first set up your profile!.\n";
    playerDetails();
    echo ("You find yourself standing at a crossroads.\n");
    while (true){
        echo "Which path will you choose? (1 or 2)\n";
        $pathChoice = readline("> \n");
        if (in_array($pathChoice, $validChoicesNumber)) {
            break;
        }
    }
    if($pathChoice == 1){
        buyItem();
    }
    elseif($pathChoice == 2){
        exploreCave();
    }
    else{
        echo("Invalid Choice. Try Again.\n");
    }
}

function playerDetails(){
    echo "Here are your player details for the game.\n";
    echo "Attack: 2\n";
    echo "Health: 15\n";
    echo "Put in your Name Please:\n";
    $playerName = readline("> ");
    echo "Name: $playerName\n";
    echo "Welcome $playerName! I hope you enjoy your time here.\n";
}

function exploreCave()
{
    $validChoices = array("yes", "no", "y", "n");
    global $playerCoins;
    global $playerAttack;
    $gameName = "Wizard's Trials";

    echo "You enter the cave nervously.\n";
    echo "As you walk around, you suddenly encounter a goblin with a knife.\n";
    while (true){
        echo "Will you fight it? (yes or no)\n";
        $fightChoice = strtolower(readline("> "));
        if (in_array($fightChoice, $validChoices)) {
            break;
        }
    }
    if ($fightChoice == "yes" || $fightChoice == "y") {
        echo "You courageously fight the goblin.\n";
        echo "Your attack power: $playerAttack\n";
        $goblinHealth = 4;
        while ($goblinHealth > 0) {
            $goblinHealth -= $playerAttack;
            echo "You deal $playerAttack damage to the goblin. Goblin's health: $goblinHealth\n";
            if ($goblinHealth <= 0) {
                echo "You defeat the goblin!\n";
                echo "You get 50 coins from defeating the goblin\n";
                $playerCoins += 50;
                displayGameEnding();
            } else {
                echo "The goblin attacks you! You lose 2 health.\n";
                $playerHealth = 5;
                $playerHealth -= 2;
            }
        }
    } elseif ($fightChoice == "no" || $fightChoice == "n") {
        echo "You cowardly run away from the scene.\n";
        echo "You run out of the cave, earning nothing but a fright.\n";
        numberGuessingGame();
    }
    else{
        echo "Invalid Choice. Try Again.\n";
        $fightChoice = readline("> ");
        
    }
}

function buyItem()
{
    global $playerCoins;

    echo "You find a merchant selling items.\n";
    echo "Which item would you like to buy?\n";
    echo "1. Dagger (65 coins)\n";
    echo "2. Health Potion (30 coins)\n";
    echo "3. Purple Cape (50 coins)\n";
    echo "4. Dog Bone (10 coins)\n";
    $itemChoice = intval(readline("> "));

    switch ($itemChoice) {
        case 1:
            if ($playerCoins >= 65) {
                echo "You bought a Dagger.\n";
                $playerCoins -= 65;
                // Add Dagger stats or effects
            } else {
                echo "Not enough coins.\n";
            }
            break;
        case 2:
            if ($playerCoins >= 30) {
                echo "You bought a Health Potion.\n";
                $playerCoins -= 30;
                // Add Health Potion stats or effects
            } else {
                echo "Not enough coins.\n";
            }
            break;
        case 3:
            if ($playerCoins >= 50) {
                echo "You bought a Purple Cape.\n";
                $playerCoins -= 50;
                // Add Purple Cape stats or effects
            } else {
                echo "Not enough coins.\n";
            }
            break;
        case 4:
            if ($playerCoins >= 10) {
                echo "You bought a Dog Bone.\n";
                $playerCoins -= 10;
                // Add Dog Bone stats or effects
            } else {
                echo "Not enough coins.\n";
            }
            break;
        default:
            echo "Invalid item choice.\n";
            buyItem();
            break;
    }
    numberGuessingGame();
}

function numberGuessingGame(){
    global $startMoney;
    $validChoices = array("yes", "no", "y", "n");
    $numberToGuess = rand(1, 10); 
    $remainingTries = 3; 
    echo "You meet a Wizard prompting you to come over.\n";
    echo "The Wizard wants you to play the game.\n";
    while(true){
        echo "Do you want to proceed?\n";
        $gameChoice = readline("> \n");
        if (in_array($gameChoice, $validChoices)) {
            break;
        }
    }
    if($gameChoice == "yes" || $gameChoice == "y"){

        echo "Welcome to the Number Guessing Game!\n";
        echo "You have 3 tries to guess the number between 1 and 10.\n";
    
        for ($i = 1; $i <= 3; $i++) {
            echo "Guess #$i: ";
            $guess = readline();
    
            // Check if the guess is correct
            if ($guess == $numberToGuess) {
                echo "Congratulations! You guessed the number correctly.\n";
                echo "The Wizard nods his head in respect and hands you your prize money of 100 coins.\n";
	$startMoney += 100;
                break; 
            } else {
                $remainingTries--; 
                if ($remainingTries > 0) {
                    echo "Incorrect guess. You have $remainingTries tries left.\n";
                } else {
                    echo "Sorry, you've run out of tries. The correct number was $numberToGuess.\n";
                    echo "The Wizard smirks and takes away 20% of your health.\n";
                }
            }
        }
    } elseif($gameChoice == "no" || $gameChoice == "n"){
        echo "The Wizard shakes his head disappointed.\n";
        echo "You walk out of the vicinity with no gain or loss.\n";
    } else{
        echo "Invalid Choice. Try Again.\n";
        $gameChoice = readline("> \n");
    }
    displayGameEnding();
}


function displayGameEnding()
{
    echo "Congratulations! You have completed the mini-game!\n";
    // You can add additional messages or rewards here
}


displayIntro();

?>
