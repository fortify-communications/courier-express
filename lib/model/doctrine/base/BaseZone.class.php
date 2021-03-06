<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Zone', 'doctrine');

/**
 * BaseZone
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $courier_id
 * @property integer $zone_polygon_id
 * @property Courier $Courier
 * @property Courier $Courier_2
 * @property ZonePolygon $ZonePolygon
 * @property Doctrine_Collection $ZonePriceLevel
 * @property Doctrine_Collection $ZonePriceLevel_2
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getName()             Returns the current record's "name" value
 * @method integer             getCourierId()        Returns the current record's "courier_id" value
 * @method integer             getZonePolygonId()    Returns the current record's "zone_polygon_id" value
 * @method Courier             getCourier()          Returns the current record's "Courier" value
 * @method Courier             getCourier2()         Returns the current record's "Courier_2" value
 * @method ZonePolygon         getZonePolygon()      Returns the current record's "ZonePolygon" value
 * @method Doctrine_Collection getZonePriceLevel()   Returns the current record's "ZonePriceLevel" collection
 * @method Doctrine_Collection getZonePriceLevel2()  Returns the current record's "ZonePriceLevel_2" collection
 * @method Zone                setId()               Sets the current record's "id" value
 * @method Zone                setName()             Sets the current record's "name" value
 * @method Zone                setCourierId()        Sets the current record's "courier_id" value
 * @method Zone                setZonePolygonId()    Sets the current record's "zone_polygon_id" value
 * @method Zone                setCourier()          Sets the current record's "Courier" value
 * @method Zone                setCourier2()         Sets the current record's "Courier_2" value
 * @method Zone                setZonePolygon()      Sets the current record's "ZonePolygon" value
 * @method Zone                setZonePriceLevel()   Sets the current record's "ZonePriceLevel" collection
 * @method Zone                setZonePriceLevel2()  Sets the current record's "ZonePriceLevel_2" collection
 * 
 * @package    cexp
 * @subpackage model
 * @author     Courier Express
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseZone extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('zone');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 45, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 45,
             ));
        $this->hasColumn('courier_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('zone_polygon_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Courier', array(
             'local' => 'courier_id',
             'foreign' => 'id'));

        $this->hasOne('Courier as Courier_2', array(
             'local' => 'courier_id',
             'foreign' => 'id'));

        $this->hasOne('ZonePolygon', array(
             'local' => 'zone_polygon_id',
             'foreign' => 'id'));

        $this->hasMany('ZonePriceLevel', array(
             'local' => 'id',
             'foreign' => 'from_zone_id'));

        $this->hasMany('ZonePriceLevel as ZonePriceLevel_2', array(
             'local' => 'id',
             'foreign' => 'to_zone_id'));
    }
}