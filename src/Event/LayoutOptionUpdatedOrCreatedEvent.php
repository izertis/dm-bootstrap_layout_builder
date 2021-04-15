<?php

namespace Drupal\bootstrap_layout_builder\Event;

use Drupal\bootstrap_layout_builder\LayoutOptionInterface;
use Drupal\Component\EventDispatcher\Event;

/**
 *
 */
class LayoutOptionUpdatedOrCreatedEvent extends Event {

  /**
   * Event NAME.
   */
  const NAME = 'bootstrap_layout_builder_layout_option_updated_or_created';

  /**
   * @var \Drupal\bootstrap_layout_builder\LayoutOptionInterface
   */
  public $layoutOption;

  /**
   * LayoutOptionUpdatedOrCreatedEvent constructor.
   *
   * @param \Drupal\bootstrap_layout_builder\LayoutOptionInterface $layoutOption
   */
  public function __construct(LayoutOptionInterface $layoutOption) {
    $this->layoutOption = $layoutOption;
  }

}
