<?php

namespace Bulliby\UserBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use FamillyBundle\Entity\User as User;

class UserEvent extends Event
{
  private $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  public function getUser()
  {
      return $this->user;
  }
}
