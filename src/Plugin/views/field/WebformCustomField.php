<?php

namespace Drupal\your_module\Plugin\views\field;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\views\Plugin\views\field\Field;
use Drupal\views\ResultRow;
use Drupal\webform\Entity\Webform;

/**
 * Defines a Views field handler for the custom webform field.
 *
 * @ViewsField("webform_custom_field")
 */
class WebformCustomField extends Field {

  /**
   * {@inheritdoc}
   */
  public function getValue(ResultRow $row, $field_definition) {
    $webform = $row->_entity;
    if ($webform instanceof Webform) {
      return $webform->getThirdPartySetting('webform_custom_fields', 'custom_field', 'none');
    }
    return '';
  }

  /**
   * {@inheritdoc}
   */
  public function clickSortable() {
    return TRUE;
  }
}
