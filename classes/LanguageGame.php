<?php

class LanguageGame
{
  private array $words;

  public function __construct()
  {
    foreach (Data::words() as $swedishTranslation => $englishTranslation) {
      $this->words[] = new Word($swedishTranslation, $englishTranslation);
    }
  }

  public function run(): void
  {
    // var_dump($_SESSION);
    // var_dump($_POST);
    if (isset($_POST["Reset"])) {
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
        $_SESSION["currentWord"] = rand(0, count($this->words) - 1);
      } else {
        $_SESSION["wrong"] += 1;
        echo 'wrong! try again';
      }
    }
    echo "<br>your word is :" . $this->words[$_SESSION["currentWord"]]->getWord() . '<br>';
    echo "<br> Total correct: " . $_SESSION["correct"] . ' out of :' . ($_SESSION["wrong"] + $_SESSION["correct"]);
  }
}