<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/StringEndsWith.php';

class Hamcrest_Core_StringEndsWithTest extends Hamcrest_AbstractMatcherTest
{
  
  const EXCERPT = 'EXCERPT';
  
  private $_stringEndsWith;
  
  public function setUp()
  {
    $this->_stringEndsWith = Hamcrest_Core_StringEndsWith::endsWith(self::EXCERPT);
  }
  
  protected function createMatcher()
  {
    return $this->_stringEndsWith;
  }
  
  public function testEvaluatesToTrueIfArgumentContainsSpecifiedSubstring()
  {
    $this->assertFalse($this->_stringEndsWith->matches(self::EXCERPT . 'END'),
      'should be false if excerpt at beginning'
    );
    $this->assertTrue($this->_stringEndsWith->matches('START' . self::EXCERPT),
      'should be true if excerpt at end'
    );
    $this->assertFalse($this->_stringEndsWith->matches('START' . self::EXCERPT . 'END'),
      'should be false if excerpt in middle'
    );
    $this->assertTrue($this->_stringEndsWith->matches(self::EXCERPT . self::EXCERPT),
      'should be true if excerpt is at end and repeated'
    );
    
    $this->assertFalse($this->_stringEndsWith->matches('Something else'),
      'should be false if excerpt is not in string'
    );
    $this->assertFalse($this->_stringEndsWith->matches(substr(self::EXCERPT, 0, strlen(self::EXCERPT) - 2)),
      'should be false if part of excerpt is at end of string'
    );
  }
  
  public function testEvaluatesToTrueIfArgumentIsEqualToSubstring()
  {
    $this->assertTrue($this->_stringEndsWith->matches(self::EXCERPT),
      'should be true if excerpt is entire string'
    );
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a string ending with "EXCERPT"', $this->_stringEndsWith);
  }
  
}