<?php
namespace GT\Sync;

abstract class AbstractSync {
	public function __construct(
		protected string $source,
		protected string $destination
	) {}

	abstract public function exec(int $settings = 0):void;
}
