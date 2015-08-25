<?php
/**
 * moosh - Moodle Shell
 *
 * @copyright  2012 onwards Tomasz Muras
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace Moosh\Command\Moodle27\Course;
use Moosh\MooshCommand;

class CourseCopySection extends MooshCommand {
    public function __construct() {
        parent::__construct('copy-section', 'course');

        /* $this->addOption('c|course:', 'base course'); */
        /* $this->addOption('s|section:', 'course section'); */
        /* $this->addOption('d|destination:', 'target course'); */
        $this->addArgument('course');
        $this->addArgument('section');
        $this->addArgument('destination');
    }

    public function execute() {
        global $DB;

        $options = $this->expandedOptions;
        $basesection = $DB->get_record(
            'course_sections', array('course'=>$options['course'],
            'id'=>$options['section']));
        $DB->delete_records('course_sections', array(
            'course'=>$options['course'],
            'id'=>$options['section']));

        try {
            $DB->insert_record('course_sections', array(
                'course'=>$options['destination'],
            ));
        } catch (Exception $e) {
            echo $e . "\n";
        }
    }
}
