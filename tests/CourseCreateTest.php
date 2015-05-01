<?php

include_once("../Moosh/MooshCommand.php");
include_once("../Moosh/Command/Moodle23/Course/CourseCreate.php");
include_once("../vendor/corneltek/getoptionkit/src/GetOptionKit/OptionCollection.php");
include_once("../vendor/corneltek/getoptionkit/src/GetOptionKit/Option.php");

use Moosh\Command\Moodle23\Course;
use Moosh\MooshCommand;

class CourseCreateTest extends \PHPUnit_Framework_TestCase
{
    public function testCourseCanBeCreated()
    {
        $c = new \Moosh\Command\Moodle23\Course\CourseCreate();
        $this->assertInstanceOf(CourseCreate::class, $c);
    }
}
