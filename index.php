<?php
    session_start();
    if (isset($_GET["data"])){
        if (!isset($_SESSION["counterPlayer"]) && !isset($_SESSION["counterBot"]) || !isset($_SESSION["counterBot"]) && !isset($_SESSION["counterPlayer"])){
            $_SESSION["counterPlayer"] = 0;
            $_SESSION["counterBot"] = 0;
        }

        $BotOptions = ["Rock", "Paper", "Scissors"];
        $random = array_rand ($BotOptions, 1);
        $option = $BotOptions[$random];
        
        if ($_SESSION["counterPlayer"] == 5){
            echo "[+] You win the game! Score Board: " . "You: " . $_SESSION["counterPlayer"].  " points! | " . "Him: " . $_SESSION["counterBot"] . " points!";

        }else if ($_SESSION["counterBot"] == 5){
            echo "[+] You lost the game! Score Board: " . "You: " . $_SESSION["counterPlayer"].  " points! | " . "Him: " . $_SESSION["counterBot"] . " points!";

        }else{
    
            if ($_GET["data"] == "rock" && $option == "Rock" || $_GET["data"] == "Rock" && $option == "Rock"){
                echo "[+] It's a tie, [ Rock == Rock ]";

            }else if ($_GET["data"] == "rock" && $option == "Paper" || $_GET["data"] == "Rock" && $option == "Paper"){
                echo "[+] It's a lose, [ Rock < Papper ]";
                $_SESSION["counterBot"]++;

            }else if ($_GET["data"] == "rock" && $option == "Scissors" || $_GET["data"] == "Rock" && $option == "Scissors"){
                echo "[+] It's a win, [ Rock > Scissors ]";
                $_SESSION["counterPlayer"]++;

            }

            if ($_GET["data"] == "paper" && $option == "Paper" || $_GET["data"] == "Paper" && $option == "Paper"){
                echo "[+] It's a tie, [ Paper == Paper ]";

            }else if ($_GET["data"] == "paper" && $option == "Rock" || $_GET["data"] == "Paper" && $option == "Rock"){
                echo "[+] It's a win, [ Paper > Rock ]";
                $_SESSION["counterPlayer"]++;

            }else if ($_GET["data"] == "paper" && $option == "Scissors" || $_GET["data"] == "Paper" && $option == "Scissors"){
                echo "[+] It's a lose, [ Paper < Scissors ]";
                $_SESSION["counterBot"]++;

            }

            if ($_GET["data"] == "scissors" && $option == "Scissors" || $_GET["data"] == "Scissors" && $option == "Scissors"){
                echo "[+] It's a tie, [ Scissors == Scissors ]";

            }else if ($_GET["data"] == "scissors" && $option == "Paper" || $_GET["data"] == "Scissors" && $option == "Paper"){
                echo "[+] It's a win, [ Scissors > Papper ]";
                $_SESSION["counterPlayer"]++;

            }else if ($_GET["data"] == "scissors" && $option == "Rock" || $_GET["data"] == "Scissors" && $option == "Rock"){
                echo "[+] It's a lose, [ Scissors < Rock ]";
                $_SESSION["counterBot"]++;

            }
        }

        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Rock Paper Scissors</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <center>
        <!--<h1>Open the console to play</h1> -->
        <br><input type="text" id="inp1" placeholder="Rock | Paper | Scissors">
        <br><br><button type="button" id="btn1" class="btn btn-primary">Roll!</button>
    </center>
    <script>
        $("#btn1").click(function(){
            $.get("index.php", {"data": $("#inp1").val()}, function(data){
                if (data.includes("Score")){
                    console.log(data);
                    setTimeout(() => {
                        window.location.href = "reset.php";
                    }, 1500);
                }else{
                    console.log(data);
                }
            })    
        });
    </script>
    </body>
</html>