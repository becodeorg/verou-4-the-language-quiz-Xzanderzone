<?php

class Word
{
  protected string $swedish;
  protected string $english;
  protected string $dutch;

  public function __construct(string $swedish, string $english)
  {
    $this->swedish = $swedish;
    $this->english = $english;
  }
  public function getWord(string $language = "english"): string
  {
    $correct = '';
    match ($language) {
      "swedish" => $correct = $this->swedish,
      "dutch" => $correct = $this->dutch,
      "english" => $correct = $this->english,
    };
    return $correct;
  }
  public function verify(string $answer, string $language = "swedish"): bool
  {
    $answer = strtoupper($answer);
    $correct = '';
    match ($language) {
      "swedish" => $correct = $this->swedish,
      "dutch" => $correct = $this->dutch,
      "english" => $correct = $this->english,
    };
    $correct = strtoupper($correct);
    return ($correct == $answer);
    // Bonus (hard): can you allow answers with small typo's (max one character different)?
  }
}