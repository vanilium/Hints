<?php

trait EnumComarations
{
        public function is($compareWith): bool
	{
		if(!enum_exists(self::class)) {
			throw new \RuntimeException('Unresolved  applying the comparation trait');
		}
		
		if(is_string($compareWith) && null === ($compareWith = self::tryFrom($compareWith))) {
			return false;
		}
		
		if(enum_exists(get_class($compareWith)) && is_a($compareWith, self::class)) {
			return $compareWith === $this;
		}
		
		return false;
	}

	public function isNot($compareWith): bool
	{
		return !$this->is($compareWith);
	}
}
