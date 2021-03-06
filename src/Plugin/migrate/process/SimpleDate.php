<?php

namespace Drupal\ercore_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;
use Drupal\migrate\MigrateExecutableInterface;

/**
 * Simple Date processing, removes time code from D7 date.
 *
 * Example:
 * @code
 * process:
 *   field_your_field_name:
 *       plugin: simple_date
 *       source: some_source_value
 * @endcode
 *
 * @see \Drupal\migrate\Plugin\MigrateProcessInterface
 *
 * @MigrateProcessPlugin(
 *   id = "simple_date"
 * )
 */
class SimpleDate extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $separator = ' ';
    if (strpos($value, 'T') !== FALSE) {
      $separator = 'T';
    }
    $exploded = explode($separator, $value);
    return $exploded[0];
  }

}
