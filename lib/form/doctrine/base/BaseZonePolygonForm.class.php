<?php

/**
 * ZonePolygon form base class.
 *
 * @method ZonePolygon getObject() Returns the current form's model object
 *
 * @package    cexp
 * @subpackage form
 * @author     Courier Express
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZonePolygonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ZonePolygonType'), 'add_empty' => false)),
      'pdata'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ZonePolygonType'))),
      'pdata'   => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('zone_polygon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ZonePolygon';
  }

}
