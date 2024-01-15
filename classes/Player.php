<?php

class Player
{
  // TODO: add name and score
  private string $name;
  private int $scoreCorrect;
  private int $scoreWrong;
  private int $scoreTotal;

  public function __construct(string $name, int $scoreCorrect = 0, int $scoreWrong = 0)
  {
    $this->name = "👤" . $name;
    $this->scoreCorrect = $scoreCorrect;
    $this->scoreWrong = $scoreWrong;
    $this->scoreTotal = $scoreCorrect + $scoreWrong;
  }

  public function getName(): string
  {
    return $this->name;
  }
  public function getScoreCorrect(): int
  {
    return $this->scoreCorrect;
  }
  public function getScoreWrong(): int
  {
    return $this->scoreWrong;
  }
  public function resetPlayer()
  {
    $this->scoreCorrect = 0;
    $this->scoreWrong = 0;
  }
  public function getScoreTotal(): int
  {
    return $this->scoreTotal;
  }
  public function wrongAnser()
  {
    $this->scoreTotal++;
    $this->scoreWrong++;
  }
  public function correctAnswer()
  {
    $this->scoreTotal++;
    $this->scoreCorrect++;
  }
}
