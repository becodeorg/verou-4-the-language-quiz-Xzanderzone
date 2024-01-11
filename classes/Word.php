<?php

class Word
{
  protected string $swedish;
  protected string $english;
  // protected string $dutch;

  public function __construct(string $swedish, string $english)
  {
    $this->swedish = $swedish;
    $this->english = $english;
  }
  public function verify(string $answer, string $language = "swedish"): bool
  {
    $answer = strtoupper($answer);
    $correct = '';
    match ($language) {
      "swedish" => $correct = $this->swedish,
      // "dutch" => $correct = $this->dutch,
      "english" => $correct = $this->english,
    };
    $correct = strtoupper($correct);
    return ($correct == $answer);
    // TODO: use this function to verify if the provided answer by the user matches the correct one
    // Bonus: allow answers with different casing (example: both bread or Bread can be correct answers, even though technically it's a different string)
    // Bonus (hard): can you allow answers with small typo's (max one character different)?
  }
}