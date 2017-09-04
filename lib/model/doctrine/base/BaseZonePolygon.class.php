<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ZonePolygon', 'doctrine');

/**
 * BaseZonePolygon
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $type_id
 * @property string $pdata
 * @property ZonePolygonType $ZonePolygonType
 * @property Doctrine_Collection $ServiceAddon
 * @property Doctrine_Collection $ServiceAddon_4
 * @property Doctrine_Collection $Zone
 * 
 * @method integer             getId()              Returns the current record's "id" value
 * @method integer             getTypeId()          Returns the current record's "type_id" value
 * @method string              getPdata()           Returns the current record's "pdata" value
 * @method ZonePolygonType     getZonePolygonType() Returns the current record's "ZonePolygonType" value
 * @method Doctrine_Collection getServiceAddon()    Returns the current record's "ServiceAddon" collection
 * @method Doctrine_Collection getServiceAddon4()   Returns the current record's "ServiceAddon_4" collection
 * @method Doctrine_Collection getZone()            Returns the current record's "Zone" collection
 * @method ZonePolygon         setId()              Sets the current record's "id" value
 * @method ZonePolygon         setTypeId()          Sets the current record's "type_id" value
 * @method ZonePolygon         setPdata()           Sets the current record's "pdata" value
 * @method ZonePolygon         setZonePolygonType() Sets the current record's "ZonePolygonType" value
 * @method ZonePolygon         setServiceAddon()    Sets the current record's "ServiceAddon" collection
 * @method ZonePolygon         setServiceAddon4()   Sets the current record's "ServiceAddon_4" collection
 * @method ZonePolygon         setZone()            Sets the current record's "Zone" collection
 * 
 * @package    cexp
 * @subpackage model
 * @author     Courier Express
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseZonePolygon extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('zone_polygon');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('type_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('pdata', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ZonePolygonType', array(
             'local' => 'type_id',
             'foreign' => 'id'));

        $this->hasMany('ServiceAddon', array(
             'local' => 'id',
             'foreign' => 'from_zone_polygon_id'));

        $this->hasMany('ServiceAddon as ServiceAddon_4', array(
             'local' => 'id',
             'foreign' => 'to_zone_polygon_id'));

        $this->hasMany('Zone', array(
             'local' => 'id',
             'foreign' => 'zone_polygon_id'));
    }
}