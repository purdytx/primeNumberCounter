use PHPUnit\Framework\TestCase;

class PrimeTest extends TestCase
{
    // ...

    public function testPrime()
    {
        // Arrange
        $a = new Prime();

        // errors
        $e1 = $a->atkins(3,2);
	$e2 = $a->atkins(a,b);
	$e3 = $a->atkins(2,10000000);
	
	//success
	$s1 = $a->atkins(2,1000);
	
        // Assert
        $this->assertFalse($e1);
	$this->assertFalse($e2);
	$this->assertFalse($e3);
	
	$this->assertTrue(is_array($s1));
    }
}
