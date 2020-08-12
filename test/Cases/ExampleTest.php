<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace HyperfTest\Cases;

use HyperfTest\BaseTestCase;

/**
 * @internal
 * @coversNothing
 */
class ExampleTest extends BaseTestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testUpdate()
    {
        $ret = $this->client->post('/index/update', ['id' => 1, 'name' => 'Adrain Wiegand', 'describe' => '909 Fatima Crossroad
Cartermouth, SC 71818']);

        $this->assertSame(true, $ret['ret']);
    }

    public function testExample()
    {
        $ret = $this->client->get('/index/index', ['id' => 1]);

        $this->assertSame(1, $ret['id']);
        $this->assertSame('Adrain Wiegand', $ret['name']);
        $this->assertSame('909 Fatima Crossroad
Cartermouth, SC 71818', $ret['describe']);
    }
}
