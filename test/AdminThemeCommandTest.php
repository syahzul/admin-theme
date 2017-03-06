<?php

use Syahzul\AdminTheme\Commands\AdminThemeCommand;

class AdminThemeCommandTest extends \PHPUnit_Framework_TestCase
{
	public function testMockingTheCommand()
	{
		$mock = \Mockery::mock(AdminThemeCommand::class);

		$mock->shouldReceive()->fire();
	}

	public function tearDown()
	{
	    \Mockery::close();
	}
}