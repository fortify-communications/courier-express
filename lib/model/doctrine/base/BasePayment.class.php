<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Payment', 'doctrine');

/**
 * BasePayment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $payment_code
 * @property integer $client_id
 * @property decimal $amount
 * @property string $payment_type
 * @property string $ipn_string
 * @property string $trn_id
 * @property Client $Client
 * @property Client $Client_2
 * @property Doctrine_Collection $PackagePayment
 * @property Doctrine_Collection $PackagePayment_4
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getPaymentCode()      Returns the current record's "payment_code" value
 * @method integer             getClientId()         Returns the current record's "client_id" value
 * @method decimal             getAmount()           Returns the current record's "amount" value
 * @method string              getPaymentType()      Returns the current record's "payment_type" value
 * @method string              getIpnString()        Returns the current record's "ipn_string" value
 * @method string              getTrnId()            Returns the current record's "trn_id" value
 * @method Client              getClient()           Returns the current record's "Client" value
 * @method Client              getClient2()          Returns the current record's "Client_2" value
 * @method Doctrine_Collection getPackagePayment()   Returns the current record's "PackagePayment" collection
 * @method Doctrine_Collection getPackagePayment4()  Returns the current record's "PackagePayment_4" collection
 * @method Payment             setId()               Sets the current record's "id" value
 * @method Payment             setPaymentCode()      Sets the current record's "payment_code" value
 * @method Payment             setClientId()         Sets the current record's "client_id" value
 * @method Payment             setAmount()           Sets the current record's "amount" value
 * @method Payment             setPaymentType()      Sets the current record's "payment_type" value
 * @method Payment             setIpnString()        Sets the current record's "ipn_string" value
 * @method Payment             setTrnId()            Sets the current record's "trn_id" value
 * @method Payment             setClient()           Sets the current record's "Client" value
 * @method Payment             setClient2()          Sets the current record's "Client_2" value
 * @method Payment             setPackagePayment()   Sets the current record's "PackagePayment" collection
 * @method Payment             setPackagePayment4()  Sets the current record's "PackagePayment_4" collection
 * 
 * @package    cexp
 * @subpackage model
 * @author     Courier Express
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePayment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('payment');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('payment_code', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('client_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('amount', 'decimal', 7, array(
             'type' => 'decimal',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 7,
             'scale' => '2',
             ));
        $this->hasColumn('payment_type', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('ipn_string', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('trn_id', 'string', 16, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 16,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Client', array(
             'local' => 'client_id',
             'foreign' => 'id'));

        $this->hasOne('Client as Client_2', array(
             'local' => 'client_id',
             'foreign' => 'id'));

        $this->hasMany('PackagePayment', array(
             'local' => 'id',
             'foreign' => 'payment_id'));

        $this->hasMany('PackagePayment as PackagePayment_4', array(
             'local' => 'id',
             'foreign' => 'payment_id'));
    }
}