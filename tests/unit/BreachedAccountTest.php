<?php
use Ridvanbaluyos\Pwned\BreachedAccount as BreachedAccount;

class BreachedAccountTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $breachedAccountModel;

    protected function _before()
    {
        $breaches = new BreachedAccount();
        $res = $breaches->setAccount('test@example.com')
            ->setIncludeUnverified()
            ->get();

        $this->breachedAccountModel = $res;
    }

    protected function _after()
    {
        unset($this->breachedAccountModel);
    }

    // tests
    public function testObjectModel()
    {
        $object = $this->breachedAccountModel;

        $this->assertNotNull($object);
        $this->assertArrayHasKey('Title', $object[0]);
        $this->assertArrayHasKey('Name', $object[0]);
        $this->assertArrayHasKey('Domain', $object[0]);
        $this->assertArrayHasKey('BreachDate', $object[0]);
        $this->assertArrayHasKey('AddedDate', $object[0]);
        $this->assertArrayHasKey('ModifiedDate', $object[0]);
        $this->assertArrayHasKey('PwnCount', $object[0]);
        $this->assertArrayHasKey('Description', $object[0]);
        $this->assertArrayHasKey('DataClasses', $object[0]);
        $this->assertArrayHasKey('IsVerified', $object[0]);
        $this->assertArrayHasKey('IsFabricated', $object[0]);
        $this->assertArrayHasKey('IsSensitive', $object[0]);
        $this->assertArrayHasKey('IsRetired', $object[0]);
        $this->assertArrayHasKey('IsSpamList', $object[0]);
    }

    public function testObjectModelHasContent()
    {
        $object = $this->breachedAccountModel;

        $this->assertNotNull($object[0]['Title']);
        $this->assertNotNull($object[0]['Name']);
        $this->assertNotNull($object[0]['Domain']);
        $this->assertNotNull($object[0]['BreachDate']);
        $this->assertNotNull($object[0]['AddedDate']);
        $this->assertNotNull($object[0]['ModifiedDate']);
        $this->assertNotNull($object[0]['PwnCount']);
        $this->assertNotNull($object[0]['Description']);
        $this->assertNotNull($object[0]['DataClasses']);
        $this->assertNotNull($object[0]['IsVerified']);
        $this->assertNotNull($object[0]['IsFabricated']);
        $this->assertNotNull($object[0]['IsSensitive']);
        $this->assertNotNull($object[0]['IsRetired']);
        $this->assertNotNull($object[0]['IsSpamList']);
    }

    public function testObjectModelInternalTypes()
    {
        $object = $this->breachedAccountModel;

        $this->assertInternalType('string', $object[0]['Title']);
        $this->assertInternalType('string', $object[0]['Name']);
        $this->assertInternalType('string', $object[0]['Domain']);
        $this->assertRegExp('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', $object[0]['Domain']);
        $this->assertInternalType('string', $object[0]['BreachDate']);
        $this->assertInternalType('string', $object[0]['AddedDate']);
        $this->assertInternalType('string', $object[0]['ModifiedDate']);
        $this->assertInternalType('int', $object[0]['PwnCount']);
        $this->assertInternalType('string', $object[0]['Description']);
        $this->assertInternalType('array', $object[0]['DataClasses']);
        $this->assertInternalType('boolean', $object[0]['IsVerified']);
        $this->assertInternalType('boolean', $object[0]['IsFabricated']);
        $this->assertInternalType('boolean', $object[0]['IsSensitive']);
        $this->assertInternalType('boolean', $object[0]['IsRetired']);
        $this->assertInternalType('boolean', $object[0]['IsSpamList']);
    }
}