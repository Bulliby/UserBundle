<?php

namespace Bulliby\UserBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface as Encoder;

use Bulliby\UserBundle\Event\UserEvent;

class UserNotificationListener implements EventSubscriberInterface
{
  private $encoder;

  public function __construct(Encoder $encoder)
  {
    $this->encoder = $encoder;
  }

  public function onUserCreate(UserEvent $event)
  {
	$user = $event->getUser();
	$encoded = $this->encoder->encodePassword($user, $user->getPassword());
	$user->setPassword($encoded);
  }

  public static function getSubscribedEvents()
  {
    return [
      'user.create' => 'onUserCreate',
    ];
  }
}
