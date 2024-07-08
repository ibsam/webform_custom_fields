<?php

namespace Drupal\webform_custom_fields\Controller;

use Drupal\Core\Controller\ControllerBase;

class WebformCustomFieldsController extends ControllerBase {
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello, this is the Webform Custom Fields module!'),
    ];
  }
}
