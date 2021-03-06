<?php

class sfValidatorCreditCard extends sfValidatorBase
{
  protected $_ccregex = array(  
    "visa"        => "/^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/",
    "mastercard"  => "/^5[1-5]\d{2}-?\d{4}-?\d{4}-?\d{4}$/",
    "discover"    => "/^6011-?\d{4}-?\d{4}-?\d{4}$/",
    "amex"        => "/^3[4,7]\d{13}$/",
    "diners"      => "/^3[0,6,8]\d{12}$/",
    "bankcard"    => "/^5610-?\d{4}-?\d{4}-?\d{4}$/",
    "jcb"         => "/^[3088|3096|3112|3158|3337|3528]\d{12}$/",
    "enroute"     => "/^[2014|2149]\d{11}$/",
    "switch"      => "/^[4903|4911|4936|5641|6333|6759|6334|6767]\d{12}$/"
  );
 
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('card_type', null);
		$this->addMessage('invalid_card_number', 'Please correct card number');
  }
  
  public function doClean($value)
  {
    if (!$this->_isValidCreditCard($value, $this->options['card_type']))
			throw new sfValidatorError($this, 'invalid_card_number', array('value' => $value));

    return $value;
  }
  
  /**
   * Testing checksum
   *
   * @param integer $ccnum
   * @return boolean
   */
  private function _checkSum($ccnum)
  {
    $checksum = 0;
    for ($i = (2-(strlen($ccnum) % 2)); $i <= strlen($ccnum); $i+=2)
    {
      $checksum += (int)($ccnum{$i-1});
    }
    
    // Analyze odd digits in even length strings or even digits in odd length strings.
    for ($i = (strlen($ccnum)% 2) + 1; $i < strlen($ccnum); $i+=2)
    {
      $digit = (int)($ccnum{$i-1}) * 2;
      if ($digit < 10)
      { 
        $checksum += $digit; 
      }
      else
      { 
        $checksum += ($digit-9); 
      }
    }

    return (($checksum % 10) == 0);

  }

  /**
   * Launch validation
   *
   * @param integer $ccnum
   * @param string $type
   * @param boolean $returnobj
   * @return boolean
   */
  private function _isValidCreditCard($ccnum, $type = null)
  {
    if(!$type)
    {
      $match = false;
      foreach($this->_ccregex as $type => $pattern)
      {
        if(preg_match($pattern,$ccnum) == 1)
        {
          $match = true;
          break;
        }
      }
      return $match ? $this->_checkSum($ccnum) : false;  
    }

    if(@preg_match($this->_ccregex[strtolower(trim($type))],$ccnum) == 0)
    {
      return false;  
    }
      
    return $this->_checkSum($ccnum);
  }
}

