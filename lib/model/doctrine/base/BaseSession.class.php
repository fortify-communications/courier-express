<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Session', 'doctrine');

/**
 * BaseSession
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $time
 * @property string $session_data
 * 
 * @method integer getId()           Returns the current record's "id" value
 * @method integer getTime()         Returns the current record's "time" value
 * @method string  getSessionData()  Returns the current record's "session_data" value
 * @method Session setId()           Sets the current record's "id" value
 * @method Session setTime()         Sets the current record's "time" value
 * @method Session setSessionData()  Sets the current record's "session_data" value
 * 
 * @package    cexp
 * @subpackage model
 * @author     Courier Express
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSession extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('session');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('time', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('session_data', 'string', null, array(
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
        
    }
}