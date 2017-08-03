<?php

namespace Bulliby\UserBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use Bulliby\UserBundle\Event\UserEvent;
use Bulliby\UserBundle\Services\PasswordService;
use Doctrine\ORM\EntityManager;

class UserNotificationListener implements EventSubscriberInterface
{
  private $encoder;
  protected $em;

  public function __construct(PasswordService $encoder, EntityManager $em)
  {
    $this->encoder = $encoder;
    $this->em = $em;
  }

  public function onUserCreate(UserEvent $event)
  {
	$user = $event->getUser();
	$encoded = $this->encoder->hashPassword($user->getPassword(), $user);
	$user->setPassword($encoded);
  }

  public static function getSubscribedEvents()
  {
    return [
      'user.create' => 'onUserCreate',
    ];
  }
}
