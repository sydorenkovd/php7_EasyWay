<?php
interface HolidayInterface
{
    public function getMemorial() : DateTimeImmutable;

    public function getThanksgiving();
}