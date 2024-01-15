<?php
class PlayerHistory
{
  private array $players;
  public function __construct()
  {
    $this->players = [new Player('')];
    // $this->addPlayer();
  }
  public function addPlayer(string $playerName = 'anon'): Player
  {
    if (array_key_exists($playerName, $this->players))
      return $this->players[$playerName];
    else {
      // isset($_COOKIE[$playerName]) ?: setcookie($playerName, (string) (0.0), time() + 31536000, '/');
      return $this->players[] = new Player($playerName);
    }
  }
  public function getPlayers(): array
  {
    return $this->players;
  }
  public function getPlayer(string $name): Player
  {
    return $this->players[$name];
  }
  public function resetPlayer(string $name): void
  {
    $this->players[$name]->resetPlayer();
    // unset($_COOKIE[$name]);
  }
}