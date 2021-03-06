<?php

namespace Yiisoft\Yii\Debug\Tests\Proxy;

use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\EventDispatcherInterface;
use Yiisoft\Yii\Debug\Collector\CollectorInterface;
use Yiisoft\Yii\Debug\Proxy\EventDispatcherProxy;

final class EventDispatcherProxyTest extends TestCase
{
    public function testDispatch(): void
    {
        $event = new \stdClass();
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $collector = $this->createMock(CollectorInterface::class);
        $collector
            ->expects($this->once())
            ->method('collect')
            ->with($event);

        $proxy = new EventDispatcherProxy($eventDispatcher, $collector);

        $proxy->dispatch($event);
    }
}
