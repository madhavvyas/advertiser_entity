<?php
/**
 * @file
 * Contains \Drupal\advertiser\Entity\Advertiser.
 */

/**
 * Defines the Entity's namespace.
 *
 * For example with this namespace try:
 * drush php-eval '$entity = \Drupal\advertiser\Entity\Advertiser::create(); $entity->save();'.
 */

namespace Drupal\advertiser\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Advertiser entity.
 *
 * @ingroup advertiser
 *
 * @ContentEntityType(
 *   id = "advertiser",
 *   label = @Translation("Advertiser"),
 *   base_table = "advertiser",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid"
 *   },
 * )
 */
class Advertiser extends ContentEntityBase implements ContentEntityInterface {
  /**
   * Define .
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    // Standard field, used as unique if primary index.
    $fields['id'] = BaseFieldDefinition::create('integer')
        ->setLabel(t('ID'))
        ->setDescription(t('The ID of the Advertiser entity.'))
        ->setReadOnly(TRUE);

    // Standard field, unique outside of the scope of the current project.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Contact entity.'))
      ->setReadOnly(TRUE);

    // Name field for the advertiser.
    $fields['name'] = BaseFieldDefinition::create('string')
        ->setLabel(t("The advertiser's name"))
        ->setDescription(t('The name of the advertiser.'));

    return $fields;
  }

}
