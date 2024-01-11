<?php

class LanguageGame
{
  private array $words;
  private Word $currentWord;

  public function __construct()
  {
    foreach (Data::words() as $swedishTranslation => $englishTranslation) {
      $this->words[] = new Word($swedishTranslation, $englishTranslation);
    }
  }

  public function run(): void
  {
    // TODO: check for option A or B
    if (!isset($this->currentWord)) {
      // Option A: user visits site first time (or wants a new word)
      // TODO: select a random word for the user to translate
      $this->currentWord = $this->words[rand(0, count($this->words) - 1)];

    } else {
      // Option B: user has just submitted an answer
      // TODO: verify the answer (use the verify function in the word class) - you'll need to get the used word from the array first
      if ($this->currentWord->verify("svenska")) {
        echo "correct!";
      } else
        echo 'wrong! try again';
    }
  }
}