<?php

class Player
{
  // TODO: add name and score
  private string $name;
  private int $scoreCorrect;
  private int $scoreWrong;
  private int $scoreTotal;

  public function __construct(string $name, int $scoreCorrect, int $scoreWrong)
  {
    $this->name = "👤" . $name;
    $this->scoreWrong = $scoreWrong;
    $this->scoreWrong = $scoreWrong;
    $this->scoreTotal = $scoreCorrect + $scoreWrong;
  }
}