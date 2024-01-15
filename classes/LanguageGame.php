<?php

class LanguageGame
{
  private array $words;

  private Player $activePlayer;
  private PlayerHistory $playerHistory;
  public function __construct()
  {
    foreach (Data::words() as $swedishTranslation => $englishTranslation) {
      $this->words[] = new Word($swedishTranslation, $englishTranslation);
    }
    $name = (isset($_POST["name"])) ? $_POST["name"] : '';
    $this->playerHistory = new PlayerHistory();
    $this->activePlayer = $this->playerHistory->addPlayer($name);
  }

  public function run(): void
  {
    // var_dump($_SESSION);
    // var_dump($_POST);

    if (isset($_POST["changeUser"])) {
      $_SESSION['name'] = (isset($_POST["name"])) ? $_POST["name"] : '';
      $_SESSION["correct"] = 0;
      $_SESSION["wrong"] = 0;
      // $this->activePlayer = $this->playerHistory->addPlayer($name);
    } else if (isset($_POST["Reset"])) {
      $_SESSION["currentWord"] = rand(0, count($this->words) - 1);
      $_SESSION["correct"] = 0;
      $_SESSION["wrong"] = 0;
    } else if (!isset($_SESSION["currentWord"])) {
      //assign a random index from words array to a session/cookie
      $_SESSION["currentWord"] = rand(0, count($this->words) - 1);
      $_SESSION["correct"] = 0;
      $_SESSION["wrong"] = 0;
    } else if (isset($_POST["answer"])) {
      if ($this->words[$_SESSION["currentWord"]]->verify($_POST["answer"])) {
        echo "correct! setting up new word";
        $_SESSION["correct"] += 1;
        // $this->activePlayer->correctAnswer();
        $_SESSION["currentWord"] = rand(0, count($this->words) - 1);
      } else {
        $_SESSION["wrong"] += 1;
        // $this->activePlayer->wrongAnser();
        echo 'wrong! try again';
      }
    }
    echo "<br>your word is :" . $this->words[$_SESSION["currentWord"]]->getWord() . '<br>';
    // echo "<br> Total correct: " . $_SESSION["correct"] . ' out of :' . ($_SESSION["correct"] + $_SESSION["wrong"]);
    // echo "<br> Total correct: " . $this->activePlayer->getScoreCorrect() . ' out of :' . ($this->activePlayer->getScoreTotal());
  }
}