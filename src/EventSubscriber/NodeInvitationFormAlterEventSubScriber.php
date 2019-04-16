<?php

namespace Drupal\drupalup_event_hook\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Altering drupal forms with hook_event_dispatcher.
 */
class NodeInvitationFormAlterEventSubScriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      HookEventDispatcherInterface::FORM_ALTER => 'hookFormAlter',
    ];
  }

  /**
   * Altering the invitation node form.
   */
  public function hookFormAlter($event) {

    $form = $event->getForm();
    if ($event->getFormId() == 'node_page_edit_form') {
      $form['info'] = [
        '#type' => 'markup',
        '#markup' => '<div class="info">Example markup.</div>',
      ];
    }

    $event->setForm($form);
  }

}
