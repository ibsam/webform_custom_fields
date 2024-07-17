<?php

namespace Drupal\webform_custom_fields;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\core\EventSubscriber\WebformEntityFormAlterSubscriber;

class WebformHandler extends WebformEntityFormAlterSubscriber {

  protected $entityTypeManager;
  protected $configFactory;

  public function __construct(EntityTypeManagerInterface $entityTypeManager, ConfigFactoryInterface $configFactory) {
    $this->entityTypeManager = $entityTypeManager;
    $this->configFactory = $configFactory;
  }

  public static function getSubscribedEvents() {
    $events = parent::getSubscribedEvents();
    $events['webform.form.alter'][] = 'alterWebformForm';
    return $events;
  }

  public function alterWebformForm(array &$form, FormStateInterface $form_state, $form_id) {
    // Ensure we're editing a webform entity.
    if ($form_id == 'webform_node_form') {
      $form['custom_field'] = [
        '#type' => 'textfield',
        '#title' => t('Custom field'),
        '#default_value' => $this->configFactory->getEditable('webform_custom_fields.settings')->get('custom_field') ?? '',
        '#weight' => -10,
      ];
    }
  }
}
