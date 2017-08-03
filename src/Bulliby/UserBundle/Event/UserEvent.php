<?php

namespace Bulliby\UserBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use Bulliby\UserBundle\Entity\UserBase as User;

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
