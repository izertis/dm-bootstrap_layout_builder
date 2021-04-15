<?php

namespace Drupal\bootstrap_layout_builder\EventSubscriber;

use Drupal\bootstrap_layout_builder\Event\LayoutOptionUpdatedOrCreatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 *
 */
class LayoutOptionUpdatedOrCreatedSubscriber implements EventSubscriberInterface {

  /**
   * Events subscription.
   *
   * @return string[]
   */
  public static function getSubscribedEvents(): array {
    return [
      LayoutOptionUpdatedOrCreatedEvent::NAME => 'onLayoutOptionUpdatedOrCreated'
    ];
  }

  /**
   * Updates all the breakpoints if the is default was selected.
   *
   * @param \Drupal\bootstrap_layout_builder\Event\LayoutOptionUpdatedOrCreatedEvent $event
   */
  public function onLayoutOptionUpdatedOrCreated(LayoutOptionUpdatedOrCreatedEvent $event) {
    $entity = $event->layoutOption;
    foreach ($entity->getLayout()->getLayoutOptions() as $layoutOption) {
      if ($layoutOption->getOriginalId() !== $entity->getOriginalId()) {
        if (array_intersect($entity->getBreakpointsIds(), $layoutOption->getBreakpointsIds())) {
          $layoutOption->setIsDefault(FALSE);
          $layoutOption->save();
        }
      }
    }
  }

}
