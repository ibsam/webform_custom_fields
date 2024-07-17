<?php

namespace Drupal\webform_custom_fields\Plugin\views\field;

use Drupal\views\ResultRow;
use Drupal\views\Plugin\views\field\FieldPluginBase;
use Drupal\views\Annotation\ViewsField;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a views field handler to display the custom field.
 *
 * @ViewsField("webform_custom_field")
 */
class CustomField extends FieldPluginBase {


  /**
   * {@inheritdoc}
   */
  public function query() {
    // Leave empty to avoid adding any query conditions.
  }


  // /**
  //  * {@inheritdoc}
  //  */
  // public function render(ResultRow $values) {
  //   $webform = $values->_entity;
  //   return $webform->getThirdPartySetting('webform_custom_fields', 'custom_field', '');
  // }

  
  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $values) {
    $entity = $values->_entity;
    $custom_field_value = $entity->getThirdPartySetting('webform_custom_fields', 'custom_field', 'none');
    return $custom_field_value;
  }

    /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['custom_field'] = ['default' => ''];
    return $options;
  }

   /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $form['custom_field'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Custom Field'),
      '#default_value' => $this->options['custom_field'],
      '#description' => $this->t('Enter the custom field key to display.'),
    ];
  }

}
